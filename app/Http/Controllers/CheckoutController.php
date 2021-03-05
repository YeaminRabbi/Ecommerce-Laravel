<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cookie;
use App\Cart;
use Carbon\Carbon;
use App\Country;
use App\State;
use App\city;
class CheckoutController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function checkout()
    {
        $cookie = Cookie::get('cookie_id');
        $carts= Cart::where('cookie_id', $cookie)->get();
        $country=Country::orderBy('name', 'asc')->get();
        return view('frontend.checkout',[
            'carts'=>$carts,
            'countries'=>$country
        ]);
    }

    function GetState($id)
    {
       $states = State::where('country_id', $id)->get();
       return response()->json($states);
    }

    function GetCity($state_id)
    {
        $cities = City::where('state_id', $state_id)->get();
        return response()->json($cities);
    }

}
