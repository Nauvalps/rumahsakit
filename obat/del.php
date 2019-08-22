<?php
include_once('../_config/config.php');
$id = $_GET['id'];

$hapus = mysqli_query($koneksi, "DELETE FROM tb_obat WHERE id_obat = '$id'") or die(mysqli_error($hapus));
// echo "<script>window.location='data.php';</script>";
?>