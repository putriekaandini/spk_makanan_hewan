<?php

include 'koneksi.php';

$jenis_hewan = $_POST['jenis_hewan'];
$usia = $_POST['usia'];
$berat_badan = $_POST['berat_badan'];
$aktivitas = $_POST['aktivitas'];
$kondisi_kesehatan = $_POST['kondisi_kesehatan'];
$kondisi_bulu = $_POST['kondisi_bulu'];

mysqli_query($conn, "INSERT INTO hewan 
(jenis_hewan, usia, berat_badan, aktivitas, kondisi_kesehatan, kondisi_bulu)

VALUES

('$jenis_hewan',
'$usia',
'$berat_badan',
'$aktivitas',
'$kondisi_kesehatan',
'$kondisi_bulu')");

echo "Data berhasil disimpan";

?>