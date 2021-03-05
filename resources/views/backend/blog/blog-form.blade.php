
@extends('backend.master')
@section('content')
<div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Blog Add</h5>
      
    </div><!-- sl-page-title -->

 
    <div class="row row-sm mg-t-20">
      <div class="col-xl-10 m-auto">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('success') }}
            </div>
        @endif
      
     
        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
          <h6 class="card-body-title">Fill the fields for Product</h6>
         
          <div class="row">
            <label class="col-sm-4 form-control-label">Blog Name:</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="text" class="form-control" name="title" placeholder="Enter Blog name">
            </div>
          </div><!-- row -->
         
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
            <label class="col-sm-4 form-control-label">Summary: </label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <textarea name="summary" class="form-control" id="my-editor"></textarea>
            </div>
          </div>
          

          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Product Image:</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="file" class="form-control" name="thumbnail" >
            </div>
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
    <script src="//cdn.ckeditor.com/4.6.2/full-all/ckeditor.js"></script>
    <script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };

    CKEDITOR.replace('my-editor', options);
    </script>


@endsection