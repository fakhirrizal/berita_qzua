<div class="hero-area owl-carousel">
    <?php
    $slider = $this->Main_model->getSelectedData('slider a', 'a.*')->result();
    foreach ($slider as $key => $value) {
    ?>
    <!-- Single Blog Post -->
    <div class="hero-blog-post bg-img bg-overlay" style="background-image: url(<?= base_url(); ?>data_upload/slider/<?= $value->file; ?>);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Post Contetnt -->
                    <div class="post-content text-center">
                        <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                            <!-- <a href="#">MAY 8, 2018</a> -->
                            <!-- <a href="archive.html">lifestyle</a> -->
                        </div>
                        <a href="#" class="post-title" data-animation="fadeInUp" data-delay="300ms"><?= $value->title; ?></a>
                        <!-- <a href="video-post.html" class="video-play" data-animation="bounceIn" data-delay="500ms"><i class="fa fa-play"></i></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    } ?>
</div>