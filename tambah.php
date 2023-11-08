<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Tim Esport MLBB</title>
    <link rel="stylesheet" type="text/css" href="tambah.css">
</head>
<body>
    <h1>Tambah Data Tim Esport MLBB</h1>
    <form method="post" action="proses_tambah.php" enctype="multipart/form-data"> <!-- Tambahkan atribut enctype untuk pengunggahan berkas -->
        <label>Nama Player :</label>
        <input type="text" name="nama"><br><br>
        <label>Total Kill :</label>
        <input type="text" name="total_kill"><br><br>
        <label>Nama Tim :</label>
        <input type="text" name="tim"><br><br>
        <label>Role Player :</label>
        <input type="text" name="role"><br><br>
        <label>Gambar Player:</label> <!-- Tambahkan label untuk gambar -->
        <input type="file" name="gambar"> <!-- Tambahkan input file untuk mengunggah gambar -->
        <br><br>
        <input type="submit" value="Tambah">
    </form>
    <br>
    <a href="index.php">Kembali</a>
</body>
</html>
