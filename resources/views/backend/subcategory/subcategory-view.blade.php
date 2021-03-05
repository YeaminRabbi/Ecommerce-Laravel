@extends('backend.master')
@section('category')
    active
@endsection
@section('content')
<div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>SubCategory View</h5>
      <a href="{{ url('subcategory-add') }}" style="float: right;"><i class="fa fa-plus"></i>Add</a>
    </div><!-- sl-page-title -->

   

    <div class="card pd-20 pd-sm-40">
      
      <div class="table-responsive">
        <table class="table mg-b-0">
          <thead>
            <tr>
              <th>SL</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Category_Id</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($scategories as $key => $data)
            <tr>
              <td>{{ $scategories->firstItem() + $key }}</td>
              <td>{{ $data->subcategory_name  ?? 'N/A'}}</td>
              <td>{{ $data->slug ?? 'N/A' }}</td>
              <td>{{ $data->category->category_name ?? 'N/A'}}</td>
              <td>
                  <a href="{{ url('subcategory-edit') }}/{{ $data->id }}" class="btn btn-outline-purple ">Edit</a>
                  <a href="{{ url('subcategory-delete') }}/{{ $data->id }}" class="btn btn-outline-danger ">Delete</a>
              </td>
            </tr>
            @endforeach
           
            
          </tbody>
        </table>
      </div>

    </div><!-- card -->


    {{--  <div class="card pd-20 pd-sm-40 mg-t-50">
     
      <div class="table-responsive">
        <table class="table table-hover mg-b-0">
          <thead>
            <tr>
                <th>Sl</th>
                <th>Name</th>
                <th>Deleted At</th>
                <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($scategories as $key => $data)
                <tr>
                    <td>{{  $key+1 }}</td>
                    <td>{{ $data->category_name ?? 'N/A' }}</td>
                    <td>{{ $data->created_at!=null ? $data->deleted_at->diffForHumans() : 'N/A' }}</td>
                    <td>
                        <a href="{{ url('category-restore') }}/{{ $data->id }}/{{ $data->category_name }}" class="btn btn-outline-primary">Restore</a>
                        
                        <a href="{{ url('category/permanent-delete') }}/{{ $data->id }}" class="btn btn-outline-danger">Permanent Delete</a>
                        
                    </td>
                </tr>
            @endforeach
        
          </tbody>
        </table>
      </div><!-- table-responsive -->

    </div>  --}}

  </div><!-- sl-pagebody -->
@endsection