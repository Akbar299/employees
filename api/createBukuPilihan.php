<?php
include_once(__DIR__."/lib/BukuPilihan.php");
include_once(__DIR__."/lib/DataFormat.php");
header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$bukupilihan = new BukuPilihan();
$bukupilihan->setValue($_POST['kode_kategori'],$_POST['genre'],$_POST['judul'],$_POST['penulis'],$_POST['deksripsi'],$_POST['penerbit'],$_POST['halaman'],$_POST['harga']);
$result = $bukupilihan->create();
$format= new DataFormat();
echo $format->asJSON($result);