<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil dan sanitasi data dari form
    $id = intval($_POST['id']);
    $nama = trim($_POST['nama']);
    $jabatan = trim($_POST['jabatan']);
    $email = trim($_POST['email']);

    // Validasi sederhana
    if (!empty($nama) && !empty($jabatan) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Gunakan prepared statement untuk keamanan
        $stmt = $conn->prepare("UPDATE daftar SET nama = ?, jabatan = ?, email = ? WHERE id = ?");
        $stmt->bind_param("sssi", $nama, $jabatan, $email, $id);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Gagal memperbarui data: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Data tidak valid. Pastikan semua field terisi dan email valid.";
    }
}

$conn->close();
?>
