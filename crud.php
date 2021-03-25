<?php

require "assets/php/database/connect.php";


/// add article

if(isset($_POST["add_valide"]))
{
    $titre = $_POST["add_titre"];
    $topic = $_POST["add_topic"];
    $article = str_replace("'", "\\'", $_POST["add_article"]);
	$picture = "assets/img/post-img/".$_FILES["image"]["name"];
    
    
    // echo $titre . "</br>";
    // echo $article . "</br>";
    // echo $picture . "</br>";
    // echo $topic . "</br>";


    $sql_requet = "INSERT INTO article (titre,pics,text_article,topic) VALUES ('$titre','$picture','$article','$topic')";

    if (mysqli_query($connection_DB, $sql_requet)) {

        echo "add sucssefly";
        header('Location:dashboard.php');  

    }
    else{
        echo "is not add ";
    }
}

/// update article

if(isset($_POST["add_update"]))
{
    $titre = $_POST["add_titre"] ."</br>";
    $topic = $_POST["add_topic"] ."</br>";
    $article =  str_replace("'", "\\'", $_POST["add_article"]);
	$picture = "assets/img/post-img/".$_FILES["image"]["name"];
    $id_article = $_GET["id"];

    // echo $topic . "<br/>";
    // echo $titre . "<br/>";
    // echo $article . "<br/>";
    // echo $picture . "<br/>";
    // echo $id_article . "<br/>";


    $sql_requet = "UPDATE article SET titre = '$titre' , text_article = '$article' , pics = '$picture'  , topic = '$topic' WHERE id ='$id_article'  ";

    if (mysqli_query($connection_DB, $sql_requet)) {

        // echo " update sucssefly";
        header('Location:dashboard.php');  

    }
    else{
        echo " its not update ";
    }
}



?>