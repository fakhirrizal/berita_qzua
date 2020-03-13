<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Queensland Zhejiang United Association Inc.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Queensland Zhejiang United Association Inc. - Category <?= $kategori_berita; ?></title>

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
    $cover = $this->Main_model->getSelectedData('cover a', 'a.*', array('a.page'=>'News Category'))->row();
    ?>
    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(<?= base_url(); ?>data_upload/cover/<?= $cover->file; ?>);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2><?= $kategori_berita; ?></h2>
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
                            <!-- <li class="breadcrumb-item"><a href="#">Feature</a></li> -->
                            <li class="breadcrumb-item active" aria-current="page">Archive by Category “<?= $kategori_berita; ?>”</li>
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
                    “<?= $kategori_berita; ?>” Category is Not Found
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