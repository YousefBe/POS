<table class="table table-dark table-hover">
    <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>

            <td>{{$product->name}}</td>
            <td>{{$product->pivot->quantity}}</td>
            <td>{{$product->selling_price}}</td>
        </tr>
        @endforeach

    </tbody>

</table>
<div class="">
    <h3>Total : {{$order->total_price}}</h3>
</div>