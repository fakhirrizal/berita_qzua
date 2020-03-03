<!DOCTYPE html>
<html lang="en">
<head>
    <title>Queensland Zhejiang United Association Inc. - <?= $kategori_berita; ?></title>
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
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/styles/responsive.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/styles/new_style.css">
    <link href="<?= base_url(); ?>assets/logo.png" rel="icon" type="image/x-icon">
</head>
<body>
<?php
$id_kategori_berita = '';
?>
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
								<li class="active"><a href="<?= base_url(); ?>kategori/News">News</a></li>
								<li><a href="<?= base_url(); ?>about">About</a></li>
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
				<li class="menu_mm"><a href="<?= base_url(); ?>">home</a></li>
				<li class="menu_mm"><a href="<?= base_url(); ?>news">News</a></li>
				<li class="menu_mm"><a href="<?= base_url(); ?>about">About</a></li>
				<li class="menu_mm"><a href="<?= base_url(); ?>contact">Contact</a></li>
			</ul>
		</nav>
	</div>
	
	<!-- Home
	<div class="home">
		
		Home Slider
		?php include 'banner.php' ?
	</div>-->
	
	<!-- Page Content -->

	<div class="page_content">
		<div class="container">
			<div class="row row-lg-eq-height">

				<!-- Main Content -->

				<div class="col-lg-9">
					<div class="main_content">

						<!-- Blog Section - Don't Miss -->

						<div class="blog_section">
							<div class="section_panel d-flex flex-row align-items-center justify-content-start">
								<div class="section_title">"<?= $kategori_berita; ?>" Category is Not Found</div>
								<div class="section_tags ml-auto">
									<ul>
										<li><a href="<?= base_url(); ?>">all</a></li>
									</ul>
								</div>
                                <?php
								if($kategori!=NULL){
									echo'
									<div class="section_panel_more">
										<ul>
											<li>more
												<ul style="height: 300px;overflow: scroll;">';
												foreach ($kategori as $key => $value) {
													echo'<li><a href="'.base_url().'kategori/'.$value->kategori_berita.'">'.$value->kategori_berita.'</a></li>';
												}
											echo'</ul>
											</li>
										</ul>
									</div>';
								}else{
									echo'';
								}
								?>
							</div>
							<div id = "dontmisscard">							
							</div>
							<div id = "dontmisssub">							
							</div>
							<!-- <div id = "dontmisscard2" class="card mb-2">							
							</div> -->

						</div>

						<!-- Blog Section - What's Trending -->

						<!-- <div class="blog_section">
							<div class="section_panel d-flex flex-row align-items-center justify-content-start">
								<div class="section_title">What's Trending</div>
								<div class="section_tags ml-auto">
									<ul>
										<li class="active"><a href="category.html">all</a></li>
										<li><a href="category.html">style hunter</a></li>
										<li><a href="category.html">vogue</a></li>
										<li><a href="category.html">health & fitness</a></li>
										<li><a href="category.html">travel</a></li>
									</ul>
								</div>
								<div class="section_panel_more">
									<ul>
										<li>more
											<ul>
												<li><a href="category.html">new look 2018</a></li>
												<li><a href="category.html">street fashion</a></li>
												<li><a href="category.html">business</a></li>
												<li><a href="category.html">recipes</a></li>
												<li><a href="category.html">sport</a></li>
												<li><a href="category.html">celebrities</a></li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
							<div class="section_content">
								<div class="grid clearfix">

								</div>
							</div>
						</div> -->

						<!-- Blog Section - Latest -->

						<div class="blog_section">
							<!-- <div class="section_panel d-flex flex-row align-items-center justify-content-start">
								<div class="section_title">Latest Articles</div>
							</div>
							<div class="section_content">
								<div id= "blog_section_g" class="grid clearfix">
									<div class="card card_small_with_image grid-item">

									</div>
								</div>								
							</div> -->
						</div>
					</div>
				</div>

				<!-- Sidebar -->
				<?php include 'sidebar.php' ?>

			</div>
		</div>
	</div>

	<!-- Footer -->

	<?php include 'footer.php' ?>
</div>

<script src="<?= base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
<script src="<?= base_url(); ?>assets/styles/bootstrap4/popper.js"></script>
<script src="<?= base_url(); ?>assets/styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jquery.mb.YTPlayer-3.1.12/jquery.mb.YTPlayer.js"></script>
<script src="<?= base_url(); ?>assets/plugins/easing/easing.js"></script>
<script src="<?= base_url(); ?>assets/plugins/masonry/masonry.js"></script>
<script src="<?= base_url(); ?>assets/plugins/masonry/images_loaded.js"></script>
<script src="<?= base_url(); ?>assets/js/custom.js"></script>
</body>
</html>