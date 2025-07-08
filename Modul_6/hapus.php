<?php
include 'koneksi.php';

// Pastikan parameter id ada dan merupakan angka
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Gunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("DELETE FROM daftar WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menghapus data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID tidak valid.";
}

$conn->close();
?>
