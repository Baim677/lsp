<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'nama' => $_POST['nama'] ?? '',
        'jenis_kelamin' => $_POST['jenis_kelamin'] ?? '',
        'nomor_identitas' => $_POST['nomor_identitas'] ?? '',
        'tipe_mobil' => $_POST['tipe_mobil'] ?? '',
        'harga' => $_POST['harga'] ?? '',
        'tanggal_pesan' => $_POST['tanggal_pesan'] ?? '',
        'durasi_menginap' => $_POST['durasi_menginap'] ?? '',
        'tambahan' => $_POST['tambahan'] ?? '',
        'total' => $_POST['total_bayar'] ?? '',
    ];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simpan</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Nav Start -->
    <nav class="navbar sticky-top navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Rental Mobil</a>
        </div>
    </nav>
    <!-- Nav End -->

    <div class="container mt-4">
        <div class="row">
            <div class="col"></div>

            <div class="card" style="width: 34rem;">
                <div class="col">
                    
                    Nama Pemesan : <?= $data['nama'] ?><br>
                    Nomor Identitas : <?= $data['nomor_identitas'] ?><br>
                    Jenis Kelamin : <?= $data['jenis_kelamin'] ?><br>
                    Tanggal Pemesanan : <?= $data['tanggal_pesan'] ?><br>
                    Tipe mobil :<?php if ($data['tipe_mobil'] == 1000000){
                        echo "fortuner";
                    }elseif ($data['tipe_mobil'] == 3000000){
                        echo"creta";
                    }elseif ($data['tipe_mobil'] == 8000000){
                        echo"CRV";

                    }   ?><br>                
                    Durasi Penginapan : <?= $data['durasi_menginap'] ?> Hari<br>
                    Discount : <?php if($data['durasi_menginap'] > 3){ echo "10%"; } else { echo "-"; } ?> Discount<br>
                    Total Bayar : <?= $data['total'] ?>
                </div>
            </div>


            <div class="col"></div>
        </div>
    </div>
</body>

</html>