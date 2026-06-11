<?php
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM makanan WHERE id_makanan='$id'");

header('Location: DataMakanan.php');
?>