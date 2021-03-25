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
        <form action="" method="POST" class="login-form">
            <div>
                <label>Email</label>
                <input type="text" name="email" class="text-input">
            </div>
            <div>
                <label>Passwrod</label>
                <input type="password" name="password_login" class="text-input">
            </div>
            <div>
                <button type="submit" name="login-btn" class="login-btn">Login</button>
            </div>
            <p>Or <a href="inscription.php" >Sign Up</a></p>


        </form>
    <!-- end login form -->

	<?php		

	require "assets/php/database/connect.php";

		if(isset($_POST["login-btn"])){

			$email = $_POST["email"] ;
			$password = $_POST["password_login"];

			echo $email ."<br/>";
			echo $password ."<br/>";
			$sql_requet = mysqli_query($connection_DB,"SELECT * FROM  position WHERE email='$email' AND password = '$password' ");
						
											
            if (mysqli_num_rows($sql_requet) ==  1) {

				echo "i find one <br/>";
				foreach($sql_requet as $value){

					$position_user = $value["role"];
					$id_user = $value["id"];

				}
				echo $position_user . "<br/>";
				echo $id_user . "<br/>";
				$sql_requet_posiiton = mysqli_query($connection_DB,"SELECT * FROM  $position_user WHERE id = '$id_user'");

				if(mysqli_num_rows($sql_requet_posiiton ) ==  1 )
				{
					$row = mysqli_fetch_array($sql_requet_posiiton);

					$_SESSION["id"] = $id_user;

					$_SESSION["login"] = "user";
					
					switch ($position_user) {
						case "admin":
							header('location: dashboard.php');
							$_SESSION["login"] = "admin";
							break;
						case "user":
							header('location: index.php?topic=');
							// $_SESSION["user"] = "user";
							break;

					}

					// if($position_user == "admin")
					// {
					// 	header('location: dashboard.php');
					// 	$_SESSION["admin"] = "admin";
					// }
					// elseif($position_user == "user"){
					// 	header('location: index.php?topic=');
					// 	$_SESSION["user"] = "user";
					// }

					
					echo "name is :" . $row["username"] . " from table " . $position_user;

				}
			}
			else{
				echo "i not fin any one";
			}



		}
	
	?>



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
