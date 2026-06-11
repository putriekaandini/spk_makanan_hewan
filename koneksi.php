<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "spk_makanan_hewan"
);

if(!$conn){
    die("Koneksi gagal : " . mysqli_connect_error());
}

?>