
@extends('backend.master')
@section('content')
<div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Update Product</h5>
      
    </div><!-- sl-page-title -->

 
    <div class="row row-sm mg-t-20">
      <div class="col-xl-10 m-auto">

        {{--  @if (session('product_add'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>{{ session('product_add') }}</strong>
            </div>
        @endif  --}}
        <form action="{{ url('product-update') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
          <h6 class="card-body-title">Fill the fields for Product</h6>
         
          <div class="row">
            <label class="col-sm-4 form-control-label">Product Name:</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="text" class="form-control" name="title" value="{{ $product->title }}" placeholder="Enter Product name">
            </div>
          </div><!-- row -->
          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Price: </label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <input type="text" class="form-control" name="price" value="{{ $product->price }}" placeholder="Enter Product price">
            </div>
          </div>
          <input type="hidden" class="form-control" name="product_id" value="{{ $product->id }}">

          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Brand: </label>
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <select name="brand_id" id="brand_id" class="form-control"> 
                    <option >Select One</option>
                      @foreach ($brands as $data)
                          <option @if ($product->brand_id==$data->id)
                              selected
                          @endif value="{{ $data->id }}">{{ $data->brand_name }}</option>
                      @endforeach
                  </select>
              </div>
          </div><!-- row -->

          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Category: </label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <select class="form-control" name="category_id" id="category_id">
                <option >Select One</option>
               @foreach ($categories as $data)
                   <option @if ($product->category_id==$data->id)
                    selected
                @endif  value="{{ $data->id }}">{{ $data->category_name }}</option>
               @endforeach
              </select>
            </div>
          </div>

          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Sub-Category: </label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <select class="form-control" name="subcategory_id" id="subcategory_id">
                <option value="{{ $product->subcategroy_id }}" >{{ $product->subcategory->subcategory_name }}</option>
               @foreach ($subcategories as $data)
                   <option value="{{ $data->id }}">{{ $data->subcategory_name }}</option>
               @endforeach
              </select>
            </div>
          </div>

          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Summary: </label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <textarea name="summary" class="form-control">{{ $product->summary }}</textarea>
            </div>
          </div>
          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Description: </label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
            </div>
          </div>

          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Product Image:</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="file" class="form-control" name="thumbnail" >
            </div>
          </div><!-- row -->

          
          
          <div class="form-layout-footer mg-t-30">
            <button type="submit" class="btn btn-success mg-r-5">Update</button>
            
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
            $('#category_id').change(function(){
                //alert("ok")
                let category_id = $(this).val()
                if(category_id){
                    $.ajax({
                        type:'GET',
                        url:'/product-update/ajax/' + category_id,
                        success:function(data) {
                            //$("#msg").html(data.msg);
                            if (data) {
                                $('#subcategory_id').empty()
                                $('#subcategory_id').append('<option>Select Sub-Category</option>')
                                $.each(data,function(key,value){
                                    $('#subcategory_id').append('<option value="'+value.id+'">'+ value.subcategory_name +'</option>')
                                })
                            } else {
                                $('#subcategory_id').empty()
                            }
                        }
                    });
                } else{
                    $('#subcategory_id').empty()
                }
            })
        })
    </script>
@endsection