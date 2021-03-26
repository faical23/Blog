<?php
		session_start();

		require "assets/php/database/connect.php";

		$userName = $_POST["username_insci"];
		$userEmail = $_POST["email_inscri"];
		$userPassword = $_POST["password_inscri"];
		$hash_password = password_hash($userPassword  , PASSWORD_DEFAULT);
		$userConfirmPawwsord = $_POST["password_confirm"];


		$regix_name = '/^[a-zA-Z ]+$/';
        $regix_email = '/^[^ ]+@[^ ]+\.[a-z]{2,3}$/';
        $regix_password = '/^[A-Za-z0-9]\w{5,}$/';


		if(isset($_POST["submit_inscri"]))
		{
            if (!empty($userName) && !empty($userEmail) && !empty($userPassword) && !empty($userConfirmPawwsord)) {


                if (preg_match($regix_name, $userName) && preg_match($regix_email, $userEmail) && preg_match($regix_password, $userPassword)&& preg_match($regix_password, $userConfirmPawwsord)) {


					$sql_requet = "INSERT INTO user (username,email,password) VALUES ('$userName','$userEmail','$hash_password')";

					if(mysqli_query($connection_DB,$sql_requet))
					{
						echo "inscription successfly";
						$last_id = mysqli_insert_id($connection_DB);
                        echo "insert work </br>" ;
                        echo "id = " . $last_id ;
                        $sql_requet = "INSERT INTO position (id,email,password,role) VALUES ('$last_id','$userEmail','$hash_password','user')";
                        mysqli_query($connection_DB,$sql_requet);
                        header('Location: ./index.php?topic=');  
						$_SESSION["id"] = $last_id;
						$_SESSION["login"] = "user";
					}
					else{
						echo "error in inscription";
					}

                }
				else{
					echo "regix incorrect";
				}


            }
			else{
				echo "khulshu khawi";
			}
		}

	
	?>
