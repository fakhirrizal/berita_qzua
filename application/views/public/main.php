<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="description" content="Queensland Zhejiang United Association Inc.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Queensland Zhejiang United Association Inc.</title>

    <!-- Favicon -->
    <link rel="icon" href="<?= base_url(); ?>assets/img/logo.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/new-style.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
    
	<?php include 'header.php' ?>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    <?php include 'banner.php' ?>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Mag Posts Area Start ##### -->
    <section class="mag-posts-area d-flex flex-wrap">
		<?php include 'left_sidebar.php' ?>

        <!-- >>>>>>>>>>>>>>>>>>>>
             Main Posts Area
        <<<<<<<<<<<<<<<<<<<<< -->
        <div class="mag-posts-content mt-30 mb-30 p-30 box-shadow">
            <!-- Trending Now Posts Area -->
            <div class="trending-now-posts mb-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>OUR EVENT</h5>
                </div>

                <div class="trending-post-slides owl-carousel">
					<?php
					$get_event = $this->Main_model->getSelectedData('event a', 'a.*', '', 'a.tanggal_pelaksanaan DESC', '6')->result();
					foreach ($get_event as $key => $value) {
						$poster = '';
						if($value->poster==NULL){
							$poster = base_url().'assets/img/none.png';
						}else{
							$poster = base_url().'data_upload/event/'.$value->poster;
						}
					?>
                    <div class="single-trending-post">
                        <img src="<?= $poster; ?>" alt="">
                        <div class="post-content">
                            <!-- <a href="#" class="post-cata">Video</a> -->
                            <a href="<?= base_url().'event_detail/'.$value->id_event; ?>" class="post-title"><?= $value->judul; ?></a>
                        </div>
					</div>
					<?php } ?>
                </div>
            </div>

            <!-- Feature Video Posts Area -->
            <div class="feature-video-posts mb-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>Latest News</h5>
                </div>

                <div class="featured-video-posts">
                    <div class="row">
                        <div class="col-12 col-lg-7">
							<!-- Single Featured Post -->
							<?php
							$checking_data = $this->Main_model->getSelectedData('kategori_berita a', 'a.*',array('a.kategori_berita'=>'Videos'))->row();
							$check_berita = $this->db->query("SELECT a.*,(SELECT COUNT(b.id_berita) FROM komentar_berita b WHERE b.id_berita=a.id_berita) AS jml FROM berita a WHERE a.id_kategori_berita LIKE '%".$checking_data->id_kategori_berita."%' ORDER BY a.created_at DESC")->result();
							$tampung_real = array();
							foreach ($check_berita as $key => $value) {
								$pecah_kategori = explode(',',$value->id_kategori_berita);
								for ($i=0; $i < count($pecah_kategori); $i++) { 
									if($pecah_kategori[$i]==$checking_data->id_kategori_berita){
										$isi['id_berita'] = $value->id_berita;
										$isi['thumbnail'] = $value->thumbnail;
										$isi['created_at'] = $value->created_at;
										$isi['id_kategori_berita'] = $value->id_kategori_berita;
										$isi['judul'] = $value->judul;
										$isi['berita'] = $value->berita;
										$isi['video_link'] = $value->video_link;
										$isi['jml'] = $value->jml;
										$isi['counter'] = $value->counter;
										$tampung_real[] = $isi;
										break;
									}else{
										echo'';
									}
								}
							}
							$flag = 0;
							foreach ($tampung_real as $key => $value) {
								if($flag=='0'){
									$thumbnail = '';
									if($value['thumbnail']==NULL){
										$thumbnail = base_url().'assets/img/wordpress-background-video.png';
									}else{
										$thumbnail = base_url().'data_upload/berita/'.$value['thumbnail'];
									}
									$kategori_berita = array();
									$id_kategori_berita = explode(',',$value['id_kategori_berita']);
									for ($i=0; $i < count($id_kategori_berita); $i++) { 
										$get_kategori_berita = $this->Main_model->getSelectedData('kategori_berita a', 'a.*',array('a.id_kategori_berita'=>$id_kategori_berita[$i]))->row();
										if($get_kategori_berita->kategori_berita=='Videos'){
											echo'';
										}
										elseif($get_kategori_berita->kategori_berita=='News'){
											echo'';
										}else{
											$kategori_berita[] = $get_kategori_berita->kategori_berita;
										}
									}
							?>
                            <div class="single-featured-post">
                                <!-- Thumbnail -->
                                <div class="post-thumbnail mb-50">
                                    <img src="<?= $thumbnail; ?>" alt="">
                                    <a href="<?= $value['video_link']; ?>" target="_blank" class="video-play"><i class="fa fa-play"></i></a>
                                </div>
                                <!-- Post Contetnt -->
                                <div class="post-content">
                                    <div class="post-meta">
                                        <a href="#"><?= date("M d, Y", strtotime($value['created_at'])); ?></a>
                                        <a href="#"><?= implode(', ',$kategori_berita); ?></a>
                                    </div>
                                    <a href="<?= base_url().'news_detail/'.$value['id_berita']; ?>" class="post-title"><?= $value['judul']; ?></a>
                                    <p><?= $value['berita']; ?></p>
                                </div>
                                <!-- Post Share Area -->
                                <div class="post-share-area d-flex align-items-center justify-content-between">
                                    <!-- Post Meta -->
                                    <div class="post-meta pl-3">
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?= number_format($value['counter'],0); ?></a>
                                        <!-- <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a> -->
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?= number_format($value['jml'],0); ?></a>
                                    </div>
                                    <!-- Share Info -->
                                    <div class="share-info">
                                        <a href="#" class="sharebtn"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                        <!-- All Share Buttons -->
                                        <div class="all-share-btn d-flex">
                                            <a href="http://www.facebook.com/sharer.php?u=http://qzua.eaoron.co.id/" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            <a href="https://twitter.com/share?url=http://qzua.eaoron.co.id/&text=Queensland Zhejiang United Association Inc." class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a href="#" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                            <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
							</div>
								<?php }else{echo'';}$flag++;} ?>
                        </div>

                        <div class="col-12 col-lg-5">
                            <!-- Featured Video Posts Slide -->
                            <div class="featured-video-posts-slide owl-carousel">
								<?php
								$get_all_news = $this->Main_model->getSelectedData('berita a', 'a.*')->result();
								$get_news_1 = $this->Main_model->getSelectedData('berita a', 'a.*', '', 'a.created_at DESC', '4', '0')->result();
								echo'
								<div class="single--slide">';
								foreach ($get_news_1 as $key => $value) {
									$thumbnail = '';
									if($value->thumbnail==NULL){
										$thumbnail = base_url().'assets/img/none.png';
									}else{
										$thumbnail = base_url().'data_upload/berita/'.$value->thumbnail;
									}
                                    // echo'<div class="single-catagory-post d-flex flex-wrap">
                                    //     <div class="post-thumbnail bg-img" style="background-image: url('.$thumbnail.');">
                                    //     </div>
                                    //     <div class="post-content">
                                    //         <a href="'.base_url().'news_detail/'.$value->id_berita.'" class="post-title">'.$value->judul.'</a>
									// 		<div class="post-meta d-flex">
									// 		'.date("M d, Y", strtotime($value->created_at)).'
                                    //         </div>
                                    //     </div>
                                    // </div>';
                                    echo'<div class="single-blog-post d-flex style-3">
                                        <div class="post-thumbnail">
                                            <img src="'.$thumbnail.'" alt="">
                                        </div>
                                        <div class="post-content">
                                            <a href="'.base_url().'news_detail/'.$value->id_berita.'" class="post-title">'.$value->judul.'</a>
											<div class="post-meta d-flex">
											'.date("M d, Y", strtotime($value->created_at)).'
                                            </div>
                                        </div>
                                    </div>';
                                    // <div class="post-thumbnail" style="">
                                    //     <img src="'.$thumbnail.'" alt="">
                                    // </div>
								}
                                echo'</div>';
								for ($i= 1; $i <= count($get_all_news); $i++) { 
									if ( $bagi = $i % 4 == 0 ) {
										$get_news_i = $this->Main_model->getSelectedData('berita a', 'a.*', '', 'a.created_at DESC', '4', $i)->result();
										echo'
										<div class="single--slide">';
										foreach ($get_news_i as $key => $value) {
											$thumbnail = '';
											if($value->thumbnail==NULL){
												$thumbnail = base_url().'assets/img/none.png';
											}else{
												$thumbnail = base_url().'data_upload/berita/'.$value->thumbnail;
											}
											// echo'<div class="single-catagory-post d-flex flex-wrap">
                                            //     <div class="post-thumbnail bg-img" style="background-image: url('.$thumbnail.');">
                                            //     </div>
											// 	<div class="post-content">
											// 		<a href="'.base_url().'news_detail/'.$value->id_berita.'" class="post-title">'.$value->judul.'</a>
											// 		<div class="post-meta d-flex">
											// 		'.date("M d, Y", strtotime($value->created_at)).'
											// 		</div>
											// 	</div>
                                            // </div>';
                                            // echo'<div class="single-blog-post d-flex style-3">
											// 	<div class="post-thumbnail" style="position: relative;
                                            //     width: 100px;
                                            //     height: 100px;
                                            //     overflow: hidden;">
                                            //         <img src="'.$thumbnail.'" style="position: absolute;
                                            //         left: 50%;
                                            //         top: 50%;
                                            //         height: 100px;
                                            //         width: auto;
                                            //         -webkit-transform: translate(-50%,-50%);
                                            //             -ms-transform: translate(-50%,-50%);
                                            //                 transform: translate(-50%,-50%);" alt="">
                                            //     </div>
											// 	<div class="post-content">
											// 		<a href="'.base_url().'news_detail/'.$value->id_berita.'" class="post-title">'.$value->judul.'</a>
											// 		<div class="post-meta d-flex">
											// 		'.date("M d, Y", strtotime($value->created_at)).'
											// 		</div>
											// 	</div>
                                            // </div>';
                                            echo'<div class="single-blog-post d-flex style-3">
												<div class="post-thumbnail" >
                                                    <img src="'.$thumbnail.'" alt="">
                                                </div>
												<div class="post-content">
													<a href="'.base_url().'news_detail/'.$value->id_berita.'" class="post-title">'.$value->judul.'</a>
													<div class="post-meta d-flex">
													'.date("M d, Y", strtotime($value->created_at)).'
													</div>
												</div>
                                            </div>';
										}
										echo'</div>';
									}
								}
								?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Most Viewed Videos -->
            <div class="most-viewed-videos mb-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>Gallery</h5>
                </div>

                <div class="most-viewed-videos-slide owl-carousel">
					<?php
					$get_news = $this->Main_model->getSelectedData('berita a', 'a.*,(SELECT COUNT(b.id_berita) FROM komentar_berita b WHERE b.id_berita=a.id_berita) AS jml', '', 'a.created_at DESC')->result();
					foreach ($get_news as $key => $value) {
						if($value->thumbnail==NULL OR $value->thumbnail==''){
							echo'';
						}else{
					?>
					<!-- Single Blog Post -->
                    <div class="single-blog-post style-4">
                        <div class="post-thumbnail">
                            <img src="<?= base_url(); ?>data_upload/berita/<?= $value->thumbnail; ?>" alt="">
                            <!-- <a href="video-post.html" class="video-play"><i class="fa fa-play"></i></a> -->
                            <!-- <span class="video-duration">09:27</span> -->
                        </div>
                        <div class="post-content">
                            <a href="<?= base_url().'news_detail/'.$value->id_berita; ?>" class="post-title"><?= $value->judul; ?></a>
                            <div class="post-meta d-flex">
								<a><?= date("M d, Y", strtotime($value->created_at)); ?></a>
								<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?= number_format($value->jml,0); ?></a>
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?= number_format($value->counter,0); ?></a>
                                <!-- <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a> -->
                            </div>
                        </div>
                    </div>
					<?php
						}
					}
					?>
                </div>
            </div>

            <!--?php include 'sport-videos.php' -->
        </div>
		<div class="post-sidebar-area right-sidebar mt-30 mb-30 box-shadow">
		<?php include 'right_sidebar.php' ?>
		</div>
	</section>
	<!-- ##### Mag Posts Area End ##### -->

    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        /* h2{
        text-align:center;
        padding: 20px;
        } */
        /* Slider */

        .slick-slide {
            margin: 0px 20px;
        }

        .slick-slide img {
            width: 100%;
        }

        .slick-slider
        {
            position: relative;
            display: block;
            box-sizing: border-box;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
                    user-select: none;
            -webkit-touch-callout: none;
            -khtml-user-select: none;
            -ms-touch-action: pan-y;
                touch-action: pan-y;
            -webkit-tap-highlight-color: transparent;
        }

        .slick-list
        {
            position: relative;
            display: block;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }
        .slick-list:focus
        {
            outline: none;
        }
        .slick-list.dragging
        {
            cursor: pointer;
            cursor: hand;
        }

        .slick-slider .slick-track,
        .slick-slider .slick-list
        {
            -webkit-transform: translate3d(0, 0, 0);
            -moz-transform: translate3d(0, 0, 0);
                -ms-transform: translate3d(0, 0, 0);
                -o-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
        }

        .slick-track
        {
            position: relative;
            top: 0;
            left: 0;
            display: block;
        }
        .slick-track:before,
        .slick-track:after
        {
            display: table;
            content: '';
        }
        .slick-track:after
        {
            clear: both;
        }
        .slick-loading .slick-track
        {
            visibility: hidden;
        }

        .slick-slide
        {
            display: none;
            float: left;
            height: 100%;
            min-height: 1px;
        }
        [dir='rtl'] .slick-slide
        {
            float: right;
        }
        .slick-slide img
        {
            display: block;
        }
        .slick-slide.slick-loading img
        {
            display: none;
        }
        .slick-slide.dragging img
        {
            pointer-events: none;
        }
        .slick-initialized .slick-slide
        {
            display: block;
        }
        .slick-loading .slick-slide
        {
            visibility: hidden;
        }
        .slick-vertical .slick-slide
        {
            display: block;
            height: auto;
            border: 1px solid transparent;
        }
        .slick-arrow.slick-hidden {
            display: none;
        }
    </style>

    <?php include 'partner.php' ?>
	
	<?php include 'footer.php' ?>

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <!-- <script src="<?= base_url(); ?>assets/js/jquery/jquery-2.2.4.min.js"></script> -->
    <!-- Popper js -->
    <script src="<?= base_url(); ?>assets/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?= base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="<?= base_url(); ?>assets/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="<?= base_url(); ?>assets/js/active.js"></script>
</body>

</html>