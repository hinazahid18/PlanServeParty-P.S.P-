<?php foreach($fetch->result() as $row){ ?>
<title>
    <?php echo $row->name?>
</title>
<?php } ?>
<style>
    h5 {
        font-weight: bold;
    }
</style>
<div class="container" style="margin-top:10%;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo site_url()?>">Home</a></li>
            <?php
            foreach($fetch->result() as $row){
            ?>
            <li class="breadcrumb-item active" aria-current="page"> <?php echo $row->name?></li>
            <li class="breadcrumb-item active" aria-current="page"> <?php echo $row->description?></li>
            <?php
            }
            ?>
        </ol>
    </nav>
</div>

<div class="container">
    <?php
    foreach($fetch->result() as $row){
    ?>
    <div class="card-deails" style="border-radius:20px;">
        <div class="card-body">

            <input type="hidden" name="id" value="<?php echo $row->blog_id?>">

            <input type="hidden" name="venue_name" value="<?php echo $row->name?>">
            <div class="row">
                <div class="col-lg-6 col-md-5 col-sm-6">
                    <div class="white-box text-center"><img src="assets/img/<?php echo $row->image?>" class="img-fluid"
                            name="pro_img" alt="" style="height:100vh; border-radius:12px;"></div>
                    <input type="hidden" name="pro_image" value="<?php echo $row->image?>">
                </div>
                <div class="col-lg-6">
                    <div class="card p-4  venue-card">
                        <div>
                            <h3 class="card-title fw-bold"><?php echo $row->name?></h3>

                        </div>
                        <hr>

                        <div class="">
                            <h5 style=""><?php echo $row->description?> </h5>
                        </div>
                        <hr>

                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-7 col-sm-6">
                        <p name="pro_des"><?php echo $row->long_description?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    </div>
    <div class="container">
        <h2>Related Blogs</h2>

        <div class="swiper mySwiper_populer mt-5 mb-5 h-100">
            <div class="swiper-wrapper">
                <?php
      foreach($fetch_sub->result() as $row){
    ?>
                <div class="swiper-slide" style="border-radius:20px;">

                    <div>
                        <a href="blog_details?id=<?php echo $row->blog_id?>">
                            <div class="box services-card">
                                <img src="assets/img/<?php echo $row->image?>" class="img-fluid services-img" alt="">
                                <div class="shadow p-2">
                                    <h6 class=""><?php echo $row->description?></h6>
                                    <span class="text-end"><?php echo $row->date?></span>
                                    <p class=""><?php echo $row->name?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>

                <?php
        }
    ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        $(document).ready(function () {

            var quantitiy = 0;
            $('.quantity-right-plus').click(function (e) {

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

            });

            $('.quantity-left-minus').click(function (e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if (quantity > 1) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            autoplay: true,
            speed: 4000,
            autoplay: {
                delay: 2000,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 50,
                },
            },
        });
    </script>
    <script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#date_picker').attr('min', today);
    </script>