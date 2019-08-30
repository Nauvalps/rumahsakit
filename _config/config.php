<?php
//setting waktu
date_default_timezone_set('Asia/Jakarta');
session_start();
include_once "conn.php";

$koneksi = mysqli_connect($con['host'],$con['user'],$con['pass'],$con['db']);
if (mysqli_connect_errno()) {
	//mengecek koneksi database
	echo mysqli_connect_error();
}

function base_url($url=null){
	//fungsi base_rul
	$base_url = "http://localhost/rumahsakit";
	if ($url != null) {
		return $base_url."/".$url;
	}else{
		return $base_url;
	}
}

function tgl_indo($tgl){
	$tanggal = substr($tgl, 8, 2);
	$bulan = substr($tgl, 5, 2);
	$thn = substr($tgl, 0, 4);
	return $tanggal."/".$bulan."/".$thn;
}
?>