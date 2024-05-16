@extends("layout")

@section("title")
    addProducts
@endsection

@section("pageContent")
<form method="POST" action="{{ route("saveProduct") }}">

    @if($errors->any())
        <p>Error: {{ $errors->first() }} </p>
    @endif

    {{ csrf_field() }}

        <div>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="text-danger">{{$error}}</p>
                @endforeach
            @endif
        </div>

        <input name="name"  type="text" placeholder="Enter name" value = "{{old ("name")}}">
        <textarea name="description" placeholder="Enter description" ></textarea>
        <input name="amount" type="number" placeholder="Enter amount" value = "{{old ("amount")}}">
        <input name="price" type="number" placeholder="Enter price" value = "{{old ("price")}}">
        <input name="image" type="text" placeholder="Enter image" value = "{{old ("image")}}">
        <input name="created_at" type="date" placeholder="Enter the creation date" value = "{{old ("created_at")}}">
        <input name="updated_at" type="date" placeholder="Enter the update date" value = "{{old ("updated_at")}}">
    <button>Add-product</button>
</form>
@endsection

