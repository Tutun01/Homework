@extends("layout")


@section("title")
    Main page
@endsection

@section("pageContent")

    @if($isMorning)
        <p>Good morning!</p>
    @else
        <p>Good afternoon!</p>
    @endif

    <p> Currently hours: {{ $clock }}</p>

    @foreach($latestProducts as $product)
      {{$product-> name}}
    @endforeach

    <p> The current time is: {{ $currentTime }}</p>
@endsection


