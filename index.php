<?php
//data dummy, data berupa array yang berisi informasi tentang furniture
$datapaket=array(
  array("VIP",3000000,"vip.jpg"),
  array("Ballroom",2500000,"ballroom.jpg"),
  array("Outdoor",4500000,"outdoor.jpg")
);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- nav start -->
<nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <img src="img/logo.jpg" width="50px" alt="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="#">Features</a>
        <a class="nav-link" href="#">Pricing</a>
        <span class="navbar-text">
        <a href="#">Log Out</a>
      </span>
      </div>
    </div>
  </div>
</nav>
<!-- end nav -->

<!-- content start -->

<div class="container" style="height: 100vh;">
        <div class="d-flex justify-content-center align-items-center" style="height: 80%;">
            <img src="img/banner.jpg" alt="Gambar Tengah">
        </div>
    </div>

<div class="position-relative">
      <h1>Daftar Produk Co Kreatif</h1>
      </div>


      <div class="row">
        <!-- foreach di gunakan untuk perulangan pada arrray, foreach mengambil nilai dari array dan memprosesnya.
          $paket adalah kunci (key) dari elemen array. $data adalah nilai (value) yang sesuai dengan kunci tersebut dalam array -->
      <?php 
      foreach($datapaket as $paket => $data){
      
      ?>

<div class="col-4">
        <div class="card">
          <div class="card-body">
            <!-- menampilkan nilai yang ada di dalam array -->
            <img class="card-img" src="./img/<?=$data[2]?>" > 
            <h5 class="card-title"><?=$data[0]?></h5>  
            <p class="card-text">RP. <?=$data[1]?></p> 
      </div>
    </div>
  </div>
  <?php 
      }
  
  ?>
  <div class="text-center">
  <a href="transaksi.php" class="btn btn-primary">Pilih</a>
  </div>

  <div class="text-center">
    <h1>Tentang Kami</h1>
    <p>Alamat Jl.Mars Blok 80 No 23<br><b>081450899224</b><br>email:mars@gmail.come</p>

    <video controls class="w-100" height="500px">
        <source src="img/vidio.mp4" type="video/mp4">                    
    </video>
  </div>


<!-- end content -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>