<?php
if(isset($_POST["btninsusrdata"]) && isset($_POST["name"]) && isset($_POST["surname"]))
{
    include "nah/includes/conexion.php";
    
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    
    try
    {
        $stmt = $conexion->prepare("INSERT INTO user (name, surname)
        VALUES (:name, :surname)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);

        $stmt->execute();

        echo "<div class='alert alert-success'>
                <strong>Yeah! </strong><p>Your data was saved successfully.</p>
            </div>";
    }
    catch(PDOException $e)
    {
        echo "<div class='alert alert-danger'>
                <strong>Error: </strong><p>An unknow server error...</p><p>".$e."</p>
            </div>";
    }
}
else
{
    echo "<div class='alert alert-danger'>
            <strong>Error: </strong><p>There is not data received to work.</p>
        </div>";
}
?>