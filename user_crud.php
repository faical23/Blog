<?php

    require "assets/php/database/connect.php";

if(isset($_POST["update"]))
{
    $user_id = $_POST["id"];
    $username = $_POST["user_name"];
    $position = $_POST["user_posiiton"];

    echo $username ."<br/>";
    echo $position ."<br/>";
    echo $user_id ."<br/>";
    
    $sql_requet = "UPDATE user SET username = '$username'   WHERE id =$user_id ";
        if(mysqli_query($connection_DB,$sql_requet))
        {
            echo "update nice ";
            // $_SESSION['update_succesfly'] = "update_succesfly";
            header('Location: dashboard.php');
        }
        else{
            echo "mkhdamach";
        }
 
}



?>