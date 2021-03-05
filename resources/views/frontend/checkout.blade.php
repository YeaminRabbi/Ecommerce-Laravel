@extends('frontend.master')

@section('title')
    Checkout Page | Rabbi
@endsection
@section('content')
<!-- .breadcumb-area start -->
<div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Checkout</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><span>Checkout</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->
    <style>
        /**
        * The CSS shown here will not be introduced in the Quickstart guide, but shows
        * how you can use CSS to style your Element's container.
        */
        .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
        }
        .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
        }
        .StripeElement--invalid {
        border-color: #fa755a;
        }
        .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
        }
    </style>
<!-- checkout-area start -->
<div class="checkout-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-form form-style">
                    <h3>Billing Details</h3>
                    <form action="{{ url('payment') }}" method="POST" id="payment-form">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <p>First Name *</p>
                                <input type="text" name="first_name">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Last Name *</p>
                                <input type="text" name="last_name">
                            </div>
                            <div class="col-12">
                                <p>Company Name</p>
                                <input type="text" name="company">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Email Address *</p>
                                <input type="email" name="email">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Phone No. *</p>
                                <input type="text" name="phone">
                            </div>
                            <div class="col-6">
                                <p>Country </p>
                                <select name="country_id" id="country_id">
                                    <option>Select One</option>
                                    @foreach ($countries as $country)
                                      <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <p>State </p>
                                <select name="state_id" id="state_id">
                                    
                                </select>
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Town/City </p>
                                <select name="city_id" id="city_id">
                                    
                                </select>
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Postcode/ZIP *</p>
                                <input type="text" name="zipcode">
                            </div>
                           
                            <div class="col-12">
                                <p>Address *</p>
                                <input type="text" name="address">
                            </div>
                            
                            <div class="col-12">
                                <p>Order Notes </p>
                                <textarea name="note" placeholder="Notes about Your Order, e.g.Special Note for Delivery"></textarea>
                            </div>
                        </div>
                  
                </div>
            </div>
            <div class="col-lg-4">
                <div class="order-area">
                    <h3>Your Order</h3>
                    <ul class="total-cost">
                        @php
                            $sub_total=0;
                        @endphp
                        @foreach ($carts as $cart)
                            <li>{{ $cart->product->title }} <span class="pull-right">BDT. {{ $cart->product->price }}</span></li>

                            @php
                                $sub_total+=(int) $cart->product->price * (int)$cart->quantity;
                            @endphp
                        @endforeach

                        
                        
                        <li>Subtotal <span class="pull-right"><strong>BDT. {{ $sub_total }}</strong></span></li>
                        <li>Shipping <span class="pull-right">Free</span></li>
                        <li>Total<span class="pull-right">BDT. {{ $sub_total }}</span></li>
                    </ul>
                    <ul class="payment-method">
                        <li>
                            <input id="bank" type="radio" name="payment" value="bank">
                            <label for="bank">Direct Bank Transfer</label>
                        </li>
                        {{--  <li>
                            <input id="paypal" type="radio" name="payment" value="paypal">
                            <label for="paypal">Paypal</label>
                        </li>  --}}
                        {{--  <li>
                            <input id="card" type="radio" name="payment" value="card">
                               <label for="card-element">
                                 Credit or Debit card
                               </label>
                               <div id="card-element">
                               <!-- A Stripe Element will be inserted here. -->
                               </div>
                                  
                               <!-- Used to display form errors. -->
                               <div id="card-errors" role="alert"></div>
                        </li>  --}}
                        <li>
                            <input id="cash" type="radio" name="payment" value="cash">
                            <label for="cash">Cash on Delivery</label>
                        </li>
                    </ul>
                    <button type="submit">Place Order</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- checkout-area end -->
@endsection

@section('footer_js')

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        $('#country_id').change(function(){
            var countryID = $(this).val();    
            if(countryID){
                $.ajax({
                type:"GET",
                url:"{{url('api/get-state-list')}}/"+countryID,
                success:function(res){               
                    if(res){
                        $("#state_id").empty();
                        $("#state_id").append('<option>Select State</option>');
                        $.each(res,function(key,value){
                            $("#state_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                        });
                
                    }else{
                    $("#state_id").empty();
                    }
                }
                });
            }else{
                $("#state_id").empty();
                $("#city_id").empty();
            }      
        });
        $('#state_id').on('change',function(){
            var stateID = $(this).val();    
            if(stateID){
                $.ajax({
                type:"GET",
                url:"{{url('api/get-city-list')}}/"+stateID,
                success:function(res){               
                    if(res){
                        $("#city_id").empty();
                        $.each(res,function(key,value){
                            $("#city_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                        });
                
                    }else{
                    $("#city_id").empty();
                    }
                }
                });
            }else{
                $("#city_id").empty();
            }
                
        });
    </script>


    //Stripe Js Code 
    <script>
        // Create a Stripe client.
        var stripe = Stripe('pk_test_51ILkHHGCgAJcLuOGCk0zAr4iS9oU6qd67Vrwe40AoJaH3ilIC7M72w3EStnB1I5DJuXPAScpnloC2hmhomB8QYGB00Ik2VSlAJ');
        // Create an instance of Elements.
        var elements = stripe.elements();
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
            color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
        };
        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});
        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');
        // Handle real-time validation errors from the card Element.
        card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
        });
        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
        event.preventDefault();
        stripe.createToken(card).then(function(result) {
            if (result.error) {
            // Inform the user if there was an error.
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
            } else {
            // Send the token to your server.
            stripeTokenHandler(result.token);
            }
        });
        });
        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        // Submit the form
        form.submit();
        }
    </script>
@endsection