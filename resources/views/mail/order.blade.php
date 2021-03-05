<table class="table table-bordered">
    <thead>
      <tr>
          <th style="border:1px solid rgb(0, 0, 0); width:10%;" scope="col">#SL</th>
          <th style="border:1px solid rgb(0, 0, 0); width:25%;" scope="col">Product Name</th>
          <th style="border:1px solid rgb(0, 0, 0); width:25%;" scope="col">Product Image</th>
          <th style="border:1px solid rgb(0, 0, 0); width:10%;" scope="col">Quantity</th>
          <th style="border:1px solid rgb(0, 0, 0); width:25%;" scope="col">Price</th>
      </tr>
    </thead>
    <tbody>
        @php
            $total = 0;
        @endphp
        @foreach ($data as $item)
            <tr style="border:1px solid rgb(0, 0, 0);">
                <th  style="border:1px solid rgb(0, 0, 0); width:33%;">{{ $loop->index+1 }}</th>
                <td style="border:1px solid rgb(0, 0, 0); width:33%;">{{ $item->product->title }}</td>
                <td style="border:1px solid rgb(0, 0, 0); width:33%;"><img src="{{ asset('images/'.$item->product->created_at->format('Y/m/').'/'.$item->product->thumbnail) }}"></td>
                <td style="border:1px solid rgb(0, 0, 0); width:33%;">{{ $item->quantity }}</td>
                <td  style="border:1px solid rgb(0, 0, 0); width:33%;">BDT. {{ $item->product_unit_price }}</td>
                @php
                    $total = $item->quantity * $item->product_unit_price;
                @endphp
            </tr>
        @endforeach
        <tr style="border:1px solid rgb(0, 0, 0);">
            <td style="border:1px solid rgb(0, 0, 0); width:33%;"><span style="float:right;">Total Amount: BDT. {{ $total }}</span></td>      
        </tr>
        
    </tbody>
  </table>