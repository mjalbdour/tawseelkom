@extends("layouts.app")
@section("content")
    <div class="container">
        <form action="{{route("users.results")}}">
            <h3>Search by User name</h3>
            <div class="col-3 form-group">
                <input class="form-control mb-3" type="text" name="name" placeholder="Search by name">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
        <hr>
        <h4><a href="{{route("users.create")}}">Create user</a></h4>
        <hr>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Role</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->phone_number}}</td>
                    <td>{{$user->role}}</td>
                    <td>
                        <a href="{{route("users.edit", $user->id)}}">Edit</a>
                        @if($user->role != 'admin')
                            |  <a href="{{route("users.delete", $user->id)}}">Delete</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
