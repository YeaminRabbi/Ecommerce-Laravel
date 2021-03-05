<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipping;
use Cookie;
use Carbon\Carbon;
use App\attributes;
use Auth;
use App\Order;
use App\Cart;
use Stripe;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;

//Paypal
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
class PaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $paypal_configuration = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $this->_api_context->setConfig($paypal_configuration['settings']);
    }

    function payment(Request $req)
    { 
      $order = Order::where('shipping_id', 1)->get();
      Mail::to(Auth::user()->email)->send(new OrderShipped($order));

      if($req->payment == 'card')
      {
        $city_id = 4040404;
        if($req->city_id)
        {
          $city_id = $req->city_id;
        }
        $shipping= new Shipping;

        $shipping->user_id = Auth::id();
        $shipping->first_name=$req->first_name;
        $shipping->last_name=$req->last_name;
        $shipping->company=$req->company;
        $shipping->email=$req->email;
        $shipping->phone=$req->phone;
        $shipping->city_id=$city_id;
        $shipping->address=$req->address;
        $shipping->zipcode=$req->zipcode;
        $shipping->coupon_code=$req->coupon_code;
        $shipping->note=$req->note;
        $shipping->save();
        

        $cookie = Cookie::get('cookie_id');
        $carts= Cart::where('cookie_id', $cookie)->get();

        foreach($carts as $cart)
        {
          $order = new Order;
          $order->shipping_id = $shipping->id;
          $order->product_id =$cart->product_id;
          $order->product_unit_price =$cart->product->price;
          $order->quantity = $cart->quantity ;
          $order->save();

        $attr = attributes::where('product_id', $cart->product_id)->where('color_id', $cart->color_id)->where('size_id',$cart->size_id );
        if($attr->exists()){
          $attr->decrement('quantity', $cart->quantity);
        }
        
          $cart->delete();
        }
        

        
        //Card Payment
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            
        Stripe\Charge::create ([
            "amount" => 1500 * 100,
            "currency" => "usd",
            "source" => $req->stripeToken,
            "description" => "Test payment from Rabbi." 
        ]);
        
        $payment_Update = Shipping::findOrFail( $shipping->id );
        $payment_Update->payment_status = 1;
        $payment_Update->save();
        return 'Payment Recieved Successfully!!!';


      }
      elseif($req->payment == 'paypal')
      {
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');

            $item_1 = new Item();

            $item_1->setName('Product 1')
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setPrice(500);

            $item_list = new ItemList();
            $item_list->setItems(array($item_1));

            $amount = new Amount();
            $amount->setCurrency('USD')
                ->setTotal(500);

            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($item_list)
                ->setDescription('Enter Your transaction description');

            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(url('/status'))
                ->setCancelUrl(url('/status'));

            $payment = new Payment();
            $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));            
            try {
                $payment->create($this->_api_context);
            } catch (\PayPal\Exception\PPConnectionException $ex) {
                if (\Config::get('app.debug')) {
                    \Session::put('error','Connection timeout');
                    return redirect('/paywithpaypal');                
                } else {
                    \Session::put('error','Some error occur, sorry for inconvenient');
                    return redirect('/paywithpaypal');                
                }
            }

            foreach($payment->getLinks() as $link) {
                if($link->getRel() == 'approval_url') {
                    $redirect_url = $link->getHref();
                    break;
                }
            }
            
            \Session::put('paypal_payment_id', $payment->getId());

            if(isset($redirect_url)) {            
                return Redirect::away($redirect_url);
            }

            Session::put('error','Unknown error occurred');
            return redirect('/paywithpaypal');
      }
      elseif($req->payment == 'bank'){
        return $req->payment;
      }
      elseif($req->payment == 'cash'){
        return $req->payment;
      }
      else{
        return "select a  payment method";
      }

    }


    public function getPaymentStatus(Request $request)
    {        
        $payment_id = Session::get('paypal_payment_id');

        Session::forget('paypal_payment_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            \Session::put('error','Payment failed');
            return Redirect::route('paywithpaypal');
        }
        $payment = Payment::get($payment_id, $this->_api_context);        
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));        
        $result = $payment->execute($execution, $this->_api_context);
        
        if ($result->getState() == 'approved') {         
            \Session::put('success','Payment success !!');
            return Redirect::route('paywithpaypal');
        }

        \Session::put('error','Payment failed !!');
	    	return Redirect::route('paywithpaypal');
    }
}
