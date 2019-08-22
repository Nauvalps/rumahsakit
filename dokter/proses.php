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
        $nama_dokter = trim(mysqli_real_escape_string($koneksi, $_POST['nama_dokter']));
        $spesialis = trim(mysqli_real_escape_string($koneksi, $_POST['spesialis']));
        $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['alamat']));
        $telepon = trim(mysqli_real_escape_string($koneksi, $_POST['telepon']));
    	$insert = mysqli_query($koneksi, "INSERT INTO tb_dokter (id_dokter, nama_dokter,spesialis,alamat,telp) VALUES ('$uuid4','$nama_dokter','$spesialis','$alamat','$telepon')") or die(mysqli_error($insert));
    	// echo "<script>window.location='data.php';</script>";
    }elseif (isset($_POST['edit'])) {
    	$id = $_POST['id'];
    	$nama_dokter = trim(mysqli_real_escape_string($koneksi, $_POST['nama_dokter']));
        $spesialis = trim(mysqli_real_escape_string($koneksi, $_POST['spesialis']));
        $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['alamat']));
        $telepon = trim(mysqli_real_escape_string($koneksi, $_POST['telepon']));
    	$update = mysqli_query($koneksi, "UPDATE tb_dokter SET nama_dokter = '$nama_dokter', spesialis = '$spesialis', alamat = '$alamat', telp = '$telepon' WHERE id_dokter = '$id'") or die(mysqli_error($update));
    	// echo "<script>window.location='data.php';</script>";
    }

?>
