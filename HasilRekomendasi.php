<?php
include 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: Input.php");
    exit;
}
// Menghindari error jika halaman dibuka langsung
$jenis_hewan  = $_POST['jenis_hewan'] ?? '-';
$usia         = $_POST['usia'] ?? '-';
$berat_badan  = $_POST['berat_badan'] ?? '-';
$aktivitas    = $_POST['aktivitas'] ?? '-';
$kesehatan = $_POST['kondisi_kesehatan'] ?? '-';
$kondisi_bulu = $_POST['kondisi_bulu'] ?? '-';
$bobot = [
    'protein' => 0.30,
    'lemak'   => 0.25,
    'serat'   => 0.15,
    'harga'   => 0.20,
    'ulasan'  => 0.10
];
mysqli_query($conn, " INSERT INTO hewan (jenis_hewan, usia, berat_badan, aktivitas, kondisi_kesehatan, kondisi_bulu) 
VALUES ('$jenis_hewan','$usia','$berat_badan','$aktivitas', '$kesehatan','$kondisi_bulu')");
$id_hewan = mysqli_insert_id($conn);

$query = mysqli_query($conn, "SELECT * FROM makanan WHERE jenis_hewan = '$jenis_hewan' AND usia = '$usia'
    AND FIND_IN_SET('$kesehatan', kondisi_kesehatan) AND FIND_IN_SET('$kondisi_bulu', kondisi_bulu)");

$jenis_hewan = $_POST['jenis_hewan'];
$usia = $_POST['usia'];

if ($jenis_hewan == "Kucing" && $usia == "Puppy") {
    die("Usia Puppy hanya untuk anjing.");
}

if ($jenis_hewan == "Anjing" && $usia == "Kitten") {
    die("Usia Kitten hanya untuk kucing.");
}

$data_makanan = [];
while($row = mysqli_fetch_assoc($query)){
    
    $data_makanan[] = [
    'id'       => $row['id_makanan'],
    'nama'     => $row['nama_makanan'],
    'gambar'   => $row['gambar'],
    'protein'  => $row['protein'],
    'lemak'    => $row['lemak'],
    'serat'    => $row['serat'],
    'harga'    => $row['harga'],
    'ulasan'   => $row['ulasan']
    ];
}
if(empty($data_makanan)){
    die("Data makanan tidak ditemukan");
}
$maxProtein = max(array_column($data_makanan, 'protein'));
$maxLemak   = max(array_column($data_makanan, 'lemak'));
$maxSerat   = max(array_column($data_makanan, 'serat'));
$maxUlasan  = max(array_column($data_makanan, 'ulasan'));
$minHarga   = min(array_column($data_makanan, 'harga'));
$hasil = [];
foreach($data_makanan as $makanan){
    // BENEFIT
    $nProtein = $makanan['protein'] / $maxProtein;
    $nLemak   = $makanan['lemak'] / $maxLemak;
    $nSerat   = $makanan['serat'] / $maxSerat;
    $nUlasan  = $makanan['ulasan'] / $maxUlasan;
    // COST
    $nHarga = $minHarga / $makanan['harga'];    
    // NILAI AKHIR SAW
    $skor = (
        ($nProtein * $bobot['protein']) +
        ($nLemak   * $bobot['lemak']) +
        ($nSerat   * $bobot['serat']) +
        ($nHarga   * $bobot['harga']) +
        ($nUlasan  * $bobot['ulasan'])
    );
    $hasil[] = [
    'id_makanan' => $makanan['id'],
    'nama'       => $makanan['nama'],
    'gambar'     => $makanan['gambar'],
    'skor'       => round($skor, 4)
];
}
usort($hasil, function($a, $b){
    return $b['skor'] <=> $a['skor'];
});
$ranking = 1;

foreach($hasil as $h){

    mysqli_query($conn,"
        INSERT INTO hasil_rekomendasi
        (
            id_hewan,
            id_makanan,
            nilai_saw,
            ranking,
            gambar
        )
        VALUES
        (
            '$id_hewan',
            '{$h['id_makanan']}',
            '{$h['skor']}',
            '$ranking',
            '{$h['gambar']}'
        )
    ");

    $ranking++;
}
$terbaik = $hasil[0];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Rekomendasi</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/HasilRekomendasi.css">
</head>
<body>
<div class="container">
    <div class="sidebar">
        <!-- Logo -->
        <div class="sidebar-logo">
            <img src="img/Putih1.png" alt="Logo">
            <div class="logo-text">
                <h2>PetFood</h2>
                <p>SPK Makanan Hewan</p>
            </div>
        </div>
        <ul class="menu">
            <li><a href="Index.php">Beranda</a></li>
            <li><a href="Input.php">Input Data Hewan</a></li>
            <li><a href="DataMakanan.php">Data Makanan</a></li>
            <li><a href="Kriteria.php">Kriteria</a></li>
            <li><a href="HasilRekomendasi.php" class="active">Hasil Rekomendasi</a></li>
        </ul>
        <!-- Bottom Image -->
        <div class="sidebar-bottom">
            <img src="img/KA5R.png" alt="Hewan">
        </div>
    </div>
    <div class="main-content">
        <!-- TITLE -->
        <div class="title">
            <h1>Hasil Rekomendasi</h1>
            <p>
                Sistem menampilkan rekomendasi makanan terbaik
                berdasarkan hasil perhitungan metode SAW
            </p>
        </div>
        <!-- CONTENT -->
        <div class="content-wrapper">
            <div class="analysis-box">
                <h2>Ringkasan Hasil Analisis</h2>
                <div class="analysis-line"></div>
                <div class="analysis-item">
                    <span>Jenis Hewan</span>
                    <p><?= $jenis_hewan ?></p>
                </div>
                <div class="analysis-item">
                    <span>Usia</span>
                    <p><?= $usia ?></p>
                </div>
                <div class="analysis-item">
                    <span>Berat Badan</span>
                    <p><?= $berat_badan ?> Kg</p>
                </div>
                <div class="analysis-item">
                    <span>Aktivitas</span>
                    <p><?= $aktivitas ?></p>
                </div>
                <div class="analysis-item">
                    <span>Kondisi Kesehatan</span>
                    <p><?= $kesehatan ?></p>
                </div>
                <div class="analysis-item">
                    <span>Kondisi Bulu</span>
                    <p><?= $kondisi_bulu ?></p>
                </div>
            </div>
            <div class="ranking-section">
                <!-- TABLE -->
                <table class="ranking-table">
                    <tr>
                        <th>Rank</th>
                        <th>Nama Makanan</th>
                        <th>Skor</th>
                    </tr>
                    <?php
                    $rank = 1;
                    foreach($hasil as $h){
                    ?>
                    <tr>
                        <td><?= $rank++ ?></td>
                        <td><?= $h['nama'] ?></td>
                        <td><?= $h['skor'] ?></td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="best-box">
                    <div class="best-title">
                        <h2>Rekomendasi Terbaik</h2>
                    </div>
                    <div class="best-content">
                        <div class="best-info">
                           <?php if($terbaik): ?>
                                <img src="img/makanan/<?= $terbaik['gambar'] ?>">
                            <h3><?= $terbaik['nama'] ?></h3>
                            <p>Skor Akhir : <?= $terbaik['skor'] ?></p>
                            <div class="best-label">Sangat Direkomendasikan</div>
<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>