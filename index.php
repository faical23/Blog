<?php

	session_start();
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
	<?php include "include/navbar.php"?>
<!-- end header  -->

<!-- start sections -->
	<div class="all-sections">

			<!-- strat treding post -->
			<div class ="trednig-post">
				<div class="container">
					<h1 class="section-titre"> Last post </h1>

					<div id="multi-item-example" class="carousel slide carousel-multi-item post-wrapper" data-ride="carousel">
						
						<!--Slides-->
						<div class="carousel-inner" role="listbox">
						
							<!--First slide-->
							<div class="carousel-item active">
						
							<?php
															// require "assets/php/database/connect.php";

															$article = mysqli_query($connection_DB, "SELECT * FROM article ORDER BY id DESC LIMIT 3");	

                                                                foreach ($article as $value) {
                            ?>
									<div class="col-md-4 post" style="float:left">
										<div class="card mb-2">
											<img class="card-img-top slider-img" src="<?php echo $value["pics"]?>" alt="Card image cap">
											<div class="card-body post-info">
												<h4 class="card-title"><?php  echo $value["titre"]?></h4>
												<div class="create-by">
														<img src="assets/img/icons/admin.svg" alt="" class="icon-admine">
														<h6>Fical Bahsis</h6>
													</div>
													<div class="created-topic">
															<img src="assets/img/icons/chat.svg" alt="" class="icon-calendar">
															<h6 class="time-created"><?php  echo $value["topic"] ?><h6>
														</div>
													<div class="created-time">
														<img src="assets/img/icons/calendar.svg" alt="" class="icon-calendar">
														<h6 class="time-created"><?php echo $value["date"]?><h6>
													</div>
													<div class="see-more">
														<a  href="single.php?id=<?php echo $value['id'] ?>" >View More <i class="fas fa-chevron-right"></i></a>
													</div>
											</div>
										</div>
									</div>

							<?php

                                                                }
							?>							
			
							</div>
							<!--/.First slide-->
						
							<!--Second slide-->
							<div class="carousel-item">
							<?php

															$article = mysqli_query($connection_DB, "SELECT * FROM article ORDER BY id DESC LIMIT 3 ");	

                                                                foreach ($article as $value) {
                                                                    ?>
						
									<div class="col-md-4 post" style="float:left">
										<div class="card mb-2">
											<img class="card-img-top slider-img" src="<?php echo $value["pics"]?>" alt="Card image cap">
											<div class="card-body post-info">
												<h4 class="card-title"><?php  echo $value["titre"]?></h4>
												<div class="create-by">
														<img src="assets/img/icons/admin.svg" alt="" class="icon-admine">
														<h6>Fical Bahsis</h6>
													</div>
													<div class="created-topic">
															<img src="assets/img/icons/chat.svg" alt="" class="icon-calendar">
															<h6 class="time-created"><?php  echo $value["topic"] ?><h6>
														</div>
													<div class="created-time">
														<img src="assets/img/icons/calendar.svg" alt="" class="icon-calendar">
														<h6 class="time-created"><?php echo $value["date"]?><h6>
													</div>
													<div class="see-more">
														<a  href="single.php?id=<?php echo $value['id'] ?>" >View More <i class="fas fa-chevron-right"></i></a>
													</div>
											</div>
										</div>
									</div>

							<?php
                                               }
							?>

						
							</div>
							<!--/.Second slide-->
						
						
						
						</div>
						<!--/.Slides-->
			
									<!--Controls-->
						<div class="controls-top">
							<a class="btn-floating left-slider" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
							<a class="btn-floating right-slider" href="#multi-item-example" data-slide="next"><i
								class="fas fa-chevron-right"></i></a>
							</div>
							<!--/.Controls-->
			
					</div>
				
				</div>
			</div>
			
		<!-- end treding post -->

		<!-- start recent post -->
			<div class="recent-post">
				<div class="container">
					<h1 class="section-titre">Recent post </h1>
					<div class="row">
						<div class="col-xxl-10 col-xl-9 col-lg-8 col-md-8 col-sm-12 col-12 part-recent-post-left">

							<div class="left-part">


						<?php
							$topic = $_GET["topic"];

							if($topic == "")
							{
								$article = mysqli_query($connection_DB, "SELECT * FROM article ");		

							}
							else{
								$article = mysqli_query($connection_DB, "SELECT * FROM article WHERE topic = '$topic' ");		
							}
							

								foreach( $article as $value)
								{
						?>

											<div class="main-content">
												<div class="post plus-defenition">
													<img src="<?php  echo $value["pics"] ?>" alt="" class="post-img">
													<div class="post-preview">
														<a href="single.html"><h3 class="titre-article"><?php  echo $value["titre"] ?></h3></a>
														<P class="text-articl"><?php 
														$text_article  = substr($value["text_article"], 0, 190);
														echo $text_article . " . . ."?></P>
														<div class="create-by">
															<img src="assets/img/icons/admin.svg" alt="" class="icon-admine">
															<h6>Admin</h6>
														</div>
														<div class="created-topic">
															<img src="assets/img/icons/chat.svg" alt="" class="icon-calendar">
															<h6 class="time-created"><?php  echo $value["topic"] ?><h6>
														</div>
														<div class="created-time">
															<img src="assets/img/icons/calendar.svg" alt="" class="icon-calendar">
															<h6 class="time-created"><?php  echo $value["date"] ?><h6>
														</div>
														<div class="btn-read-more">
														<?php
															if (!empty($_SESSION['login']) && $_SESSION['login'] == "user") {
														?>
															<a href="saves._application.php?id=<?php echo $value["id"]?>">
																<div class="saves">
																<svg id="saves_icons" onclick="saves( <?php echo $value["id"]?>)"  xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>															</div>
															</a>
													<?php
															}
														?>	
															<a href="single.php?id=<?php echo $value['id'] ?>" class="btn read-more">Read-more</a>
														</div>

													</div>
												</div>
											</div>
							
							<?php
							
								}
							
							?>







							</div>
						</div>
						
						<div class="col-xxl-2  col-xl-3 col-lg-4 col-md-3 col-sm-12 col-12">
							<div class="right-part">
								<div class="search-part">
										<h2>Search</h2>
										<input type="text" class="inpsearch" list="mysearch" placeholder="Search Place ...">
										<datalist id="mysearch">
											<option value="sport">
											<option value="monde">
											<option value="arabic">
											<option value="technology">
											<option value="maroc">
											<option value="football">
											<option value="europe">
											<option value="histrory">
										</datalist>
										<?php

										
										?>
										<!-- <a href="index.php?topic=?topic=sport"> -->
											<button id="btn_search" onclick="search()" >Search</button>
										<!-- </a> -->
								</div>

							</div>

						</div>
					</div>
				</div>
			</div>



		<!-- end recent post -->
	</div>
<!-- end sections-->


<!-- start footer -->
	<?php include "include/footer.php"?>   <!-- include footer from footer.php -->


	<!-- Plugins ================================================== -->
	<!-- jQuery -->
	<script src="./assets/js/jquery-3.5.1.min.js"></script>
	<!-- Popper Js -->
	<script src="./assets/js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="./assets/js/bootstrap.min.js"></script>

	<!-- Application -->
	<script src="./assets/js/main.js"></script>

	<script>

var search = () =>{
	topic =document.querySelector(".inpsearch").value;
	window.location ="index.php?topic=" + topic;
	console.log(topic);
}


var saves = (id)  =>{
	let saves_icons =document.querySelector("#saves_icons");

	saves_icons.style="fill:red"
	window.location.href = `saves.php`;
}


	</script>

	
</body>



</html>
