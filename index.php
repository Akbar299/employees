<?php
include_once(__DIR__."/lib/EmployeesPilihan.php");
include_once(__DIR__."/lib/DataFormat.php");
header("Access-Control-Allow-Origin:*");

$employeepilihan = new EmployeesPilihan();
$employeepilihan->setValue('01','Akbar','Rinaldy', 'akbar@mail.com', '085839206189', '2019-10-03', '01', '100000','2','02','03');

$result=$employeepilihan->create(); 

//fungsi delete data
// $result=$employeepilihan->delete();

$format= new DataFormat();
// print_r($result);
echo $format->asJSON($result);

// $data=$mkpilihan->getAll();