<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="<?php echo site_url('')?>" class="logo d-flex align-items-center">
                <i class="fas fa-face-kiss-wink-heart text-white mx-2"></i>
                <span>PlanServeParty</span><br><br>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <?php
                    error_reporting(0);
                    ?>
                    <?php 
                if(!empty($category)) { 
                foreach($category as $cat){
                $cat_name =  $cat['categories_id'];
            ?>
                    <li class="dropdown">
                        <a href="#"> <?php 
                            $cat_name =  $cat['categories_id'];
                            $catdata = $this->db->get_where('categories',array('categories_id'=>$cat_name))->row();
                            echo   $catdata->categories_name; 
                    ?> <span class="caret"></span><i class="bi bi-chevron-down"></i></a>

                        <ul>
                            <?php if(!empty($category)) { 
                             
                             $productsdata = $this->db->query("select * from sub_categories where categories_id='$cat_name'")->result_array();
                                
                                foreach($productsdata as $row){
                             ?>
                            <li>
                                <a class="text-capitalize"
                                    href="venue?id=<?php echo $row['sub_id']?>"><?php echo $row['sub_categories']?></a>
                            </li>
                            <?php
                                }
                                }
                              
                            ?>
                        </ul>

                    </li>

                    <?php 
                        }
                        } ?>


                    <!-- ---------------------------------VENDOR ---------------- -->

                    <?php
                    error_reporting(0);
                    ?>
                    <?php 
                if(!empty($category_vendor)) { 
                foreach($category_vendor as $cat){
                $cat_name =  $cat['categories_id'];
            ?>
                    <li class="dropdown">
                        <a href="#"> <?php 
                            $cat_name =  $cat['categories_id'];
                            $catdata = $this->db->get_where('categories',array('categories_id'=>$cat_name))->row();
                            echo   $catdata->categories_name; 
                    ?> <span class="caret"></span><i class="bi bi-chevron-down"></i></a>

                        <ul>
                            <?php if(!empty($category_vendor)) { 
                             
                             $productsdata = $this->db->query("select * from sub_categories where categories_id='$cat_name'")->result_array();
                                
                                foreach($productsdata as $row){
                             ?>
                            <li>
                                <a href="vendors?id=<?php echo $row['sub_id']?>"><?php echo $row['sub_categories']?></a>
                            </li>
                            <?php
                                }
                                }
                              
                            ?>
                        </ul>

                    </li>

                    <?php 
                        }
                        } ?>

                    <!-- ---------------------------------EVENTS ---------------- -->

                    <?php
                    error_reporting(0);
                    ?>
                    <?php 
                if(!empty($category_event)) { 
                foreach($category_event as $cat){
                $cat_name =  $cat['categories_id'];
            ?>
                    <li class="dropdown">
                        <a href="#"> <?php 
                            $cat_name =  $cat['categories_id'];
                            $catdata = $this->db->get_where('categories',array('categories_id'=>$cat_name))->row();
                            echo   $catdata->categories_name; 
                    ?> <span class="caret"></span><i class="bi bi-chevron-down"></i></a>

                        <ul>
                            <?php if(!empty($category_event)) { 
                             
                             $productsdata = $this->db->query("select * from sub_categories where categories_id='$cat_name'")->result_array();
                                
                                foreach($productsdata as $row){
                             ?>
                            <li>
                                <a href="event?id=<?php echo $row['sub_id']?>"><?php echo $row['sub_categories']?></a>
                            </li>
                            <?php
                                }
                                }
                              
                            ?>
                        </ul>

                    </li>

                    <?php 
                        }
                        } ?>
 <!-- ---------------------------------PHOTOS ---------------- -->

 <?php
                    error_reporting(0);
                    ?>
                    <?php 
                if(!empty($category_photo)) { 
                foreach($category_photo as $cat){
                $cat_name =  $cat['categories_id'];
            ?>
                    <li class="dropdown">
                        <a href="#"> <?php 
                            $cat_name =  $cat['categories_id'];
                            $catdata = $this->db->get_where('categories',array('categories_id'=>$cat_name))->row();
                            echo   $catdata->categories_name; 
                    ?> <span class="caret"></span><i class="bi bi-chevron-down"></i></a>

                        <ul>
                            <?php if(!empty($category_photo)) { 
                             
                             $productsdata = $this->db->query("select * from sub_categories where categories_id='$cat_name'")->result_array();
                                
                                foreach($productsdata as $row){
                             ?>
                            <li>
                                <a href="photos?id=<?php echo $row['sub_id']?>"><?php echo $row['sub_categories']?></a>
                            </li>
                            <?php
                                }
                                }
                              
                            ?>
                        </ul>

                    </li>

                    <?php 
                        }
                        } ?>


                    <!-- ---------------------------------SHOP ---------------- -->

                    <?php
                    error_reporting(0);
                    ?>
                    <?php 
                if(!empty($category_shop)) { 
                foreach($category_shop as $cat){
                $cat_name =  $cat['categories_id'];
            ?>
                    <li class="dropdown">
                        <a href="#"> <?php 
                            $cat_name =  $cat['categories_id'];
                            $catdata = $this->db->get_where('categories',array('categories_id'=>$cat_name))->row();
                            echo   $catdata->categories_name; 
                    ?> <span class="caret"></span><i class="bi bi-chevron-down"></i></a>

                        <ul>
                            <?php if(!empty($category_shop)) { 
                             
                             $productsdata = $this->db->query("select * from sub_categories where categories_id='$cat_name'")->result_array();
                                
                                foreach($productsdata as $row){
                             ?>
                            <li>
                                <a href="shop?id=<?php echo $row['sub_id']?>"><?php echo $row['sub_categories']?></a>
                            </li>
                            <?php
                                }
                                }
                              
                            ?>
                        </ul>

                    </li>

                    <?php 
                        }
                        } ?>
  <!-- ---------------------------------E-INVITES ---------------- -->

  <?php
                    error_reporting(0);
                    ?>
                    <?php 
                if(!empty($category_invites)) { 
                foreach($category_invites as $cat){
                $cat_name =  $cat['categories_id'];
            ?>
                    <li class="dropdown">
                        <a href="#"> <?php 
                            $cat_name =  $cat['categories_id'];
                            $catdata = $this->db->get_where('categories',array('categories_id'=>$cat_name))->row();
                            echo   $catdata->categories_name; 
                    ?> <span class="caret"></span><i class="bi bi-chevron-down"></i></a>

                        <ul>
                            <?php if(!empty($category_invites)) { 
                             
                             $productsdata = $this->db->query("select * from sub_categories where categories_id='$cat_name'")->result_array();
                                
                                foreach($productsdata as $row){
                             ?>
                            <li>
                                <a href="e_invites?id=<?php echo $row['sub_id']?>"><?php echo $row['sub_categories']?></a>
                            </li>
                            <?php
                                }
                                }
                              
                            ?>
                        </ul>

                    </li>

                    <?php 
                        }
                        } ?>


                    <!-- ---------------------------------BLOG ---------------- -->

                    <?php
                    error_reporting(0);
                    ?>
                    <?php 
                if(!empty($category_blog)) { 
                foreach($category_blog as $cat){
                $cat_name =  $cat['categories_id'];
            ?>
                    <li class="dropdown">
                        <a href="#"> <?php 
                            $cat_name =  $cat['categories_id'];
                            $catdata = $this->db->get_where('categories',array('categories_id'=>$cat_name))->row();
                            echo   $catdata->categories_name; 
                    ?> <span class="caret"></span><i class="bi bi-chevron-down"></i></a>

                        <ul>
                            <?php if(!empty($category_blog)) { 
                             
                             $productsdata = $this->db->query("select * from sub_categories where categories_id='$cat_name'")->result_array();
                                
                                foreach($productsdata as $row){
                             ?>
                            <li>
                                <a href="blog?id=<?php echo $row['sub_id']?>"><?php echo $row['sub_categories']?></a>
                            </li>
                            <?php
                                }
                                }
                              
                            ?>
                        </ul>

                    </li>

                    <?php 
                        }
                        } ?>



                    <li><a class="nav-link scrollto" href="<?php echo base_url('contact_us') ?>">Contact</a></li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->