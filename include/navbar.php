<?php

     session_start();
     require "assets/php/database/connect.php";
     if(isset($_SESSION['login']) ){
        $table = $_SESSION["login"];
        $id = $_SESSION["id"];
    
        $sql_requet =  mysqli_query($connection_DB,"SELECT * FROM $table WHERE id = $id");
    
        $row = mysqli_fetch_array($sql_requet );
        $name_login = $row["username"];
	}




?>

<header class="fixed-top">
		  
          <nav class="navbar">
              <div class="container">
              <div >
                      <a href="index.php?topic=" class="brand">
                          <h2>WEBLOG</h2>
                      </a>
                  </div>
              <div>
                      <ul class="nav-content ">
                          <li class="nav-item" >
                              <a  class="link_header" href="index.php?topic="  >Home</a>
                          </li>
                          <li class="nav-item" >
                              <a  class="link_header" href="#about">About</a>
                          </li>
                          <?php
                                if (!empty($_SESSION['login']) && $_SESSION['login'] == "user") {
                                    ?>
                               <li class="nav-item" >
                              <a class="link_header"  href="saves.php" >Saves</a>
                          </li>
                          <?php
                                }
                            	if(empty($_SESSION['login']) )
                                {
                            ?>
                                <li class="nav-item">
                                    <a href="login.php">
                                    <button type="button" class="button_header btn_login" href="login.php">
                                            Login
                                        </button>
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a href="inscription.php">
                                    <button type="button" class="button_header btn_inscription">
                                        Inscription
                                    </button>
                                    </a>
                                </li>

                        <?php
                            }
                            else{
                                ?>
                          <li class="nav-item" >
                              <div class="btn-group">
                                  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <img class="login-icons" src="assets/img/icons/login.svg">
                                  <h3><?php echo $name_login ?><h3>
                                  </button>
                                  <a href="#">
                                      <div class="dropdown-menu ">
                                          <a href="logout.php" class="dropdown-item">
                                           Logout
                                          </a>
                                          <?php
                                            if ($_SESSION['login'] == "admin") {
                                            ?>
                                            <a href="dashboard.php" class="dropdown-item">
                                                Dashbord
                                            <a href="#">
                                          <?php
                                            }
                                          ?>
  
                                      </div>
                                  </a>
                              </div>
                          </li>

                          <?php
                            }
                          ?>
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