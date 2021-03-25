<?php

	session_start();
	if(isset($_SESSION['login']) ){
		header('location: index.php?topic=');
	}

?>
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
<!-- end header  -->

    <!-- start login form -->
        <form action="inscri_insert.php" method="POST" class="login-form">
            <div>
                <label>Username</label>
                <input type="text" name="username_insci" class="text-input">
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email_inscri" class="text-input">
            </div>
            <div>
                <label>Passwrod</label>
                <input type="password" name="password_inscri" class="text-input">
            </div>
            <div>
                <label>Confirm Passwrod</label>
                <input type="password" name="password_confirm" class="text-input">
            </div>
            <div>
                <button type="submit" name="login-btn" class="login-btn">Sign up</button>
            </div>
            <p>Or <a href="login.php" >Login</a></p>


        </form>
    <!-- end login form -->



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





