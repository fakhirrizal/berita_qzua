<!-- ##### Header Area Start ##### -->
<header class="header-area"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <!-- Navbar Area -->
    <div class="mag-main-menu" id="sticker">
        <div class="classy-nav-container breakpoint-off">
            <!-- Menu -->
            <nav class="classy-navbar justify-content-between" id="magNav">

                <!-- Nav brand -->
                <a href="<?= base_url(); ?>" class="nav-brand"><img src="<?= base_url(); ?>assets/img/core-img/logos.png" alt=""></a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Nav Content -->
                <div class="nav-content d-flex align-items-center">
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li class="active"><a href="<?= base_url(); ?>">Home</a></li>
                                <li><a href="#">News</a>
                                    <ul class="dropdown">
                                        <?php
                                        $get_categories = $this->db->query("SELECT a.* FROM kategori_berita a WHERE a.kategori_berita NOT IN ('News','Videos')")->result();
                                        foreach ($get_categories as $key => $value) {
                                            echo'<li><a href="'.base_url().'kategori/'.$value->kategori_berita.'">'.$value->kategori_berita.'</a></li>';
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <li><a href="<?= base_url(); ?>about">About</a></li>
                                <li><a href="<?= base_url(); ?>contact">Contact</a></li>
                            </ul>
                        </div>
                        <!-- Nav End -->
                    </div>

                    <div class="top-meta-data d-flex align-items-center">
                        <!-- Top Search Area -->
                        <div class="top-search-area">
                            <form action="<?= base_url(); ?>searching" method='post'>
                                <input type="search" name="key" id="topSearch" placeholder="Search and hit enter...">
                                <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                        <!-- Login -->
                        <!-- <a href="login.html" class="login-btn"><i class="fa fa-user" aria-hidden="true"></i></a> -->
                        <!-- Submit Video -->
                        <!-- <a href="submit-video.html" class="submit-video"><span><i class="fa fa-cloud-upload"></i></span> <span class="video-text">Submit Video</span></a> -->
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>