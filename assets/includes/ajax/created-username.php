<?php
if(isset($_POST["newusername"]))
{
    include "../iconexion.php";
    
    $newusername = $_POST["newusername"];
    
    $stmt = $mysqli->query("SELECT username FROM user WHERE username = '$newusername'");
    if ($stmt->num_rows > 0) 
    {
        echo "<small class='text-danger nope-notice'><i class='fa fa-exclamation-triangle'></i> This username already exist</small>";
    }
    else
    {
        echo "<small class='text-success yeah-notice'><i class='fa fa-check'></i> Good username!</small>";
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