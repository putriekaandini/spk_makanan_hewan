<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Hewan - SPK Makanan Hewan</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/Input.css">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:
    wght@300;400;500;600;700&display=swap"rel="stylesheet">
</head>
<body>
<div class="dashboard">
    <!-- SIDEBAR -->
    <div class="sidebar">
        <!-- Logo -->
        <div class="sidebar-logo">
            <img src="img/Putih1.png" alt="Logo">
            <div class="logo-text">
                <h2>PetFood</h2>
                <p>SPK Makanan Hewan</p>
            </div>
        </div>
        <!-- MENU -->
        <ul class="menu">
            <li><a href="Index.php">Beranda</a></li>
            <li><a href="Input.php" class="active">Input Data Hewan</a></li>
            <li><a href="DataMakanan.php">Data Makanan</a></li>
            <li><a href="Kriteria.php">Kriteria</a></li>
            <li><a href="HasilRekomendasi.php">Hasil Rekomendasi</a></li>
        </ul>
        <!-- Bottom Image -->
        <div class="sidebar-bottom">
            <img src="img/KA5R.png" alt="Hewan">
        </div>
    </div>
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <h1>Input Data Hewan</h1>
        <p class="welcome">
            Lengkapi data kondisi hewan peliharaan Anda
        </p>
        <div class="main-box">
            <!-- FORM -->
            <div>
                <form action="HasilRekomendasi.php" method="POST">
                    <div class="form-box">
                        <!-- Jenis Hewan -->
                        <div class="form-group">
                            <label>Jenis Hewan</label>
                            <select name="jenis_hewan" required>
                                <option value="Kucing">Kucing</option>
                                <option value="Anjing">Anjing</option>
                            </select>
                        </div>
                        <!-- Usia -->
                        <div class="form-group">
                            <label>Usia</label>
                            <select name="usia" required>
                                <option value="Adult">Adult</option>
                                <option value="Kitten">Kitten</option>
                                <option value="Puppy">Puppy</option>
                                <option value="Senior">Senior</option>
                            </select>
                        </div>
                        <!-- Berat Badan -->
                        <div class="form-group">
                            <label>Berat Badan</label>
                            <input type="number" step="0.1" min="0.1" placeholder="contoh: 4.5" name="berat_badan" required>
                        </div>
                        <!-- Aktivitas -->
                        <div class="form-group">
                            <label>Aktivitas</label>
                            <select name="aktivitas" required>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                        <!-- Kondisi Kesehatan -->
                        <div class="form-group">
                            <label>Kondisi Kesehatan</label>
                            <select name="kondisi_kesehatan" required>
                                <option value="Sehat">Sehat</option>
                                <option value="Tidak Sehat">Tidak Sehat</option>
                            </select>
                        </div>
                        <!-- Kondisi Bulu -->
                        <div class="form-group">
                            <label>Kondisi Bulu</label>
                            <select name="kondisi_bulu" required>
                                <option value="Rontok">Rontok</option>
                                <option value="Normal">Normal</option>
                            </select>
                        </div>
                    </div>
                    <!-- BUTTON -->
                    <button class="btn" type="submit">
                        Proses Rekomendasi →
                    </button>
                </form>
            </div>
            <!-- INFO BOX -->
            <div class="input-info-box">
                <div>
                    <h3>Informasi</h3>
                    <p>
                        Sistem akan memproses data yang Anda masukkan
                        untuk menentukan kebutuhan nutrisi hewan dan
                        memberikan rekomendasi makanan terbaik
                        menggunakan metode SAW.
                    </p>
                    <img src="img/KA3R.png" alt="Informasi Hewan">
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
