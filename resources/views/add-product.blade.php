@extends("layout")

@section("title")
    addProducts
@endsection

@section("pageContent")
<form method="POST" action="/add-product">

    @if($errors->any())
        <p>Error: {{ $errors->first() }} </p>
    @endif

    {{ csrf_field() }}
        <input name="name"  type="text" placeholder="Enter name">
        <textarea name="description"></textarea>
        <input name="amount" type="number" placeholder="Enter amount">
        <input name="price" type="number" placeholder="Enter price">
        <input name="image" type="text" placeholder="Enter image">
        <input name="created_at" type="date" placeholder="Enter the creation date">
        <input name="updated_at" type="date" placeholder="Enter the update date">
    <button>Add-product</button>
</form>
@endsection

