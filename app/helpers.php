<?php

use App\Cart;

    function cart()
    {
        $cookie = Cookie::get('cookie_id');
        $cart = Cart::where('cookie_id', $cookie)->get();
        return $cart;
    }

?>