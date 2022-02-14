@extends("layouts.app")
@section("content")
    <div class="container">
        <h3>Search by Company name</h3>
        <form action="{{route("companies.results")}}">
            <div class="col-3 form-group">
                <input class="form-control mb-3" type="text" placeholder="Search by name" name="name">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
        <hr>
        <h4><a href="{{route("companies.create")}}">Create company</a></h4>
        <hr>
        <h3>Companies</h3>
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
            @foreach($companies as $company)
                <tr>
                    <th scope="row">{{$company->id}}</th>
                    <td>{{$company->name}}</td>
                    <td>{{$company->address}}</td>
                    <td>{{$company->email}}</td>
                    <td>{{$company->phone_number}}</td>
                    <td><a href="{{route("users.show", $company->manager->id)}}">{{$company->manager->name}}</a></td>
                    <td>
                        <a href="{{route("companies.edit", $company->id)}}">Edit</a>
                        | <a href="{{route("companies.delete", $company->id)}}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
