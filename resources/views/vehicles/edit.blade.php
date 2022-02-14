@extends("layouts.app")
@section("content")
    <div class="container">
        <h3>Edit vehicle</h3>
        <form action="{{route("vehicles.update", $vehicle)}}" method="post">
            @method("PUT")
            @csrf
            <div class="form-group pb-3">
                <label>
                    Name
                    <input class="form-control" type="text" name="name" value="{{$vehicle->name}}">
                </label>
            </div>

            <div class="form-group pb-3">
                <label>Price in Amman JOD
                    <input class="form-control" type="number" name="price_in_amman"
                           value="{{$vehicle->price_in_amman}}">
                </label>
            </div>

            <div class="form-group pb-3">
                <label>Price outside Amman JOD
                    <input class="form-control" type="number" name="price_outside_amman"
                           value="{{$vehicle->price_outside_amman}}">
                </label>
            </div>

            <pre>Original size: <i>{{$vehicle->size}}</i></pre>
            <div class="form-group pb-3">
                <label>New Size <br>
                    Small  <input class="form-check-inline" type="radio" name="size" value="s">
                    Medium  <input class="form-check-inline" type="radio" name="size" value="m">
                    Large  <input class="form-check-inline" type="radio" name="size" value="l">
                </label>
            </div>
            <input type="hidden" name="company_id" value="{{$vehicle->company_id}}">
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
@endsection
