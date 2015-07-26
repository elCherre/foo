<?php
if($currentlang == "es")
{
    include "assets/includes/lang/".$currentlang.".php";
}
elseif($currentlang == "en")
{
    include "assets/includes/lang/".$currentlang.".php";
}
else
{
    include "assets/includes/lang/es.php";
    //echo "buzo";
}
?>