@extends('frontend.master')
@section('title')
   Product | {{ $product->title }}
@endsection

@section('ogtitle'){{ $product->title }}@endsection
@section('ogdesc'){{ $product->description }}@endsection
@section('ogurl'){{ route('SingleProduct', $product->slug) }}@endsection
@section('ogimg'){{ asset('images/'.$product->created_at->format('Y/m/').'/'.$product->thumbnail) }}@endsection
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
<!-- single-product-area start-->
<div class="single-product-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product-single-img">
                    <div class="product-active owl-carousel">
                        <div class="item">
                            <img src="{{ asset('images/'.$product->created_at->format('Y/m/').'/'.$product->thumbnail) }}" alt="{{ $product->title }}">
                        </div>
                        
                        @foreach ($gallery as $x)
                            <div class="item">
                                <img src="{{ asset('gallery/'.$x->created_at->format('Y/m/').$x->product_id.'/'.$x->images) }}" alt="Thumbnails">
                            </div>
                        @endforeach
                        
                    </div>
                    <div class="product-thumbnil-active  owl-carousel">
                        <div class="item">
                            <img src="{{ asset('images/'.$product->created_at->format('Y/m/').'/'.$product->thumbnail) }}" alt="{{ $product->title }}">
                        </div>
                        @foreach ($gallery as $key => $x)
                            <div class="item">
                                <img src="{{ asset('gallery/'.$x->created_at->format('Y/m/').$x->product_id.'/'.$x->images) }}" alt="Thumbnails">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="product-single-content">
                    <h3>{{ $product->title }}</h3>
                    <div class="rating-wrap fix">
                        <span class="pull-left">BDT. {{ $product->price }}</span>
                        <ul class="rating pull-right">
                        
                            
                        @for ($i=1;$i<=$rating;$i++)
                                                    
                            <li><i class="fa fa-star"></i></li>

                        @endfor  
                       
                         
                            <li>({{ $reviews->count() }} Customar Review)</li>  
                        </ul>
                    </div>

                    <style>
                        .btnColor{
                            height: 35px;
                            line-height: 35px;
                            text-align:center;
                            width:120px;
                            background: #ef4836;
                            color: #fff;
                            display: block;
                            margin-left: 30px;
                            border:none;
                        }

                        .btnColor:hover{
                            background-color:#333;
                        }
                    </style>
                    <p>{{ Str::limit($product->summary, 200) }}</p>
                    <form action="{{ url('add-to-cart') }}" method="POST">
                        @csrf

                        <input type="hidden" name="product_id" value="{{ $product->id }}" >
                    <ul class="input-style">
                        <li class="quantity cart-plus-minus">

                            
                            <input name="quantity" value="1" type="text" min="1" max="10">
                            <div class="dec qtybutton">-</div>
                            <div class="inc qtybutton">+</div>
                            
                        </li>
                        <li><button type="submit" class="btnColor" href="cart.html">Add to Cart</button></li>
                    </ul>
                    <ul class="cetagory">
                        <li>Categories:</li>
                        <li><a href="#">{{ $product->category->category_name }}</a></li>
                    </ul>
                    <ul class="cetagory">
                        <li>Color:</li>
                     
                        <li>
                           
                            @foreach ($groupBy as $color)
                            <input class="color_id" id="color_id" data-product="{{ $color[0]->product_id }}" type="radio" name="color_id" value="{{ $color[0]->color_id }}"> {{ $color[0]->color->color_name }}  
                            @endforeach
                            
                        </li>
                    </ul>

                    <ul class="cetagory">
                        <li>Size:</li>
                        <li class="sizeadd">
                            @foreach ($product->attribute as $attr)
                            <input type="radio" name="size_id" value="{{ $attr->size_id }}"> {{ $attr->size->size_name }} 
                            @endforeach
                        </li>
                    </ul>
                    </form>
                    <ul class="socil-icon">
                        <li>Share :</li>
                        <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ route('SingleProduct', $product->slug) }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.twitter.com/share?text={{ $product->title }}&url={{ route('SingleProduct', $product->slug) }}"><i class="fa fa-twitter"></i></a></li>
                        {{--  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>  --}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="row mt-60">
            <div class="col-12">
                <div class="single-product-menu">
                    <ul class="nav">
                        <li><a class="active" data-toggle="tab" href="#description">Description</a> </li>
                        <li><a data-toggle="tab" href="#tag">Faq</a></li>
                        <li><a data-toggle="tab" href="#review">Review</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12">
                <div class="tab-content">
                    <div class="tab-pane active" id="description">
                        <div class="description-wrap">
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                    <div class="tab-pane" id="tag">
                        <div class="faq-wrap" id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5><button data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">General Inquiries ?</button> </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5><button class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">How To Used ?</button></h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5><button class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Shipping & Delivery ?</button></h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingfour">
                                    <h5><button class="collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">Additional Information ?</button></h5>
                                </div>
                                <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
                                    <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingfive">
                                    <h5><button class="collapsed" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">Return Policy ?</button></h5>
                                </div>
                                <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordion">
                                    <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="review">
                        <div class="review-wrap">
                            <ul>

                                @foreach ($reviews as $data)
                                    <li class="review-items">
                                        {{--  <div class="review-img">
                                            <img src="assets/images/comment/1.png" alt="">
                                        </div>  --}}
                                        <div class="review-content">
                                            <h3><a href="#">{{ $data->name }}</a></h3>
                                            <span>{{ $data->created_at->format('d M,y | h:i a') }}</span>
                                            <p>{{ $data->message }}</p>
                                            <ul class="rating">


                                                @for ($i =1 ; $i <=  $data->rating ; $i++)
                                                    
                                                    <li><i class="fa fa-star"></i></li>

                                                @endfor  
                                               
                                               
                                               
                                                
                                            </ul>
                                        </div>
                                    </li>
                                @endforeach
                                
                            </ul>
                        </div>
                        <div class="add-review">
                            <h4>Add A Review</h4>
                            <form action="{{ route('Review') }}" method="POST">
                                @csrf

                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="ratting-wrap">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>task</th>
                                            <th>1 Star</th>
                                            <th>2 Star</th>
                                            <th>3 Star</th>
                                            <th>4 Star</th>
                                            <th>5 Star</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>How Many Stars?</td>
                                            <td>
                                                <input type="radio" value="1" name="rating" />
                                            </td>
                                            <td>
                                                <input type="radio" value="2" name="rating" />
                                            </td>
                                            <td>
                                                <input type="radio" value="3" name="rating" />
                                            </td>
                                            <td>
                                                <input type="radio" value="4" name="rating" />
                                            </td>
                                            <td>
                                                <input type="radio" value="5" name="rating" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <h4>Name:</h4>
                                    <input type="text" name="name" placeholder="Your name here..." />
                                </div>
                                <div class="col-md-6 col-12">
                                    <h4>Email:</h4>
                                    <input type="email" name="email" placeholder="Your Email here..." />
                                </div>
                                <div class="col-12">
                                    <h4>Your Review:</h4>
                                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Your review here..."></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn-style">Submit</button>
                                </div>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- single-product-area end-->
<!-- featured-product-area start -->
<div class="featured-product-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-left">
                    <h2>Related Product</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="featured-product-wrap">
                    <div class="featured-product-img">
                        <img src="assets/images/product/1.jpg" alt="">
                    </div>
                    <div class="featured-product-content">
                        <div class="row">
                            <div class="col-7">
                                <h3><a href="shop.html">Nature Honey</a></h3>
                                <p>$219.56</p>
                            </div>
                            <div class="col-5 text-right">
                                <ul>
                                    <li><a href="cart.html"><i class="fa fa-shopping-cart"></i></a></li>
                                    <li><a href="cart.html"><i class="fa fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="featured-product-wrap">
                    <div class="featured-product-img">
                        <img src="assets/images/product/2.jpg" alt="">
                    </div>
                    <div class="featured-product-content">
                        <div class="row">
                            <div class="col-7">
                                <h3><a href="shop.html">Olive Oil</a></h3>
                                <p>$354.75</p>
                            </div>
                            <div class="col-5 text-right">
                                <ul>
                                    <li><a href="cart.html"><i class="fa fa-shopping-cart"></i></a></li>
                                    <li><a href="cart.html"><i class="fa fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="featured-product-wrap">
                    <div class="featured-product-img">
                        <img src="assets/images/product/3.jpg" alt="">
                    </div>
                    <div class="featured-product-content">
                        <div class="row">
                            <div class="col-7">
                                <h3><a href="shop.html">Sunrise Oil</a></h3>
                                <p>$214.80</p>
                            </div>
                            <div class="col-5 text-right">
                                <ul>
                                    <li><a href="cart.html"><i class="fa fa-shopping-cart"></i></a></li>
                                    <li><a href="cart.html"><i class="fa fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="featured-product-wrap">
                    <div class="featured-product-img">
                        <img src="assets/images/product/4.jpg" alt="">
                    </div>
                    <div class="featured-product-content">
                        <div class="row">
                            <div class="col-7">
                                <h3><a href="shop.html">Coconut Oil</a></h3>
                                <p>$241.00</p>
                            </div>
                            <div class="col-5 text-right">
                                <ul>
                                    <li><a href="cart.html"><i class="fa fa-shopping-cart"></i></a></li>
                                    <li><a href="cart.html"><i class="fa fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- featured-product-area end -->
@endsection

@section('footer_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $('.color_id').change(function(){
            let colorid = $(this).val();
            let productid = $(this).attr('data-product');
            $.ajax({
                type:"GET",
                url:"{{ url('product/get/size') }}/"+colorid+'/'+productid,
                success:function(res){
                    $('.sizeadd').html(res)
                }
            });
        });
    </script>    
   
@endsection