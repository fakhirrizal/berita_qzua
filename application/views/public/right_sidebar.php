<!-- >>>>>>>>>>>>>>>>>>>>
    Post Right Sidebar Area
<<<<<<<<<<<<<<<<<<<<< -->

    <!-- Sidebar Widget -->
    <div class="single-sidebar-widget p-30">
        <!-- Social Followers Info -->
        <div class="social-followers-info">
            <!-- Facebook -->
            <a href="#" class="facebook-fans"><i class="fa fa-facebook"></i> 4,360 <span>Fans</span></a>
            <!-- Twitter -->
            <a href="#" class="twitter-followers"><i class="fa fa-twitter"></i> 3,280 <span>Followers</span></a>
            <!-- YouTube -->
            <a href="#" class="youtube-subscribers"><i class="fa fa-youtube"></i> 1250 <span>Subscribers</span></a>
            <!-- Google -->
            <a href="#" class="google-followers"><i class="fa fa-google-plus"></i> 4,230 <span>Followers</span></a>
        </div>
    </div>

    <!-- Sidebar Widget -->
    <div class="single-sidebar-widget p-30">
        <!-- Section Title -->
        <div class="section-heading">
            <h5>Categories</h5>
        </div>

        <!-- Catagory Widget -->
        <ul class="catagory-widgets">
            <?php
            $get_categories = $this->db->query("SELECT a.* FROM kategori_berita a WHERE a.kategori_berita NOT IN ('News','Videos') ORDER BY a.kategori_berita ASC")->result();
            foreach ($get_categories as $key => $value) {
                $check_berita = $this->db->query("SELECT * FROM `berita` WHERE `id_kategori_berita` LIKE '%".$value->id_kategori_berita."%'")->result();
                $tampung_real = 0;
                foreach ($check_berita as $key => $row) {
                    $pecah_kategori = explode(',',$row->id_kategori_berita);
                    for ($i=0; $i < count($pecah_kategori); $i++) { 
                        if($pecah_kategori[$i]==$value->id_kategori_berita){
                            $tampung_real++;
                            break;
                        }else{
                            echo'';
                        }
                    }
                }
                echo'<li><a href="'.base_url().'kategori/'.$value->kategori_berita.'"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i> '.$value->kategori_berita.'</span> <span>'.number_format($tampung_real,0).'</span></a></li>';
            }
            ?>
        </ul>
    </div>

    <!-- Sidebar Widget -->
    <div class="single-sidebar-widget">
        <?php
        $flag = 0;
        $get_ads = $this->Main_model->getSelectedData('iklan a', 'a.*', '', 'a.expired_date DESC', '2')->result();
        foreach ($get_ads as $key => $value) {
            if($flag=='1'){
                echo'<a href="#" class="add-img"><img src="'.base_url().'data_upload/iklan/'.$value->banner.'" alt=""></a>';
            }else{
                echo'';
            }
            $flag++;
        }
        ?>
    </div>

    <!--?php include 'hot-channels.php' ?-->

    <!-- Sidebar Widget -->
    <div class="single-sidebar-widget p-30">
        <!-- Section Title -->
        <div class="section-heading">
            <h5>Newsletter</h5>
        </div>

        <div class="newsletter-form">
            <p>Subscribe our newsletter gor get notification about new updates, information discount, etc.</p>
            <form action="<?= base_url(); ?>save_subscriber" method='post'>
                <input type="search" name="alamat_surel" placeholder="Enter your email">
                <button type="submit" class="btn mag-btn w-100">Subscribe</button>
            </form>
        </div>

    </div>
