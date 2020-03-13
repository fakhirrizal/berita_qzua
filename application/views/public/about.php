<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Queensland Zhejiang United Association Inc.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Queensland Zhejiang United Association Inc. - About</title>

    <!-- Favicon -->
    <link rel="icon" href="<?= base_url(); ?>assets/img/logo.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/style.css">

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
    <?php
    $cover = $this->Main_model->getSelectedData('cover a', 'a.*', array('a.page'=>'About Us'))->row();
    ?>
    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(<?= base_url(); ?>data_upload/cover/<?= $cover->file; ?>);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2><?= $cover->title; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="mag-breadcrumb py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url(); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### About Us Area Start ##### -->
    <section class="about-us-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-8">
                    <!-- About Us Content -->
                    <div class="about-us-content bg-white mb-30 p-30 box-shadow">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>About Us</h5>
                        </div>
                        <p>QZUA is a non-governmental, non-religious and non-profitable association registered in Australian Queensland. Main bodies of members consist of Zhejiang companies in Australia and investors and traders from Zhejiang province, China.</p>
                        <p>Zhejiang entrepreneurs are working industriously and successfully all the time in the overseas investment. As for in Australia, they invested A$760 million during the financial year of 2014-2015. Zhejiang is also one of the largest import provinces of Australian goods in China, e.g. milk powder, raw wool, wine, bio-health product, coking and thermal collect. Therefore, it is not hard to find that the potential of cooperation between Zhejiang and Queensland is booming and prospective. Main bodies of QZUA members consist of Zhejiang companies in Australia and investors and traders from Zhejiang province, China.</p>
                        <img class="mt-15" src="<?= base_url(); ?>assets/img/bg-img/35.jpg" alt="">

                        <!-- Team Member Area -->
                        <div class="section-heading mt-30">
                            <h5>Our Team</h5>
                        </div>
                        
                        <!-- Single Team Member -->
                        <div class="single-team-member d-flex align-items-center">
                            <div class="team-member-thumbnail">
                                <img src="<?= base_url(); ?>assets/img/bg-img/36.jpg" alt="">
                                <div class="social-btn">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="team-member-content">
                                <h6>Mrs. Susan Monroe</h6>
                                <span>Reporter</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla consectetur mauris id scelerisque eleifend. Nunc vestibulum cursea quam at scelerisque.</p>
                            </div>
                        </div>
                        
                        <!-- Single Team Member -->
                        <div class="single-team-member d-flex align-items-center">
                            <div class="team-member-thumbnail">
                                <img src="<?= base_url(); ?>assets/img/bg-img/37.jpg" alt="">
                                <div class="social-btn">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="team-member-content">
                                <h6>Mr. Luke Garner</h6>
                                <span>Editor in Chief</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla consectetur mauris id scelerisque eleifend. Nunc vestibulum cursea quam at scelerisque.</p>
                            </div>
                        </div>
                        
                        <!-- Single Team Member -->
                        <div class="single-team-member d-flex align-items-center">
                            <div class="team-member-thumbnail">
                                <img src="<?= base_url(); ?>assets/img/bg-img/38.jpg" alt="">
                                <div class="social-btn">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="team-member-content">
                                <h6>Ms. Elena Korikova</h6>
                                <span>Marketer</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla consectetur mauris id scelerisque eleifend. Nunc vestibulum cursea quam at scelerisque.</p>
                            </div>
                        </div>
                        
                        <!-- Single Team Member -->
                        <div class="single-team-member d-flex align-items-center">
                            <div class="team-member-thumbnail">
                                <img src="<?= base_url(); ?>assets/img/bg-img/39.jpg" alt="">
                                <div class="social-btn">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="team-member-content">
                                <h6>Mr. Tom Wellington</h6>
                                <span>Photographer</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla consectetur mauris id scelerisque eleifend. Nunc vestibulum cursea quam at scelerisque.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                    <div class="sidebar-area bg-white mb-30 box-shadow">
                        <?php include 'right_sidebar.php' ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Us Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?php include 'footer.php' ?>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="<?= base_url(); ?>assets/js/jquery/jquery-2.2.4.min.js"></script>
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