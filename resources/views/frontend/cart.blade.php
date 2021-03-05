@extends('frontend.master')
@section('title')
   Cart 
@endsection
@section('cart')
    active
@endsection
@section('content')
<!-- .breadcumb-area start -->
<div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Shopping Cart</h2>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><span>Shopping Cart</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->
<!-- cart-area start -->
<div class="cart-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="cart-update"  method="POST">
                    <table class="table-responsive cart-wrap">
                        <thead>
                            <tr>
                                <th class="images">Image</th>
                                <th class="product">Product</th>
                                <th class="ptice">Price</th>
                                <th class="color">Color</th>
                                <th class="size">Size</th>
                                <th class="quantity">Quantity</th>
                                <th class="total">Total</th>
                                <th class="remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $grand_total=0;
                            @endphp
                            <tr>
                               
                                @foreach ($carts as $item)
                                    @csrf
                                     <tr>
                                        <td class="images"><a target="_blank" href="{{ route('SingleProduct', $item->product->slug) }}"><img style="width:100px;" src="{{ asset('images/'.$item->product->created_at->format('Y/m/').'/'.$item->product->thumbnail) }}"></a></td>
                                        <td class="product"><a target="_blank" href="{{ route('SingleProduct', $item->product->slug) }}">{{ $item->product->title }}</a></td>
                                        <td class="ptice unit_price{{ $item->id }}" data-unit{{ $item->id }}="{{ $item->product->price }}">BDT. {{ $item->product->price  }}</td>
                                        <td class="color">{{ $item->color->color_name }}</td>
                                        <td class="size">{{ $item->size->size_name }}</td>
                                        <input  type="hidden" name="cart_id[]" value="{{ $item->id }}">
                                        <td class="quantity cart-plus-minus">
                                            <input class="qty_quantity{{ $item->id }}" type="text" name="quantity[]" value="{{ $item->quantity }}" />
                                            <div class="dec qtybutton qtyminus{{ $item->id }}">-</div>
                                            <div class="inc qtybutton qtyplus{{ $item->id }}">+</div>
                                        </td>
                                        <td class="total count_total total_unit{{ $item->id }}">BDT. {{  $item->quantity*$item->product->price  }}</td>
                                        <td class="remove"><a href="{{ route('CartDelete', $item->id) }}"><i class="fa fa-times"></i></a></td>

                                        @php
                                            $grand_total+= ((float)$item->quantity* (float)$item->product->price);
                                        @endphp
                                    </tr>
                                @endforeach
                                
                            </tr>
                            
                        </tbody>
                    </table>
                    <div class="row mt-60">
                        <div class="col-xl-4 col-lg-5 col-md-6 ">
                            <div class="cartcupon-wrap">
                                <ul class="d-flex">
                                    <li>
                                        <button type="submit">Update Cart</button>
                                    </li>
                                </form>
                                    <li><a href="{{ url('shop') }}">Continue Shopping</a></li>
                                </ul>
                            <form action="{{ route('Cart') }}" method="GET">
                                
                                <h3>Coupon</h3>
                                <p>Enter Your Coupon Code if You Have One</p>
                                <div class="cupon-wrap">
                                    <input type="text" name="coupon_code" placeholder="Coupon Code" value="{{ $code ?? '' }}">
                                    <button>Apply Coupon</button>
                                    @if ($invalid ?? '')
                                    <span style="color: red;font-weight:700;">{{ $invalid ?? '' }}</span>
                                    @endif
                                </div>
                            </form>
                            </div>
                        </div>
                        <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                            <div class="cart-total text-right">
                                <h3>Cart Totals</h3>
                                <ul>
                                    
                                    <li><span class="pull-left">Sub Total </span>BDT. {{ $grand_total ?? 0 }}</li>
                                    <li><span class="pull-left">Coupon Discount </span>BDT. {{ $coupon_discount ?? 0 }}</li>
                                    <li><span class="pull-left grand_total">Total </span class="up_total"> BDT. {{ $grand_total- $coupon_discount}}</li>
                                </ul>
                                <a href="{{ route('Checkout') }}">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</div>
<!-- cart-area end -->

@endsection

@section('footer_js')
  
    <script type="text/javascript">
        $(document).ready(function(){
            @foreach($carts as $cart)
                $('.qtyminus{{ $cart->id }}').click(function(){
                    let qty_quantity = $('.qty_quantity{{ $cart->id }}').val()
                    let unit_price = $('.unit_price{{ $cart->id }}').attr('data-unit{{ $cart->id }}')
                    $('.total_unit{{ $cart->id }}').html('BDT. '+qty_quantity * unit_price)
                    let minus_sub_total = (qty_quantity * unit_price)
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ url('/quantity/update') }}",
                        method: "post",
                        data: {
                            id: "{{ $cart->id }}",
                            qty_quantity: qty_quantity,
                        },
                        success: function(result){
                            console.log(result)
                        }
                    })
                    let c_total = document.querySelectorAll('.count_total')
                    let arr = Array.from(c_total)
                    let sum = 0
                    arr.map(item=>{
                        sum += parseInt(item.innerHTML)
                        $('.up_total').html(sum)
                        console.log(sum)
                    })
                    
                })
        
                $('.qtyplus{{ $cart->id }}').click(function(){
                    let qty_quantity = $('.qty_quantity{{ $cart->id }}').val()
                    let unit_price = $('.unit_price{{ $cart->id }}').attr('data-unit{{ $cart->id }}')
                    $('.total_unit{{ $cart->id }}').html('BDT. '+qty_quantity * unit_price)
                    let plus_sub_total = (qty_quantity * unit_price)
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ url('/quantity/update') }}",
                        method: "post",
                        data: {
                            id: "{{ $cart->id }}",
                            qty_quantity: qty_quantity,
                        },
                        success: function(result){
                            console.log(result)
                        }
                    })
                    let c_total = document.querySelectorAll('.count_total')
                    let arr = Array.from(c_total)
                    let sum = 0
                    arr.map(item=>{
                        sum += parseInt(item.innerHTML)
                        $('.up_total').html(sum)
                        console.log(sum)
                    })
                })
            @endforeach
        })
    </script>


    
@endsection