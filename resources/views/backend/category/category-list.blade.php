@extends('backend.master')
@section('category')
    active
@endsection
@section('content')
<div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Category View</h5>
    </div><!-- sl-page-title -->
    @if (session('product_notify'))
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Warning!</strong> {{ session('product_notify') }}
      </div>
    @endif
    @if (session('cat_delete'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> {{ session('cat_delete') }}
      </div>
    @endif
    @if (session('cat_not_select'))
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Unsuccess!</strong> {{ session('cat_not_select') }}
      </div>
    @endif
    <div class="row mb-2">
      <div class="col-ls-5 ml-3">
        <form action="{{ route('CategoryExcelImport') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="file" name="excel">
          <input type="submit" value="Upload Excel Categroy" class="btn btn-success ml-2">
        </form>
      </div>
    </div>
    <div class="card pd-20 pd-sm-40">
      <div class="table-responsive">
        <table class="table mg-b-0">
          <thead>
            <tr>
              <th class="text-center">Select All <input type="checkbox" id="checkAll">  </th>
              <th>SL</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Created At</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <form action="category-selected-delete" method="POST">
            @csrf
            @foreach ($categories as $key => $data)
            <tr>
              <td class="text-center"><input type="checkbox" name="cat_id[]" value="{{ $data->id }}" ></td>
              <td>{{ $categories->firstItem() + $key }}</td>
              <td>{{ $data->category_name  ?? 'N/A'}}</td>
              <td>{{ $data->slug ?? 'N/A' }}</td>
              <td>{{ $data->created_at->format('d M, Y')  ?? 'N/A'}}</td>
              <td>
                  <a href="{{ url('category-edit') }}/{{ $data->id }}" class="btn btn-purple ">Edit</a>
                  <a href="{{ url('category/delete') }}/{{ $data->id }}" class="btn btn-danger ">Delete</a>

              </td>
            </tr>
            @endforeach
            
            <button class="btn btn-outline-warning" type="submit" style="float: right;cursor:pointer;width:200px;margin-bottom:10px;">Delete Selected Items</button>
            
           </form>
            
          </tbody>
        </table>
      </div>

    </div><!-- card -->


    {{-- <div class="card pd-20 pd-sm-40 mg-t-50">
     
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
            @foreach ($trash_categories as $key => $data)
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

    </div> --}}

  </div><!-- sl-pagebody -->
@endsection

@section('footer_js')
  <script>
    $("#checkAll").click(function(){
      $('input:checkbox').not(this).prop('checked', this.checked);
    });
  </script>
@endsection