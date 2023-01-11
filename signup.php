<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<meta name="description" content="description"/>
		<meta name="keywords" content="keywords"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
		<title>Rural Explorers Uganda - Sign Up</title>

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
			<section class="promo-primary main_section" >
				<picture>
					<source srcset="img/safari-tours.jpg" media="(min-width: 992px;)"/><img class="img--bg" src="img/safari-tours.jpg" alt="img"/>
				</picture>

				<div class="container">
					<div class="row">
						<div class="col-md-8" >
							<div class="align-container">
								<div class="align-container__item">
									<span class="promo-primary__pre-title">Hi there!, Welcome to Rural Explorers Uganda.</span>
									<h1 class="promo-primary__title">
										<span>Sign Up</span>
									</h1>
										<?php
										require('db.php');
										session_start();
										// When form submitted, check and create user session.
										if (isset($_POST["f_name"])) {

											$f_name = $_POST["f_name"];
											$l_name = $_POST["l_name"];
											$email = $_POST['email'];
											$password = $_POST['password'];
											$repassword = $_POST['repassword'];
											$mobile = $_POST['mobile'];
											$address1 = $_POST['address1'];
											$address2 = $_POST['address2'];
											$name = "/^[a-zA-Z ]+$/";
											$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
											$number = "/^[0-9]+$/";
										
										if(empty($f_name) || empty($l_name) || empty($email) || empty($password) || empty($repassword) ||
											empty($mobile) || empty($address1) || empty($address2)){
												
												echo "<form class='form'>
														<h1 style='font-weight:600; color:#fff;font-size:22px'>
															Please fill all the fields
														</h1>
														<a style='color:#000; height:50px;widht:100px;background-color:#fff; padding:8px 18px; border-radius:5px;font-weight:800' href='signup.php'>Okay</a>
													</form>";
												exit();
											} else {
												if(!preg_match($name,$f_name)){
												echo "
													<form class='form'>
														<h1 style='font-weight:600; color:#fff;font-size:22px'>
														this $f_name is not valid..!
														</h1>
														<a style='color:#000; height:50px;widht:100px;background-color:#fff; padding:8px 18px; border-radius:5px;font-weight:800' href='signup.php'>Okay</a>
													</form>
													
												";
												exit();
											}
											if(!preg_match($name,$l_name)){
												echo "
												<form class='form'>
												<h1 style='font-weight:600; color:#fff;font-size:22px'>
												this $l_name is not valid..!
												</h1>
												<a style='color:#000; height:50px;widht:100px;background-color:#fff; padding:8px 18px; border-radius:5px;font-weight:800' href='signup.php'>Okay</a>
											</form>
												";
												exit();
											}
											if(!preg_match($emailValidation,$email)){
												echo "
												<form class='form'>
												<h1 style='font-weight:600; color:#fff;font-size:22px'>
												this $email is not valid..!
												</h1>
												<a style='color:#000; height:50px;widht:100px;background-color:#fff; padding:8px 18px; border-radius:5px;font-weight:800' href='signup.php'>Okay</a>
											</form>
												";
												exit();
											}
											if(strlen($password) < 9 ){
												echo "
												<form class='form'>
												<h1 style='font-weight:600; color:#fff;font-size:22px'>
												Password is weak
												</h1>
												<a style='color:#000; height:50px;widht:100px;background-color:#fff; padding:8px 18px; border-radius:5px;font-weight:800' href='signup.php'>Okay</a>
											</form>
												";
												exit();
											}
											if(strlen($repassword) < 9 ){
												echo "
												<form class='form'>
												<h1 style='font-weight:600; color:#fff;font-size:22px'>
												Password is weak
												</h1>
												<a style='color:#000; height:50px;widht:100px;background-color:#fff; padding:8px 18px; border-radius:5px;font-weight:800' href='signup.php'>Okay</a>
											</form>
												";
												exit();
											}
											if($password != $repassword){
												echo "
												<form class='form'>
												<h1 style='font-weight:600; color:#fff;font-size:22px'>
													Password is not the same
												</h1>
												<a style='color:#000; height:50px;widht:100px;background-color:#fff; padding:8px 18px; border-radius:5px;font-weight:800' href='signup.php'>Okay</a>
											</form>
												";
											}
											if(!preg_match($number,$mobile)){
												echo "
												<form class='form'>
												<h1 style='font-weight:600; color:#fff;font-size:22px'>
												Mobile Number $mobile is not valid..!
												</h1>
												<a style='color:#000; height:50px;widht:100px;background-color:#fff; padding:8px 18px; border-radius:5px;font-weight:800' href='signup.php'>Okay</a>
											</form>
												";
												exit();
											}
											if(!(strlen($mobile) == 10)){
												echo "
												<form class='form'>
												<h1 style='font-weight:600; color:#fff;font-size:22px'>
												Mobile Number must be 10 digits
												</h1>
												<a style='color:#000; height:50px;widht:100px;background-color:#fff; padding:8px 18px; border-radius:5px;font-weight:800' href='signup.php'>Okay</a>
											</form>
												";
												exit();
											}
											//existing email address in our database
											$sql = "SELECT user_id FROM user_info WHERE email = '$email' LIMIT 1" ;
											$check_query = mysqli_query($con,$sql);
											$count_email = mysqli_num_rows($check_query);
											if($count_email > 0){
												echo "
												<form class='form'>
												<h1 style='font-weight:600; color:#fff;font-size:22px'>
												Email is already available...try another
												</h1>
												<a style='color:#000; height:50px;widht:100px;background-color:#fff; padding:8px 18px; border-radius:5px;font-weight:800' href='signup.php'>Okay</a>
											</form>
												";
												exit();
											} else {
												
												$sql = "INSERT INTO `user_info` 
												(`user_id`, `first_name`, `last_name`, `email`, 
												`password`, `mobile`, `address1`, `address2`) 
												VALUES (NULL, '$f_name', '$l_name', '$email', 
												'$password', '$mobile', '$address1', '$address2')";
												$run_query = mysqli_query($con,$sql);
												$_SESSION["uid"] = mysqli_insert_id($con);
												$_SESSION["name"] = $f_name;
												$ip_add = getenv("REMOTE_ADDR");
												$sql = "UPDATE cart SET user_id = '$_SESSION[uid]' WHERE ip_add='$ip_add' AND user_id = -1";
												if(mysqli_query($con,$sql)){
													echo "<form class='form'>
													<h1 style='font-weight:600; color:#fff;font-size:22px'>
													Registration Successful!
													</h1>
													
												</form>";
													echo "<script> location.href='index.php'; </script>";
												exit;
												}
											}
											}
											
										} else {
										?>
										<form class="form" method="POST">

											<input class="login" type="text" name="f_name" id="f_name" placeholder="First Name">
											<input class="login" type="text" name="l_name" id="l_name" placeholder="Last Name">
											<input class="login" type="email" name="email"  placeholder="Email">
											<input class="login" type="password" name="password" id="password" placeholder="password">
											<input class="login" type="password" name="repassword" id="repassword" placeholder="confirm password">
											<input class="login" type="text" name="mobile" id="mobile" placeholder="mobile">
											<input class="login" type="text" name="address1" id="address1" placeholder="Address">
											<input class="login" type="text" name="address2" id="address2" placeholder="City">

											<input type="submit" value="Sign Up" name="submit" class="login-button"/>
											
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
			   
		</main>

			
