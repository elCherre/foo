<?php
if(isset($_POST["lel"]))
{
    $query = "INSERT INTO user ('user_id', 'name', 'surname', 'log') VALUES ('', '', '', '')";
    echo "<div class='alert alert-success'>
            <strong>Yeah Mr. White! </strong><p>Yes Science!</p>
        </div>";
}
else
{
    echo "<div class='alert alert-danger'>
            <strong>Error: </strong><p>This is not science Mr. White! :c</p>
        </div>";
}
?>