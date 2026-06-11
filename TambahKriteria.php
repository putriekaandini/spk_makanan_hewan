<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){

    $kode_kriteria = $_POST['kode_kriteria'];
    $nama_kriteria = $_POST['nama_kriteria'];
    $jenis         = $_POST['jenis'];
    $bobot         = $_POST['bobot'];

    mysqli_query($conn, "INSERT INTO kriteria (kode_kriteria, nama_kriteria, jenis, bobot)
    VALUES('$kode_kriteria', '$nama_kriteria', '$jenis', '$bobot')");

    header("Location: Kriteria.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Kriteria</title>

    <link rel="stylesheet" href="css/Kriteria.css?v=1">

</head>

<body>

<div class="dashboard">

    <!-- SIDEBAR -->
    <div class="sidebar">

        <div class="sidebar-logo">

            <img src="img/Putih1.png" alt="">

            <div class="logo-text">
                <h2>PetFood</h2>
                <p>SPK Makanan Hewan</p>
            </div>

        </div>

        <ul class="menu">

            <li><a href="Index.php">Beranda</a></li>

            <li><a href="Input.php">Input Data Hewan</a></li>

            <li><a href="DataMakanan.php">Data Makanan</a></li>

            <li><a href="Kriteria.php" class="active">Kriteria</a></li>

            <li><a href="HasilRekomendasi.php">Hasil Rekomendasi</a></li>

        </ul>

        <div class="sidebar-bottom">
            <img src="img/KA5R.png" alt="">
        </div>

    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">

        <h1>Tambah Kriteria</h1>

        <p class="subtitle">
            Tambahkan data kriteria penilaian
        </p>

        <div class="form-container">

        <form method="POST">

        <input type="text" name="kode_kriteria" placeholder="Kode Kriteria" required>

        <input type="text" name="nama_kriteria" placeholder="Nama Kriteria"required>

        <select name="jenis" required>
            <option value="">Pilih Jenis</option>
            <option value="Benefit">Benefit</option>
            <option value="Cost">Cost</option>
        </select>

        <input type="number" name="bobot" placeholder="Bobot" step="0.01" required>

        <button type="submit" name="simpan" class="btn-simpan">
        Simpan Data
        </button>

    </form>

</div>

    </div>

</div>

</body>
</html>