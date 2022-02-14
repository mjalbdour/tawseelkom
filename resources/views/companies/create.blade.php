@extends("layouts.app")
@section("content")
    <div class="container">
        <h3>Create Company</h3>
        <form action="{{route("companies.store")}}" method="post">
            @csrf
            <div class="form-group pb-3">
                <label>
                    Name
                    <input class="form-control" type="text" name="name">
                </label>
            </div>
            <div class="form-group pb-3">
                <label>Email
                    <input class="form-control" type="email" name="email">
                </label>
            </div>
            <div class="form-group pb-3">
                <label>Phone Number
                    <input class="form-control" type="number" name="phone_number">
                </label>
            </div>
            <div class="form-group pb-3">
                <label>Address
                    <input class="form-control" type="text" name="address">
                </label>
            </div>
            <div class="form-group pb-3">
                <label>Manager
                    <select class="form-select" name="manager_id">
                        <option value="" selected>-- Select Manager --</option>
                        @foreach($managers as $manager)
                            <option value="{{$manager->id}}">{{$manager->name}}</option>
                        @endforeach
                    </select>
                </label>
            </div>

            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </div>
@endsection
