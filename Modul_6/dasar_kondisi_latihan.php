<!DOCTYPE html>
<html>

<head>
    <title>Latihan kondisi PHP</title>
</head>

<body>
    <h1>Cek Nilai</h1>
    <?php
    $nilai = 100;
    echo "<p>Nilai Anda: $nilai</p>";

    if ($nilai > 90) {
        echo "<p style='color:green;'>Kategori: Sangat Baik</p>";
        echo "<p style='color:green;'>Selamat, Anda lulus!</p>";
    } elseif ($nilai > 80) {
        echo "<p style='color:blue;'>Kategori: Baik</p>";
        echo "<p style='color:green;'>Selamat, Anda lulus!</p>";
    } elseif ($nilai > 70) {
        echo "<p style='color:orange;'>Kategori: Cukup</p>";
        echo "<p style='color:green;'>Selamat, Anda lulus!</p>";
    } else {
        echo "<p style='color:red;'>Kategori: Kurang</p>";
        echo "<p style='color:red;'>Maaf, Anda perlu belajar lagi.</p>";
    }
    ?>
</body>

</html>
