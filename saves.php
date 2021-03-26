
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

<body class="save_page">

	

<!--Start nav-bar-->
	<?php include "include/navbar.php"?>
<!-- end header  -->

<section class="saves_post">
    <div class="container">
        <h1 class="section-titre">Saves post </h1>


        <div class="recent-post">
				<div class="container">
					<div class="row">
						<div class="col-xxl-10 col-xl-9 col-lg-8 col-md-8 col-sm-12 col-12 part-recent-post-left">

							<div class="left-part">


						<?php
								$article = mysqli_query($connection_DB, "SELECT * FROM article WHERE saves = 'save' ");		
							
							

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
						
					</div>
				</div>
			</div>
    </div>
</section>



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

</body>
</html>