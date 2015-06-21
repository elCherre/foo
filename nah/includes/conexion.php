<?php
include "config.php";
try
{
    $conexion = new PDO("mysql:host=localhost;dbname=lel_db",$conusr,$conpass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}
?>