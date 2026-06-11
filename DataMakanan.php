<?php
include 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM makanan ORDER BY id_makanan ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Makanan</title>
    <link rel="stylesheet" href="css/DataMakanan.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:
    wght@300;400;500;600;700&display=swap"rel="stylesheet">
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
        <li><a href="DataMakanan.php" class="active">Data Makanan</a></li>
        <li><a href="Kriteria.php">Kriteria</a></li>
        <li><a href="HasilRekomendasi.php">Hasil Rekomendasi</a></li>
        </ul>
        <div class="sidebar-bottom">
            <img src="img/KA5R.png" alt="">
        </div>
    </div>
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="top-header">
            <div>
                <h1>Data Makanan</h1>
                <p>Kelola data alternatif makanan hewan</p>
            </div>
            <a href="TambahMakanan.php" class="btn-tambah">
                + Tambah Data
            </a>
        </div>
        <div class="table-box">
            <table>
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Makanan</th>
                        <th>Protein</th>
                        <th>Lemak</th>
                        <th>Serat</th>
                        <th>Harga</th>
                        <th>Ulasan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                while($row = mysqli_fetch_assoc($data)){
                ?>
                    <tr>
                        <td>
                        <img src="img/makanan/<?= $row['gambar']; ?>" width="80"></td>
                        <td><?= $row['nama_makanan']; ?></td>
                        <td><?= $row['protein']; ?></td>
                        <td><?= $row['lemak']; ?></td>
                        <td><?= $row['serat']; ?></td>
                        <td>Rp <?= number_format($row['harga']); ?></td>
                        <td><?= $row['ulasan']; ?></td>
                         <td>
                            <a href="EditMakanan.php?id=<?= $row['id_makanan']; ?>">Edit</a>
                            |
                            <a href="HapusMakanan.php?id=<?= $row['id_makanan']; ?>
                            " onclick="return confirm('Hapus data?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        </div>
</div>
</body>
</html>