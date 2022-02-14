@extends("layouts.app")
@section("content")
    <div class="container">
        <form action="{{route("orders.results")}}">
            <h3>Search Order by ID</h3>
            <div class="form-group col-3">
                <input class="form-control mb-3" type="text" placeholder="Search by ID" name="id">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
        <br>
        <h4><a href="{{route("vehicles.index")}}">Create order</a></h4>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Description</th>
                <th scope="col">Date Time</th>
                <th scope="col">Sender Price</th>
                <th scope="col">Delivery Price</th>
                <th scope="col">Company</th>
                <th scope="col">Sender</th>
                <th scope="col">Vehicle</th>
                <th scope="col">Delivered</th>
                @if(auth()->user()->role != 'customer')
                    <th scope="col">Action</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td>{{$order->description}}</td>
                    <td>{{$order->datetime}}</td>
                    <td>{{$order->sender_price}} JOD</td>
                    <td>{{$order->delivery_price}} JOD</td>
                    <td>{{$order->company->name}} <br> {{$order->company->address}} | {{$order->company->phone_number}}
                    </td>
                    <td><a href="{{route('users.show', $order->sender->id)}}">{{$order->sender->name}}</a></td>
                    <td>{{$order->vehicle->name}} | {{$order->vehicle->size}}</td>
                    <td>{{($order->delivered == null || $order->delivered == false) ? "No" : "Yes"}}</td>
                    @if(auth()->user()->role != 'customer')
                        @if(!$order->delivered)
                            <td><a href="{{route("orders.deliver", $order)}}">Mark as Delivered</a></td>
                        @else
                            <td>No action needed</td>
                        @endif
                    @endif
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
