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
      
            <form action="<?php echo base_url('user/eventbooking')?>" method="post">
                <input type="hidden" name="id" value="<?php echo $row->event_id?>">

                <input type="hidden" name="venue_name" value="<?php echo $row->name?>">
                <div class="row">
                    <div class="col-lg-6 col-md-5 col-sm-6">
                        <div class="white-box text-center"><img src="assets/img/<?php echo $row->image?>"
                                class="img-fluid" name="pro_img" alt="" style="height:102vh; border-radius:12px;"></div>
                        <input type="hidden" name="pro_image" value="<?php echo $row->image?>">
                    </div>
                    <div class="col-lg-6">
                        <script>
<?php if($this->session->flashdata('success')){ ?>
    toastr.success("<?php echo $this->session->flashdata('success'); ?>");
    <?php } ?>
                        </script>
                    
                        <div class="card p-4  venue-card">
                           <div>
                                <h3 class="card-title fw-bold"><?php echo $row->name?></h3>
                                <p>Event in <?php echo $row->city?></p>
                                <input type="hidden" name="city"  value="<?php echo $row->city?>" >
                            </div>
                            <hr>
                            <div>
                                <h4 class="fw-bold">Starting Price</h3>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <h5 style="color:#B9255F">RS:<?php echo $row->price?> </h5>
                                <input type="hidden" name="price" value="<?php echo $row->price?>"  >
                                <small class="fw-bold">Per Event</small>
                            </div>
                            <hr>
                            <div class="row mt-3">
                                <h4 class="text-center fw-bold">Fill this form for Booking</h4>
                                <hr>
                                <div class="col-lg-6">
                                    <input type="text" name="name" class="form-control" placeholder="Full Name"
                                        required>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <input type="text" name="phone" class="form-control" placeholder="Mobile" required>
                                </div>
                                <hr>
                                <div class="col-lg-6">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <input type="date" id="date_picker" name="date" class="form-control " placeholder="Event Date"
                                        required>
                                </div>
                                <hr>
                                <div class="col-lg-6 mb-3">
                                    <input type="text" name="guest" min="50" class="form-control"
                                        placeholder="No. of guests min(50)" required>
                                </div>
                                <hr>
                                <div class="col-lg-6 mb-3">
                                    <label for="" class="fw-bold">Funtion Time</label> <br>
                                    <input type="radio" name="time" value="day" id="" required> Day <br><input type="radio"
                                        name="time" id="" value="night" required> Night
                                </div>
                                <hr>
                                <div class="text-center">
                                    <button class="btn btn-primary fw-bold text-center">Book Yourself!</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-6">

                        <p name="pro_des"><?php echo $row->long_description?></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    }
    ?>
</div>
<div class="container">
    <h2>Related Events</h2>

    <div class="swiper mySwiper_populer mt-5 mb-5 h-100">
        <div class="swiper-wrapper">
            <?php
      foreach($fetch_sub->result() as $row){
    ?>
            <div class="swiper-slide" style="border-radius:20px;">

                <div>
                    <a href="event_details?id=<?php echo $row->event_id?>">
                        <div class="box services-card">
                            <img src="assets/img/<?php echo $row->image?>" class="img-fluid services-img" alt="">
                            <div class="shadow p-4">
                                <h5 class=""><?php echo $row->name?></h3>
                                   <h6 class="mt-3"><i class="fas fa-map-marker"></i> <?php echo $row->city?></h4>
                                        <div class="d-flex justify-content-between">
                                            <p class="mt-3">RS:<?php echo $row->price?></p>
                                            <p class="mt-3">Price</p>
                                        </div>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">



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
        $('#date_picker').attr('min',today);
    </script>