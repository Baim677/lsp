<?php

$nama_pemesan = "";
$jenis_kelamin = "";
$nomor_identitas = "";
$tipe_mobil = "";
$harga = 0;
$tanggal_pesan = "";
$durasi_menginap = 0;
$supir = "";
$total = 0;

if (isset($_POST['hitung_total'])) {
    // echo "<script>
    //     alert('Kelas KINH');
    //     </script>";

    $nama_pemesan = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nomor_identitas = $_POST['nomor_identitas'];
    $tipe_mobil = $_POST['tipe_mobil'];
    $harga = (int) $_POST['harga'];
    $tanggal_pesan = $_POST['tanggal_pesan'];
    $durasi_menginap = (int) $_POST['durasi_menginap'];
    $supir = isset($_POST['supir']) ? (int) $_POST['supir'] : "";
    $total = $_POST['total_bayar'];

    

    if ($durasi_menginap > 3 && empty($supir)) {
        $potongan = ($harga * 10) / 100;
        $total = ($harga * $durasi_menginap) - $potongan;
    } else if ($durasi_menginap <= 3&& empty($supir)) {
        $total = $harga * $durasi_menginap;
    } else if ($durasi_menginap > 3 && !empty($supir)) {
        $potongan = ($harga * 10) / 100;
        $total = ($harga * $durasi_menginap) + $supir - $potongan;
    } else if ($durasi_menginap <= 3 && !empty($supir)) {
        $total = $harga * $durasi_menginap + $supir;
    }
    // Mengecek apakah form telah dikirim (dengan metode POST)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Validasi: Durasi harus angka dan lebih dari 0
        if (!is_numeric($durasi_menginap)) {
            $errors[] = "Durasi harus berupa angka";
        }

        if (!is_numeric($_POST['nomor_identitas'])) {
            $errors[] = "Identitas harus berupa angka";
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
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
                    <form method="POST" action="simpan.php">
                        <label class="form-label mt-2">Nama Pemesan</label>
                        <input type="text" name="nama" class="form-control shadow-lg mb-2" value="<?php if (empty($nama_pemesan)) {
                            echo "";
                            } else {
                             echo $nama_pemesan;
                            } ?>">

                        <label class="form-label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="laki-laki" id="flexRadioDefault2" <?= $jenis_kelamin == "laki-laki" ? 'checked' : '' ?> checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="perempuan" id="flexRadioDefault1" <?= $jenis_kelamin == "perempuan" ? 'checked' : '' ?>>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Perempuan
                            </label>
                        </div>

                        <label class="form-label">Nomor Identitas</label>
                        <input type="number" name="nomor_identitas" class="form-control shadow-lg mb-2" value="<?= $nomor_identitas; ?>">

                        <label class="form-label">Tipe Mobil</label>
                        <select class="form-select mb-2" aria-label="Default select example" id="tipe_mobil" name="tipe_mobil" onchange="UpdateInput()">
                            <option value="1000000" selected <?= $tipe_mobil == 1000000 ? 'selected' : '' ?>>Fotuner</option>
                            <option value="3000000" <?= $tipe_mobil == 3000000 ? 'selected' : '' ?>>Creta</option>
                            <option value="8000000" <?= $tipe_mobil == 8000000 ? 'selected' : '' ?>>CRV</option>
                        </select>

                        <label class="form-label">Harga</label>
                        <input type="text" name="harga" id="harga" class="form-control shadow-lg mb-2" value="<?= $harga; ?>" readonly>

                        <label class="form-label">Tanggal Pesan</label>
                        <input type="date" name="tanggal_pesan" class="form-control shadow-lg mb-2" value="<?= $tanggal_pesan; ?>">

                        <label class="form-label">Durasi Menginap</label>
                        <input type="number" name="durasi_menginap" min="1" class="form-control shadow-lg mb-2" value="<?= $durasi_menginap; ?>">

                        <label class="form-label">Termasuk Supir</label>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="80000" name="supir" id="flexCheckDefault" <?= $supir == 100000 ? 'checked' : '' ?>>
                            <label class="form-check-label" for="flexCheckDefault ">
                                Termasuk Supir
                            </label>
                        </div>

                        <label class="form-label">Total Bayar</label>
                        <input type="number" name="total_bayar" class="form-control shadow-lg mb-2" value="<?= $total ?>" readonly>

                        <div class="text-end mb-4 mt-2">
                            <button name="hitung_total" class="btn btn-outline-primary" formaction="pesan.php">Hitung Total Bayar</button>
                            <button name="simpan" class="btn btn-outline-success" formaction="simpan.php">Simpan</button>
                            <button name="cancel" class="btn btn-outline-danger" formaction="index.php" >Cancel</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col"></div>
            <!-- Java Script -->
            <script>
                function UpdateInput() {
                    let select = document.getElementById("tipe_mobil");
                    let input = document.getElementById("harga");
                    input.value = select.value;
                }
            </script>
            <!-- Java Script -->
        </div>
    </div>
</body>

</html>