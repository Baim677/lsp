<?php
require("data/data.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script defer src="js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Nav Start -->
    <nav class="navbar sticky-top navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Rental Mobil</a>
        </div>
    </nav>
    <!-- Nav End -->

    <div class="container">
        <div class="row">
            <!-- Items Start -->
            <div class="text-center">
                <h3>Jenis Mobil</h3>
            </div>
            <div class="row text-center">
                <?php
                foreach ($data as $id => $value_data) {
                ?>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <div class="card shadow">
                            <img src="img/<?= $value_data[2] ?>" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $value_data[0]; ?></h5>
                                <p class="card-text">Rp.<?php echo number_format($value_data[1]); ?></p>
                                <a href="pesan.php" class="btn btn-outline-primary mt-4">Pilih Mobil</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- Items End -->
        </div>
        <a href="pesan.php" class="btn btn-outline-primary mt-4">Pilih Mobil</a>
    </div>
    <div class="text-center ">
        <h1>Tentang Kami</h1>
        <b>Alamat Rental JL mars Blok 30</b><br>
        <b>Anda sopan kami Seganblew</b>
        <video controls class="w-100" height="500px">
            <source src="img/88481-606110665_large.mp4" type="video/mp4">
                        
        </video>
    </div>
</body>

</html>