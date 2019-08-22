<?php
include_once('../_config/config.php');
// include_once('edit.php');
require '../_config/libs/vendor/autoload.php';
require '../_config/libs/vendor/moontoast/math/src/Moontoast/Math/BigNumber.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

   // Generate a version 4 (random) UUID object
    
    if (isset($_POST['add'])) {

    	$uuid4 = Uuid::uuid4()->toString();
    	$nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    	$ket = trim(mysqli_real_escape_string($koneksi, $_POST['ket']));
    	$insert = mysqli_query($koneksi, "INSERT INTO tb_obat (id_obat, nama_obat,ket_obat) VALUES ('$uuid4','$nama','$ket')") or die(mysqli_error($insert));
    	// echo "<script>window.location='data.php';</script>";
    }elseif (isset($_POST['edit'])) {
    	$id = $_POST['id'];
    	$nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    	$ket = trim(mysqli_real_escape_string($koneksi, $_POST['ket']));
    	$insert = mysqli_query($koneksi, "UPDATE tb_obat SET nama_obat = '$nama', ket_obat = '$ket' WHERE id_obat = '$id'") or die(mysqli_error($insert));
    	// echo "<script>window.location='data.php';</script>";
    }

?>
