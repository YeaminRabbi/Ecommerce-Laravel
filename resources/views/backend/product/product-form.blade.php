
@extends('backend.master')
@section('content')
<div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Product Add</h5>
      
    </div><!-- sl-page-title -->

 
    <div class="row row-sm mg-t-20">
      <div class="col-xl-10 m-auto">

        @if (session('product_add'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>{{ session('product_add') }}</strong>
            </div>
        @endif
        <form action="{{ url('product-post') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
          <h6 class="card-body-title">Fill the fields for Product</h6>
         
          <div class="row">
            <label class="col-sm-4 form-control-label">Product Name:</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="text" class="form-control" name="title" placeholder="Enter Product name">
            </div>
          </div><!-- row -->
          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Price: </label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <input type="text" class="form-control" name="price" placeholder="Enter Product price">
            </div>
          </div>

          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Brand: </label>
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <select name="brand_id" id="brand_id" class="form-control"> 
                      @foreach ($brands as $data)
                          <option value="{{ $data->id }}">{{ $data->brand_name }}</option>
                      @endforeach
                  </select>
              </div>
          </div>
          
          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Category: </label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <select class="form-control" name="category_id" id="category_id">
               @foreach ($categories as $data)
                   <option value="{{ $data->id }}">{{ $data->category_name }}</option>
               @endforeach
              </select>
            </div>
          </div>

          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Sub-Category: </label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <select class="form-control" name="subcategory_id" id="subcategory_id">
               @foreach ($subcategories as $data)
                   <option value="{{ $data->id }}">{{ $data->subcategory_name }}</option>
               @endforeach
              </select>
            </div>
          </div>

         
          <div id="items">
              <div class="row mg-t-20 attri">
                  <label for="color_id" class="col-sm-2 form-control-label">{{ __('Color')}}:</label>
                  <div class="col-sm-1 mg-t-10 mg-sm-t-0">
                      <select name="color_id[]" id="color_id" class="form-control">
                        @foreach ($colors as $data)
                            <option value="{{ $data->id }}">{{ $data->color_name }}</option>
                        @endforeach
                      </select>
                  </div>
                  <label for="size_id" class="col-sm-2 form-control-label">{{ __('Size')}}:</label>
                  <div class="col-sm-1 mg-t-10 mg-sm-t-0">
                      <select name="size_id[]" id="size_id" class="form-control">
                        @foreach ($sizes as $data)
                            <option value="{{ $data->id }}">{{ $data->size_name }}</option>
                        @endforeach
                      </select>
                  </div>
                  <label for="quantity" class="col-sm-2 form-control-label">{{ __('Quantity')}}:</label>
                  <div class="col-sm-1 mg-t-10 mg-sm-t-0">
                    <input type="text" name="quantity[]" class="form-control" placeholder="30">
                  </div>
                  {{-- ADD Button --}}
                  <span id="add" class="btn add-more button-blue tx-uppercase mr-2"><i class="fa fa-plus"></i> ADD</span>
                  <span class="delete btn button-blue tx-uppercase mr-2"><i class="fa fa-times"></i></span>
              </div><!-- row -->
          </div>

          

          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Summary: </label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <textarea name="summary" class="form-control"></textarea>
            </div>
          </div>
          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Description: </label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <textarea name="description" class="form-control"></textarea>
            </div>
          </div>

          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Product Image:</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="file" class="form-control" name="thumbnail" >
            </div>
          </div><!-- row -->

          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Multiple Product Images:</label>
              <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                  <input type="file" multiple class="form-control @error('images') is-invalid @enderror" name="images[]" id="images">
              </div>
              @error('images')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div><!-- row -->


          
          <div class="form-layout-footer mg-t-30">
            <button type="submit" class="btn btn-info mg-r-5">Save</button>
            
          </div><!-- form-layout-footer -->
        </form>
        </div><!-- card -->
      </div><!-- col-6 -->
     
    </div><!-- row -->
</div>

@endsection
@section('footer_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        
        $(document).ready(function(){
            
            $(".delete").hide();
            $("#add").click(function(e){
                $(".delete").fadeIn("1500");
                $("#items").append(
                    '<div class="row mg-t-20 attri">'+
                        '<label for="color_id" class="col-sm-2 form-control-label">{{ __('Color')}}:</label>'+
                        '<div class="col-sm-1 mg-t-10 mg-sm-t-0">'+
                            '<select name="color_id[]" id="color_id" class="form-control">'+
                                '@foreach ($colors as $data)'+
                                '<option value="{{ $data->id }}">{{ $data->color_name }}</option>'+
                                '@endforeach'+
                            '</select>'+
                        '</div>'+
                        '<label for="size_id" class="col-sm-2 form-control-label">{{ __('Size')}}:</label>'+
                        '<div class="col-sm-1 mg-t-10 mg-sm-t-0">'+
                            '<select name="size_id[]" id="size_id" class="form-control">'+
                                '@foreach ($sizes as $data)'+
                                    '<option value="{{ $data->id }}">{{ $data->size_name }}</option>'+
                                '@endforeach'+
                            '</select>'+
                        '</div>'+
                        '<label for="quantity" class="col-sm-2 form-control-label">{{ __('Quantity')}}:</label>'+
                            '<div class="col-sm-1 mg-t-10 mg-sm-t-0">'+
                                '<input type="text" name="quantity[]" class="form-control" placeholder="30">'+
                            '</div>'+
                    '</div>'
                );
            });
            $("body").on("click", ".delete", function(e){
                $(".attri").last().remove();
            });
        });
    </script>
@endsection