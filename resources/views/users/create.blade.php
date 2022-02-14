@extends("layouts.app")
@section("content")
    <div class="container">
        <h3>Create User</h3>
        <form action="{{route("users.store")}}" method="post">
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
                <label>Password
                    <input class="form-control" type="password" name="password">
                </label>
            </div>

            <div class="form-group pb-3">
                <label>Password confirmation
                    <input class="form-control" type="password" name="password_confirmation">
                </label>
            </div>
            <div class="form-group pb-3">
                <label>Phone Number
                    <input class="form-control" type="text" name="phone_number">
                </label>
            </div>
            <div class="form-group pb-3">
                <label>Address
                    <input class="form-control" type="text" name="address">
                </label>
            </div>
            <div class="form-group pb-3">
                <label>Role
                    <select class="form-select" name="role">
                        <option value="" selected>-- Select Role --</option>
                        <option value="customer">Customer</option>
                        <option value="manager">Manager</option>
                    </select>
                </label>
            </div>
            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </div>
@endsection
