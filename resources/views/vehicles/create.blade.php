@extends("layouts.app")
@section("content")
    <div class="container">
        <h3>Create vehicle</h3>
        <form action="{{route("vehicles.store")}}" method="post">
            @csrf

            <div class="form-group pb-3">
                <label>
                    Name
                    <input type="text" name="name" class="form-control">
                </label>
            </div>

            <div class="form-group pb-3">
                <label>Price in Amman
                    <input type="number" name="price_in_amman" class="form-control">
                </label>
            </div>

            <div class="form-group pb-3">
                <label>Price outside Amman
                    <input type="number" name="price_outside_amman" class="form-control">
                </label>
            </div>
            <div class="form-group pb-3">
                <label>Size <br>
                    <input type="radio" name="size" value="s" > Small <br>
                    <input type="radio" name="size" value="m" > Medium <br>
                    <input type="radio" name="size" value="l" > Large <br>
                </label>
            </div>

            <div class="form-group">
                <label>Company
                    <select name="company_id" class="form-select">
                        <option value="" selected>-- Select Company --</option>
                        @foreach($companies as $company)
                            <option value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <hr>
            <button class="btn-primary" type="submit">Submit</button>
        </form>
    </div>
@endsection
