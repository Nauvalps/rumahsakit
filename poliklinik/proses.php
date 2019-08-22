<?php
include_once('../_config/config.php');
// include_once('edit.php');
require '../_config/libs/vendor/autoload.php';
require '../_config/libs/vendor/moontoast/math/src/Moontoast/Math/BigNumber.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

   // Generate a version 4 (random) UUID object
    
    if (isset($_POST['add'])) {
    	$total = $_POST['total'];	
    	for ($i=1; $i <=$total ; $i++) { 
    		$uuid4 = Uuid::uuid4()->toString();
    		$nama = trim(mysqli_escape_string($koneksi, $_POST['nama-'.$i]));
    		$gedung = trim(mysqli_escape_string($koneksi, $_POST['gedung-'.$i]));
    		$insert = mysqli_query($koneksi, "INSERT INTO tb_poli (id_poli, nama_poli,gedung) VALUES ('$uuid4','$nama','$gedung')") or die(mysqli_error($insert));
    	}
    	if ($insert) {
    		echo "<script>alert('".$total." data berhasil ditambahkan'); window.location='data.php';</script>";	
    	}else{
    		echo "<script>alert('gagal tambah data coba lagi !'); window.location='generate.php';</script>";
    	}
    }elseif (isset($_POST['edit'])) {
    	for ($i=0; $i <count($_POST['id']); $i++) {
			$id = $_POST['id'][$i]; 
    		$nama = $_POST['nama'][$i];
			$gedung = $_POST['gedung'][$i];
			$update = mysqli_query($koneksi, "UPDATE tb_poli SET nama_poli = '$nama', gedung = '$gedung' WHERE id_poli = '$id'") or die(mysqli_error($update));
		}
		echo "<script>alert('data berhasil diedit'); window.location='data.php';</script>";
    }

?>
