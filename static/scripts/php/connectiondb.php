<?php
$serverName = "HP-PROBOOK\BEOFALEJANDROSQL"; //serverName\instanceName
$connectionInfo = array( "Database"=>"AsesoriasAcademicas", "UID"=>"sa", "PWD"=>"123456");
$conn = sqlsrv_connect($serverName, $connectionInfo);

if($conn === false) {
     die(print_r(sqlsrv_errors(), true));
 }
?>