<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){

    $nama_makanan = $_POST['nama_makanan'];
    $protein = $_POST['protein'];
    $lemak = $_POST['lemak'];
    $serat = $_POST['serat'];
    $harga = $_POST['harga'];
    $ulasan = $_POST['ulasan'];
    
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    move_uploaded_file($tmp, "gambar/" . $gambar);

    mysqli_query($conn, "INSERT INTO makanan
    (nama_makanan, protein, lemak, serat, harga, ulasan, gambar)

    VALUES

    ('$nama_makanan', '$protein', '$lemak', '$serat', '$harga', '$ulasan', '$gambar')");

    header('Location: DataMakanan.php');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data</title>

    <link rel="stylesheet" href="css/DataMakanan.css?v=1">
</head>
<body>

<div class="form-container">

    <h1>Tambah Data Makanan</h1>

    <form method="POST" enctype="multipart/form-data">

        <input type="text" name="nama_makanan" placeholder="Nama Makanan" required>

        <input type="number" name="protein" placeholder="Kandungan Protein (%)" required>

        <input type="number" name="lemak" placeholder="Kandungan Lemak (%)" required>

        <input type="number" name="serat" placeholder="Kandungan Serat (%)" required>

        <input type="number" name="harga" placeholder="Harga (Rp)" required>

        <input type="number" step="0.1" name="ulasan" placeholder="Ulasan (1-5)" required>

        <input type="file" name="gambar" required>

        <button type="submit" name="simpan" class="btn-simpan">
        Simpan Data
        </button>

    </form>
</div>

</body>
</html>