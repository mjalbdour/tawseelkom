<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <title>TAWSEELKOM</title>
</head>
<body>

<section id="nav-bar">
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">Tawseelkom</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signinpage.html">Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
    </div>
  </nav>
</section>

<!--Banner Section-->

<section id="banner">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <p class="promo">Tawseelkom</p>
        <a href="requestvehicle.html"class="order-btn">Request Vehicle</a>
        <p>Ship all items from all sizes</p>
      </div>
      <div class="col-md-6 text-center">
        <img src="{{asset('img/delivery-truck.png')}}}" class="img-fluid">
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
<!--footer section-->
<section class="footer">
<div class="container">
  <div class="row">
    <div class="col-md-4 footer-box">
      <h3>Tawseelkom</h3>
      <p>this is a senior project by abdelrahman abutina
        inshallah i will pass good and get good grades</p>
    </div>
    <div class="col-md-4 footer-box">
      <p><b>CONTACT US</b></p>
      <p><i class="fas fa-map-marker-alt"></i>MADABA,JORDAN</p>
      <p><i class="fas fa-phone"></i>0779094043</p>
      <p><i class="fas fa-envelope-open"></i>A.ABUTINA@GJU.EDU.JO</p>
    </div>
  </div>
  <hr>
  <p class="copyright">All Rights Reserved</p>
</div>
</section>
</body>
</html>
