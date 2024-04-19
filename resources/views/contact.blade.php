@extends("layout")

@section("pageContent")
    <form>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control"  aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Subject</label>
            <input type="text" name="subject" class="form-control">
        </div>
        <div class="mb-3 ">
            <label for="exampleInputPassword1" class="form-label">Message</label>
            <input type="text" name="message" class="form-control">

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
