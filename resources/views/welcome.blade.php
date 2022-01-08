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
                <a href="{{url('vehicles.search')}}" class="order-btn">Request Vehicle</a>
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
        <h1 class="title">WHAT WE DO</h1>
        <div class="row text-center">
            <div class="col-md-4 services">
                <img src="{{asset('img/delivery-man.png')}}" class="service-img">
                <h4>Our Goal</h4>
                <p>We pick your items in a fast and safe way very quickly</p>
            </div>
            <div class="col-md-4 services">
                <img src="{{asset('img/delivery.png')}}" class="service-img">
                <h4>Our Goal</h4>
                <p>We pick your items in a fast and safe way very quickly</p>
            </div>
            <div class="col-md-4 services">
                <img src="{{asset('img/fast-delivery.png')}}" class="service-img">
                <h4>Our Goal</h4>
                <p>We pick your items in a fast and safe way very quickly</p>
            </div>
        </div>
    </div>
</section>
@include('includes.footer')
</body>
</html>
