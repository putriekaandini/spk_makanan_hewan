<?php
include 'koneksi.php';

/* Ambil ID */
$id = $_GET['id'];

/* Ambil data berdasarkan ID */
$data = mysqli_query($conn, "SELECT * FROM kriteria 
WHERE id_kriteria='$id'");

$row = mysqli_fetch_assoc($data);

/* Proses Update */
if(isset($_POST['update'])){

    $kode_kriteria = $_POST['kode_kriteria'];
    $nama_kriteria = $_POST['nama_kriteria'];
    $jenis         = $_POST['jenis'];
    $bobot         = $_POST['bobot'];

    mysqli_query($conn, "UPDATE kriteria SET

        kode_kriteria = '$kode_kriteria',
        nama_kriteria = '$nama_kriteria',
        jenis          = '$jenis',
        bobot          = '$bobot'

        WHERE id_kriteria = '$id'
    ");

    header("Location: Kriteria.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Kriteria</title>

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

        <h1>Edit Kriteria</h1>

        <p class="subtitle">
            Ubah data kriteria penilaian
        </p>

        <div class="form-container">

            <form method="POST">
            <input type="text" name="kode_kriteria" class="form-control" value="<?= $row['kode_kriteria']; ?>">
                
            <input type="text" name="nama_kriteria" class="form-control" value="<?= $row['nama_kriteria']; ?>">

            <input type="number" step="0.01" name="bobot" class="form-control" value="<?= $row['bobot']; ?>">

            <select name="jenis" required>
                <option value="benefit" <?= ($row['jenis'] == 'Benefit') ? 'selected' : ''; ?>>Benefit</option>
                <option value="cost" <?= ($row['jenis'] == 'Cost') ? 'selected' : ''; ?>>Cost</option>
            </select>

                <button type="submit" name="update" class="btn-simpan">
                Update Data
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>
