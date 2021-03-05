@extends('backend.master')

@section('content')
<div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Blog View</h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
      <div class="table-responsive">
        <table class="table mg-b-0">
          <thead>
            <tr>
              
              <th>SL</th>
              <th>Title</th>
              <th>Slug</th>
              <th>Thumbnail</th>
              <th>Created At</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            
            @foreach ($blog as $key => $data)
            <tr>
              <td class="text-center"><input type="checkbox" name="cat_id[]" value="{{ $data->id }}" ></td>
              <td>{{ $blog->firstItem() + $key }}</td>
              <td>{{ $data->title  ?? 'N/A'}}</td>
              <td>{{ $data->slug ?? 'N/A' }}</td>
              <td>{{ $data->thumbnail ?? 'N/A' }}</td>
              <td>{{ $data->created_at->format('d M, Y')  ?? 'N/A'}}</td>
              <td>
                  <a href="{{ $data->id }}" class="btn btn-purple ">Edit</a>
                  <a href="{{ $data->id }}" class="btn btn-danger ">Delete</a>

              </td>
            </tr>
            @endforeach
            
     
            
          </tbody>
        </table>
      </div>

    </div><!-- card -->
    {{ $blog->links() }}

    

  </div><!-- sl-pagebody -->
@endsection
