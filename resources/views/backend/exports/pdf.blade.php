<table>
    <thead>
    <tr>
        <th>SL</th>
        <th>Order ID</th>
        <th>Shipping ID</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Quantity</th>
        <th>Order At</th>

    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{ $loop->index +1 }}</td>
            <td>{{ $order->id }}</td>
            <td>{{ $order->shipping_id }}</td>
            <td>{{ $order->product->title }}</td>
            <td>{{ $order->product_unit_price }}</td>
            <td>{{ $order->quantity }}</td>
            <td>{{ $order->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>