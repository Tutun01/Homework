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

    <form method="POST" action="/send-contact">

        @if($errors->any())
            <p>Error: {{ $errors->first() }} </p>
        @endif

        {{ csrf_field() }}
        <input name="email"  type="email" placeholder="Enter email">
        <input name="subject" type="text" placeholder="Enter subject">
        <textarea name="description"></textarea>
        <button>Send a message</button>

    </form>

    <p> The current time is: {{ $currentTime }}</p>
@endsection


