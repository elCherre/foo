<?php
if(isset($_POST["btninsusrdata"]) && isset($_POST["name"]) && isset($_POST["surname"]))
{
    include "../pdo-conexion.php";
    
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    
    try
    {
        $stmt = $conexion->prepare("INSERT INTO user (name, surname)
        VALUES (:name, :surname)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);

        $stmt->execute();

        echo "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert'>×</button>
                <p><strong>Yeah! </strong><br>Your data was saved successfully.</p>
            </div>";
    }
    catch(PDOException $e)
    {
        echo "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert'>×</button>
                <p><strong>Error: </strong><br>An unknow server error...</p><p>".$e."</p>
            </div>";
    }
}
else
{
    echo "<div class='alert alert-danger alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>×</button>
            <p><strong>Error: </strong><br>There is not data received to work.</p>
        </div>";
}
?>