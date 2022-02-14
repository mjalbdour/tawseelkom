@extends("layouts.app")
@section("content")
    <div class="container">
        <h3>Edit Company</h3>
        <form action="{{route("companies.update", $company->id)}}" method="post">
            @method("PUT")
            @csrf
            <div class="form-group pb-3">
                <label>
                    Name
                    <input class="form-control" type="text" name="name" value="{{$company->name}}">
                </label>
            </div>
            <div class="form-group pb-3">
                <label>Email
                    <input class="form-control" type="email" name="email" value="{{$company->email}}">
                </label>
            </div>
            <div class="form-group pb-3">
                <label>Phone Number
                    <input class="form-control" type="text" name="phone_number" value="{{$company->phone_number}}">
                </label>
            </div>

            <div class="form-group pb-3">
                <label>Address
                    <input class="form-control" type="text" name="address" value="{{$company->address}}">
                </label>
            </div>

            @if(auth()->user()->role == 'admin')
                <div class="form-group pb-3">
                    <label>Manager
                        <select class="form-select" name="manager_id">
                            <option value="" selected>-- Select Manager --</option>
                            @foreach($managers as $id => $name)
                                @if($id == $company->manager->id)
                                    <option value="{{$id}}" selected>{{$name}}</option>
                                @else
                                    <option value="{{$id}}">{{$name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </label>
                </div>
            @endif

            <button class="btn btn-primary" type="submit">Edit</button>
        </form>
    </div>
@endsection
