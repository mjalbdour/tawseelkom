@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">

                <div class="card">
                    <div class="card-body">
                        <a href="{{route("vehicles.index")}}">
                            <h5 class="card-title">Vehicles</h5>
                        </a>
                        <p class="card-text">Search all available vehicles of small, medium and large sizes.</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <a href="{{route("orders.index")}}">
                            <h5 class="card-title">Orders</h5>
                        </a>
                        <p class="card-text">Search order by id and list your own.</p>
                    </div>
                </div>

                @if(auth()->user()->role == 'manager')
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route("companies.show", auth()->user()->company->id)}}">
                                <h5 class="card-title">My Company</h5>
                            </a>
                        </div>
                    </div>
                @endif

                @if(auth()->user()->role == 'admin')
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route("companies.index")}}">
                                <h5 class="card-title">Companies</h5>
                            </a>
                            <p class="card-text">Search vehicle providers.</p>
                        </div>
                    </div>
                @endif

                @if(auth()->user()->role == 'admin')
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route("users.index")}}">
                                <h5 class="card-title">Users</h5>
                            </a>
                            <p class="card-text">
                                Search all users.
                            </p>
                        </div>
                    </div>
                @endif

            </div>

        </div>
    </div>
@endsection
