<?php
include 'koneksi.php';
$kriteria = mysqli_query($conn, "SELECT * FROM kriteria");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kriteria</title>

    <link rel="stylesheet" href="css/Kriteria.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>
<body>
<div class="dashboard">
    <!-- SIDEBAR -->
    <div class="sidebar">
        <!-- LOGO -->
        <div class="sidebar-logo">
            <img src="img/Putih1.png" alt="">
            <div class="logo-text">
                <h2>PetFood</h2>
                <p>SPK Makanan Hewan</p>
            </div>
        </div>
        <!-- MENU -->
        <ul class="menu">
        <li><a href="Index.php">Beranda</a></li>
        <li><a href="Input.php">Input Data Hewan</a></li>
        <li><a href="DataMakanan.php">Data Makanan</a></li>
        <li><a href="Kriteria.php " class="active">Kriteria</a></li>
        <li><a href="HasilRekomendasi.php">Hasil Rekomendasi</a></li>
        </ul>
        <!-- IMAGE -->
        <div class="sidebar-bottom">
            <img src="img/KA5R.png" alt="">
        </div>
    </div>
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <!-- TOP CONTENT -->
        <div class="top-content">
            <div>
                <h1 class="title">
                    Kriteria
                </h1>
                <p class="subtitle">
                    Kelola kriteria dan bobot penilaian
                </p>
            </div>
            <a href="TambahKriteria.php" class="btn-add">
                + Tambah Kriteria
            </a>
        </div>
        <!-- TABLE -->
        <div class="table-box">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Kriteria</th>
                        <th>Jenis</th>
                        <th>Bobot</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                while($data = mysqli_fetch_array($kriteria)){
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td>
                            <?= $data['kode_kriteria']; ?>
                        </td>
                        <td>
                            <?= $data['nama_kriteria']; ?>
                        </td>
                        <td>
                            <?= $data['jenis']; ?>
                        </td>
                        <td>
                            <?= $data['bobot']; ?>%
                        </td>
                        <td class="aksi">
                            <a href="EditKriteria.php?id=<?= $data['id_kriteria']; ?>">Edit</a>
                            |
                            <a href="HapusKriteria.php?id=<?= $data['id_kriteria']; ?>" 
                            onclick="return confirm('Hapus data?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- TOTAL -->
        <div class="total">
            Total Bobot : 100%
        </div>
    </div>
</div>
</body>
</html>