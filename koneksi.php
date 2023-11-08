<?php
$koneksi = mysqli_connect("localhost", "username", "password", "player");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
