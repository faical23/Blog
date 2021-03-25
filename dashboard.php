<?php

    session_start();

    if(!isset($_SESSION['login']) ){
		header('location: login.php');
	}
    if($_SESSION['login'] != "admin" ){
		header('location: index.php?topic=');
	}
    $table = $_SESSION["login"];
    $id = $_SESSION["id"];

	require "assets/php/database/connect.php";
    $sql_requet =  mysqli_query($connection_DB,"SELECT * FROM $table WHERE id = $id");

	$row = mysqli_fetch_array($sql_requet );
    $name_login = $row["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./assets/css/style.css">
    <title>Blog</title>
</head>
<body>

 

<header >
		  
          <nav class="navbar">
              <div class="container">
              <div >
                      <a href="index.php?topic=" class="brand">
                          <h2>FAICAL LOGO</h2>
                      </a>
                  </div>
              <div>
                      <ul class="nav-content ">

                          <li class="nav-item" >
                              <div class="btn-group">
                                  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <img class="login-icons" src="assets/img/icons/login.svg">
                                  <h3><?php echo $name_login  ?><h3>
                                  </button>
                                  <a href="#">
                                      <div class="dropdown-menu ">
                                      <a href="logout.php">
                                         <button class="dropdown-item" type="button">Logout</button>
                                      </a>
                                      <a href="dashboard.php">
                                         <button class="dropdown-item" type="button">Dashbord</button>
                                      </a>
  
                                      </div>
                                  </a>
                              </div>
                          </li>
                      </ul>
              </div>
  
  
  
  
      
                  
                  <div id="menu-icon-wrapper" class="menu-icon-wrapper" style="visibility: visible;;display: none;">
                      <svg width="1000px" height="1000px">
                          <path class="path1"
                              d="M 300 400 L 700 400 C 900 400 900 750 600 850 A 400 400 0 0 1 200 200 L 800 800">
                          </path>
                          <path class="path2" d="M 300 500 L 700 500"></path>
                          <path class="path3"
                              d="M 700 600 L 300 600 C 100 600 100 200 400 150 A 400 380 0 1 1 200 800 L 800 200">
                          </path>
                      </svg>
                      <button id="menu-icon-trigger" class="menu-icon-trigger"></button>
                  </div>
              </div>
          </nav>
      </header>


      <section class="dashboard">
            <div class="side_bar">
                <a href="#" onclick="dashboard_change('dashboard_on' , 'dashboard_of' )">
                    <div class="item_menu">Manage poste</div>
                </a">
                <a href="#"  onclick="dashboard_change( 'dashboard_of', 'dashboard_on'  )">
                    <div class="item_menu">Manage users</div>
                </a>
            </div>
            <div class="centent_dashboard" id="dashboard_on">
                <div class="manage_post">
                <h1>Manage post</h1>

                <button onclick="get_pop_up()">Add Post</button>

                <div class="table_post">
                <table cellspacing="0" cellpadding="0">
						<tr>
                            <th>AR</th>
                            <th>Titre</th>
                            <th>topic</th>
                            <th>Date</th>
                            <th>Action</th>
						</tr>

                        <?php
                                // require "assets/php/database/connect.php";

                                 $article = mysqli_query($connection_DB, "SELECT * FROM article ");	
                                    $i = 1;
                                  foreach ($article as $value) {
                                      
                                      ?>
                        <tr>
											</td>
											<td class="AR"><?php  echo $i ?></td>
											<td class="titre"><?php  echo $value["titre"] ?></td>
                                            <td class="auteur"> <?php  echo $value["topic"] ?> </td>
                                            <td class="date"><?php  echo $value["date"] ?></td>
                                            <?php 
                                             $titre_article = $value["titre"] ;
                                             $text_article = str_replace("'", "\\'", $value["text_article"]);


                                             $pic_article = $value["pics"] ;
                                             $id_ar = $value["id"]; 
                                            $topic_article = $value["topic"] 
                        
                                            

                                            ?>
											<td>
												<div class="icon_crud">
													<a href="single.php?id=<?php echo $value['id'] ?>">
														<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z"/></svg>
													</a>
													<a onclick="update_popup('<?php echo $id_ar ; ?>' ,'<?php echo $titre_article; ?>' , '<?php echo $pic_article; ?>' , '<?php echo $topic_article; ?>' , '<?php echo $text_article ; ?>' )">
														<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z"/></svg>
													</a>
													<a onclick="delete_popup(<?php echo $value['id'] ; ?> , 'delete.php')">
														<svg  xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/></svg>
													</a>
												</div>
											</td>
						</tr>
                        <?php
                        $i++;
                              }

                        ?>

                </table>
                </div>
                </div>


            </div>
            <div class="centent_dashboard" id="dashboard_of">
                <div class="manage_post">
                <h1>Manage Users</h1>

                <div class="table_post">
                <table cellspacing="0" cellpadding="0">
						<tr>
                            <th>SN</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Position</th>
                            <th>Action</th>
						</tr>

                        <?php

                                 $article = mysqli_query($connection_DB, "SELECT * FROM user ");	
                                    $i = 1;
                                  foreach ($article as $value) {
                                      
                                      ?>
                        <tr>
											</td>
											<td class="AR"><?php  echo $i ?></td>
											<td class="titre"><?php  echo $value["username"] ?></td>
                                            <td class="auteur"><?php  echo $value["email"] ?> </td>
                                            <td class="date">User</td>
                                            <?php 


                                            $user_id = $value["id"];
        
                                            ?>
											<td>
												<div class="icon_crud">
													<a onclick="user_pop_up('<?php echo $value['username']?>', <?php echo $user_id ?> , 'user' )">
														<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z"/></svg>
													</a>
													<a onclick="delete_popup(<?php echo $value['id'] ; ?> , 'delete_user.php')">
														<svg  xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/></svg>
													</a>
												</div>
											</td>
						</tr>
                        <?php
                        $i++;
                              }

                        ?>

                </table>
                </div>
                </div>


            </div>
      
      </section>




<section class="pop_up" id="pop_up_off" >
    <form action="crud.php?id=" method="POST" enctype="multipart/form-data" class="login-form" >
            <h2>Add post</h2>
            <div>
                <label>Titre</label>
                <input type="text" name="add_titre" class="text-input" id="zone_titre" >
            </div>
            <div>
                <label>Article</label>
                <textarea type="text" name="add_article" id="zone_text" class="text-input"></textarea>
            </div>
            <div>
                <label>topic</label>
                <input type="text" name="add_topic" id="zone_topic" class="text-input" vlaue="topic">
            </div>
            <div class="zone_img_upload">
                <input type="file" name="image" id="image" class="input_uploas_img" >
                <input onclick="upload_pic()"   type="button" value="upload" class="upload">
                <img class="img_upload" name="img_upload"  src="assets/img/post-img/cloud_upload.jpg" id="zone_pic">

            </div>
            <div class="btn_back_publish">
                <div id="valide_btn">
                    <input type="submit" name="add_valide" class="login-btn" value="Publish" >
                </div>
                <div  id="update_btn">
                    <input type="submit" name="add_update" class="login-btn" value="Update">
                </div>
                <div>
                    <input onclick="pop_up_out()" name="not_valide" class="login-btn" value="back" style="text-align: center;">
                </div>
            </div>


        </form>
</section>


<section class="pop_up_user" id="user_pop_up_of">
    
    <form action="user_crud.php" method="POST">
    <h2>Manage User</h2>
            <input type="text" name="id" id="user_id" hidden>
            <div>
                <label>username</label>
                <input type="text" name="user_name" class="user_name" id="user_name" >
            </div>
            <div>
                <label>Position</label>
                <input type="text" name="user_posiiton" class="user_posiition" id="user_position" >
            </div>

            <div class="btn_back_publish">
                <div>
                    <input type="submit" name="update" class="login-btn" value="Update">
                </div>
                <div>
                    <input  onclick="user_pop_up_out()" type="button" onclick="" name="not_valide" class="login-btn" value="back" style="text-align: center;">
                </div>
            </div>
    
    </form>

</section>





		<!-- Plugins
	================================================== -->
	<!-- jQuery -->
	<script src="./assets/js/jquery-3.5.1.min.js"></script>
	<!-- Popper Js -->
	<script src="./assets/js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="./assets/js/bootstrap.min.js"></script>

    <script src="node_modules/sweetalert/dist/sweetalert.min.js"></script>

	<!-- Application -->
	<script src="./assets/js/main.js"></script>

    <script>

let pop_up = document.querySelector("#pop_up_off");
let update_btn = document.querySelector("#update_btn");
let valide_btn_zone = document.querySelector("#valide_btn");



var get_pop_up = () =>{
    pop_up.id="pop_up_on";

    update_btn.style="display:none";
    valide_btn_zone.style="display:block";
}

var pop_up_out = () =>{
    pop_up.id="pop_up_off";

}

let pop_up_user = document.querySelector("#user_pop_up_of");

var user_pop_up = (user_name , id ,user_position) =>{
    let user_name_input = document.querySelector("#user_name");
    let user_position_input = document.querySelector("#user_position");
    let user_id = document.querySelector("#user_id");
    

    pop_up_user.id="user_pop_up_on";

    user_name_input.value = user_name
    user_position_input.value = user_position
    user_id.value = id;
    console.log(user_name);
    console.log(user_position);
    console.log(id);
}
var user_pop_up_out = () =>{
    pop_up_user.id="user_pop_up_of";
}

var update_popup = (id,titre ,path_pic ,topic_article, text) =>{

    valide_btn_zone.style="display:none";
    update_btn.style="display:block";



    pop_up.id="pop_up_on";

    let form = document.querySelector("form");
    let zone_titre = document.querySelector("#zone_titre");
    let zone_text = document.querySelector("#zone_text");
    let zone_pic = document.querySelector("#zone_pic");
    let image = document.getElementById("image").files[0];

    let zone_topic = document.getElementById("zone_topic")

    

    let path_upload = path_pic.replace("assets/img/post-img/" , "");
    console.log(path_upload)

    // text_article = text.replace("'", "\\'");


    zone_titre.value=titre;
    zone_text.value=text;
    zone_pic.src=path_pic;
    form.action += id;
    console.log(id)
    console.log(titre);
    console.log(path_pic);
    console.log(text);
    console.log(topic_article);
    zone_topic.value=topic_article;




}

var upload_pic = () =>{
    let image = document.getElementById("image").files[0];  /// get name of img
    console.log(image);
    let to_change_path = document.querySelector(".img_upload");
    to_change_path.src = "assets/img/post-img/"+image.name; /// add name of image to concatination the path
    tp_change_path.name = "assets/img/post-img/"+image.name; 

}



let dashboard_post_zone = document.querySelector("#dashboard_on");
let dashboard_user_zone = document.querySelector("#dashboard_of");
var dashboard_change = (post_dash , user_dash ) =>{
    dashboard_post_zone.id= post_dash;
    dashboard_user_zone.id = user_dash;
    console.log("its work");
}


function delete_popup(id,localisation){

    console.log(id);

swal({
title: "Are you sure?",
text: "Once deleted, you will not be able to recover this imaginary file!",
icon: "warning",
buttons: true,
dangerMode: true,
})
.then((willDelete) => {
if (willDelete) {
    window.location.href = `${localisation}?id=${id}`;
} else {
    swal("Your imaginary file is safe!");
}
});

}
    </script>
</body>
</html>