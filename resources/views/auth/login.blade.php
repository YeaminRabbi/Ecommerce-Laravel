@extends('frontend.master') 

@section('content')
<!-- .breadcumb-area start -->
<div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Account</h2>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><span>Login</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->
<!-- checkout-area start -->
<div class="account-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                <form action="{{ url('login') }}" method="post">
                    @csrf
                    <div class="account-form form-style">
                        <p>Email Address *</p>
                        <input type="email" name="email">
                        <p>Password *</p>
                        <input type="Password" name="password" >
                        <div class="row">
                            <div class="col-lg-6">
                                <input id="password" type="checkbox" name="remember">
                                <label for="password">Remember Password</label>
                            </div>
                            @if (Route::has('password.request'))
                                <div class="col-lg-6 text-right">
                                    <a href="{{ route('password.request') }}">Forget Your Password?</a>
                                </div>
                            @endif
                            
                        </div>
                        <button>SIGN IN</button>
                        <a href="{{ route('loginwithGithub') }}" ><i class="fa fa-github"></i>&nbspGithub Login</a>
                        <a href="{{ route('loginwithGoogle') }}" ><i class="fa fa-google ml-3"></i>&nbspGoogle Login</a>
                        {{--  <a href="{{ route('loginwithFacebook') }}" ><i class="fa fa-facebook ml-3"></i>&nbspFacebook Login</a>  --}}

                        <div class="text-center mt-3">
                            <a href="{{ url('/register') }}">Or Creat an Account</a>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
<!-- checkout-area end -->
@endsection
