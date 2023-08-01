<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Durian SPK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="{{ asset('css/baru.css') }}" rel="stylesheet"> 
  </head>
  <body> <br><br><br>
    <div class=" text-center">
      <h3>SISTEM PENDUKUNG KEPUTUSAN</h3>
      <h3>PEMILIHAN VARIATES DURIAN </h3>
      <h3>MENGGUNAKAN METODE PROFILE MATCHING</h3><br>
      <img src="{{ asset('img/durian.png') }}" class="img-responsive" alt="">
  </div>
          
  <div class="d-flex justify-content-center">
      <a href="{{ route('hitung') }}"><button type="button" class="btn btn-outline-success"><marquee direction=”right”>LANJUTKAN DISINI </marquee></button></a>
  </div> 

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>