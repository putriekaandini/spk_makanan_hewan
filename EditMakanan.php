<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM makanan WHERE id_makanan='$id'");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    $nama_makanan = $_POST['nama_makanan'];
    $gambar = $_POST['gambar'];
    $protein = $_POST['protein'];
    $lemak = $_POST['lemak'];
    $serat = $_POST['serat'];
    $harga = $_POST['harga'];
    $ulasan = $_POST['ulasan'];
    mysqli_query($conn, "UPDATE makanan SET

    nama_makanan='$nama_makanan',
    gambar='$gambar',
    protein='$protein',
    lemak='$lemak',
    serat='$serat',
    harga='$harga',
    ulasan='$ulasan'

    WHERE id_makanan='$id'
    ");

    header('Location: DataMakanan.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <link rel="stylesheet" href="css/DataMakanan.css?v=1">
</head>
<body>

<div class="form-container">

    <h1>Edit Data Makanan</h1>

        <form method="POST" enctype="multipart/form-data">

        <input type="text" name="nama_makanan" class="form-control" value="<?= $row['nama_makanan']; ?>">

        <input type="number" name="protein" class="form-control" value="<?= $row['protein']; ?>">

        <input type="number" name="lemak" class="form-control" value="<?= $row['lemak']; ?>">

        <input type="number" name="serat" class="form-control" value="<?= $row['serat']; ?>">

        <input type="number" name="harga" class="form-control" value="<?= $row['harga']; ?>">

        <input type="number" step="0.1" name="ulasan" class="form-control" value="<?= $row['ulasan']; ?>">

        <input type="file" name="gambar" class="form-control">

        <button type="submit" class="btn-simpan">
            Update Data
        </button>

    </form>
</div>

</div>

</body>
</html>