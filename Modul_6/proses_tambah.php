<?php
include 'koneksi.php';

// Mengecek apakah data form telah dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil dan sanitasi data dari form
    $nama = trim($_POST['nama']);
    $jabatan = trim($_POST['jabatan']);
    $email = trim($_POST['email']);

    // Validasi sederhana
    if (!empty($nama) && !empty($jabatan) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Menggunakan prepared statement untuk keamanan
        $stmt = $conn->prepare("INSERT INTO daftar (nama, jabatan, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama, $jabatan, $email);

        if ($stmt->execute()) {
            header("Location: index.php"); // Arahkan ke halaman utama jika berhasil
            exit();
        } else {
            echo "Gagal menyimpan data: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Data tidak valid. Pastikan semua field terisi dan email valid.";
    }
}

$conn->close();
?>
