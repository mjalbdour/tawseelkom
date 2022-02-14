@extends("layouts.app")
@section("content")
    <div class="container">
        <h2 class="text-decoration-underline">New Order</h2>
        <h3>Sender: <i>{{auth()->user()->name ?? "User"}}</i></h3>
        <h3>Company: <i>{{$vehicle->company->name ?? "COMPANY"}}</i></h3>
        <h3>Vehicle: <i>{{$vehicle->name}}</i></h3>
        <h5>Delivery Price: {{$vehicle->price_in_amman}}
            /{{$vehicle->price_outside_amman}} JOD Amman (inside/outside)</h5><br>
        <hr>
        <h3>Inquiry</h3>
        <form action="{{route("orders.store")}}" method="post">
            @csrf
            <input type="hidden" value="{{$vehicle->id}}" name="vehicle_id">

            <div class="form-group pb-3">
                <label>
                    Inside Amman?
                    <input class="form-check-inline" type="checkbox" name="inside_amman">
                </label>
            </div>

            <div class="form-group pb-3">
                <label>Your Price JOD
                    <input class="form-control" type="number" name="sender_price" min="0" placeholder="1 or more JD"
                           value="0">
                </label>
            </div>

            <div class="form-group pb-3">
                <label>Date
                    <input class="form-control" type="datetime-local" name="datetime">
                </label>
            </div>
            <hr>

            <div class="form-group pb-3">
                <label>Description
                    <textarea class="form-control" name="description" cols="30" rows="10"
                      placeholder="Item to ship, pick up location and destination..."></textarea><br>
                    <button class="btn-primary" type="submit">Submit</button>
                </label>
            </div>
        </form>
    </div>
@endsection
