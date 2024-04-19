@extends("layout")


@section("title")
    Main page
@endsection

@section("pageContent")
    <p>The current time is: {{ date("h:i:s") }}</p>
@endsection


