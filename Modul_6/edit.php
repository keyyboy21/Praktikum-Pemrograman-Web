<?php
include 'koneksi.php';

// Cek apakah parameter id tersedia dan valid
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Gunakan prepared statement untuk menghindari SQL Injection
    $stmt = $conn->prepare("SELECT * FROM daftar WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah data ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }

    $stmt->close();
} else {
    echo "ID tidak valid.";
    exit;
}
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Karyawan</title>
</head>

<body>
    <h2>Form Edit Data Karyawan</h2>
    <form action="proses_edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
        Nama: <input type="text" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" required><br><br>
        Jabatan: <input type="text" name="jabatan" value="<?php echo htmlspecialchars($row['jabatan']); ?>" required><br><br>
        Email: <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required><br><br>
        <input type="submit" value="Update">
    </form>
</body>

</html>
