<!-- >>>>>>>>>>>>>>>>>>>>
    Post Left Sidebar Area
<<<<<<<<<<<<<<<<<<<<< -->
<div class="post-sidebar-area left-sidebar mt-30 mb-30 bg-white box-shadow">
    <!-- Sidebar Widget -->
    <div class="single-sidebar-widget p-30">
        <!-- Section Title -->
        <div class="section-heading">
            <h5>Most Popular</h5>
        </div>

        <?php
        $get_most_popular_news = $this->Main_model->getSelectedData('berita a', 'a.*,(SELECT COUNT(b.id_berita) FROM komentar_berita b WHERE b.id_berita=a.id_berita) AS jml', '', 'jml DESC', '5')->result();
        ?>

        <?php foreach ($get_most_popular_news as $key => $value) {
            $thumbnail = '';
            if($value->thumbnail==NULL){
                $thumbnail = base_url().'assets/img/none.png';
            }else{
                $thumbnail = base_url().'data_upload/berita/'.$value->thumbnail;
            }
        ?>
        <!-- <div class="single-catagory-post d-flex flex-wrap"> -->
        <div class="single-blog-post d-flex">
            <!-- <div class="post-thumbnail bg-img" style="background-image: url(<?= $thumbnail; ?>);">
            </div> -->
            <div class="post-thumbnail">
                <img src="<?= $thumbnail; ?>" alt="">
            </div>
            <div class="post-content">
                <a href="<?= base_url().'news_detail/'.$value->id_berita; ?>" class="post-title"><?= $value->judul; ?></a>
                <div class="post-meta d-flex justify-content-between">
                    <?= date("M d, Y", strtotime($value->created_at)); ?>
                    <!-- <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?= number_format($value->counter,0); ?></a> -->
                    <!-- <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a> -->
                </div>
            </div>
        </div>
        <?php } ?>

    </div>

    <!-- Sidebar Widget -->
    <div class="single-sidebar-widget">
        <?php
        $flag = 0;
        $get_ads = $this->Main_model->getSelectedData('iklan a', 'a.*', '', 'a.expired_date DESC', '2')->result();
        foreach ($get_ads as $key => $value) {
            if($flag=='0'){
                echo'<a href="#" class="add-img"><img src="'.base_url().'data_upload/iklan/'.$value->banner.'" alt=""></a>';
            }else{
                echo'';
            }
            $flag++;
        }
        ?>
    </div>

    <!--?php include 'latest-videos.php' ?-->
</div>