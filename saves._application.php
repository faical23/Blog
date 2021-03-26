<?php

	require "assets/php/database/connect.php";

    $article_id = $_GET["id"];

    $sql_requet = "UPDATE article SET saves = 'save' WHERE id = '$article_id'";

    if(mysqli_query($connection_DB,$sql_requet))
    {
        echo "update succese";
        header('location: index.php?topic=');
    }
    else{
        "not update";
    }
?>