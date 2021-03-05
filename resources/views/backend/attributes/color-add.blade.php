
@extends('backend.master')
@section('content')
<div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Color Add</h5>
      
    </div><!-- sl-page-title -->

 
    <div class="row row-sm mg-t-20">
      <div class="col-xl-10 m-auto">
        <form action="{{ url('color-post') }}" method="POST">
            @csrf
        <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
          <h6 class="card-body-title">Fill the fields for Colors</h6>
         
          <div class="row">
            <label class="col-sm-4 form-control-label">Color Name:</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="text" class="form-control" name="color_name" placeholder="Enter Color name">
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
