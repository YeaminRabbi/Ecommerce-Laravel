@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-primary">{{ __('Dash Board') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h5>You are Logged in</h5>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
