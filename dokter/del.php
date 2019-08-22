<?php
require_once "../_config/config.php";
$chk = $_POST['checked'];
if (!isset($chk)) {
    echo "<script>alert('tidak ada data yg dipilih !'); window.location='data.php';</script>";
}else{
    foreach ($chk as $id) {
        $querydelete = "DELETE FROM tb_dokter WHERE id_dokter = '$id'";
        $sql = mysqli_query($koneksi, $querydelete) or die(mysqli_error($sql));
    }
    if($sql){
        echo "<script>alert('".count($chk)." data berhasil dihapus'); window.location='data.php';</script>";	
    }else{
    		echo "<script>alert('gagal hapus data coba lagi !'); </script>";
    }
}
?>