<?php
$koneksi = mysqli_connect("localhost", "username", "password", "player");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Kill Player MPL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Data Kill Player MPL</h1>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Kill</th>
            <th>Tim</th>
            <th>Role</th>
            <th>Gambar</th> <!-- Tambahkan elemen <th> untuk kolom gambar -->
            <th>Aksi</th>
        </tr>
        <?php
        $sql = "SELECT * FROM tugas";
        $result = mysqli_query($koneksi, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['nama']."</td>";
            echo "<td>".$row['total_kill']."</td>";
            echo "<td>".$row['tim']."</td>";
            echo "<td>".$row['role']."</td>";
            echo "<td><img src='" . $row['gambar'] . "' alt='Gambar Player' width='100' height='100'></td>";
            echo "<td><a href='edit.php?id=".$row['id']."'>Edit</a> | <a href='delete.php?id=".$row['id']."'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <a href="tambah.php">Tambah Data</a>
</body>
</html>
