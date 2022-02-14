@extends("layouts.app")
@section("content")
    <div class="container">
        <form action="{{  route("vehicles.results") }}">
            <div class="col-3 form-group">
                <h3>Filter by Vehicle Size</h3>
                @php $i = 0 @endphp
                @foreach($vehicleTypes as $key => $value)
                    <div class="form-group pb-2">
                        <label>
                            {{$value}}
                            <input class="form-check-inline" type="checkbox" name="size[{{$i}}]" value="{{$key}}">
                        </label>
                    </div>
                    @php $i++ @endphp
                @endforeach
                <button class="btn btn-primary" type="submit">
                    Filter
                </button>
            </div>
        </form>
        <hr>
        @if(auth()->user()->role != 'customer')
            <h4><a href="{{route("vehicles.create")}}">Create vehicle</a></h4>
            <hr>
        @endif
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
            @foreach($vehicles as $vehicle)
                <tr>
                    <th scope="row">{{$vehicle->id}}</th>
                    <td>{{$vehicle->name}}</td>
                    <td>{{$vehicle->size}}</td>
                    <td>{{$vehicle->price_in_amman}} JOD</td>
                    <td>{{$vehicle->price_outside_amman}} JOD</td>
                    <td>{{$vehicle->company->name}} <br> {{$vehicle->company->address}}
                        <br> {{$vehicle->company->phone_number}}</td>
                    <td>
                        <a href="{{route("orders.create", ["id" => $vehicle->id])}}">Create Order</a>
                        @if(auth()->user()->role != 'customer')
                            | <a href="{{route("vehicles.edit", ["vehicle" => $vehicle->id])}}"> Edit </a>
                            | <a href="{{route("vehicles.delete", ["vehicle" => $vehicle->id])}}"> Delete </a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
