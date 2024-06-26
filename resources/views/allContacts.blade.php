@extends("layout")



@section("pageContent")

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Email</th>
        <th scope="col">Subject</th>
        <th scope="col">Message</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        @foreach($allContacts as $contact)
            <tr>
           <td>{{ $contact->id }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->subject }}</td>
            <td>{{ $contact->message }}</td>
            <td>
                <a href="{{route('deleteContact', ['contact'=> $contact->id])}}" class="btn btn-danger">Delete</a>
                <a class="btn btn-primary">Edit</a>
            </td>
        @endforeach
    </tr>
    </tbody>
</table>
@endsection
