<?php
include_once 'koneksi.php';

$db = new Database();
$id = $_GET['id'];

function is_select($value, $selected) {
    return $value === $selected ? 'selected' : '';
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $file_gambar = $_FILES['file_gambar'];
    $gambar = null;

    if (empty($nama) || empty($kategori) || empty($harga_jual) || empty($harga_beli) || empty($stok)) {
        echo "Semua field harus diisi!";
        exit;
    }

    if ($file_gambar['error'] == 0) {
        $filename = str_replace(' ', '_', $file_gambar['name']);
        $destination = dirname(__FILE__) . '/gambar/' . $filename;
        if (move_uploaded_file($file_gambar['tmp_name'], $destination)) {
            $gambar = $filename;
        } else {
            echo "Gagal mengupload gambar.";
            exit;
        }
    }

    $sql = "UPDATE data_barang SET 
            nama=?, kategori=?, harga_jual=?, 
            harga_beli=?, stok=?";
    
    if ($gambar) {
        $sql .= ", gambar=?";
    }
    
    $sql .= " WHERE id_barang=?";
    
    $stmt = $db->conn->prepare($sql);
    
    if ($gambar) {
        $stmt->bind_param("ssddssi", $nama, $kategori, $harga_jual, $harga_beli, $stok, $gambar, $id);
    } else {
        $stmt->bind_param("ssddsi", $nama, $kategori, $harga_jual, $harga_beli, $stok, $id);
    }

    if ($stmt->execute()) {
        header('location: index.php');
    } else {
        echo "Error: " . $stmt->error;
    }
}

$sql = "SELECT * FROM data_barang WHERE id_barang=?";
$stmt = $db->conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/app.css">
    <title>Ubah Barang</title>
</head>

<body>

    <?php require('header.php'); ?>
    <?php require('home.php'); ?>
    <div class="container">
        <h1>Ubah Barang</h1>
        <div class="main">
            <form method="post" action="ubah.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
                <div class="input">
                    <label>Nama Barang</label>
                    <input type="text" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>" required />
                </div>
                <div class="input">
                    <label>Kategori</label>
                    <select name="kategori" required>
                        <option <?php echo is_select('Komputer', $data['kategori']); ?> value="Komputer">Komputer</option>
                        <option <?php echo is_select('Elektronik', $data['kategori']); ?> value="Elektronik">Elektronik</option>
                        <option <?php echo is_select('Hand Phone', $data['kategori']); ?> value="Hand Phone">Hand Phone</option>
                    </select>
                </div>
                <div class="input">
                    <label>Harga Jual</label>
                    <input type="number" name="harga_jual" value="<?php echo htmlspecialchars($data['harga_jual']); ?>" required />
                </div>
                <div class="input">
                    <label>Harga Beli</label>
                    <input type="number" name="harga_beli" value="<?php echo htmlspecialchars($data['harga_beli']); ?>" required />
                </div>
                <div class="input">
                    <label>Stok</label>
                    <input type="number" name="stok" value="<?php echo htmlspecialchars($data['stok']); ?>" required />
                </div>
                <div class="input">
                    <label>Gambar</label>
                    <input type="file" name="file_gambar" />
                </div>
                <div class="input">
                    <button type="submit" name="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <?php require('footer.php'); ?>

</body>
</html>