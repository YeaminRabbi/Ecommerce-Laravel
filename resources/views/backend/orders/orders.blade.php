@extends('backend.master')
@section('content')
<div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Total Orders</h5>

      <div class="row mt-4">
        <div class="col-ls-2">
          <a href="{{ route('OrdersExcelDownload') }}" class="btn btn-primary" style="margin-left: 20px;">Orders Excel File</a>
          <a href="{{ route('OrdersPDFDownload') }}" class="btn btn-warning" style="margin-left: 10px;">Orders PDF File</a>

        </div>
        {{--  <div class="col-ls-5 ml-3">
          <form action="{{ route('CategoryExcelImport') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="excel">
            <input type="submit" value="Upload Excel Categroy" class="btn btn-success ml-2">
          </form>
        </div>  --}}

        <div class="col-ls-8 ml-2">
          <form action="{{ route('SelectedDateExcelDownload') }}" method="POST" style="display:flex;">
            @csrf
            <input type="date" class="form-control" name="from" required>
            <input type="date" class="form-control ml-2" name="to" required>
  
            <input type="submit" value="Selected Date" class="btn btn-success ml-2">
          </form>
        </div>
        
      </div>
      
     
      
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
      
        <div class="table-responsive">
            <table class="table table-hover mg-b-0">
              <thead>
                <tr>
                    <th>Sl</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Unit</th>
                    <th>Purchase Date</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($orders as $key => $data)
                    <tr>
                        <td>{{ $orders->firstItem()+$key }}</td>
                        <td>{{ $data->product->title ?? 'N/A' }}</td>
                        <td>{{ $data->quantity ?? 'N/A' }}</td>
                        <td>{{ $data->product_unit_price ?? 'N/A' }}</td>
                        <td>{{ $data->product_unit_price * $data->quantity ?? 'N/A' }}</td>
                        <td>{{ $data->created_at->format('d M, Y | h:i a') }}</td>
                        <td>
                            <a href="{{ $data->id }}" class="btn btn-outline-purple">VIEW</a>
                        </td>
                    </tr>
                @endforeach
            
              </tbody>
            </table>
            {{ $orders->links() }}
          </div><!-- table-responsive -->

    </div><!-- card -->



</div><!-- sl-pagebody -->
@endsection