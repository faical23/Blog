<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
	<title>BLOG</title>
	<!-- Always force latest IE rendering engine or request Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<!-- meta character set -->
	<meta charset="UTF-8" />
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Meta Description, Keywords and Author -->
	<meta name="Keywords" content="">
	<meta name="author" content="">
	<meta name="Description" content="">

	<!-- Stylesheet
	================================================== -->
	<link rel="stylesheet" href="./assets/css/style.css">
	
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


	<!--fav icon-->
	<link rel="shortcut icon" href="assets/img/fav-icons/fav-icon.png" type="image/x-icon">


	<!----------------------->


</head>

<body>

	

<!--Start nav-bar-->
    <?php include "include/navbar.php"?><!-- include navbar from navbar.php -->
<!-- end header  -->

<div class="page-wrapper">
<div class="container">
<div class="content clearfix">

<!-- Main Content Wrapper -->
<div class="main-content-wrapper">
  <div class="main-content single">
      <div class="container">

    <?php
    
      // $article_id = $_GET["id"];
      // $sql_requet = "DELETE FROM article WHERE id ='" . $_GET["id"] . "'";

      // require "assets/php/database/connect.php";

      // $sql_requet = mysqli_query($connection_DB,"DELETE * FROM article WHERE id ='" . $_GET["id"] . "'");

      // $row = mysqli_fetch_array($sql_requet);	
      // $titre_article = $row["titre"];
      // $pic_article = $row["pics"];
      // $text_article = $row["text"];

      $sql_requet = mysqli_query($connection_DB,"SELECT * FROM article WHERE id ='" . $_GET["id"] . "'");

      $row = mysqli_fetch_array($sql_requet);	
      $titre_article = $row["titre"];
      $pic_article = $row["pics"];
      $text_article = $row["text_article"];


    
    ?>
    <h1 class="post-title"><?php  echo   $titre_article ?></h1>
    <img src="<?php  echo  $pic_article  ?>"  class="post-img" alt="">

    <div class="post-content">
    <p>
      <?php
        echo $text_article;
      
      ?>
    </p>

  </div>
</div>
<!-- // Main Content -->
</div>
</div>
<!-- Content -->

</div>
</div>



<!-- start footer -->
    <?php include "include/footer.php"?>   <!-- include footer from footer.php -->
<!-- end footer

		<!-- Plugins
	================================================== -->
	<!-- jQuery -->
	<script src="./assets/js/jquery-3.5.1.min.js"></script>
	<!-- Popper Js -->
	<script src="./assets/js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="./assets/js/bootstrap.min.js"></script>

	<!-- Application -->
	<script src="./assets/js/main.js"></script>


	
</body>



</html>
