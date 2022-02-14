@extends("layouts.app")
@section("content")
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Size</th>
                <th scope="col">Price in Amman</th>
                <th scope="col">Price outside Amman</th>
                <th scope="col">Company</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$vehicle->id}}</th>
                    <td>{{$vehicle->name}}</td>
                    <td>{{$vehicle->size}}</td>
                    <td>{{$vehicle->price_in_amman}}</td>
                    <td>{{$vehicle->price_outside_amman}}</td>
                    <td>{{$vehicle->company->name}} <br> {{$vehicle->company->address}} <br> {{$vehicle->company->phone_number}}</td>
                    <td><a href="{{route("orders.create", ["vehicle" => $vehicle->id])}}">Create Order</a> | <a href="{{route("vehicles.edit", ["vehicle" => $vehicle->id])}}"> Edit </a> | <a href="{{route("vehicles.delete", ["vehicle" => $vehicle->id])}}"> Delete </a></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
