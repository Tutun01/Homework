@extends("layout")

@section("title")
    Shop
@endsection

@section("pageContent")

    @foreach($products as $singleProduct)

        @if($singleProduct == "iPhone 14" || $singleProduct == "iPhone 13 pro")
            <p> {{ $singleProduct }} - discount! </p>
        @else
            <p> {{ $singleProduct }} </p>
        @endif
    @endforeach


@endsection


