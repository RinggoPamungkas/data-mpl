<?php
// Import koneksi ke database
require_once 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM tugas WHERE id='$id'";

    if (mysqli_query($koneksi, $sql)) {
        header("location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}
?>
