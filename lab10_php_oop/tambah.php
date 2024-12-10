<?php
include_once 'koneksi.php';

if (isset($_POST['submit'])) {
    $db = new Database();

    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $file_gambar = $_FILES['file_gambar'];
    $gambar = null;

    if ($file_gambar['error'] == 0) {
        $filename = str_replace(' ', '_', $file_gambar['name']);
        $destination = dirname(__FILE__) . '/gambar/' . $filename;

        if (move_uploaded_file($file_gambar['tmp_name'], $destination)) {
            $gambar = $filename;
        }
    }

    
    $sql = "INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stok, gambar) 
            VALUES ('$nama', '$kategori', '$harga_jual', '$harga_beli', '$stok', '$gambar')";
    mysqli_query($db->conn, $sql);

    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/app.css">
    <title>Tambah Barang</title>
</head>
<body>
    <?php require('header.php'); ?>
    <?php require('home.php'); ?>
    <div class="container">
        <h1>Tambah Barang</h1>
        <form method="post" action="tambah.php" enctype="multipart/form-data">
            <label>Nama Barang</label><input type="text" name="nama"><br>
            <label>Kategori</label>
            <select name="kategori">
                <option value="Komputer">Komputer</option>
                <option value="Elektronik">Elektronik</option>
                <option value="Hand Phone">Hand Phone</option>
            </select><br>
            <label>Harga Jual</label><input type="text" name="harga_jual"><br>
            <label>Harga Beli</label><input type="text" name="harga_beli"><br>
            <label>Stok</label><input type="text" name="stok"><br>
            <label>File Gambar</label><input type="file" name="file_gambar" required><br>
            <input type="submit" name="submit" value="Simpan">
        </form>
    </div>
    <?php require('footer.php'); ?>
</body>
</html>