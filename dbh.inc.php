<?php


// $dbServerName = "localhost";
// $dbUserName = "lattedev_list-a";
// $dbPassword = "2epOrRrPEvXHjYG6";
// $dbName = "lattedev_list-a";
//
// $pdo_dsn='mysql:dbname=lattedev_list-a;host=localhost'; $pdo_user='lattedev_list-a'; $pdo_password='2epOrRrPEvXHjYG6';




// Datos de acceso local

$dbServerName = "localhost";
$dbUserName = "multiviahr_admin";
$dbPassword = "ERh[lZeL6UGR";
$dbName = "multiviahr_suscriptions";

$pdo_dsn='mysql:dbname=multiviahr_suscriptions;host=localhost'; $pdo_user='multiviahr_admin'; $pdo_password='ERh[lZeL6UGR';




// user = list-a_master
// pass = 2epOrRrPEvXHjYG6
$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);
$conn2 = new PDO($pdo_dsn, $pdo_user, $pdo_password);
$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
