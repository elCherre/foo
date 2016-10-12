<?php
$dbserver = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "speedtest";

try
{
    $dbconnect = new PDO("mysql: host = ".$dbserver."; dbname = ".$dbname."", $dbusername, $dbpassword);
    $dbconnect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
    echo "ERROR: Conexi&oacute;n a BD - ". $e -> getMessage();
}
    //$conn = null; // Cerrar conexión
?>