<?php include 'header.php' ?>
<div class="super_container">

	<!-- Header -->
	<?php include 'navbar.php' ?>

	<!-- Menu -->
	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="logo menu_mm"><a href="#">Avision</a></div>
		<div class="search">
			<form action="#">
				<input type="search" class="header_search_input menu_mm" required="required" placeholder="Type to Search...">
				<img class="header_search_icon menu_mm" src="<?= base_url(); ?>/assets/images/search_2.png" alt="">
			</form>
		</div>
		<nav class="menu_nav">
			<ul class="menu_mm">
				<li class="menu_mm"><a href="<?= base_url(); ?>">home</a></li>
				<li class="menu_mm"><a href="#">Fashion</a></li>
				<li class="menu_mm"><a href="#">Gadgets</a></li>
				<li class="menu_mm"><a href="#">Lifestyle</a></li>
				<li class="menu_mm"><a href="#">Video</a></li>
				<li class="menu_mm"><a href="contact.html">Contact</a></li>
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
								<div class="section_title">Don't Miss</div>
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
							<div id = "dontmisscard" class="card mb-2">
							
							</div>
							<div class="card mb-2" >
								<div id = "dontmisssub" class="row no-gutters">
									
								</div>
							</div>
						</div>

						<!-- Blog Section - What's Trending -->

						<div class="blog_section">
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
						</div>

						<!-- Blog Section - Videos -->

						<div class="blog_section">
							<div class="section_panel d-flex flex-row align-items-center justify-content-start">
								<div class="section_title">Most Popular Videos</div>
							</div>
							<div class="section_content">
								<div class="row">
									<div class="col">
										<div class="videos">
											<div class="player_container">
												<div id="P1" class="player" 
												     data-property="{videoURL:'2ScS5kwm7nI',containment:'self',startAt:0,mute:false,autoPlay:false,loop:false,opacity:1}">
												</div>
											</div>
											<div class="playlist">
												<div class="playlist_background"></div>

												<!-- Video -->
												<div class="video_container video_command active" onclick="jQuery('#P1').YTPChangeVideo({videoURL: '2ScS5kwm7nI', mute:false, addRaster:true})">
													<div class="video d-flex flex-row align-items-center justify-content-start">
														<div class="video_image"><div><img src="<?= base_url(); ?>/assets/images/video_1.jpg" alt=""></div><img class="play_img" src="<?= base_url(); ?>/assets/images/play.png" alt=""></div>
														<div class="video_content">
															<div class="video_title">How Did van Gogh’s Turbulent Mind</div>
															<div class="video_info"><span>1.2M views</span><span>Sep 29</span></div>
														</div>
													</div>
												</div>

												<!-- Video -->
												<div class="video_container video_command" onclick="jQuery('#P1').YTPChangeVideo({videoURL: 'BzMLA8YIgG0', mute:false, addRaster:true})">
													<div class="video d-flex flex-row align-items-center justify-content-start">
														<div class="video_image"><div><img src="<?= base_url(); ?>/assets/images/video_2.jpg" alt=""></div><img class="play_img" src="<?= base_url(); ?>/assets/images/play.png" alt=""></div>
														<div class="video_content">
															<div class="video_title">How Did van Gogh’s Turbulent Mind</div>
															<div class="video_info"><span>1.2M views</span><span>Sep 29</span></div>
														</div>
													</div>
												</div>

												<!-- Video -->
												<div class="video_container video_command" onclick="jQuery('#P1').YTPChangeVideo({videoURL: 'bpbcSdqvtUQ', mute:false, addRaster:true})">
													<div class="video d-flex flex-row align-items-center justify-content-start">
														<div class="video_image"><div><img src="<?= base_url(); ?>/assets/images/video_3.jpg" alt=""></div><img class="play_img" src="<?= base_url(); ?>/assets/images/play.png" alt=""></div>
														<div class="video_content">
															<div class="video_title">How Did van Gogh’s Turbulent Mind</div>
															<div class="video_info"><span>1.2M views</span><span>Sep 29</span></div>
														</div>
													</div>
												</div>

												<!-- Video -->
												<div class="video_container video_command" onclick="jQuery('#P1').YTPChangeVideo({videoURL: 'UjYemgbhJF0', mute:false, addRaster:true})">
													<div class="video d-flex flex-row align-items-center justify-content-start">
														<div class="video_image"><div><img src="<?= base_url(); ?>/assets/images/video_4.jpg" alt=""></div><img class="play_img" src="<?= base_url(); ?>/assets/images/play.png" alt=""></div>
														<div class="video_content">
															<div class="video_title">How Did van Gogh’s Turbulent Mind</div>
															<div class="video_info"><span>1.2M views</span><span>Sep 29</span></div>
														</div>
													</div>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Blog Section - Latest -->

						<div class="blog_section">
							<div class="section_panel d-flex flex-row align-items-center justify-content-start">
								<div class="section_title">Latest Articles</div>
							</div>
							<div class="section_content">
								<div id= "blog_section_g" class="grid clearfix">
									<!-- <div class="card card_small_with_image grid-item">

									</div> -->
								</div>								
							</div>
						</div>
					</div>
					<div class="load_more">
						<div id="load_more_test" class="load_more_button text-center trans_200">Load More</div>
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

