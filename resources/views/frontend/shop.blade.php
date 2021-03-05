@extends('frontend.master')
@section('title')
   Shop 
@endsection
@section('shop')
active
@endsection
@section('content')
<!-- .breadcumb-area start -->
<div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Shop Page</h2>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><span>Shop</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->
<!-- product-area start -->
<div class="product-area pt-100">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="product-menu">
                    <ul class="nav justify-content-center">
                        <li>
                            <a class="active" data-toggle="tab" href="#all">All product</a>
                        </li>
                        @foreach ($cats as $cat)
                         
                            <li>
                                <a style="margin-bottom:10px;" data-toggle="tab" href="#chair{{ $cat->id }}">{{ $cat->category_name }}</a>
                            </li>
                        
                        @endforeach
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="all">
                <ul class="row">
                    @foreach ($products as $key=> $item)
                        <li class="col-xl-3 col-lg-4 col-sm-6 col-12 @if($key+1 > 12) moreload @endif">
                            <div class="product-wrap">
                                <div class="product-img">
                                    <span>Sale</span>
                                    
                                    <img src="{{ asset('images/'.$item->created_at->format('Y/m/').'/'.$item->thumbnail) }}" alt="Thumbnail">
                                    <div class="product-icon flex-style">
                                        <ul>
                                            <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="{{ url('cart') }}"><i class="fa fa-shopping-bag"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="{{ route('SingleProduct', $item->slug) }}">{{ $item->title }}</a></h3>
                                    <p class="pull-left">BDT. {{ $item->price }}

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
                    @endforeach
                    
                    
                    <li class="col-12 text-center">
                        <a class="loadmore-btn" href="javascript:void(0);">Load More</a>
                    </li>
                </ul>
            </div>

            @foreach ($cats as $ct)
                <div class="tab-pane" id="chair{{ $ct->id }}">
                    <ul class="row">
                        @foreach ($products->where('category_id', $ct->id) as $item)
                            <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                <div class="product-wrap">
                                    <div class="product-img">
                                        <span>Sale</span>
                                        <img src="{{ asset('images/'.$item->created_at->format('Y/m/').'/'.$item->thumbnail) }}" alt="Thumbnail">

                                        <div class="product-icon flex-style">
                                            <ul>
                                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="{{ url('cart') }}"><i class="fa fa-shopping-bag"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="{{ route('SingleProduct', $item->slug) }}">{{ $item->title }}</a></h3>
                                        <p class="pull-left">BDT. {{ $item->price }}

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
                        @endforeach
                        
                    </ul>
                </div>
            @endforeach
            
           
        </div>
    </div>
</div>
<!-- product-area end -->

@endsection