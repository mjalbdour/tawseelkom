@extends("layouts.app")
@section("content")
    <div class="container">
        <h3>Edit User</h3>
        <form action="{{route("users.update", $user->id)}}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group pb-3">
                <label>
                    Name
                    <input class="form-control" type="text" name="name" value="{{$user->name}}">
                </label>
            </div>

            <div class="form-group pb-3">
                <label>Email
                    <input class="form-control" type="email" name="email" value="{{$user->email}}">
                </label>
            </div>

            <div class="form-group pb-3">
                <label>Phone Number
                    <input class="form-control" type="text" name="phone_number" value="{{$user->phone_number}}">
                </label>
            </div>

            <div class="form-group pb-3">
                <label>Address
                    <input class="form-control" type="text" name="address" value="{{$user->address}}">
                </label>
            </div>
            {{--            <div class="form-group pb-3">--}}
            {{--                <label>Role--}}
            {{--                    <select name="role">--}}
            {{--                        <option value="" selected>-- Select Role --</option>--}}
            {{--                        <option value="customer">Customer</option>--}}
            {{--                        <option value="manager">Manager</option>--}}
            {{--                    </select>--}}
            {{--                </label>--}}
            {{--            </div>--}}
            <button class="btn btn-primary" type="submit">Edit</button>
        </form>
    </div>
@endsection
