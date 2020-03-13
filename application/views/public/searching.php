<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Queensland Zhejiang United Association Inc.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Queensland Zhejiang United Association Inc. - Searching</title>

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
    $cover = $this->Main_model->getSelectedData('cover a', 'a.*', array('a.page'=>'Searching'))->row();
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
                            <li class="breadcrumb-item"><a href="#">Feature</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php if($key_cari==NULL){echo'Unknown Keyword to Searching Our Content';}else{echo'Search Results for: '.$key_cari;} ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Archive Post Area Start ##### -->
    <div class="archive-post-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-8">
                    <div class="archive-posts-area bg-white p-30 mb-30 box-shadow">
                        <?php
                        if($berita==NULL OR $key_cari==''){
                            echo'<div class="cnn-search__no-results no-results--returned">
                                    <h3>Your search for <strong><font color="red">'.$key_cari.'</font></strong> did not match any documents.</h3>
                                    <h4>A few suggestions</h4>
                                    <ul>
                                        <li>
                                            Make sure all words are spelled correctly
                                        </li>
                                        <li>
                                            Try different keywords
                                        </li>
                                        <li>
                                            Try more general keywords
                                        </li>
                                    </ul>
                                </div>';
                        }else{
                            echo'<h3>Berita</h3>';
                            foreach ($berita as $key => $value) {
                                $thumbnail = '';
                                if($value['thumbnail']==NULL){
                                    $thumbnail = base_url().'assets/img/none.png';
                                }else{
                                    $thumbnail = base_url().'data_upload/berita/'.$value['thumbnail'];
                                }
                            ?>
                            <div class="single-catagory-post d-flex flex-wrap">
                                <!-- Thumbnail -->
                                <div class="post-thumbnail bg-img" style="background-image: url(<?= $thumbnail; ?>);">
                                </div>

                                <!-- Post Contetnt -->
                                <div class="post-content">
                                    <div class="post-meta">
                                        <font color='#ed3974'><?= date("M d, Y", strtotime($value['created_at'])); ?></font>
                                        <!-- <a href="archive.html">lifestyle</a> -->
                                    </div>
                                    <a href="<?= base_url().'news_detail/'.$value['id_berita']; ?>" class="post-title"><?= $value['judul']; ?></a>
                                    <!-- Post Meta -->
                                    <div class="post-meta-2">
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?= number_format($value['counter'],0); ?></a>
                                        <!-- <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a> -->
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?= number_format($value['jml'],0); ?></a>
                                    </div>
                                    <p><?= $value['berita']; ?></p>
                                </div>
                            </div>
                        <?php }}
                        if($event==NULL OR $key_cari==''){
                            echo'';
                        }else{
                            echo'<h3>Event</h3>';
                            foreach ($event as $key => $value) {
                                $thumbnail = '';
                                if($value['poster']==NULL){
                                    $thumbnail = base_url().'assets/img/none.png';
                                }else{
                                    $thumbnail = base_url().'data_upload/event/'.$value['poster'];
                                }
                            ?>
                            <div class="single-catagory-post d-flex flex-wrap">
                                <!-- Thumbnail -->
                                <div class="post-thumbnail bg-img" style="background-image: url(<?= $thumbnail; ?>);">
                                </div>

                                <!-- Post Contetnt -->
                                <div class="post-content">
                                    <div class="post-meta">
                                        <font color='#ed3974'><?= date("M d, Y", strtotime($value['tanggal_pelaksanaan'])); ?></font>
                                        <!-- <a href="archive.html">lifestyle</a> -->
                                    </div>
                                    <a href="<?= base_url().'event_detail/'.$value['id_event']; ?>" class="post-title"><?= $value['judul']; ?></a>
                                    <!-- Post Meta -->
                                    <div class="post-meta-2">
                                        <!-- <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?= number_format($value['counter'],0); ?></a> -->
                                        <!-- <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a> -->
                                        <!-- <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?= number_format($value['jml'],0); ?></a> -->
                                    </div>
                                    <p><?= $value['deskripsi']; ?></p>
                                </div>
                            </div>
                        <?php }} ?>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                    <div class="sidebar-area bg-white mb-30 box-shadow">
                        <?php include 'right_sidebar.php' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Archive Post Area End ##### -->

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