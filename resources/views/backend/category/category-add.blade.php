@extends('backend.master')
@section('content')
<div class="container" style="padding-top: 50px;">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header text-center bg-success">{{ __('Add Category') }}</div>
            
            @if (session('CategoryAdd'))
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session('CategoryAdd') }}
                </div>
            @endif
           

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ 'category-post' }}" method="POST">

                    @csrf
                    <div class="form-group">
                        <label for="category">Name:</label>
                        <input type="text" class="form-control @error('category_name') is-invalid @enderror" placeholder="Enter category" name="category_name" id="category" autocomplete="off">
                        
                        @error('category_name')
                            <div><span style="color: red;font-weight:700;">{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

                
            </div>
        </div>
    </div>
</div>
</div>
</div>




    

    
    
@endsection

