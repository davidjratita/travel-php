<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<meta name="description" content="description"/>
		<meta name="keywords" content="keywords"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
		<title>Rural Explorers Uganda</title>

		<!-- Styles-->
		<link rel="stylesheet" href="css/main_slider/slider-style.css" />
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" href="css/custom.css"/>
		<!-- <link type="text/css" rel="stylesheet" href="css/style1.css"/> -->

		<!--Favicon-->
		<link rel="icon" type="image/svg" href="img/svg/logo.svg">
	</head>


	<body>
		<div class="page-wrapper">

			<!-- Start : Mobile Menu -->
			<div class="menu-dropdown menu-dropdown--front-2 main_section">

				<div class="menu-dropdown__inner" data-value="start">
					<div class="screen screen--start">
						<div class="screen__item"><a class="screen__link" href="./">Home</a></div>
						<!-- <div class="screen__item screen--trigger" data-category="about">
							<span>About Us</span>
							<span>
								<svg class="icon">
									<use xlink:href="#chevron"></use>
								</svg>
							</span>
						</div> -->
						<div class="screen__item"><a class="screen__link" href="about-us.php">About Us</a></div>
						<div class="screen__item"><a class="screen__link" href="marketplace.php">marketplace</a></div>
						<div class="screen__item"><a class="screen__link" href="safari-tours.php">Safaris</a></div>
						<div class="screen__item"><a class="screen__link" href="destinations.php">Destinations</a></div>
						
						<div class="screen__item screen--trigger" data-category="partner"><span>Accommodation</span><span>
							<svg class="icon">
								<use xlink:href="#chevron"></use>
							</svg></span></div>
						
						
						
						<div class="socials social-links">
							<a href="#" class="link facebook"><span></span></a>
							<a href="#" class="link instagram"><span></span></a>
							<a href="#" class="link pinterest"><span></span></a>
							<a href="#" class="link twitter"><span></span></a>
							<a href="#" class="link youtube"><span></span></a>
						</div>
						
						<?php
                             include "db.php";
                            if(isset($_SESSION["uid"])){
                                $sql = "SELECT first_name FROM user_info WHERE user_id='$_SESSION[uid]'";
                                $query = mysqli_query($con,$sql);
                                $row=mysqli_fetch_array($query);
                                
                                echo '<a class="screen__button js-popup-open" href="logout_confirm.php"><i class="fa fa-user-o"></i> Hi '.$row["first_name"].'</a>';

							}else{ 
								echo '<a class="screen__button js-popup-open" href="login.php">
								Login | Signup</a>';
								
							}
                                             ?>
						
					</div>
				</div>

				<div class="menu-dropdown__inner" data-value="partner">
					<div class="screen screen--sub">
						<div class="screen__heading">
							<h6 class="screen__back">
								<svg class="icon">
									<use xlink:href="#chevron-left"></use>
								</svg> <span>Accommodation</span>
							</h6>
						</div>
						<div class="screen__item pt-4"><a class="screen__link" href="become-a-host.php">Become a host</a></div>
						<div class="screen__item"><a class="screen__link" href="#">Become a partner</a></div>
						<div class="screen__item"><a class="screen__link" href="#">Volunteer</a></div>
					</div>
				</div>

				<div class="menu-dropdown__inner" data-value="about">
					<div class="screen screen--sub">
						<div class="screen__heading">
							<h6 class="screen__back">
								<svg class="icon">
									<use xlink:href="#chevron-left"></use>
								</svg> <span>About Us</span>
							</h6>
						</div>
						<div class="screen__item pt-4"><a class="screen__link" href="#">Our Story</a></div>
						<div class="screen__item"><a class="screen__link" href="#">Why Us</a></div>
						<div class="screen__item"><a class="screen__link" href="#">Meet the Team</a></div>
						<div class="screen__item"><a class="screen__link" href="contact-us.php">Contact Us</a></div>
					</div>
				</div>

			</div>
			<!-- Stop : Mobile Menu -->
			<!-- header start-->
			<header class="header shop-header header-f2">

				<div class="header__top">
					<div class="row align-items-center">
						<div class="col-8 col-lg-3">
							<a class="logo max-pt-20" href="./">
								<img class="logo--white logo__img" src="img/svg/logo.svg" alt="Rural Explorers"/>
								<img class="logo--dark logo__img" src="img/svg/logo.svg" alt="Rural Explorers"/>
							</a>
						</div>
						<div class="col-4 col-lg-9 d-flex justify-content-end align-items-center">
							<!-- main menu start-->
							<ul class="main-menu">
								
								<li class="main-menu__item">
									<a class="main-menu__link" href="index.php"><span>Safaris</span></a>
								</li>
								<li class="main-menu__item"><a class="main-menu__link" href="about-us.php"><span>About Us</span></a>
									
								</li>
								<li class="main-menu__item">
									<a class="main-menu__link" href="marketplace.php"><span>Market Place</span></a>
								</li>
								<li class="main-menu__item main-menu__item--has-child"><a class="main-menu__link" href="javascript:void(0);"><span>Accommodation</span></a>
									<!-- sub menu start-->
									<ul class="main-menu__sub-list">
										<li><a href="become-a-host.php"><span>Become a host</span></a></li>
										<li><a href="#"><span>Become a partner</span></a></li>
										<li><a href="#"><span>Volunteer</span></a></li>
									</ul>
									<!-- sub menu end-->
								</li>
								
								<li class="main-menu__item">
									<a class="main-menu__link" href="destinations.php"><span>Destinations</span></a>
								</li>
									
							</ul>
							<!-- main menu end-->
							<?php
                             include "db.php";
                            if(isset($_SESSION["uid"])){
                                $sql = "SELECT first_name FROM user_info WHERE user_id='$_SESSION[uid]'";
                                $query = mysqli_query($con,$sql);
                                $row=mysqli_fetch_array($query);
                                
                                echo '<a class="header__button" href="logout_confirm.php"><i class="fa fa-user-o"></i> Hi '.$row["first_name"].'</a>';

							}else{ 
								echo '<a class="header__button" href="login.php">
								Login | Signup</a>';
								
							}
                                             ?>
                               
							
							
							<!-- menu-trigger start-->
							<div class="hamburger">
								<div class="hamburger-box">
									<div class="hamburger-inner"></div>
								</div>
							</div>
							<!-- menu-trigger end-->
						</div>
					</div>
				</div>

			</header>
			<!-- header end-->

			<!--START : Main Slider-->
			
