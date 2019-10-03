<?php
include_once(__DIR__."/../lib/EmployeesPilihan.php");
include_once(__DIR__."/../lib/DataFormat.php");
header('Access-Control-Allow-Origin:*');
$employeepilihan = new EmployeesPilihan();
if(isset($_GET['employee_id'])){
    $data=$bukupilihan->getEmployeesPilihan($_GET['employee_id']);
} else {
    $data=$employeepilihan->getAll();
}
$format=new DataFormat();

if($_GET['view']=='xml'){
    header('Content-Type: application/xml; charset=utf-8');
    echo $format->asXML($data,'MKPilihan');
} else if ($_GET['view']=='json'){
    header('Content-Type: application/json');
    echo $format->asJSON($data);
} else {
    echo $format->asTable($data);
}