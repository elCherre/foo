<?php
require_once "lang/en.php";
require_once "function.php";

// $_SERVER["REQUEST_METHOD"] == "POST" #validate if post method was used
if(empty($_POST["rName"]) or empty($_POST["rType"]) or empty($_POST["rTime"]) or empty($_POST["rURL"]) # check if vars are empty
or !validateDate($_POST["rTime"], "Y-m-d H:i:s") # check if date is correct with personal function
or !ctype_digit($_POST["rType"]) or (($_POST["rType"] < 1) or ($_POST["rType"] > 2))) # check if type is INT and if is 1 or 2
{
    die(json_encode(array("message" => $printLang["db-error-null"], "isError" => "yes")));
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

    $rName = safeInput($_POST["rName"]); # making text safer quitting special characters
    $rType = $_POST["rType"];
    $rTime = $_POST["rTime"];
    $rShift = date("A", strtotime($_POST["rTime"])); # generating value for shift (AM or PM)
    $rURL = $_POST["rURL"];

    $sql -> execute();
    
    echo json_encode(array("message" => $printLang["db-save"], "isError" => "no"));
}
catch(PDOException $e)
{
    echo json_encode(array("message" => $printLang["db-error-save"], "isError" => "yes")); # replace this on production
    //echo $printLang["db-error-save"] ." - ". $e -> getMessage();
}

    $dbconnect = null; # cerrar conexion
?>