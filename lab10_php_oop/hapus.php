<?php
include_once 'koneksi.php';

$db = new Database();
$id = $_GET['id'];
$sql = "DELETE FROM data_barang WHERE id_barang='$id'";
mysqli_query($db->conn, $sql);

header('location: index.php');
?>