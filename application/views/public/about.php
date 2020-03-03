<!DOCTYPE html>
<html lang="en">
<head>
    <title>Queensland Zhejiang United Association Inc. - About</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Queensland Zhejiang United Association Inc.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/styles/bootstrap4/bootstrap.min.css">
    <link href="<?= base_url(); ?>assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/plugins/jquery.mb.YTPlayer-3.1.12/jquery.mb.YTPlayer.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/styles/regular.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/styles/regular_responsive.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/styles/new_style.css">
    <link href="<?= base_url(); ?>assets/logo.png" rel="icon" type="image/x-icon">
</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start">
						<div class="logo"><a href="#"><img src='<?= base_url().'assets/images/qzua.png'?>' class='new-logo'></a></div>
						<nav class="main_nav">
							<ul>
								<li><a href="<?= base_url(); ?>">Home</a></li>
								<li><a href="<?= base_url(); ?>kategori/News">News</a></li>
								<li class="active"><a href="<?= base_url(); ?>about">About</a></li>
								<li><a href="<?= base_url(); ?>contact">Contact</a></li>
							</ul>
						</nav>
						<div class="search_container ml-auto">
							<!-- <div class="weather">
								<div class="temperature">+10°</div>
								<img class="weather_icon" src="<?= base_url(); ?>assets/images/cloud.png" alt="">
							</div> -->
							<form action="<?= base_url(); ?>searching" method='post'>
								<input type="search" class="header_search_input" name='key' required="required" placeholder="Type to Search...">
								<img class="header_search_icon" src="<?= base_url(); ?>assets/images/search.png" alt="">
							</form>
							
						</div>
						<div class="hamburger ml-auto menu_mm">
							<i class="fa fa-bars trans_200 menu_mm" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Menu -->

	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="logo menu_mm"><a href="#">Avision</a></div>
		<div class="search">
			<form action="#">
				<input type="search" class="header_search_input menu_mm" required="required" placeholder="Type to Search...">
				<img class="header_search_icon menu_mm" src="<?= base_url(); ?>assets/images/search_2.png" alt="">
			</form>
		</div>
		<nav class="menu_nav">
			<ul class="menu_mm">
				<li><a href="<?= base_url(); ?>">Home</a></li>
                <li><a href="<?= base_url(); ?>kategori/News">News</a></li>
                <li class="active"><a href="<?= base_url(); ?>about">About</a></li>
                <li><a href="<?= base_url(); ?>contact">Contact</a></li>
			</ul>
		</nav>
	</div>
	
	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url(); ?>assets/images/regular.jpg" data-speed="0.8"></div>
	</div>
	
	<!-- Page Content -->

	<div class="page_content">
		<div class="container">
			<div class="row">

				<!-- Post Content -->

				<div class="col-lg-10 offset-lg-1">
					<div class="post_content">

						<!-- Post Body -->

						<div class="post_body">
                            <div class='row'>
                                <div class="col-md-6" style='text-align:center'>
                                <img src="<?= base_url(); ?>assets/logo.png" width='100%' alt="">
                                </div>
                                <div class="col-md-6">
                                <p class="post_p">QZUA is a non-governmental, non-religious and non-profitable association registered in Australian Queensland. Main bodies of members consist of Zhejiang companies in Australia and investors and traders from Zhejiang province, China.</p>
                                </div>
                            </div>
                            <p class="post_p">Zhejiang entrepreneurs are working industriously and successfully all the time in the overseas investment. As for in Australia, they invested A$760 million during the financial year of 2014-2015. Zhejiang is also one of the largest import provinces of Australian goods in China, e.g. milk powder, raw wool, wine, bio-health product, coking and thermal collect. Therefore, it is not hard to find that the potential of cooperation between Zhejiang and Queensland is booming and prospective.</p>
							<p class="post_p">Main bodies of QZUA members consist of Zhejiang companies in Australia and investors and traders from Zhejiang province, China.</p>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row row-lg-eq-height">
				<div class="col-lg-9 order-lg-1 order-2">
					<div class="footer_content">
						<div class="footer_logo"><a href="#">avision</a></div>
						<div class="footer_social">
							<ul>
								<li class="footer_social_facebook"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li class="footer_social_twitter"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li class="footer_social_pinterest"><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
								<li class="footer_social_vimeo"><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
								<li class="footer_social_instagram"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li class="footer_social_google"><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
							</ul>
						</div>
						<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
					</div>
				</div>
				<div class="col-lg-3 order-lg-2 order-1">
					<div class="subscribe">
						<div class="subscribe_background"></div>
						<div class="subscribe_content">
							<div class="subscribe_title">Subscribe</div>
							<form action="<?= base_url(); ?>save_subscriber" method='post'>
								<input type="email" class="sub_input" name='alamat_surel' placeholder="Your Email" required="required">
								<button class="sub_button">
									<svg version="1.1" id="link_arrow_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 width="19px" height="13px" viewBox="0 0 19 13" enable-background="new 0 0 19 13" xml:space="preserve">
										<polygon fill="#FFFFFF" points="12.475,0 11.061,0 17.081,6.021 0,6.021 0,7.021 17.038,7.021 11.06,13 12.474,13 18.974,6.5 "/>
									</svg>
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<script src="<?= base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
<script src="<?= base_url(); ?>assets/styles/bootstrap4/popper.js"></script>
<script src="<?= base_url(); ?>assets/styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?= base_url(); ?>assets/plugins/easing/easing.js"></script>
<script src="<?= base_url(); ?>assets/plugins/masonry/masonry.js"></script>
<script src="<?= base_url(); ?>assets/plugins/parallax-js-master/parallax.min.js"></script>
<script src="<?= base_url(); ?>assets/js/regular.js"></script>
</body>
</html>