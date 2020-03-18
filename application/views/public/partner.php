    <section class="mag-posts-area d-flex flex-wrap" >
        <div class="box-shadow" >
            <div class="trending-now-posts mb-30">
                <div class="container" >
                    <div class="section-heading">
                        <h5>OUR PARTNER</h5>
                    </div>
                    <section class="customer-logos slider">
                    <?php
                    $slider = $this->Main_model->getSelectedData('partner a', 'a.*')->result();
                    foreach ($slider as $key => $value) {
                        echo'<div class="slide"><img src="'.base_url().'data_upload/partner/'.$value->logo.'"></div>';
                    }
                    ?>
                    </section>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function(){
            $('.customer-logos').slick({
                slidesToShow: 16,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
                arrows: false,
                dots: false,
                pauseOnHover: false,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 4
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 3
                    }
                }]
            });
        });
    </script><br>