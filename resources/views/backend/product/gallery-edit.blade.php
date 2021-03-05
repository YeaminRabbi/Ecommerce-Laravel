
@extends('backend.master')
@section('content')
<div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Update Gallery</h5>
      
    </div><!-- sl-page-title -->

 
    <div class="row row-sm mg-t-20">
      <div class="col-xl-10 m-auto">

        <form action="{{ url('multiple-image-update') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
          <h6 class="card-body-title">Fill the fields for Product</h6>
      
          <input type="hidden" class="form-control" name="product_id" value="{{ $product_id }}">
          @foreach ($gallery as $data)
            <div class="row mg-t-20">

                
                <input type="hidden" class="form-control" name="id" value="{{ $data->id }}">

                <label class="col-sm-4 form-control-label">Product Image:</label>
                <div class="col-sm-3 mg-t-10 mg-sm-t-0">
                    <input type="file" class="form-control" name="thumbnail" >
                </div>
                <div class="col-sm-4 mg-t-10 mg-sm-t-0">
                    <img src="{{ asset('gallery/'.$data->created_at->format('Y/m/').$data->product_id.'/'.$data->images) }}" style="width:100px;">
                </div>
                <div class="col-sm-1 mg-t-10 mg-sm-t-0">
                    <a href="{{ url('gallery-image-delete') }}/{{ $data->id }}" class="btn btn-danger">Delete</a>
                </div>
            </div><!-- row -->
          @endforeach
         {{-- Another File --}}
         <div class="field_wrapper">
            <div class="row mg-t-20">
            
                <label class="col-sm-2 form-control-label" for="images">{{ __('Product Image ') }}<span class="tx-danger"> *</span> :</label>
                <div class="col-sm-4 mg-t-10 mg-sm-t-0">
                    <input type="file" class="form-control @error('images') is-invalid @enderror" name="images[]" id="images">
                    
                </div>
                @error('images')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror  
                <div class="col-sm-4 mg-t-10 mg-sm-t-0">
                    <img style="width: 100px" src="#" alt="">
                </div>
            </div>
        </div>
          
          <div class="form-layout-footer mg-t-30">
            <button type="submit" class="btn btn-success mg-r-5">Update</button>
            <a href="{{ url('products') }}" class="btn btn-primary">Back</a>

          </div><!-- form-layout-footer -->
        </form>
        </div><!-- card -->
      </div><!-- col-6 -->
     
    </div><!-- row -->
</div>

@endsection
