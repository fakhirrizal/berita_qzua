<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Queensland Zhejiang United Association Inc.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Queensland Zhejiang United Association Inc. - News Detail</title>

    <!-- Favicon -->
    <link rel="icon" href="<?= base_url(); ?>assets/img/logo.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
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

    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(<?= base_url(); ?>assets/img/bg-img/49.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Single Post</h2>
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
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Features</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Single Post</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Post Details Area Start ##### -->
    <section class="post-details-area">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Post Details Content Area -->
                <div class="col-12 col-xl-8">
                    <div class="post-details-content bg-white mb-30 p-30 box-shadow">
                        <div class="blog-thumb mb-30">
                            <?php
							$thumbnail = '';
                            if($data_berita->thumbnail==NULL){
                                $thumbnail = base_url().'assets/img/none.png';
                            }else{
                                $thumbnail = base_url().'data_upload/berita/'.$data_berita->thumbnail;
                            }
                            $kategori_berita = array();
                            $id_kategori_berita = explode(',',$data_berita->id_kategori_berita);
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
                            <img src="<?= $thumbnail; ?>" alt="">
                        </div>
                        <div class="blog-content">
                            <div class="post-meta">
                                <a href="#"><?= date("M d, Y", strtotime($data_berita->created_at)); ?></a>
                                <?php
                                if($kategori_berita==NULL){
                                    echo'';
                                }else{
                                ?>
                                <a href="#"><?= implode(', ',$kategori_berita); ?></a>
                                <?php
                                }
                                ?>
                            </div>
                            <h4 class="post-title"><?= $data_berita->judul; ?></h4>
                            <!-- Post Meta -->
                            <div class="post-meta-2">
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?= number_format($data_berita->counter,0); ?></a>
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?= number_format($data_berita->jml,0); ?></a>
                            </div>
                            <?= $data_berita->berita; ?>
                            <!-- Like Dislike Share -->
                            <div class="like-dislike-share my-5">
                                <a href="http://www.facebook.com/sharer.php?u=<?= base_url(); ?>news_detail/<?= $data_berita->id_berita; ?>" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Share on Facebook</a>
                                <a href="https://twitter.com/share?url=<?= base_url(); ?>news_detail/<?= $data_berita->id_berita; ?>&text=<?= $data_berita->judul; ?>" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i> Share on Twitter</a>
                            </div>
                        </div>
                    </div>

                    <!-- Related Post Area -->
                    <div class="related-post-area bg-white mb-30 px-30 pt-30 box-shadow">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Related Post</h5>
                        </div>

                        <div class="row">
                            <?php
                            foreach ($other_news as $key => $value) {
                                $thumbnail = '';
                                if($value->thumbnail==NULL){
                                    $thumbnail = base_url().'assets/img/none.png';
                                }else{
                                    $thumbnail = base_url().'data_upload/berita/'.$value->thumbnail;
                                }
                            ?>
                            <!-- Single Blog Post -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="single-blog-post style-4 mb-30">
                                    <div class="post-thumbnail">
                                        <img src="<?= $thumbnail; ?>" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="<?= base_url(); ?>news_detail/<?= $value->id_berita; ?>" class="post-title"><?= $value->judul; ?></a>
                                        <div class="post-meta d-flex">
                                            <a href="#"><?= date("M d, Y", strtotime($value->created_at)); ?></a>
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?= number_format($value->counter,0); ?></a>
                                            <!-- <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a> -->
                                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?= number_format($value->jml,0); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    if($data_komen==NULL){
                        echo'';
                    }else{
                    ?>
                    <!-- Comment Area Start -->
                    <div class="comment_area clearfix bg-white mb-30 p-30 box-shadow">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>COMMENTS</h5>
                        </div>

                        <ol>
                            <?php
                            foreach ($data_komen as $key => $value) {
                            ?>
                            <!-- Single Comment Area -->
                            <li class="single_comment_area">
                                <!-- Comment Content -->
                                <div class="comment-content d-flex">
                                    <!-- Comment Author -->
                                    <div class="comment-author">
                                        <img src="<?= base_url(); ?>assets/img/user.png" alt="">
                                    </div>
                                    <!-- Comment Meta -->
                                    <div class="comment-meta">
                                        <a href="#" class="comment-date"><?= date("M d, Y", strtotime($value->created_at)); ?></a>
                                        <h6><?= $value->nama; ?></h6>
                                        <p><?= $value->komentar; ?></p>
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="reply detaildata" id="<?= md5($value->id_komentar_berita); ?>">Reply</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $get_child = $this->Main_model->getSelectedData('komentar_berita a', 'a.*', array('a.id_parent_comment'=>$value->id_komentar_berita), 'a.created_at ASC')->result();
                                if($get_child==NULL){
                                    echo'';
                                }else{
                                    foreach ($get_child as $key => $row) {
                                ?>
                                    <ol class="children">
                                        <li class="single_comment_area">
                                            <!-- Comment Content -->
                                            <div class="comment-content d-flex">
                                                <!-- Comment Author -->
                                                <div class="comment-author">
                                                    <img src="<?= base_url(); ?>assets/img/user.png" alt="">
                                                </div>
                                                <!-- Comment Meta -->
                                                <div class="comment-meta">
                                                    <a href="#" class="comment-date"><?= date("M d, Y", strtotime($row->created_at)); ?></a>
                                                    <h6><?= $row->nama; ?></h6>
                                                    <p><?= $row->komentar; ?></p>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                <?php
                                }}
                                ?>
                            </li>
                            <?php } ?>
                        </ol>
                    </div>
                    <?php } ?>
                    <!-- Post A Comment Area -->
                    <div class="post-a-comment-area bg-white mb-30 p-30 box-shadow clearfix">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>LEAVE A REPLY</h5>
                        </div>

                        <!-- Reply Form -->
                        <div class="contact-form-area">
                            <form action="<?= base_url(); ?>save_comment" method='post'>
                                <input type='hidden' name='berita' value='<?= $this->uri->segment(2); ?>'>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <input type="text" class="form-control" id="name" name='text' placeholder="Your Name*" required>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <input type="email" class="form-control" id="email" name='email' placeholder="Your Email*" required>
                                    </div>
                                    <div class="col-12">
                                        <textarea name="comment" class="form-control" id="message" cols="30" rows="10" placeholder="Message*" required></textarea>
                                    </div>
                                    <div  class="col-12" id='in_reply'></div>
                                    <div class="col-12">
                                        <button class="btn mag-btn mt-30" type="submit">Submit Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Widget -->
                <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                    <div class="sidebar-area bg-white mb-30 box-shadow">
                        <?php include 'right_sidebar.php' ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Post Details Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?php include 'footer.php' ?>
    <!-- ##### Footer Area End ##### -->
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                type:"POST",
                url: "<?php echo site_url(); ?>User/ajax_function",
                cache: false,
            });
            $('.detaildata').click(function(){
            var id = $(this).attr("id");
            var modul = 'get_parent_comment';
            $.ajax({
                data: {id:id,modul:modul},
                success:function(data){
                    $('#in_reply').html(data);
                    $('#remove_reply').click(function(){
                    var modul = 'remove_parent_comment';
                    $.ajax({
                        data: {modul:modul},
                        success:function(data){
                            $('#in_reply').html(data);
                        }
                    });
                    });
                }
            });
            });
        });
    </script>
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