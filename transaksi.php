<?php
require('dummy.php');


// inisilasi
$id= $_GET["id"];
//mengambil nilai dari home.php
 $no_transaksi="";
 $nama_customer="";
 $tanggal="";
 $harga="0";
 $tambahan="0";
 $total_harga="0";
 $pembayaran="0";
 $kembalian="0";
 $jumlah_produk="0";

  //memeriksa apakah form dikirim menggunakan method post
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $harga = $_POST['harga'];
    $no_transaksi =$_POST['no_transaksi'];
    $nama_customer =$_POST['nama_customer'];
    $tanggal =$_POST['tanggal'];
    $total_harga = $_POST['total_harga'];
    $pembayaran = $_POST['pembayaran'];
    $kembalian = $_POST['kembalian'];
    $jumlah_produk = $_POST['jumlah_produk'];

    // ketika tombol hitung ditekan maka $harga akan di kali dengan $jumlah_produk dan di simpan ke dalam $total_harga
    if(isset($_POST['hitung'])){
        $total_harga = $harga * $jumlah_produk;
    }
    // ketika tombol hitung kembalian maka $pembayaran akan di kurangi dengan $total_harga dan di simpan ke dalam $kembalian
    if(isset($_POST['hitung_kembalian'])){
        $kembalian = $pembayaran - $total_harga;
    }
    // ketika tombol simpan ditekan maka akan muncul po up Transaksi Berhasil di Simpan
    if(isset($_POST['simpan'])){
        echo"<script>
        alert('Transaksi Berhasil di Simpan');
        window.location.href = 'home.php';
        </script>";
    }
 }
?>

<!doctype html>
<html lang="en"> 
  <head> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biji mas ade ganjil</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  </body>
</html>

  <body>
    <!-- navbar -->
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
        <!-- Link ketiga untuk halaman pricing atau harga -->
      </div>
    </div>
  </div>
</nav>

    <!-- end navbar -->

    <!-- content -->
    
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-8">
                  <div class="card">
                    <div class="card-body">
                      <form method="post">

                        <h2 class="text-center fw-bold">TRANSAKSI</h2>

                        <!-- No transaksi -->
                        <div class="mb-3">
                        <label class="form-label">Nomer transaksi</label>
                        <input type="number" class="form-control" name="no_transaksi" value="<?= $no_transaksi?>" required>
                        </div>

                        <!-- tanggal transaksi -->
                        <div class="mb-3">
                        <label class="form-label">Tanggal Transaksi</label>
                        <input type="date" class="form-control" name="tanggal" value="<?= $tanggal?>" required>
                        </div>

                        <!-- nama customer -->
                        <div class="mb-3">
                        <label class="form-label">Nama customer</label>
                        <input class="form-control" name="nama_customer" type="text" value="<?= $nama_customer?>" required>
                        </div>


                        <!--Pilih produk  -->

                        <div class="mb-3">
                        <label class="form-label">Pilih produk</label>
                        <input class="form-control" name="paket" type="text" value="<?= $datapaket[$id][0]?>" readonly  required>
                        </div>

                        <!-- Harga produk -->

                        <div class="mb-3">
                        <label class="form-label">Harga produk</label>
                        <input class="form-control" name="harga" type="text" value="<?= $datapaket[$id][2]?>" readonly  required>
                        </div>

                        <!-- jumlah produk -->
                         <div class="mb-3">
                        <label class="form-label">Jumlah produk</label>
                        <input type="number" class="form-control" name="jumlah_produk"  required >
                         </div>

                        <!-- No transaksi -->

                        <div class="mb-3">
                        <label class="form-label">Total harga</label>
                        <input type="text" class="form-control" name="total_harga" value="<?=$total_harga?>" readonly  required>
                        </div>

                        <button type="submit" class="btn btn-primary mb-3" name="hitung"  required >Hitung total</button>

                        <!-- pembayaran -->
                         <div class="mb-3">
                          <label for="form-label">Pembayaran</label>
                          <input type="number" class="form-control" name="pembayaran" value="<?=$pembayaran?>" required>
                         </div>

                        <!-- hitung kembalian -->
                        <div class="mb-3">
                          <button type="submit" class="btn btn-primary mb-3" name="hitung_kembalian" readonly  required>Hitung Kembalian</button>
                          
                        </div>
                        <!-- kembalian -->
                        <div class="mb-3">
                        <label class="form-label"> kembalian</label>
                        <input type="number" class="form-control" name="kembalian" value="<?=$kembalian?>" readonly  required>
                        </div>

                        <!-- simpan -->
                        <div class="mb-3">
                        <button type="submit" class="btn btn-primary mb-3" name="simpan">Simpan</button>

                         </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    <!-- end content -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>



?>