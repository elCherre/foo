<?php
if($currentlang == "es")
{
    include "nah/includes/lang/".$currentlang.".php";
}
elseif($currentlang == "en")
{
    include "nah/includes/lang/".$currentlang.".php";
}
else
{
    include "nah/includes/lang/es.php";
    //echo "buzo";
}
?>