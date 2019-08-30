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
        $no_identitas = trim(mysqli_real_escape_string($koneksi, $_POST['no_identitas']));
        $nama_pasien = trim(mysqli_real_escape_string($koneksi, $_POST['nama_pasien']));
        $jk = trim(mysqli_real_escape_string($koneksi, $_POST['jk']));
        $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['alamat']));
        $telepon = trim(mysqli_real_escape_string($koneksi, $_POST['telepon']));
        $cek_no_identitas = mysqli_query($koneksi, "SELECT * FROM tb_pasien WHERE no_identitas = '$no_identitas'")or die (mysqli_error($cek_no_identitas));
        if (mysqli_num_rows($cek_no_identitas) > 0) {
            "<script>alert('No identitas sudah dipakai !'); window.location='add.php';</script>";
        }else{
    	$insert = mysqli_query($koneksi, "INSERT INTO tb_pasien (id_pasien, no_identitas,nama_pasien,jns_kelamin,alamat,no_telp) VALUES ('$uuid4','$no_identitas','$nama_pasien','$jk','$alamat','$telepon')") or die(mysqli_error($insert));
        // echo "<script>window.location='data.php';</script>";
        }
    }elseif (isset($_POST['edit'])) {
    	$id = $_POST['id'];
    	$no_identitas = trim(mysqli_real_escape_string($koneksi, $_POST['no_identitas']));
        $nama_pasien = trim(mysqli_real_escape_string($koneksi, $_POST['nama_pasien']));
        $jk = trim(mysqli_real_escape_string($koneksi, $_POST['jk']));
        $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['alamat']));
        $telepon = trim(mysqli_real_escape_string($koneksi, $_POST['telepon']));
        $cek_no_identitas = mysqli_query($koneksi, "SELECT * FROM tb_pasien WHERE no_identitas = '$no_identitas' AND id_pasien != '$id'")or die (mysqli_error($cek_no_identitas));
        if (mysqli_num_rows($cek_no_identitas) > 0) {
            "<script>alert('No identitas sudah dipakai !'); window.location='edit.php?id=$id';</script>";
        }else{
    	$update = mysqli_query($koneksi, "UPDATE tb_pasien SET no_identitas = '$no_identitas', nama_pasien = '$nama_pasien', jns_kelamin = '$jk', alamat = '$alamat', no_telp = '$telepon' WHERE id_pasien = '$id'") or die(mysqli_error($update));
        // echo "<script>window.location='data.php';</script>";
        }
    }

?>
