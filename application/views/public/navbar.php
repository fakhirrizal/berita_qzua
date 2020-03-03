<header class="header">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start">
						<div class="logo"><a href="#"><img src='<?= base_url().'assets/images/qzua.png'?>' class='new-logo'></a></div>
						<nav class="main_nav">
							<ul>
								<li class="active"><a href="<?= base_url(); ?>">Home</a></li>
								<li><a href="<?= base_url(); ?>kategori/News">News</a></li>
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