<?php require('header_marketplace.php') ?>

	<script id="jsbin-javascript">
	(function (global) {
		if(typeof (global) === "undefined")
		{
			throw new Error("window is undefined");
		}
	var _hash = "!";
	var noBackPlease = function () {
		global.location.href += "#";
			// making sure we have the fruit available for juice....
			// 50 milliseconds for just once do not cost much (^__^)
		global.setTimeout(function () {
			global.location.href += "!";
		}, 50);
	};	
		// Earlier we had setInerval here....
	global.onhashchange = function () {
		if (global.location.hash !== _hash) {
			global.location.hash = _hash;
		}
	};
	global.onload = function () {        
			noBackPlease();
			// disables backspace on page except on input fields and textarea..
			document.body.onkeydown = function (e) {
			var elm = e.target.nodeName.toLowerCase();
			if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
				e.preventDefault();
			}
			// stopping event bubbling up the DOM tree..
			e.stopPropagation();
		};		
	};
	})(window);
	</script>

	<main class="main">
		<!-- promo start-->
		<section class="promo-primary main_section">
			<picture>
				<source srcset="img/elements.jpg" media="(min-width: 992px)"/>
			<img class="img--bg" src="img/elements.jpg" alt="img"/>
			</picture>
			<div class="container">
				<div class="row">
					<div class="col-xl-6">
						<div class="align-container">
							<div class="align-container__item">
						<span class="promo-primary__pre-title">Rural Explorers'</span>
								<h1 class="promo-primary__title"><span>Market Place</span><br></h1>
						
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- promo end-->

		<div class="container" style='margin-left:80px; align-items:center;margin-top:10px'>
				<!-- row -->
				<div class="row">
					
					<!-- STORE -->
					<div id="store" class="col-md-auto">

						<div class="row" id="product-row">
							
							<div id="get_product"></div>
						</div>

						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination" id="pageno">
								<li ><a class="active" href="#aside">1</a></li>
								
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<div class="col-auto" id="product_msg"></div>


					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>

		

		<!-- section start-->
		<section class="section benefits main_section pt-5 pb-5">
			<img class="benefits__img" src="img/benefits-bg.png" alt="img"/>
			<div class="container">
				<div class="row bottom-50">
					<div class="col-12">
						<div class="heading heading--primary heading--style-2">
							<!-- <span class="heading__pre-title">Benefits</span> -->
							<h2 class="heading__title"><span>Why</span> <span>Shop Local?</span></h2>
							
						</div>
					</div>
				</div>
				<div class="row offset-margin">
					<div class="col-sm-6 col-lg-3">
						<div class="icon-item">
							<!-- <div class="icon-item__icon">
								<svg class="icon">
									<use xlink:href="#photo-camera"></use>
								</svg>
							</div> -->
							<h6 class="icon-item__title">You Help Support Local Businesses</h6>
							<p style="text-align: justify;">Buying from a local business or charity shop, whether from a market stall, an actual shop or an online shop, is a great way to support them both financially and figuratively by showing you love what they do. This means they’ll be able to continue doing the great work that they do.</p>
						</div>
					</div>
					<div class="col-sm-6 col-lg-3">
						<div class="icon-item">
							<!-- <div class="icon-item__icon">
								<svg class="icon">
									<use xlink:href="#cutlery"></use>
								</svg>
							</div> -->
							<h6 class="icon-item__title">Helps Create Demand for Local Jobs</h6>
							<p style="text-align: justify;">Local businesses often provide a large number of jobs to communities, and, in some cases, can even be someone’s first workplace to help kick-start their career. As the business grows, so too will the employment opportunities and local economy.</p>
						</div>
					</div>
					<div class="col-sm-6 col-lg-3">
						<div class="icon-item">
							<!-- <div class="icon-item__icon">
								<svg class="icon">
									<use xlink:href="#wifi"></use>
								</svg>
							</div> -->
							<h6 class="icon-item__title">You're likely to find quality products</h6>
							<p style="text-align: justify;">However, unlike larger stores that have to stock many products, local businesses are more likely to focus on the quality of the things they sell rather than the quantity. Our range of products are made to the highest quality, so you know that you are receiving something premium, special and made to last.</p>
						</div>
					</div>
					<div class="col-sm-6 col-lg-3">
						<div class="icon-item">
							<!-- <div class="icon-item__icon">
								<svg class="icon">
									<use xlink:href="#trophy"></use>
								</svg>
							</div> -->
							<h6 class="icon-item__title">It’s convenient</h6>
							<p style="text-align: justify;">Convenience plays a huge part in our lives. After all, how easy is it to just ‘pop to the shop’ when it’s within walking distance? Today, many people opt to shop locally because of its proximity to home. But shopping at SPANA is the perfect alternative for those who can’t leave their house or simply don’t want to.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- section end-->
	</main>
			
			

<?php require('footer.php') ?>