<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $total_kill = $_POST['total_kill'];
    $tim = $_POST['tim'];
    $role = $_POST['role'];
    $gambar = $_FILES['gambar'];

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $gambar_name = $_FILES['gambar']['name'];
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $gambar_path = 'uploads/' . $gambar_name;

        if (move_uploaded_file($gambar_tmp, $gambar_path)) {
            $sql_select_old_image = "SELECT gambar FROM tugas WHERE id=?";
            $stmt_select = mysqli_prepare($koneksi, $sql_select_old_image);
            mysqli_stmt_bind_param($stmt_select, "i", $id);
            mysqli_stmt_execute($stmt_select);
            $result = mysqli_stmt_get_result($stmt_select);

            if ($row = mysqli_fetch_assoc($result)) {
                $old_image_path = $row['gambar'];
                if ($old_image_path && file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }

            $sql = "UPDATE tugas SET `nama`=?, `total_kill`=?, `tim`=?, `role`=?, `gambar`=? WHERE `id`=?";
            $stmt_update = mysqli_prepare($koneksi, $sql);
            mysqli_stmt_bind_param($stmt_update, "sssssi", $nama, $total_kill, $tim, $role, $gambar_path, $id);

            if (mysqli_stmt_execute($stmt_update)) {
                echo "Data berhasil diubah";
                header("location: index.php");
                exit();
            } else {
                echo "Error updating data: " . mysqli_error($koneksi);
            }
            
        } else {
            echo "Gagal mengunggah gambar.";
        }
    } else {
        $sql = "UPDATE tugas SET nama=?, total_kill=?, tim=?, role=? WHERE id=?";
        $stmt = mysqli_prepare($koneksi, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi", $nama, $total_kill, $tim, $role, $id);

        if (mysqli_stmt_execute($stmt)) {
            header("location: index.php");
            exit();
        } else {
            echo "Error updating data: " . mysqli_error($koneksi);
        }
    }
}
?>
