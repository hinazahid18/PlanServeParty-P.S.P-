<title>PlaneServeParty - Events Management </title>
<!--<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

  <section id="hero" class="hero d-flex align-items-center">
  <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex flex-column  text-center justify-content-center">
                <h1 data-aos="fade-up">Your Events, Your Way</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">Find the best event vendors with thousands of trusted
                    reviews</h2>
            </div>
        </div>
    </div>
</section>

<section>
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 50%;
    position: centre;
  }
  </style>
</head>
<body>


<div id="demo" class="carousel slide" data-ride="carousel">
<h1 text="centre">Different Events</h1>-->
  <!-- Indicators -->
  <!--<ol class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ol>-->
  
  <!-- The slideshow -->
  <!--<div class="carousel-inner" role="listbox">
    <div class="carousel-item active" id="a1">
      <img src="https://propakistani.pk/lens/wp-content/uploads/2019/01/pakistani-wedding.jpg" class="d-block w-100" data-color="lightblue" alt="Wedding Image" width="1100" height="500">
    </div>
    <div class="carousel-item" id="a2">
      <img src="https://wedabout.com/blog/wp-content/uploads/2017/07/St.-Regis.jpg" class="d-block w-100" data-color="lightblue" alt="Destination Wedding Image" width="1100" height="500">
    </div>
    <div class="carousel-item" id="a3">
      <img src="https://karaspartyideas.com/wp-content/uploads/2021/11/Pop-It-Themed-Birthday-Party-via-Karas-Party-Ideas-KarasPartyIdeas.com11.jpg" class="d-block w-100" data-color="lightblue" alt="New York" width="1100" height="500">
    </div>
  </div>-->

  <!-- Left and right controls -->
  <!--<a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="fa fa-angle-left icon" style="font-size: xxx-large" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
  <span class="fa fa-angle-right icon" style="font-size: xxx-large" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</body>
</html>
</section>-->


<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex flex-column  text-center justify-content-center">
                <h1 data-aos="fade-up">Your Events, Your Way</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">Find the best event vendors with thousands of trusted
                    reviews</h2>
            </div>
        </div>
    </div>

</section>
<!-- ======= Counts Section ======= -->
<section id="counts" class="counts">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <h3 class="text-center">- EventSafe -</h3>
            <h6 class="text-center">Hire vendors adhering to safety standards.</h6>
        </div>
        <div class="row gy-4 mt-3">

            <div class="col-lg-3 col-md-6">
                <div class="count-box">

                    <div>
                        <i class="fa-solid fa-mask-face circle-icon "></i>  
                        <h6><strong>Protective Gears</strong></h5>
                        <p>Routine use of masks, gloves and sanitizers.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <div>
                        <i class="fa-solid fa-temperature-half"></i>
                        <h6><strong>Staff Screening</strong></h6>
                        <p>Regular temperature checks of the team.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <div>
                        <i class="fa-solid fa-pump-soap"></i>
                        <h6><strong>Sanitization Services</strong></h6>
                        <p>Initiatives to disinfect the workplace frequently.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <div>
                        <i class="fa-solid fa-handshake-slash"></i>
                        <h6><strong>Social Distancing</strong></h6>
                        <p>Maintain 3 feet distance & limit working staff.</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Counts Section -->
<!-- services -->
<section class="services_section">
    <div class="container">
        <div class="row">
            <h3 class="text-center">- OUR SERVICES -</h3>
        </div>
        <?php 
                if(!empty($category_event)) { 
                foreach($category_event as $cat){
                $cat_name =  $cat['categories_id'];
            ?>

        <div class="swiper  swiper-container mySwiper_blog mt-5 mb-5">
            <!-- <h4>
                <?php
                    error_reporting(0);
                    ?>
                <?php 
                        $cat_name =  $cat['categories_id'];
                        $catdata = $this->db->get_where('categories',array('categories_id'=>$cat_name))->row();
                        echo  $catdata->categories_name; 
                    ?>
            </h4> -->
            <div class="swiper-wrapper">

                <?php if(!empty($category_event)) { 
         
               $cat_name =  $cat['categories_id'];
               $productsdata = $this->db->query("select * from sub_categories where categories_id='$cat_name'")->result_array();
               
               foreach($productsdata as $row){
             ?>
                <div class="swiper-slide">
                    <a href="event?id=<?php echo $row['sub_id']?>">
                        <img src="assets/img/<?php echo $row['subcat_image']?>" class="img-fluid w-100 populer-img">
                        <div class="mt-3 text-center">
                            <h6><?php echo $row['sub_categories']?></h6>
                        </div>
                    </a>
                </div>
                <?php 
                } 
                } 
             ?>
                <?php 
                } 
                } 
              ?>
            </div>
        </div>
    </div>
