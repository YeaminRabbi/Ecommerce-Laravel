@extends('frontend.master')
@section('title')
    Home Page | Rabbi
@endsection

@section('home')
    active
@endsection
@section('content')
<!-- slider-area start -->
<div class="slider-area">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide overlay">
                <div class="single-slider slide-inner slide-inner1">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-lg-9 col-12">
                                <div class="slider-content">
                                    <div class="slider-shape">
                                        <h2 data-swiper-parallax="-500">Amazing Pure Nature Hohey</h2>
                                        <p data-swiper-parallax="-400">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                                        <a href="{{ route('Shop') }}" data-swiper-parallax="-300">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slide-inner slide-inner7">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-lg-9 col-12">
                                <div class="slider-content">
                                    <div class="slider-shape">
                                        <h2 data-swiper-parallax="-500">Amazing Pure Nature Coconut Oil</h2>
                                        <p data-swiper-parallax="-400">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                                        <a href="{{ route('Shop') }}" data-swiper-parallax="-300">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slide-inner slide-inner8">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-lg-9 col-12">
                                <div class="slider-content">
                                    <div class="slider-shape">
                                        <h2 data-swiper-parallax="-500">Amazing Pure Nut Oil</h2>
                                        <p data-swiper-parallax="-400">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                                        <a href="{{ route('Shop') }}" data-swiper-parallax="-300">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
<!-- slider-area end -->
<!-- featured-area start -->
<div class="featured-area featured-area2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="featured-active2 owl-carousel next-prev-style">
                    <div class="featured-wrap">
                        <div class="featured-img">
                            <img src="assets/images/featured/6.jpg" alt="">
                            <div class="featured-content">
                                <a href="shop.html">Pure Honey</a>
                            </div>
                        </div>
                    </div>
                    <div class="featured-wrap">
                        <div class="featured-img">
                            <img src="assets/images/featured/7.jpg" alt="">
                            <div class="featured-content">
                                <a href="shop.html">Mustard Oil</a>
                            </div>
                        </div>
                    </div>
                    <div class="featured-wrap">
                        <div class="featured-img">
                            <img src="assets/images/featured/8.jpg" alt="">
                            <div class="featured-content">
                                <a href="shop.html">Olive Oil</a>
                            </div>
                        </div>
                    </div>
                    <div class="featured-wrap">
                        <div class="featured-img">
                            <img src="assets/images/featured/6.jpg" alt="">
                            <div class="featured-content">
                                <a href="shop.html">Pure Honey</a>
                            </div>
                        </div>
                    </div>
                    <div class="featured-wrap">
                        <div class="featured-img">
                            <img src="assets/images/featured/8.jpg" alt="">
                            <div class="featured-content">
                                <a href="shop.html">Olive Oil</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- featured-area end -->
<!-- start count-down-section -->
<div class="count-down-area count-down-area-sub">
    <section class="count-down-section section-padding parallax" data-speed="7">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 text-center">
                    <h2 class="big">Deal Of the Day <span>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</span></h2>
                </div>
                <div class="col-12 col-lg-12 text-center">
                    <div class="count-down-clock text-center">
                        <div id="clock">
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
</div>
<!-- end count-down-section -->
<!-- product-area start -->
<div class="product-area product-area-2">
    <div class="fluid-container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Best Seller @lang('messages.welcome')</h2>
                    <img src="assets/images/section-title.png" alt="">
                </div>
            </div>
        </div>
        <ul class="row">
            <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                <div class="product-wrap">
                    <div class="product-img">
                        <img src="assets/images/product/1.jpg" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Nature Honey</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                <div class="product-wrap">
                    <div class="product-img">
                        <img src="assets/images/product/2.jpg" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Olive Oil</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                <div class="product-wrap">
                    <div class="product-img">
                        <img src="assets/images/product/3.jpg" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Olive Oil</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                <div class="product-wrap">
                    <div class="product-img">
                        <img src="assets/images/product/4.jpg" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Coconut Oil</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- product-area end -->
