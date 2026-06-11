<?php
include 'koneksi.php';

/* Ambil ID */
$id = $_GET['id'];

/* Hapus data kriteria */
mysqli_query($conn, "DELETE FROM kriteria 
WHERE id_kriteria='$id'");

/* Kembali ke halaman kriteria */
header('Location: Kriteria.php');
?>