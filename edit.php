<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tugas WHERE id='$id'";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <link rel="stylesheet" type="text/css" href="edit.css">
</head>
<body>
    <h1>Edit Data Player</h1>
    <form method="post" action="proses_edit.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?php echo $row['nama']; ?>"><br><br>
        <label>total_kill:</label>
        <input type="text" name="total_kill" value="<?php echo $row['total_kill']; ?>"><br><br>
        <label>Tim:</label>
        <input type="text" name="tim" value="<?php echo $row['tim']; ?>"><br><br>
        <label>Role:</label>
        <input type="text" name="role" value="<?php echo $row['role']; ?>"><br><br>
        <label>Gambar Player:</label>
        <input type="file" name="gambar"><br><br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>
