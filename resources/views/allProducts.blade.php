@extends("layout")

@section("title")
    Product List
@endsection

@section("pageContent")
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Amount</th>
        <th>Price</th>
        <th>Created At</th>
        <th>Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($allProducts as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->amount }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->created_at }}</td>
            <td>{{ $product->updated_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection

