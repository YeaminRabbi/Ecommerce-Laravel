<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cookie;
use App\Cart;
use App\Coupon;
use Carbon\Carbon;
class CartController extends Controller
{
    function AddToCart(Request $req)
    {
        $cookie = Cookie::get('cookie_id');
        if($cookie)
        {
            $unique = $cookie;
        }
        else{
            $generate = Str::random(7).rand(1,1000);
            $unique = Cookie::queue('cookie_id', $generate, 43200);
        }

        $exist = Cart::where('cookie_id', $unique)->where('product_id', $req->product_id)->where('color_id', $req->color_id)->where('size_id', $req->size_id);
        
        if($exist->exists()){
            $exist->increment('quantity', $req->quantity);
            return back();
        }
        
        else{
            $cart = new Cart;
            $cart->cookie_id = $unique;
            $cart->product_id = $req->product_id;
            $cart->size_id = $req->size_id;
            $cart->color_id = $req->color_id;
            $cart->quantity = $req->quantity;
            $cart->save();

            return back();
        }
       
        // return view('frontend.cart', [
        //     'carts'=> Cart::where('cookie_id', $cookie)->get()
        // ]); 
    } 

    function Cart(Request $req)
    {

        $coupon_discount = 0;
        if($req->coupon_code == ''){
            $cookie = Cookie::get('cookie_id');
            return view('frontend.cart', [
                'carts'=> Cart::where('cookie_id', $cookie)->get(),
                'coupon_discount' => $coupon_discount
            ]); 
        }
        else{

            $cookie = Cookie::get('cookie_id');
            $code = $req->coupon_code;
            if(Coupon::where('code', $req->coupon_code)->exists())
            {   
                $carts= Cart::where('cookie_id', $cookie)->get();
                $valid_date=Coupon::where('code', $req->coupon_code)->first();
               if(Carbon::now()->format('Y-m-d') <= $valid_date->validity)
               {
                   if($valid_date->level == "amount")
                   {
                     $coupon_discount = $valid_date->discount;
                   }
                   else{
                     $total = 0;
                     foreach($carts as $cat)
                     {
                         $total+= $cat->product->price * $cat->quantity;
                     }

                     $coupon_discount = ($total /100) * $valid_date->discount;
                     
                   }
               }
               else
               {
                    return view('frontend.cart', [
                        'carts'=> Cart::where('cookie_id', $cookie)->get(),
                        'coupon_discount' => $coupon_discount,
                        'invalid'=>'Code Invalid'
                    ]);
               }
            }
            else
            {
                    return view('frontend.cart', [
                        'carts'=> Cart::where('cookie_id', $cookie)->get(),
                        'coupon_discount' => $coupon_discount,
                        'invalid'=>'Code Invalid'
                    ]);
            }
            
            return view('frontend.cart', [
                'carts'=> Cart::where('cookie_id', $cookie)->get(),
                'coupon_discount' => $coupon_discount,
                'code'=> $code
            ]); 
        }
        
        
    }

    function CartUpdate(Request $req)
    {

        foreach($req->cart_id as $key=> $data)
        {
            $cart=Cart::findOrFail($data);

            $cart->quantity = $req->quantity[$key];
            $cart->save();
        }

        return back();
    }



    function CartDelete($id)
    {
        Cart::findOrFail($id)->delete();

        return back();
    }

    
    /**
     * Quantity Update for cart
     */
    function QuantityUpdate(Request $request){
        $id = $request->id;
        $qty = $request->qty_quantity;
        
        $cart = Cart::findOrFail($id);
        $cart->quantity = $qty;


        $total = $qty*$cart->product->price;

        $cart->save();
        return response()->json($total);
    }



    // function CouponValue(Request $req)
    // {
    //     return $req;
    // }


}