<script src="<?= base_url(); ?>/assets/js/jquery-3.2.1.min.js"></script>
<script src="<?= base_url(); ?>/assets/styles/bootstrap4/popper.js"></script>
<script src="<?= base_url(); ?>/assets/styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/jquery.mb.YTPlayer-3.1.12/jquery.mb.YTPlayer.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/easing/easing.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/masonry/masonry.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/masonry/images_loaded.js"></script>
<script src="<?= base_url(); ?>/assets/js/custom.js"></script>
<script>
	$(document).ready(function(){
		var wrapper		= $("#dontmisscard");
		var wrapper2	= $("#dontmisssub");

		$.ajax({
			url: "<?php echo site_url('NewsLoad/newsload');?>",
			type: 'POST',                       
			data: "limit="+8,
			dataType: 'json',				
			success: function( response ) {
				var table_wrapper	= "";
				var table_wrapper2	= "";

				// for (i = 0; i < response.length; i++){
				// 	table_wrapper+='<div class="card card_small_with_image grid-item">'+
				// 						'<img class="card-img-top" src="<?= base_url(); ?>/assets/images/post_10.jpg" alt="">'+
				// 						'<div class="card-body">'+
				// 							'<div class="card-title card-title-small"><a href="post.html">'+response[i].judul+'</a></div>'+
				// 							'<small class="post_meta"><a href="#">Katy Liu</a><span>'+response[i].created_at+'</span></small>'+
				// 						'</div>'+
				// 					'</div>';
				// }
				for (i = 0; i < response.length; i++){
					if (i > 0){
						table_wrapper2 += '<div class="col-md-4">'+
											'<img src="<?= base_url(); ?>/assets/images/post_15.jpg" class="card-img" alt="...">'+
										 '</div>'+
										 '<div class="col-md-8">'+
											'<div class="card-body">'+
												'<h5 class="card-title"><a href="post.html">'+response[i].judul+'</a></h5>'+
												'<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>'+
												'<p class="card-text"><small class="text-muted"><span>'+response[i].created_at+'</span></small></p>'+
											'</div>'+
										 '</div>';
					}

					table_wrapper = '<img src="<?= base_url(); ?>/assets/images/post_10.jpg" class="card-img-top" alt="">'+
								'<div class="card-body">'+
									'<h3 class="card-title"><a href="post.html">'+response[i].judul+'</a></h3>'+
									'<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>'+
									'<small class="post_meta"><a href="#">Katy Liu</a><span>'+response[i].created_at+'</span></small>'+
								'</div>';
								console.log(response[i].judul);
				}
				$(wrapper).html(table_wrapper);
				$(wrapper2).html(table_wrapper2);				
			}
		});

		// $("#load_more_test").click(function(){
		// 	$.ajax({
		// 		url: "<?php echo site_url('LoadMore/loadmore');?>",
		// 		type: 'POST',                       
		// 		data: "limit="+8,
		// 		dataType: 'json',				
		// 		success: function( response ) {
		// 			var table_wrapper	="";

		// 			for (i = 0; i < response.length; i++){
		// 				table_wrapper	+= '<div class="card card_small_with_image grid-item">'+
		// 								'<img class="card-img-top" src="<?= base_url(); ?>/assets/images/post_10.jpg" alt="">'+
		// 								'<div class="card-body">'+
		// 									'<div class="card-title card-title-small"><a href="post.html">'+response[i].judul+'</a></div>'+
		// 									'<small class="post_meta"><a href="#">Katy Liu</a><span>Sep 29, 2017 at 9:48 am</span></small>'+
		// 								'</div>'+
		// 							'</div>';
		// 			}
		// 			$(wrapper).html(table_wrapper);
		// 		}
		// 	});
		// });
	});
		
</script>
</body>
</html>