</section>
<!-- popular search -->
<!-- <section>
    <div class="container">
        <div class="row">
            <h3 class="text-center text-uppercase">- Popular Searches -</h3>
        </div>
        <div class="swiper mySwiper_populer mt-5 mb-5 h-100">
            <div class="swiper-wrapper">

                <div class="swiper-slide" style="border-radius:20px;">

                    <div>
                        <a href="">
                            <img src="<?php echo base_url('assets/img/party.jpg')?>" class="img-fluid populer-img"
                                alt="">
                            <div class="mt-2 px-2 text-center">
                                <h5>Party</h5>
                            </div>

                        </a>
                    </div>

                </div>
                <div class="swiper-slide" style="border-radius:20px;">

                    <div>
                        <a href="">
                            <img src="<?php echo base_url('assets/img/birthday.jpg')?>" class="img-fluid populer-img"
                                alt="">
                            <div class="mt-2 px-2 text-center">
                                <h5>Birthday</h5>
                            </div>

                        </a>
                    </div>

                </div>
                <div class="swiper-slide" style="border-radius:20px;">

                    <div>
                        <a href="">
                            <img src="<?php echo base_url('assets/img/wedding.jpg')?>" class="img-fluid populer-img"
                                alt="">
                            <div class="mt-2 px-2 text-center">
                                <h5>Wedding</h5>
                            </div>

                        </a>
                    </div>

                </div>
                <div class="swiper-slide" style="border-radius:20px;">

                    <div>
                        <a href="">
                            <img src="<?php echo base_url('assets/img/photography.jpg')?>" class="img-fluid populer-img"
                                alt="">
                            <div class="mt-2 text-center px-2">
                                <h5>Photography</h5>
                            </div>

                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- categories -->
<section  class="category-section">
    <div class="container">
        <div class="row">
            <h3 class="text-center text-uppercase">- Our Categories -</h3>
        </div>
        <?php 
                if(!empty($category)) { 
                foreach($category as $cat){
                $cat_name =  $cat['categories_id'];
            ?>

        <div class="swiper swiper-container mySwiper mt-5 mb-5">
            <h4>
                <?php
                    error_reporting(0);
                    ?>
                <?php 
                        $cat_name =  $cat['categories_id'];
                        $catdata = $this->db->get_where('categories',array('categories_id'=>$cat_name))->row();
                        echo  $catdata->categories_name; 
                    ?>
            </h4>
            <div class="swiper-wrapper">

                <?php if(!empty($category)) { 
         
               $cat_name =  $cat['categories_id'];
               $productsdata = $this->db->query("select * from sub_categories where categories_id='$cat_name'")->result_array();
               
               foreach($productsdata as $row){
             ?>
                <div class="swiper-slide">
                    <a href="venue?id=<?php echo $row['sub_id']?>">
                        <img src="assets/img/<?php echo $row['subcat_image']?>" class="img-fluid populer-img">
                        <div class="mt-3 text-center">
                            <h6><?php echo $row['sub_categories']?></h6>
                        </div>
                    </a>
                </div>
                <?php 
                } 
                } 
             ?>
                <?php 
                } 
                } 
              ?>
            </div>
        </div>
        <!-- ---------------------------START VENDOR-------------------------- -->

        <?php 
                if(!empty($category_vendor)) { 
                foreach($category_vendor as $cat){
                $cat_name =  $cat['categories_id'];
            ?>

        <div class="swiper  swiper-container mySwiper mt-5 mb-5">
            <h4>
                <?php
                    error_reporting(0);
                    ?>
                <?php 
                        $cat_name =  $cat['categories_id'];
                        $catdata = $this->db->get_where('categories',array('categories_id'=>$cat_name))->row();
                        echo  $catdata->categories_name; 
                    ?>
            </h4>
            <div class="swiper-wrapper">

                <?php if(!empty($category_vendor)) { 
         
               $cat_name =  $cat['categories_id'];
               $productsdata = $this->db->query("select * from sub_categories where categories_id='$cat_name'")->result_array();
               
               foreach($productsdata as $row){
             ?>
                <div class="swiper-slide">
                    <a href="vendors?id=<?php echo $row['sub_id']?>">
                        <img src="assets/img/<?php echo $row['subcat_image']?>" class="img-fluid populer-img">
                        <div class="mt-3 text-center">
                            <h6><?php echo $row['sub_categories']?></h6>
                        </div>
                    </a>
                </div>
                <?php 
                } 
                } 
             ?>
                <?php 
                } 
                } 
              ?>
            </div>
        </div>
        <!-- ------------------------END VENDOR -->
      
        <!-- SHOP -->
        <?php 
                if(!empty($category_shop)) { 
                foreach($category_shop as $cat){
                $cat_name =  $cat['categories_id'];
            ?>

        <div class="swiper  swiper-container mySwiper mt-5 mb-5">
            <h4>
                <?php
                    error_reporting(0);
                    ?>
                <?php 
                        $cat_name =  $cat['categories_id'];
                        $catdata = $this->db->get_where('categories',array('categories_id'=>$cat_name))->row();
                        echo  $catdata->categories_name; 
                    ?>
            </h4>
            <div class="swiper-wrapper">

                <?php if(!empty($category_shop)) { 
         
               $cat_name =  $cat['categories_id'];
               $productsdata = $this->db->query("select * from sub_categories where categories_id='$cat_name'")->result_array();
               
               foreach($productsdata as $row){
             ?>
                <div class="swiper-slide">
                    <a href="shop?id=<?php echo $row['sub_id']?>">
                        <img src="assets/img/<?php echo $row['subcat_image']?>" class="img-fluid populer-img">
                        <div class="mt-3 text-center">
                            <h6><?php echo $row['sub_categories']?></h6>
                        </div>
                    </a>
                </div>
                <?php 
                } 
                } 
             ?>
                <?php 
                } 
                } 
              ?>
            </div>
        </div>
    </div>
