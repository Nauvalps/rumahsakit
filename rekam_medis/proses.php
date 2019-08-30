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
        $pasien = trim(mysqli_real_escape_string($koneksi, $_POST['pasien']));
        $keluhan = trim(mysqli_real_escape_string($koneksi, $_POST['keluhan']));
        $dokter = trim(mysqli_real_escape_string($koneksi, $_POST['dokter']));
        $diagnosa = trim(mysqli_real_escape_string($koneksi, $_POST['diagnosa']));
        $poli = trim(mysqli_real_escape_string($koneksi, $_POST['poli']));
        $tgl = trim(mysqli_real_escape_string($koneksi, $_POST['tgl']));
        // $obat = $_POST('obat');
    	$insert = mysqli_query($koneksi, "INSERT INTO tb_rekammedis (id_rm,id_pasien,keluhan,id_dokter,diagnosa,id_poli,tgl_periksa) VALUES 
        ('$uuid4','$pasien','$keluhan','$dokter','$diagnosa','$poli','$tgl')") or die(mysqli_error($insert));
        $obat = $_POST['obat'];
        foreach ($obat as $dataobat) {
            mysqli_query($koneksi, "INSERT INTO tb_rm_obat (id_rm,id_obat) VALUES ('$uuid4','$dataobat')") or die (mysqli_error($koneksi));
        }
        echo "<script>window.location='data.php';</script>";
    }
?>
