<?php
// Import koneksi ke database
require_once 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $total_kill = $_POST['total_kill'];
    $tim = $_POST['tim'];
    $role = $_POST['role'];
    $gambar = $_FILES['gambar'];

    // Proses pengunggahan gambar
    if ($gambar['error'] === UPLOAD_ERR_OK) {
        $gambar_name = $gambar['name'];
        $gambar_tmp = $gambar['tmp_name'];
        $gambar_path = 'uploads/' . $gambar_name; // Ganti 'uploads/' dengan direktori tempat Anda ingin menyimpan gambar

        if (move_uploaded_file($gambar_tmp, $gambar_path)) {
            // Gambar berhasil diunggah, tambahkan data ke database
            $sql = "INSERT INTO tugas (nama, total_kill, tim, role, gambar) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($koneksi, $sql);
            mysqli_stmt_bind_param($stmt, "sssss", $nama, $total_kill, $tim, $role, $gambar_path);
            mysqli_stmt_execute($stmt);

            if ($stmt) {
                header("location: index.php");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
            }
        } else {
            echo "Gagal mengunggah gambar.";
        }
    } else {
        echo "Terjadi kesalahan saat mengunggah gambar.";
    }
}
?>
