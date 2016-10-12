<?php
require_once "lang/es.php";

if(empty($_POST["rName"]) or empty($_POST["rType"]) or empty($_POST["rTime"]) or empty($_POST["rURL"]))
{
    die($printLang["db-error-null"]);
}

require_once "connect.php";

try
{
    $sql = $dbconnect -> prepare("INSERT INTO speedtest.report (idReport, name, type, time, shift, url) VALUES (null, :name, :type, :time, :shift, :url)");

    $sql -> bindParam(':name', $rName);
    $sql -> bindParam(':type', $rType);
    $sql -> bindParam(':time', $rTime);
    $sql -> bindParam(':shift', $rShift);
    $sql -> bindParam(':url', $rURL);

    $rName = $_POST["rName"];
    $rType = $_POST["rType"];
    $rTime = $_POST["rTime"];
    $rShift = date("A", strtotime($_POST["rTime"]));
    $rURL = $_POST["rURL"];

    $sql -> execute();

    echo $printLang["db-save"];
}
catch(PDOException $e)
{
    echo $printLang["db-error-save"] ." - ". $e -> getMessage();
}

    $dbconnect = null; // cerrar conexion
?>