<!-- product-area start -->
<div class="product-area">
    <div class="fluid-container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Our Latest Product</h2>
                    <img src="assets/images/section-title.png" alt="">
                </div>
            </div>
        </div>
        <ul class="row">
            @foreach ($products as $data)
            <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                <div class="product-wrap">
                    <div class="product-img">
                        <span>Sale</span>
                        <img src="{{ asset('images/'.$data->created_at->format('Y/m/').'/'.$data->thumbnail) }}" alt="{{ $data->title }}">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter{{ $data->id }}" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="{{ route('SingleProduct', $data->slug) }}"> {{ $data->title }}</a></h3>
                        <p class="pull-left">BDT. {{ $data->price }}</p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>

            {{--  Modal start  --}}
            <div class="modal fade" id="exampleModalCenter{{ $data->id }}" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body d-flex">
                            <div class="product-single-img w-50">
                                <img src="{{ asset('images/'.$data->created_at->format('Y/m/').'/'.$data->thumbnail) }}" alt="{{ $data->title }}">
                            </div>
                            <div class="product-single-content w-50">
                                <h3>{{ $data->title }}</h3>
                                <div class="rating-wrap fix">
                                    <span class="pull-left">BDT. {{ $data->price }}</span>
                                    <ul class="rating pull-right">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li>(05 Customar Review)</li>
                                    </ul>
                                </div>
                                <p>{{ $data->summary }}</p>
                                <ul class="input-style">
                                    <li class="quantity cart-plus-minus">
                                        <input type="text" value="1" />
                                    </li>
                                    <li><a href="cart.html">Add to Cart</a></li>
                                </ul>
                                <ul class="cetagory">
                                    <li>Categories:</li>
                                    <li><a href="#">{{ $data->category->category_name }}</a></li>
                                    
                                </ul>
                                <ul class="socil-icon">
                                    <li>Share :</li>
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u= {{ route('SingleProduct', $data->slug) }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{--  <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                <div class="product-wrap">
                    <div class="product-img">
                        <span>Sale</span>
                        <img src="assets/images/product/15.jpg" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Pure Nature Product</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                <div class="product-wrap">
                    <div class="product-img">
                        <span>New</span>
                        <img src="assets/images/product/11.jpg" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Pure Nature Product</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                <div class="product-wrap">
                    <div class="product-img">
                        <span>Sale</span>
                        <img src="assets/images/product/14.jpg" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Pure Nature Product</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                <div class="product-wrap">
                    <div class="product-img">
                        <span>New</span>
                        <img src="assets/images/product/12.jpg" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Pure Nature Product</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="col-xl-3 col-lg-4 col-sm-6 col-12  moreload">
                <div class="product-wrap">
                    <div class="product-img">
                        <span>Sale</span>
                        <img src="assets/images/product/10.jpg" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Pure Nature Product</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="col-xl-3 col-lg-4 col-sm-6 col-12  moreload">
                <div class="product-wrap">
                    <div class="product-img">
                        <span>New</span>
                        <img src="assets/images/product/9.jpg" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Pure Nature Product</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="col-xl-3 col-lg-4 col-sm-6 col-12  moreload">
                <div class="product-wrap">
                    <div class="product-img">
                        <span>Sale</span>
                        <img src="assets/images/product/8.jpg" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Pure Nature Product</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="col-xl-3 col-lg-4 col-sm-6 col-12  moreload">
                <div class="product-wrap">
                    <div class="product-img">
                        <span>New</span>
                        <img src="assets/images/product/7.jpg" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Pure Nature Product</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="col-xl-3 col-lg-4 col-sm-6 col-12  moreload">
                <div class="product-wrap">
                    <div class="product-img">
                        <span>New</span>
                        <img src="assets/images/product/4.jpg" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Pure Nature Product</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="col-xl-3 col-lg-4 col-sm-6 col-12  moreload">
                <div class="product-wrap">
                    <div class="product-img">
                        <span>Sale</span>
                        <img src="assets/images/product/6.jpg" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Pure Nature Product</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="col-xl-3 col-lg-4 col-sm-6 col-12  moreload">
                <div class="product-wrap">
                    <div class="product-img">
                        <span>Sale</span>
                        <img src="assets/images/product/3.jpg" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Pure Nature Product</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="col-xl-3 col-lg-4 col-sm-6 col-12  moreload">
                <div class="product-wrap">
                    <div class="product-img">
                        <span>Sale</span>
                        <img src="assets/images/product/5.jpg" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Pure Nature Product</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>  --}}
            <li class="col-12 text-center">
                <a class="loadmore-btn" href="javascript:void(0);">Show All</a>
            </li>
        </ul>
    </div>
</div>
<!-- product-area end -->
<!-- testmonial-area start -->
<div class="testmonial-area testmonial-area2 bg-img-2 black-opacity">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="test-title text-center">
                    <h2>What Our client Says</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1 col-12">
                <div class="testmonial-active owl-carousel">
                    <div class="test-items test-items2">
                        <div class="test-content">
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical LatinContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                            <h2>Elizabeth Ayna</h2>
                            <p>CEO of Woman Fedaration</p>
                        </div>
                        <div class="test-img2">
                            <img src="assets/images/test/1.png" alt="">
                        </div>
                    </div>
                    <div class="test-items test-items2">
                        <div class="test-content">
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical LatinContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                            <h2>Elizabeth Ayna</h2>
                            <p>CEO of Woman Fedaration</p>
                        </div>
                        <div class="test-img2">
                            <img src="assets/images/test/1.png" alt="">
                        </div>
                    </div>
                    <div class="test-items test-items2">
                        <div class="test-content">
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical LatinContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                            <h2>Elizabeth Ayna</h2>
                            <p>CEO of Woman Fedaration</p>
                        </div>
                        <div class="test-img2">
                            <img src="assets/images/test/1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- testmonial-area end -->
@endsection