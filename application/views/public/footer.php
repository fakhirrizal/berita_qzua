<!-- ##### Footer Area Start ##### -->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="footer-widget">
                    <!-- Logo -->
                    <a href="index.html" class="foo-logo"><img src="<?= base_url(); ?>assets/img/core-img/logo2.png" alt=""></a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="footer-social-info">
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="footer-widget">
                    <h6 class="widget-title">Categories</h6>
                    <nav class="footer-widget-nav">
                        <ul>
                            <?php
                            $get_categories = $this->db->query("SELECT a.* FROM kategori_berita a WHERE a.kategori_berita NOT IN ('News','Videos') ORDER BY a.kategori_berita ASC")->result();
                            foreach ($get_categories as $key => $value) {
                                echo'<li><a href="'.base_url().'kategori/'.$value->kategori_berita.'"><i class="fa fa-angle-double-right" aria-hidden="true"></i> '.$value->kategori_berita.'</a></li>';
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="footer-widget">
                    <h6 class="widget-title">Most Views</h6>
                    <!-- Single Blog Post -->
                    <?php
                    $get_most_view = $this->Main_model->getSelectedData('berita a', 'a.*', '', 'counter DESC', '2')->result();
                    ?>

                    <?php foreach ($get_most_view as $key => $value) {
                        $thumbnail = '';
                        if($value->thumbnail==NULL){
                            $thumbnail = base_url().'assets/img/none.png';
                        }else{
                            $thumbnail = base_url().'data_upload/berita/'.$value->thumbnail;
                        }
                    ?>
                    <div class="single-blog-post style-2 d-flex">
                        <div class="post-thumbnail">
                            <img src="<?= $thumbnail; ?>" alt="">
                        </div>
                        <div class="post-content">
                            <a href="<?= base_url(); ?>'news_detail/'<?= $value->id_berita; ?>" class="post-title"><?= $value->judul; ?></a>
                            <div class="post-meta d-flex justify-content-between">
                                <a><?= date("M d, Y", strtotime($value->created_at)); ?></a>
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?= number_format($value->counter,0); ?></a>
                                <!-- <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a> -->
                                <!-- <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a> -->
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="footer-widget">
                    <h6 class="widget-title">Tags</h6>
                    <ul class="footer-tags">
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Fashionista</a></li>
                        <li><a href="#">Music</a></li>
                        <li><a href="#">DESIGN</a></li>
                        <li><a href="#">NEWS</a></li>
                        <li><a href="#">TRENDING</a></li>
                        <li><a href="#">VIDEO</a></li>
                        <li><a href="#">Game</a></li>
                        <li><a href="#">Sports</a></li>
                        <li><a href="#">Lifestyle</a></li>
                        <li><a href="#">Foods</a></li>
                        <li><a href="#">TV Show</a></li>
                        <li><a href="#">Twitter Video</a></li>
                        <li><a href="#">Playing</a></li>
                        <li><a href="#">clips</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Copywrite Area -->
    <div class="copywrite-area">
        <div class="container">
            <div class="row">
                <!-- Copywrite Text -->
                <div class="col-12 col-sm-6">
                    <p class="copywrite-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
                <div class="col-12 col-sm-6">
                    <nav class="footer-nav">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Advertisement</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ##### Footer Area End ##### -->