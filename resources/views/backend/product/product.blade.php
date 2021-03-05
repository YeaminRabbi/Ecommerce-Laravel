
@extends('backend.master')
@section('content')
<div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Total Products ({{ $product_count }})</h5>
      <a href="{{ route('product-add') }}" style="float: right;"><i class="fa fa-plus"></i>Add</a>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
          <div class="table-responsive">
            <table class="table table-hover mg-b-0">
              <thead>
                <tr>
                    <th>Sl</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Brand</th>
                    <th>Attributes</th>
                    <th>Thumbnails</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $key => $data)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $data->title ?? 'N/A' }}</td>
                        <td>{{ $data->price ?? 'N/A' }}</td>
                        <td><img style="width:100px;" src="{{ asset('images/'.$data->created_at->format('Y/m/').'/'.$data->thumbnail) }}" alt="thumbnail"></td>
                        <td>{{ $data->brand->brand_name }}</td>
                        <td>
                            @foreach (App\attributes::where('product_id', $data->id)->get() as $test)
                                <span>Color: {{ $test->color->color_name }}</span> |
                                <span>Size: {{ $test->size->size_name }}</span> | 
                                <span>Quantity: {{ $test->quantity }}</span>
                                <br>
                            @endforeach
                        </td>
                        <td>
                          @foreach (App\Gallery::where('product_id', $data->id)->get() as $test)
                              <img style="width:50px;" src="{{ asset('gallery/'.$test->created_at->format('Y/m/').$test->product_id.'/'.$test->images) }}" alt="Thumbnails" >
                          @endforeach
                        </td>
                        
                        <td>
                          <a href="{{ url('product-edit') }}/{{ $data->id }}" class="btn btn-primary">Edit</a>
                          <a href="{{ url('product-gallery-edit') }}/{{ $data->id }}" class="btn btn-dark">Edit Gallery</a>  
                          <a href="{{ url('product-delete') }}/{{ $data->id }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            
              </tbody>
            </table>
          </div><!-- table-responsive -->

    </div><!-- card -->



</div><!-- sl-pagebody -->
@endsection
