@extends("layouts.app")
@section("content")
    <div class="container">
        <h3>My Company: {{$company->name}}</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Manager</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">{{$company->id}}</th>
                <td>{{$company->name}}</td>
                <td>{{$company->address}}</td>
                <td>{{$company->email}}</td>
                <td>{{$company->phone_number}}</td>
                <td><a href="{{route("users.show", $company->manager->id)}}">{{$company->manager->name}}</a></td>
                <td>
                    <a href="{{route("companies.edit", $company->id)}}">Edit</a>
                    @if(auth()->user()->role == 'admin')
                        | <a href="{{route("companies.delete", $company->id)}}">Delete</a>
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
