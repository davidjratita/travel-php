<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<meta name="description" content="description"/>
		<meta name="keywords" content="keywords"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
		<title>Rural Explorers Uganda - Login</title>

		<!-- Styles-->
		<link rel="stylesheet" href="css/main_slider/slider-style.css" />
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" href="css/stylex.css"/>
		<link rel="stylesheet" href="css/custom.css"/>
		<!-- <link rel="stylesheet" href="css/styles.min.css"/> -->

		<!--Favicon-->
		<link rel="icon" type="image/svg" href="img/svg/logo.svg">
	</head>


	<body>
	<div class="page-wrapper">

		<main class="main">
			<!-- promo start-->
			<section class="promo-primary main_section" style='height:500px'>
				<picture>
					<source srcset="img/safari-tours.jpg" media="(min-width: 992px;)"/><img class="img--bg" src="img/safari-tours.jpg" alt="img"/>
				</picture>

				<div class="container">
					<div class="row">
						<div class="col-md-auto">
						<div class="align-container">
							<div class="align-container__item">
								<span class="promo-primary__pre-title">Welcome Back</span>
								<h1 class="promo-primary__title">
									<span>Login to your account</span> <br>
									<span>and explore!</span>
								</h1>
									<?php
									require('db.php');
									session_start();
									// When form submitted, check and create user session.
									if (isset($_POST["email"]) && isset($_POST["password"])) {
										$email = mysqli_real_escape_string($con,$_POST["email"]);
										$password = $_POST["password"];
										// Check user is exist in the database
										$sql = "SELECT * FROM user_info WHERE email = '$email' AND password = '$password'";
										$run_query = mysqli_query($con,$sql);
										$count = mysqli_num_rows($run_query);
										$row = mysqli_fetch_array($run_query);
											$_SESSION["uid"] = $row["user_id"];
											$_SESSION["name"] = $row["first_name"];
											$ip_add = getenv("REMOTE_ADDR");

											if($count == 1){
												
												if (isset($_COOKIE["product_list"])) {
													$p_list = stripcslashes($_COOKIE["product_list"]);
													//here we are decoding stored json product list cookie to normal array
													$product_list = json_decode($p_list,true);
													for ($i=0; $i < count($product_list); $i++) { 
													//After getting user id from database here we are checking user cart item if there is already product is listed or not
													$verify_cart = "SELECT id FROM cart WHERE user_id = $_SESSION[uid] AND p_id = ".$product_list[$i];
													$result  = mysqli_query($con,$verify_cart);
													if(mysqli_num_rows($result) < 1){
														//if user is adding first time product into cart we will update user_id into database table with valid id
														$update_cart = "UPDATE cart SET user_id = '$_SESSION[uid]' WHERE ip_add = '$ip_add' AND user_id = -1";
														mysqli_query($con,$update_cart);
													}else{
														//if already that product is available into database table we will delete that record
														$delete_existing_product = "DELETE FROM cart WHERE user_id = -1 AND ip_add = '$ip_add' AND p_id = ".$product_list[$i];
														mysqli_query($con,$delete_existing_product);
													}
													}
													//here we are destroying user cookie
													setcookie("product_list","",strtotime("-1 day"),"/");
													//if user is logging from after cart page we will send cart_login
													echo "cart_login";
													
													
													exit();
													
												}
												//if user is login from page we will send login_success
												echo "<form class='form'>
												<h1 style='font-weight:600; color:#fff;font-size:22px'>
												Login Successful!
												</h1>
												
												</form>";
												$BackToMyPage = $_SERVER['HTTP_REFERER'];
													if(!isset($BackToMyPage)) {
													header('Location: '.$BackToMyPage);
													echo"<script type='text/javascript'>
													
													</script>";
													} else {
													header('Location: index.php'); // default page
													} 
													
													
													exit;
										
												} else{
													$email = mysqli_real_escape_string($con,$_POST["email"]);
													$password =md5($_POST["password"]) ;
													$sql = "SELECT * FROM admin_info WHERE admin_email = '$email' AND admin_password = '$password'";
													$run_query = mysqli_query($con,$sql);
													$count = mysqli_num_rows($run_query);
										
													//if user record is available in database then $count will be equal to 1
													if($count == 1){
													$row = mysqli_fetch_array($run_query);
													$_SESSION["uid"] = $row["admin_id"];
													$_SESSION["name"] = $row["admin_name"];
													$ip_add = getenv("REMOTE_ADDR");
													//we have created a cookie in login_form.php page so if that cookie is available means user is not login
										
										
														//if user is login from page we will send login_success
													echo "<form class='form'>
													<h1 style='font-weight:600; color:#fff;font-size:22px'>
													Login Successful!
													</h1>
													
													</form>";
										
													echo "<script> location.href='admin/index.php'; </script>";
													exit;
										
													}else{
														echo "<form class='form'>
														<h1 style='font-weight:600; color:#fff;font-size:22px'>
														If you are new, please register
														</h1>
														<a style='color:#000; height:50px;widht:100px;background-color:#fff; padding:8px 18px; border-radius:5px;font-weight:800' href='signup.php'>Okay</a>
													</form>";
														exit();
													}
											
											
										}
									} else {
									?>
									<form class="form" method="POST" name="login">
										<input class="login" type="email" name="email" placeholder="Email" id="password" required/>
										<input class="login" type="password" name="password" placeholder="password" id="password" required/>
										<input type="submit" value="Login" name="submit" class="login-button"/>
										<!-- <a href="signup.php" style='font-weight:800;margin-left:10px'>Sign Up |</a> -->
										<a href="index.php" style='font-weight:800;margin-left:10px'>Back Home</a>

									</form>

									
									<?php
									}
									?>
							</div>
						</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- promo end-->
			
			<!-- cta start-->
			<div class="cta-block main_section">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-8">
						<p class="cta-block__text"><strong>Are you new to Rural Explorers Uganda and you want to get the best amazing travel offers. Please sign up today and enjoy unlimited travel opportunities in the pearl.
						</strong>  </p>
						</div>
						<div class="col-lg-4 text-left text-lg-right"><a class="cta-block__button button--radius" href="signup.php">Sign Up</a></div>
					</div>
				</div>
			</div>
			<!-- cta end-->    
		</main>

			
