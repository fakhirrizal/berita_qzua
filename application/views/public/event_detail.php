<!DOCTYPE html>
<html lang="en">
<head>
	<title>Queensland Zhejiang United Association Inc. - <?= $data_event->judul; ?></title>
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
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/styles/post.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/styles/post_responsive.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/styles/new_style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
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
								<li><a href="<?= base_url(); ?>news">News</a></li>
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
	
	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url(); ?>assets/images/post.jpg" data-speed="0.8"></div>
		<div class="home_content">
			<div class="post_category trans_200"><a href="#" class="trans_200">Event</a></div>
			<div class="post_title"><?= $data_event->judul; ?></div>
		</div>
	</div>
	
	<!-- Page Content -->

	<div class="page_content">
		<div class="container">
			<div class="row row-lg-eq-height">

				<!-- Post Content -->

				<div class="col-lg-9">
					<div class="post_content">

						<!-- Top Panel -->
						<div class="post_panel post_panel_top d-flex flex-row align-items-center justify-content-start">
							<?php
							$img_src = '';
							if($data_event->photo==NULL OR $data_event->photo==''){
								$img_src = base_url().'assets/default-profile.png';
							}else{
								$img_src = base_url().'data_upload/photo_profile/'.$data_event->photo;
							}
							?>
							<div class="author_image"><div><img src="<?= $img_src; ?>" alt=""></div></div>
							<div class="post_meta"><a href="#"><?= $data_event->fullname; ?></a><span><?= date("M d, Y", strtotime($data_event->created_at)).' at '.date("h:i a", strtotime($data_event->created_at)); ?></span></div>
							<div class="post_share ml-sm-auto">
								<span>share</span>
								<ul class="post_share_list">
									<li class="post_share_item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li class="post_share_item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li class="post_share_item"><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>

						<!-- Post Body -->

						<div class="post_body">
							<p class="post_p"><?= $data_event->deskripsi; ?></p>
						</div>
						
						<!-- Similar Posts -->
						<div class="similar_posts">
							<div class="grid clearfix">
								<?php
								foreach ($other_event as $key => $value) {
									$thumbnail = '';
									if($value->poster=='' OR $value->poster==NULL){
										$thumbnail = base_url().'assets/none.png';
									}else{
										$thumbnail = base_url().'data_upload/event/'.$value->poster;
									}
								?>
								<div class="card card_small_with_image grid-item">
									<img class="card-img-top" src="<?= $thumbnail; ?>" alt="">
									<div class="card-body">
										<div class="card-title card-title-small"><a href="<?= base_url(); ?>news_detail/<?= $value->id_event; ?>"><?= $value->judul; ?></a></div>
										<small class="post_meta"><a href="#"><?= $value->fullname; ?></a><span><?= date("M d, Y", strtotime($value->created_at)).' at '.date("h:i a", strtotime($value->created_at)); ?></span></small>
									</div>
								</div>
								<?php }
								?>
								<!-- <div class="card card_small_with_image grid-item">
									<img class="card-img-top" src="<?= base_url(); ?>assets/images/post_2.jpg" alt="https://unsplash.com/@jakobowens1">
									<div class="card-body">
										<div class="card-title card-title-small"><a href="post.html">How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</a></div>
										<small class="post_meta"><a href="#">Katy Liu</a><span>Sep 29, 2017 at 9:48 am</span></small>
									</div>
								</div>

								<div class="card card_small_with_image grid-item">
									<img class="card-img-top" src="<?= base_url(); ?>assets/images/post_26.jpg" alt="https://unsplash.com/@jakobowens1">
									<div class="card-body">
										<div class="card-title card-title-small"><a href="post.html">How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</a></div>
										<small class="post_meta"><a href="#">Katy Liu</a><span>Sep 29, 2017 at 9:48 am</span></small>
									</div>
								</div> -->

							</div>
						</div>
					</div>
					<!-- <div class="load_more">
						<div id="load_more" class="load_more_button text-center trans_200">Load More</div>
					</div> -->
				</div>

				<!-- Sidebar -->

				<div class="col-lg-3">
					<div class="sidebar">
						<div class="sidebar_background"></div>

						<!-- Top Stories -->

						<div class="sidebar_section">
							<div class="sidebar_title_container">
								<div class="sidebar_title">Top Stories</div>
								<div class="sidebar_slider_nav">
									<div class="custom_nav_container sidebar_slider_nav_container">
										<div class="custom_prev custom_prev_top">
											<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
												 width="7px" height="12px" viewBox="0 0 7 12" enable-background="new 0 0 7 12" xml:space="preserve">
												<polyline fill="#bebebe" points="0,5.61 5.609,0 7,0 7,1.438 2.438,6 7,10.563 7,12 5.609,12 -0.002,6.39 "/>
											</svg>
										</div>
								        <ul id="custom_dots" class="custom_dots custom_dots_top">
											<li class="custom_dot custom_dot_top active"><span></span></li>
											<li class="custom_dot custom_dot_top"><span></span></li>
											<li class="custom_dot custom_dot_top"><span></span></li>
										</ul>
										<div class="custom_next custom_next_top">
											<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
												 width="7px" height="12px" viewBox="0 0 7 12" enable-background="new 0 0 7 12" xml:space="preserve">
												<polyline fill="#bebebe" points="6.998,6.39 1.389,12 -0.002,12 -0.002,10.562 4.561,6 -0.002,1.438 -0.002,0 1.389,0 7,5.61 "/>
											</svg>
										</div>
									</div>
								</div>
							</div>
							<div class="sidebar_section_content">

								<!-- Top Stories Slider -->
								<div class="sidebar_slider_container">
									<div class="owl-carousel owl-theme sidebar_slider_top">
										<?php
										$databerita = $this->Main_model->getSelectedData('berita a', 'a.*,b.fullname', '', 'a.counter DESC', '12', '', '', array(
											'table' => 'user b',
											'on' => 'a.created_by=b.id',
											'pos' => 'LEFT'
										))->result();
										if($databerita==NULL){
											echo'';
										}else{
											$tanda_1 = '';
											$tanda_2 = '';
											$nomor = 0;
										?>
										<div class="owl-item">
											<?php
											if(count($databerita)>4){
												foreach ($databerita as $key => $value) {
													$thumbnail = '';
													if($value->thumbnail=='' OR $value->thumbnail==NULL){
														$thumbnail = base_url().'assets/none.png';
													}else{
														$thumbnail = base_url().'data_upload/berita/'.$value->thumbnail;
													}
													if($nomor=='0' OR $nomor=='1' OR $nomor=='2' OR $nomor=='3'){
											?>
											<div class="side_post">
												<a href="<?= base_url(); ?>news_detail/<?= $value->id_berita; ?>">
													<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
														<div class="side_post_image"><div><img src="<?= $thumbnail; ?>" alt=""></div></div>
														<div class="side_post_content">
															<div class="side_post_title"><?= $value->judul; ?></div>
															<small class="post_meta"><?= $value->fullname; ?><span><?= date("M d", strtotime($value->created_at)); ?></span></small>
														</div>
													</div>
												</a>
											</div>
										<?php
													$nomor++;
													}else{echo'';}
												}
												$tanda_1 = 'lanjut';
											}else{
												foreach ($databerita as $key => $value) {
													$thumbnail = '';
													if($value->thumbnail=='' OR $value->thumbnail==NULL){
														$thumbnail = base_url().'assets/none.png';
													}else{
														$thumbnail = base_url().'data_upload/berita/'.$value->thumbnail;
													}
													?>
											<div class="side_post">
												<a href="<?= base_url(); ?>news_detail/<?= $value->id_berita; ?>">
													<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
														<div class="side_post_image"><div><img src="<?= $thumbnail; ?>" alt=""></div></div>
														<div class="side_post_content">
															<div class="side_post_title"><?= $value->judul; ?></div>
															<small class="post_meta"><?= $value->fullname; ?><span><?= date("M d", strtotime($value->created_at)); ?></span></small>
														</div>
													</div>
												</a>
											</div>		
													<?php
												}
											}
										?>
										</div>
										<?php
										$nomor = 0;
										if($tanda_1=='lanjut'){
											if(count($databerita)>8){
												$tanda_2 = 'lanjut';
											}else{
												echo'';
											}
										?>
										<div class="owl-item">
											<?php
											foreach ($databerita as $key => $value) {
												if($nomor=='4' OR $nomor=='5' OR $nomor=='6' OR $nomor=='7'){
													$thumbnail = '';
													if($value->thumbnail=='' OR $value->thumbnail==NULL){
														$thumbnail = base_url().'assets/none.png';
													}else{
														$thumbnail = base_url().'data_upload/berita/'.$value->thumbnail;
													}
											?>
											<div class="side_post">
												<a href="<?= base_url(); ?>news_detail/<?= $value->id_berita; ?>">
													<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
														<div class="side_post_image"><div><img src="<?= $thumbnail; ?>" alt=""></div></div>
														<div class="side_post_content">
															<div class="side_post_title"><?= $value->judul; ?></div>
															<small class="post_meta"><?= $value->fullname; ?><span><?= date("M d", strtotime($value->created_at)); ?></span></small>
														</div>
													</div>
												</a>
											</div>
												<?php }else{echo'';}$nomor++;} ?>
										</div>
										<?php
										}else{echo'';}
										if($tanda_2=='lanjut'){
										?>
										<div class="owl-item">
											<?php
											$nomor = 0;
											foreach ($databerita as $key => $value) {
												if($nomor=='8' OR $nomor=='9' OR $nomor=='10' OR $nomor=='11'){
													$thumbnail = '';
													if($value->thumbnail=='' OR $value->thumbnail==NULL){
														$thumbnail = base_url().'assets/none.png';
													}else{
														$thumbnail = base_url().'data_upload/berita/'.$value->thumbnail;
													}
											?>
											<div class="side_post">
												<a href="<?= base_url(); ?>news_detail/<?= $value->id_berita; ?>">
													<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
														<div class="side_post_image"><div><img src="<?= $thumbnail; ?>" alt=""></div></div>
														<div class="side_post_content">
															<div class="side_post_title"><?= $value->judul; ?></div>
															<small class="post_meta"><?= $value->fullname; ?><span><?= date("M d", strtotime($value->created_at)); ?></span></small>
														</div>
													</div>
												</a>
											</div>
											<?php }else{echo'';}$nomor++;} ?>
										</div>
										<?php }else{echo'';}} ?>
									</div>
								</div>
							</div>
						</div>

						<!-- Advertising -->

						<div class="sidebar_section">
							<div class="advertising">
								<?php
								$get_data_ads = $this->Main_model->getSelectedData('iklan a', 'a.*', array("a.status" => 'displayed'))->row();
								?>
								<div class="advertising_background" style="background-image:url(<?= base_url(); ?>data_upload/iklan/<?= $get_data_ads->banner; ?>)"></div>
								<div class="advertising_content d-flex flex-column align-items-start justify-content-end">
									<!-- <div class="advertising_perc">-15%</div> -->
									<div class="advertising_link"><a href="#"><?= $get_data_ads->judul; ?></a></div>
								</div>
							</div>
						</div>

						<!-- Newest Videos -->

						<!-- <div class="sidebar_section newest_videos">
							<div class="sidebar_title_container">
								<div class="sidebar_title">Newest Videos</div>
								<div class="sidebar_slider_nav">
									<div class="custom_nav_container sidebar_slider_nav_container">
										<div class="custom_prev custom_prev_vid">
											<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
												 width="7px" height="12px" viewBox="0 0 7 12" enable-background="new 0 0 7 12" xml:space="preserve">
												<polyline fill="#bebebe" points="0,5.61 5.609,0 7,0 7,1.438 2.438,6 7,10.563 7,12 5.609,12 -0.002,6.39 "/>
											</svg>
										</div>
								        <ul id="custom_dots" class="custom_dots custom_dots_vid">
											<li class="custom_dot custom_dot_vid active"><span></span></li>
											<li class="custom_dot custom_dot_vid"><span></span></li>
											<li class="custom_dot custom_dot_vid"><span></span></li>
										</ul>
										<div class="custom_next custom_next_vid">
											<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
												 width="7px" height="12px" viewBox="0 0 7 12" enable-background="new 0 0 7 12" xml:space="preserve">
												<polyline fill="#bebebe" points="6.998,6.39 1.389,12 -0.002,12 -0.002,10.562 4.561,6 -0.002,1.438 -0.002,0 1.389,0 7,5.61 "/>
											</svg>
										</div>
									</div>
								</div>
							</div>
							<div class="sidebar_section_content">

								<div class="sidebar_slider_container">
									<div class="owl-carousel owl-theme sidebar_slider_vid">

										<div class="owl-item">

											<div class="side_post">
												<a href="post.html">
													<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
														<div class="side_post_image"><div><img src="<?= base_url(); ?>assets/images/vid_1.jpg" alt=""></div></div>
														<div class="side_post_content">
															<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
															<small class="post_meta">Katy Liu<span>Sep 29</span></small>
														</div>
													</div>
												</a>
											</div>

											<div class="side_post">
												<a href="post.html">
													<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
														<div class="side_post_image"><div><img src="<?= base_url(); ?>assets/images/vid_2.jpg" alt=""></div></div>
														<div class="side_post_content">
															<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
															<small class="post_meta">Katy Liu<span>Sep 29</span></small>
														</div>
													</div>
												</a>
											</div>

											<div class="side_post">
												<a href="post.html">
													<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
														<div class="side_post_image"><div><img src="<?= base_url(); ?>assets/images/vid_3.jpg" alt=""></div></div>
														<div class="side_post_content">
															<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
															<small class="post_meta">Katy Liu<span>Sep 29</span></small>
														</div>
													</div>
												</a>
											</div>

											<div class="side_post">
												<a href="post.html">
													<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
														<div class="side_post_image"><div><img src="<?= base_url(); ?>assets/images/vid_4.jpg" alt=""></div></div>
														<div class="side_post_content">
															<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
															<small class="post_meta">Katy Liu<span>Sep 29</span></small>
														</div>
													</div>
												</a>
											</div>

										</div>

										<div class="owl-item">

											<div class="side_post">
												<a href="post.html">
													<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
														<div class="side_post_image"><div><img src="<?= base_url(); ?>assets/images/vid_1.jpg" alt=""></div></div>
														<div class="side_post_content">
															<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
															<small class="post_meta">Katy Liu<span>Sep 29</span></small>
														</div>
													</div>
												</a>
											</div>

											<div class="side_post">
												<a href="post.html">
													<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
														<div class="side_post_image"><div><img src="<?= base_url(); ?>assets/images/vid_2.jpg" alt=""></div></div>
														<div class="side_post_content">
															<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
															<small class="post_meta">Katy Liu<span>Sep 29</span></small>
														</div>
													</div>
												</a>
											</div>

											<div class="side_post">
												<a href="post.html">
													<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
														<div class="side_post_image"><div><img src="<?= base_url(); ?>assets/images/vid_3.jpg" alt=""></div></div>
														<div class="side_post_content">
															<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
															<small class="post_meta">Katy Liu<span>Sep 29</span></small>
														</div>
													</div>
												</a>
											</div>

											<div class="side_post">
												<a href="post.html">
													<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
														<div class="side_post_image"><div><img src="<?= base_url(); ?>assets/images/vid_4.jpg" alt=""></div></div>
														<div class="side_post_content">
															<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
															<small class="post_meta">Katy Liu<span>Sep 29</span></small>
														</div>
													</div>
												</a>
											</div>

										</div>

										<div class="owl-item">

											<div class="side_post">
												<a href="post.html">
													<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
														<div class="side_post_image"><div><img src="<?= base_url(); ?>assets/images/vid_1.jpg" alt=""></div></div>
														<div class="side_post_content">
															<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
															<small class="post_meta">Katy Liu<span>Sep 29</span></small>
														</div>
													</div>
												</a>
											</div>

											<div class="side_post">
												<a href="post.html">
													<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
														<div class="side_post_image"><div><img src="<?= base_url(); ?>assets/images/vid_2.jpg" alt=""></div></div>
														<div class="side_post_content">
															<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
															<small class="post_meta">Katy Liu<span>Sep 29</span></small>
														</div>
													</div>
												</a>
											</div>

											<div class="side_post">
												<a href="post.html">
													<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
														<div class="side_post_image"><div><img src="<?= base_url(); ?>assets/images/vid_3.jpg" alt=""></div></div>
														<div class="side_post_content">
															<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
															<small class="post_meta">Katy Liu<span>Sep 29</span></small>
														</div>
													</div>
												</a>
											</div>

											<div class="side_post">
												<a href="post.html">
													<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
														<div class="side_post_image"><div><img src="<?= base_url(); ?>assets/images/vid_4.jpg" alt=""></div></div>
														<div class="side_post_content">
															<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
															<small class="post_meta">Katy Liu<span>Sep 29</span></small>
														</div>
													</div>
												</a>
											</div>

										</div>

									</div>
								</div>
							</div>
						</div> -->

						<!-- Advertising 2 -->

						<!-- <div class="sidebar_section">
							<div class="advertising_2">
								<div class="advertising_background" style="background-image:url(<?= base_url(); ?>assets/images/post_18.jpg)"></div>
								<div class="advertising_2_content d-flex flex-column align-items-center justify-content-center">
									<div class="advertising_2_link"><a href="#">Turbulent <span>Mind</span></a></div>
								</div>
							</div>
						</div> -->

						<!-- Future Events -->

						<div class="sidebar_section future_events">
							<div class="sidebar_title_container">
								<div class="sidebar_title">Future Events</div>
								<div class="sidebar_slider_nav">
									<div class="custom_nav_container sidebar_slider_nav_container">
										<div class="custom_prev custom_prev_events">
											<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
												 width="7px" height="12px" viewBox="0 0 7 12" enable-background="new 0 0 7 12" xml:space="preserve">
												<polyline fill="#bebebe" points="0,5.61 5.609,0 7,0 7,1.438 2.438,6 7,10.563 7,12 5.609,12 -0.002,6.39 "/>
											</svg>
										</div>
								        <ul id="custom_dots" class="custom_dots custom_dots_events">
											<li class="custom_dot custom_dot_events active"><span></span></li>
											<li class="custom_dot custom_dot_events"><span></span></li>
											<li class="custom_dot custom_dot_events"><span></span></li>
										</ul>
										<div class="custom_next custom_next_events">
											<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
												 width="7px" height="12px" viewBox="0 0 7 12" enable-background="new 0 0 7 12" xml:space="preserve">
												<polyline fill="#bebebe" points="6.998,6.39 1.389,12 -0.002,12 -0.002,10.562 4.561,6 -0.002,1.438 -0.002,0 1.389,0 7,5.61 "/>
											</svg>
										</div>
									</div>
								</div>
							</div>
							<div class="sidebar_section_content">

								<!-- Sidebar Slider -->
								<div class="sidebar_slider_container">
									<div class="owl-carousel owl-theme sidebar_slider_events">
										<?php
										$data_event = $this->Main_model->getSelectedData('event a', 'a.*,b.fullname', '', 'a.tanggal_pelaksanaan DESC', '12', '', '', array(
											'table' => 'user b',
											'on' => 'a.created_by=b.id',
											'pos' => 'LEFT'
										))->result();
										if($data_event==NULL){
											echo'';
										}else{
											$flag_1 = '';
											$flag_2 = '';
											if(count($data_event)>4){
												$flag_1 = 'lanjut';
											}else{
												echo'';
											}
										?>
										<div class="owl-item">
											<?php
											$nomor = 0;
											foreach ($data_event as $key => $value) {
												if($nomor=='0' OR $nomor=='1' OR $nomor=='2' OR $nomor=='3'){
											?>
											<div class="side_post">
												<a href="<?= base_url() ?>event_detail/<?= $value->id_event; ?>">
													<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
														<div class="event_date d-flex flex-column align-items-center justify-content-center">
															<div class="event_day"><?= date("d", strtotime($value->tanggal_pelaksanaan)); ?></div>
															<div class="event_month"><?= date("M", strtotime($value->tanggal_pelaksanaan)); ?></div>
														</div>
														<div class="side_post_content">
															<div class="side_post_title"><?= $value->judul; ?></div>
															<small class="post_meta"><?= $value->fullname; ?><span><?= date("M d", strtotime($value->created_at)); ?></span></small>
														</div>
													</div>
												</a>
											</div>
												<?php }else{echo'';}$nomor++;} ?>
										</div>
										<?php
										if($flag_1=='lanjut'){
											if(count($data_event)>8){
												$flag_2 = 'lanjut';
											}else{
												echo'';
											}
										?>
										<div class="owl-item">
											<?php
											$nomor = 0;
											foreach ($data_event as $key => $value) {
												if($nomor=='4' OR $nomor=='5' OR $nomor=='6' OR $nomor=='7'){
											?>
											<div class="side_post">
												<a href="<?= base_url() ?>event_detail/<?= $value->id_event; ?>">
													<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
														<div class="event_date d-flex flex-column align-items-center justify-content-center">
															<div class="event_day"><?= date("d", strtotime($value->tanggal_pelaksanaan)); ?></div>
															<div class="event_month"><?= date("M", strtotime($value->tanggal_pelaksanaan)); ?></div>
														</div>
														<div class="side_post_content">
															<div class="side_post_title"><?= $value->judul; ?></div>
															<small class="post_meta"><?= $value->fullname; ?><span><?= date("M d", strtotime($value->tanggal_pelaksanaan)); ?></span></small>
														</div>
													</div>
												</a>
											</div>
											<?php }else{echo'';}$nomor++;} ?>
										</div>
										<?php }else{echo'';}
										if($flag_2=='lanjut'){
										?>
										<div class="owl-item">
											<?php
											$nomor = 0;
											foreach ($data_event as $key => $value) {
												if($nomor=='8' OR $nomor=='9' OR $nomor=='10' OR $nomor=='11'){
											?>
											<div class="side_post">
												<a href="<?= base_url() ?>event_detail/<?= $value->id_event; ?>">
													<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
														<div class="event_date d-flex flex-column align-items-center justify-content-center">
															<div class="event_day"><?= date("d", strtotime($value->tanggal_pelaksanaan)); ?></div>
															<div class="event_month"><?= date("M", strtotime($value->tanggal_pelaksanaan)); ?></div>
														</div>
														<div class="side_post_content">
															<div class="side_post_title"><?= $value->judul; ?></div>
															<small class="post_meta"><?= $value->fullname; ?><span><?= date("M d", strtotime($value->tanggal_pelaksanaan)); ?></span></small>
														</div>
													</div>
												</a>
											</div>
											<?php }else{echo'';}$nomor++;} ?>
										</div>
										<?php }else{echo'';}} ?>
									</div>
								</div>
							</div>
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
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            type:"POST",
            url: "<?php echo site_url(); ?>User/ajax_function",
            cache: false,
        });
        $('.detaildata').click(function(){
        var id = $(this).attr("id");
        var modul = 'get_parent_comment';
        $.ajax({
            data: {id:id,modul:modul},
            success:function(data){
                $('#in_reply').html(data);
				$('#remove_reply').click(function(){
				var modul = 'remove_parent_comment';
				$.ajax({
					data: {modul:modul},
					success:function(data){
						$('#in_reply').html(data);
					}
				});
				});
            }
        });
        });
    });
</script>
<script src="<?= base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
<script src="<?= base_url(); ?>assets/styles/bootstrap4/popper.js"></script>
<script src="<?= base_url(); ?>assets/styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?= base_url(); ?>assets/plugins/easing/easing.js"></script>
<script src="<?= base_url(); ?>assets/plugins/masonry/masonry.js"></script>
<script src="<?= base_url(); ?>assets/plugins/parallax-js-master/parallax.min.js"></script>
<script src="<?= base_url(); ?>assets/js/post.js"></script>
</body>
</html>