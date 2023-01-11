	
		<div class="cta-block main_section">
			<img class="img--bg" src="img/cta-bg_2.png" alt="bg"/>

			<div class="container">
				<div class="row align-items-center">

					<div class="col-lg-6">
						<h4 class="cta-block__title">Sign up to our <span>Newsletters</span></h4>
						<p class="cta-block__text">Keep upto date with Rural Explorers - News, promos, helpful info</p>
					</div>

					<div class="col-lg-6 offset-30">

					<form class="form cta-form bottom-30" id="offer_form" onsubmit="return false">

						<input class="form__field" type="email" id="email" name="email" placeholder="Enter Your Email">
						<button class="form__submit" value="Sign Up" name="signup_button" type="submit">Subscribe</button>

					</form>

					</div>
					
				</div>
			</div>
			<div class="" id="offer_msg"></div>
		</div>

	<!--Start : Footer-->
		<div class="footer">
			<div class="wrap">
				<div class="wrap_float">
					<div class="footer_top">
						<div class="left">
							<div class="col">
								<div class="_title m_title">Support</div>
								<ul>
									<li><a href="#">Help Center for guests</a></li>
									<li><a href="#">Help Center for hosts</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Terms &amp; Conditions</a></li>
								</ul>
							</div>
							<div class="col">
								<div class="_title m_title">Accommodation</div>
								<ul>
									<li><a href="become-a-host.php">Become a host</a></li>
									<li><a href="#">Become a patner</a></li>
									<li><a href="#">Volunteer</a></li>
									<li><a href="#">Donate</a></li>
								</ul>
							</div>
							<div class="col">
								<div class="_title m_title">About Rural Explorers</div>
								<ul>
									<li><a href="#">Our Story</a></li>
									<li><a href="#">Team</a></li>
									<li><a href="#">Blog</a></li>
									<li><a href="#">Contact Us</a></li>
								</ul>
							</div>
						</div>
						<div class="right">
							<div class="_title">Contacts</div>
							<div class="contacts_info">
								<div class="tel">
									<a href="tel:256781164860"> +256 781 164 860</a>
									<p>Round the clock support</p>
								</div>
								<div class="email">
									<a href="mailto:ruralexplorers.ug@gmail.com">ruralexplorers.ug@gmail.com</a>
									<p>For any questions</p>
								</div>
								<div class="address">
									Tomosi Group Portbell Road <br> Kampala - Uganda
								</div>
							</div>
							<div class="socials social-links">
								<a href="#" class="link facebook"><span></span></a>
								<a href="#" class="link instagram"><span></span></a>
								<a href="#" class="link pinterest"><span></span></a>
								<a href="#" class="link twitter"><span></span></a>
								<a href="#" class="link youtube"><span></span></a>
							</div>
						</div>
					</div>
					<div class="footer_bottom">
						<!-- <div class="left">
							<a href="#">Privacy Policy</a>
						</div> -->
						<div class="right">
							&copy;2022. Rural Explorers Uganda
						</div>
					</div>
				</div>
			</div>
		</div>
	<!--Stop : Footer-->
			
		</main>
		
	</div>

	<!--START : Modal - Search, Login, Signup-->
	
	<div class="overlay" id="overlay"></div>

	<div class="popup login" id="login">
		<div class="scroll">
			<div class="scroll_wrap">
				<div class="popup-head">
					<div class="title">Sign In</div>
					<a class="link js-popup-open" data-href="#registration">Sign Up</a>

				</div>
				<div class="popup-body">
					<div class="subtitle">
						Use the e-mail and password that you specified when registering on the site
					</div>
					<div class="form">
						<input type="text" class="input" placeholder="Login">
						<input type="text" class="input" placeholder="Password">
						<button class="submit button">Sign In</button>
						<a href="#" class="link">Forgot password?</a>
					</div>
				</div>
				<div class="popup-foot">
					<p>Login via social networks</p>
					<div class="social-links">
						<a href="#" class="link facebook"><span></span></a>
						<a href="#" class="link twitter"><span></span></a>
					</div>
				</div>
			</div>
		</div>
		<div class="close"></div>
	</div>

	<div class="popup registration" id="registration">
		<div class="scroll">
			<div class="scroll_wrap">
				<div class="popup-head">
					<div class="title">Sign Up</div>
					<a class="link js-popup-open" data-href="#login">Sign In</a>

				</div>
				<div class="popup-body">
					<div class="subtitle">
						Fill in the registration form and save your favorite tours, synchronize them on all devices
					</div>
					<div class="form">
						<input type="text" name="f_name" id="f_name" class="input" placeholder="First Name">
						<input type="text" name="l_name" id="l_name" class="input" placeholder="Last Name">
						<input type="text" class="input" placeholder="Date of Birth">
						<input type="text" name="address1" id="address1" class="input" placeholder="Country of Residence">
						<input type="email" name="email" class="input" placeholder="Email">
						<input type="password" name="password" id="password" class="input" placeholder="Password">
						<input type="password" class="input" placeholder="Confirm Password">
						<input type="text" class="input" placeholder="Interests">
						<button class="submit button js-submit" type="submit">Sign Up</button>
					</div>
				</div>
				<!-- <div class="popup-foot">
					<p>Sign Up via social networks</p>
					<div class="social-links">
						<a href="#" class="link facebook"><span></span></a>
						<a href="#" class="link twitter"><span></span></a>
					</div>
				</div> -->
			</div>
		</div>
		<div class="close"></div>
	</div>

	<div class="popup forgot-pass" id="recovery-pass">
		<div class="scroll">
			<div class="scroll_wrap">
				<div class="popup-head">
					<div class="title">Forgot password?</div>
				</div>
				<div class="popup-body">
					<div class="subtitle">
						Use the e-mail and password that you specified when registering on the site
					</div>
					<div class="form">
						<input type="email" class="input" placeholder="Email">
						<button class="submit button js-submit">Reset password</button>
					</div>
				</div>
			</div>
		</div>
		<div class="close"></div>
	</div>

	<div class="popup profile-setting" id="profile-setting">
		<div class="scroll">
			<div class="scroll_wrap">
				<div class="select-userpic">
					<div class="userpic">V</div>
					<div class="select">
						<input type="file" id="profile-pic">
						<label for="profile-pic">Select photo</label>
					</div>
				</div>
				<div class="popup-head">
					<div class="title">My Account</div>
				</div>
				<div class="popup-body">
					<div class="form">
						<input type="text" class="input" placeholder="Username" value="Kev">
						<input type="text" class="input" placeholder="Name" value="Mene">
						<input type="text" class="input" placeholder="Surename" value="Kevin">
						<input type="email" class="input" placeholder="Email" value="test@test.com">
						<div class="label">Change password</div>
						<input type="password" class="input" placeholder="Current password">
						<input type="password" class="input" placeholder="Enter new password">
						<input type="password" class="input" placeholder="New password repeat">
						<div class="label">Authorization through social networks</div>
						<div class="social-links">
							<a href="#" class="link facebook active"><span></span></a>
							<a href="#" class="link twitter"><span></span></a>
						</div>
						<button class="submit button js-submit">Save Setting</button>
					</div>
				</div>
			</div>
		</div>
		<div class="close"></div>
	</div>

	<div class="popup contact-us" id="contact-us">
		<div class="scroll">
			<div class="scroll_wrap">
				<div class="popup-head">
					<div class="title">Contact Us</div>
				</div>
				<div class="popup-body">
					<div class="subtitle">
						But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain
					</div>
					<div class="form">
						<input type="text" class="input" placeholder="Name">
						<input type="email" class="input" placeholder="Email">
						<input type="text" class="input" placeholder="Phone">
						<textarea class="textarea" placeholder="Your Massage"></textarea>
						<button class="submit button js-submit">Send Massage</button>
					</div>
				</div>
			</div>
		</div>
		<div class="close"></div>
	</div>

	<div class="popup book-now-popup" id="book-now">
		<div class="scroll">
			<div class="scroll_wrap">
				<div class="popup-head">
					<div class="title">Book Now</div>
				</div>
				<div class="popup-body">
					<div class="tour-title">
						<div class="img">
							<img src="img/demo-bg.jpg" alt="">
						</div>
						<div class="tour-name">
							Tour to the Arctic is an exotic journey on the verge of extreme
						</div>
					</div>
					<div class="tour-info">
						<div class="col">
							<div class="label">Check In</div>
							<div class="date">
								<div class="day">09</div>
								<div class="month">May</div>
								<div class="year">2019</div>
							</div>
							<div class="label">Aduld: <span>3</span></div>
						</div>
						<div class="col">
							<div class="label">Check Out</div>
							<div class="date">
								<div class="day">09</div>
								<div class="month">May</div>
								<div class="year">2019</div>
							</div>
							<div class="label">Children: <span>0</span></div>
						</div>
					</div>
					<div class="form">
						<input type="text" class="input" placeholder="Your First Name">
						<input type="text" class="input" placeholder="Your Last Name">
						<input type="email" class="input" placeholder="Your Email">
						<input type="tel" class="input" placeholder="Your Number Phone">
						<textarea class="textarea" placeholder="Where are your address?"></textarea>
						<textarea class="textarea" placeholder="Note:"></textarea>
						<button class="submit button js-submit">Book Now | <b>$356</b></button>
					</div>
				</div>
			</div>
		</div>
		<div class="close"></div>
	</div>

	<!-- <div class="popup success-popup" id="contact-us-success">
		<div class="scroll">
			<div class="scroll_wrap">
				<div class="popup-head">
					<div class="title">Success</div>
				</div>
				<div class="popup-body">
					<div class="subtitle">
						Your message was successfully sent. We will contact you shortly
					</div>
				</div>
			</div>
		</div>
		<div class="close"></div>
	</div> -->

	<div class="popup success-popup" id="contact-us-success">
		<div class="scroll">
			<div class="scroll_wrap">
				<div class="popup-head">
					<div class="title">Success</div>
				</div>
				<div class="popup-body">
					<div class="subtitle">
						Sign Up successful.
					</div>
				</div>
			</div>
		</div>
		<div class="close"></div>
	</div>

	<!-- libs-->
	<script src="ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="js/libs.min.js"></script>
	<!-- scripts-->
	<script src="js/common.js"></script>
	<script src="js/main_slider/scripts.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/main_slider/jquery-ui.min.js"></script>
	<script src="js/main_slider/lightgallery.js"></script>
	<script src="js/main_slider/jquery.mousewheel.min.js"></script>
	<script src="js/main_slider/slick.min.js"></script>
	<script src="js/main_slider/hammer.js"></script>

	<!-- <script src="js/jquery.min.js"></script> -->
	<!-- <script src="js/bootstrap.min.js"></script> -->
	<!-- <script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script> -->
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/actions.js"></script>
	<script src="js/sweetalert.min"></script>
	<script src="js/jquery.payform.min.js" charset="utf-8"></script>
	<script src="js/script.js"></script>
	
	<script>var c = 0;
        function menu(){
          if(c % 2 == 0) {
            document.querySelector('.cont_drobpdown_menu').className = "cont_drobpdown_menu active";    
            document.querySelector('.cont_icon_trg').className = "cont_icon_trg active";    
            c++; 
              }else{
            document.querySelector('.cont_drobpdown_menu').className = "cont_drobpdown_menu disable";        
            document.querySelector('.cont_icon_trg').className = "cont_icon_trg disable";        
            c++;
              }
        }
           
		
</script>
    <script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>
	

	
</body>
</html>