@extends('backend.master')
@section('content')
<div class="container" style="padding: 100px;">
    <div class="row justify-content-around">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-primary">{{ __('View Category') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="display: none;">id</th>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Created At</th>
                            {{--  <th>Action</th>  --}}
                            
                        </tr>
                        </thead>
                        <tbody>

                            @foreach ($categories as $key => $data)
                                <tr>
                                    <td style="display: none;">{{ $data->id }}</td>
                                    <td>{{ $key + $categories->firstItem() }}</td>
                                    <td>{{ $data->category_name ?? 'N/A' }}</td>
                                    <td>{{ $data->slug ?? 'N/A' }}</td>
                                    <td>{{ $data->created_at!=null ? $data->created_at->diffForHumans() : 'N/A' }}</td>
                                    
                                    {{--  <td>
                                        
                                        <a href="{{ url('category-edit') }}/{{ $data->id }}" class="btn btn-outline-success">Edit Category</a>

                                        <a href="{{ url('category/delete') }}/{{ $data->id }}" class="btn btn-outline-danger">Delete</a>
                                    </td>  --}}
                                </tr>                             
                            @endforeach                    
                        </tbody>
                    </table>

                    {{ $categories->links() }}
                </div>



            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center bg-success">{{ __('Update Category') }}</div>
                
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

                    <form action="{{ url('category-update') }}" method="POST">

                        @csrf
                        <div class="form-group">
                            <label for="category">Name:</label>
                            <input type="text" class="form-control" value="{{ $edit_category->category_name }}" placeholder="Enter category" name="category_name" id="category_name" autocomplete="off">

                            <input type="hidden" class="form-control" value="{{ $edit_category->id }}" placeholder="Enter category id" name="id" id="id" autocomplete="off">

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




    

    
    
@endsection

