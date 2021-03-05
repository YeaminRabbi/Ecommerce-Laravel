@extends('backend.master')
@section('content')
<div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Attributes List (Brands | Colors | Sizes)</h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
        <spanspan>Brands List<spanspan>
        <div style="float: right;">
            <a href="{{ route('brand-add') }}"><i class="fa fa-plus"></i>Add</a>
        </div>
        
      <div class="table-responsive">
        <table class="table mg-b-0">
          <thead>
            <tr>
              <th>SL</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($brands as $key => $data)
            <tr>
              <td>{{ 1 + $key }}</td>
              <td>{{ $data->brand_name  ?? 'N/A'}}</td>
              <td>{{ $data->slug ?? 'N/A' }}</td>
              <td>
                  <a href="{{ url('brand-edit') }}/{{ $data->brand_name }}/{{ $data->id }}" class="btn btn-primary">Edit</a>
                  <a href="{{ url('brand-delete') }}/{{ $data->id }}" class="btn btn-danger ">Delete</a>
              </td>
            </tr>
            @endforeach
           
            
          </tbody>
        </table>
      </div>

    </div><!-- card -->


    <div class="card pd-20 pd-sm-40 mg-t-50">
        <spanspan>Colors List<spanspan>
            <div style="float: right;">
                <a href="{{ route('color-add') }}"><i class="fa fa-plus"></i>Add</a>
            </div>
      <div class="table-responsive">
        <table class="table table-hover mg-b-0">
          <thead>
            <tr>
                <th>Sl</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($colors as $key => $data)
                <tr>
                    <td>{{ 1 + $key }}</td>
                    <td>{{ $data->color_name  ?? 'N/A'}}</td>
                    <td>{{ $data->slug ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ url('color-edit') }}/{{ $data->color_name }}/{{ $data->id }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('color-delete') }}/{{ $data->id }}" class="btn btn-danger ">Delete</a>
                    </td>
                </tr>
            @endforeach
        
          </tbody>
        </table>
      </div><!-- table-responsive -->

    </div><!-- card -->

    <div class="card pd-20 pd-sm-40 mg-t-50">
        <span>Sizes List<spanspan>
            <div style="float: right;">
                <a href="{{ route('size-add') }}"><i class="fa fa-plus"></i>Add</a>
            </div>
        <div class="table-responsive">
          <table class="table table-hover mg-b-0">
            <thead>
              <tr>
                  <th>Sl</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($sizes as $key => $data)
                  <tr>
                    <td>{{ 1 + $key }}</td>
                    <td>{{ $data->size_name  ?? 'N/A'}}</td>
                    <td>{{ $data->slug ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ url('size-edit') }}/{{ $data->size_name }}/{{ $data->id }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('size-delete') }}/{{ $data->id }}" class="btn btn-danger ">Delete</a>
                    </td>
                  </tr>
              @endforeach
          
            </tbody>
          </table>
        </div><!-- table-responsive -->
  
      </div><!-- card -->

  </div><!-- sl-pagebody -->
@endsection