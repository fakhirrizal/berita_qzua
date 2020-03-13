<!-- ##### Footer Area Start ##### -->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="footer-widget">
                    <!-- Logo -->
                    <a href="<?= base_url(); ?>" class="foo-logo"><img src="<?= base_url(); ?>assets/img/core-img/logo.png" alt=""></a>
                    <p>Main bodies of QZUA members consist of Zhejiang companies in Australia and investors and traders from Zhejiang province, China.</p>
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
                            <a href="<?= base_url(); ?>news_detail/<?= $value->id_berita; ?>" class="post-title"><?= $value->judul; ?></a>
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
                        <?php
                        $get_tags = $this->db->query("SELECT * FROM `berita` WHERE tags IS NOT NULL")->result();
                        $data_tampung = array();
                        foreach ($get_tags as $key => $value) {
                            if($value->tags=='' OR $value->tags==NULL){
                                echo'';
                            }else{
                                $pecah_tags = explode(',',$value->tags);
                                for ($i=0; $i < count($pecah_tags); $i++) { 
                                    if($pecah_tags[$i]=='' OR $pecah_tags[$i]==NULL){
                                        echo'';
                                    }else{
                                        $data_tampung[] = $pecah_tags[$i];
                                    }
                                }
                            }
                        }
                        $clean_array = array_filter(array_unique($data_tampung));
                        // print_r($clean_array);
                        for ($i=0; $i < count($clean_array); $i++) { 
                            echo'<li><a href="'.base_url().'tags/'.$clean_array[$i].'">'.$clean_array[$i].'</a></li>';
                        }
                        ?>
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
                    <p class="copywrite-text">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Queensland Zhejiang United Association Inc.</a>
                    </p>
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