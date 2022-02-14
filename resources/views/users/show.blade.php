@extends("layouts.app")
@section("content")
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Role</th>
                @if(auth()->user()->id == $user->id || auth()->user()->role == 'admin')
                    <th scope="col">Actions</th>
                @endif
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->phone_number}}</td>
                <td>{{$user->role}}</td>
                @if(auth()->user()->id == $user->id || auth()->user()->role == 'admin')
                    <td><a href="{{route("users.edit", ["user", $user])}}">Edit</a>
                        @if(auth()->user()->role == 'admin' && auth()->user()->role != $user->role)|  <a
                            href="{{route("users.delete", "user", $user)}}">Delete</a>
                        @endif
                    </td>
                @endif
            </tr>
            </tbody>
        </table>
    </div>
@endsection
