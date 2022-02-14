@extends("layouts.app")
@section("content")
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Delivery Price</th>
                <th scope="col">Description</th>
                <th scope="col">Date Time</th>
                <th scope="col">Sender Price</th>
                <th scope="col">Company</th>
                <th scope="col">Vehicle</th>
                <th scope="col">Approved</th>
                <th scope="col">Delivered</th>
                <th scope="col">Cancelled</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td>{{$order->delivery_price}} JD</td>
                    <td>{{$order->description}}</td>
                    <td>{{$order->datetime}}</td>
                    <td>{{$order->sender_price}}</td>
                    <td>{{$order->company->name}} <br> {{$order->company->address}} | {{$order->company->phone_number}} </td>
                    <td>{{$order->vehicle->name}} | {{$order->vehicle->size}}</td>
                    <td><a href="{{route("orders.change.status", ["order" => $order->id, "status" => "approved"])}}">Approve</a> {{($order->approved == null || $order->approved == false) ? "x" : "✓"}} </td>
                    <td>{{($order->delivered == null || $order->delivered == false) ? "x" : "✓"}}</td>
                    <td>{{($order->cancelled == null || $order->cancelled == false) ? "x" : "✓"}}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