</section>
<!-- gallary -->
<section>
    <div class="container">
        <div class="row">
            <h3 class="text-center text-uppercase">- Gallery to Look for -</h3>
        </div>
        <?php 
                if(!empty($category_photo)) { 
                foreach($category_photo as $cat){
                $cat_name =  $cat['categories_id'];
            ?>

        <div class="swiper  swiper-container mygallary mt-5 mb-5">
            <!-- <h4>
                <?php
                    error_reporting(0);
                    ?>
                <?php 
                        $cat_name =  $cat['categories_id'];
                        $catdata = $this->db->get_where('categories',array('categories_id'=>$cat_name))->row();
                        echo  $catdata->categories_name; 
                    ?>
            </h4> -->
            <div class="swiper-wrapper">

                <?php if(!empty($category_photo)) { 
         
               $cat_name =  $cat['categories_id'];
               $productsdata = $this->db->query("select * from sub_categories where categories_id='$cat_name'")->result_array();
               
               foreach($productsdata as $row){
             ?>
                <div class="swiper-slide ">
                    <a href="photos?id=<?php echo $row['sub_id']?>">
                        <img src="assets/img/<?php echo $row['subcat_image']?>" class="img-fluid  w-100 populer-img" style="height:60vh;">
                        <div class="mt-3 text-center">
                            <h6><?php echo $row['sub_categories']?></h6>
                        </div>
                    </a>
                </div>
                <?php 
                } 
                } 
             ?>
                <?php 
                } 
                } 
              ?>
            </div>
        </div>
    </div>
</section>
<!-- blog -->
<section class="blog_section">
    <div class="container">
        <div class="row">
            <h3 class="text-center text-uppercase">- Latest Blogs -</h3>
        </div>
        <?php 
                if(!empty($category_blog)) { 
                foreach($category_blog as $cat){
                $cat_name =  $cat['categories_id'];
            ?>

        <div class="swiper  swiper-container mySwiper_blog mt-5 mb-5">
            <!-- <h4>
                <?php
                    error_reporting(0);
                    ?>
                <?php 
                        $cat_name =  $cat['categories_id'];
                        $catdata = $this->db->get_where('categories',array('categories_id'=>$cat_name))->row();
                        echo  $catdata->categories_name; 
                    ?>
            </h4> -->
            <div class="swiper-wrapper">

                <?php if(!empty($category_blog)) { 
         
               $cat_name =  $cat['categories_id'];
               $productsdata = $this->db->query("select * from sub_categories where categories_id='$cat_name'")->result_array();
               
               foreach($productsdata as $row){
             ?>
                <div class="swiper-slide">
                    <a href="blog?id=<?php echo $row['sub_id']?>">
                        <img src="assets/img/<?php echo $row['subcat_image']?>" class="img-fluid w-100 populer-img">
                        <div class="mt-3 text-center">
                            <h6><?php echo $row['sub_categories']?></h6>
                        </div>
                    </a>
                </div>
                <?php 
                } 
                } 
             ?>
                <?php 
                } 
                } 
              ?>
            </div>
        </div>
    </div>
</section>

