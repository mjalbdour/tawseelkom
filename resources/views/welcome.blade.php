<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <title>TAWSEELKOM</title>
</head>
<body>

@include('includes.nav')

<!--Banner Section-->

<section id="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p class="promo">Tawseelkom</p>
                <i>A B2C/B2B service that provides a flexible, safe and fast delivery of small, medium and large items inside Jordan.</i>
                <button class="btn btn-info d-block mt-2">
                    <a href="{{route('vehicles.index')}}">Request Vehicle</a>
                </button>
                <p>Ship all items from all sizes</p>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{asset('img/delivery-truck.png')}}" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<!--Services Section-->
<section id="services">
    <div class="container text-center">
        <h1 class="title">What we do</h1>
        <div class="row text-center">
            <div class="col-md-4 services">
                <img src="{{asset('img/delivery-man.png')}}" class="service-img">
                <h4>Flexibility</h4>
                <p>We offer 3 shipping sizes: small, medium and large.</p>
            </div>
            <div class="col-md-4 services">
                <img src="{{asset('img/delivery.png')}}" class="service-img">
                <h4>Safety</h4>
                <p>We make sure items are picked up and delivered safely.</p>
            </div>
            <div class="col-md-4 services">
                <img src="{{asset('img/fast-delivery.png')}}" class="service-img">
                <h4>Speed</h4>
                <p>We offer the fastest delivery inside and outside Amman.</p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container text-center mb-4">
        <h3 class="fst-italic">Register now to use our services</h3>
        <button class="btn btn-link">
            <a href="{{url("register")}}">Register</a>
        </button>
        <h5 class="fst-italic">Or call to administrator to set up company</h5>
    </div>
</section>
@include('includes.footer')
</body>
</html>
