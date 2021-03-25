<?php

require "assets/php/database/connect.php";

    /* delete data */

    $sql_requet = "DELETE FROM user WHERE id ='" . $_GET["id"] . "'";
    if(mysqli_query($connection_DB,$sql_requet))
    {
        $sql_requet = "DELETE FROM position WHERE id ='" . $_GET["id"] . "'";
        if(mysqli_query($connection_DB,$sql_requet)){
            // echo "succesfly delete";
            header('Location: dashboard.php');
        }

    }
    else{
        echo "errorrrrrrrr";
    }
    

?>