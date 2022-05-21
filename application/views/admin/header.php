<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php

use Mpdf\Tag\H5;

 echo base_url('assets/vendors/feather/feather.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/ti-icons/css/themify-icons.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/css/vendor.bundle.base.css')?>">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/ti-icons/css/themify-icons.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/select.dataTables.min.css')?>">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style_admin.css')?>">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/fav.png')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/richtext.min.css')?>">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css"> -->



</head>

<body>
    <div class="container-scroller">

        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand" href="<?php echo base_url('admin/dashboard')?>"><span>
PlanServeParty</span></a>
                <!-- <a class="navbar-brand brand-logo-mini" href="<?php echo base_url('admin/dashboard')?>"><span>
PlanServeParty</span></a> -->
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item">
                        <?php
                        foreach($fetch_admin->result() as $row)  
                        {  
                            if($row->role==1){
                             echo '<h4>Vendor('.$row->username.')</h4>';
                            }else{
                                echo '<h4 class="text-capitalize">Hi ' .$row->username.'</h4>';
                            }
                       ?>
                        <?php
                    }
                        ?>
                    </li>
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="<?php echo base_url('assets/img/face12.jpg')?>" alt="profile" width="20" height="15"/>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <?php
                        foreach($fetch_admin->result() as $row)  
                        {  
                            if($row->role==1){
                             echo '';
                            }else{
                                echo ' <a class="dropdown-item" data-toggle="modal" data-target="#modelId">
                                <i class="ti-settings text-primary"></i>
                                Setting
                            </a>';
                            }
                       ?>
                            <?php
                         }
                        ?>
                            <a href="<?php echo base_url('admin/logout')?>" class="dropdown-item">
                                <i class="ti-power-off text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <!--SIDE NAVBAR -->

        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#cat" aria-expanded="false"
                            aria-controls="cat">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Manage Categories</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="cat">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="categories">Categories</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="sub_categories">Sub Categories</a>
                                </li>
                             
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Manage Venues</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <!-- <li class="nav-item"> <a class="nav-link" href="categories">Categories</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="sub_categories">Sub Categories</a>
                                </li> -->
                                <li class="nav-item"> <a class="nav-link" href="venue">Venues</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#user" aria-expanded="false"
                            aria-controls="user">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Manage Vendor</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="user">
                            <ul class="nav flex-column sub-menu">
                                <!-- <li class="nav-item"> <a class="nav-link" href="categories">Categories</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="sub_categories">Sub
                                        Categories</a>
                                </li> -->
                                <li class="nav-item"> <a class="nav-link" href="vendor">Vendors</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#e" aria-expanded="false"
                            aria-controls="user">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Manage E-Invites</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="e">
                            <ul class="nav flex-column sub-menu">
                               
                                <li class="nav-item"> <a class="nav-link" href="e_invites">E-Invites</a>
                                </li>
                                <span class="menu-title text-white fw-bold">E-Invites Order's</span>
                                <li class="nav-item"> <a class="nav-link" href="invites_bookings">Invites</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="invites_confirm_bookings">Invites Confirm</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="invites_complete_booking">Invites Complete</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#contact" aria-expanded="false"
                            aria-controls="contact">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Manage Events</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="contact">
                            <ul class="nav flex-column sub-menu">
                                <!-- <li class="nav-item"> <a class="nav-link" href="categories">Categories</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="sub_categories">Sub Categories</a>
                                </li> -->
                                <li class="nav-item"> <a class="nav-link" href="event">Events</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#vendor" aria-expanded="false"
                            aria-controls="vendor">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Manage Photos</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="vendor">
                            <ul class="nav flex-column sub-menu">
                                <!-- <li class="nav-item"> <a class="nav-link" href="photo_categories">Categories</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="photo_sub_categories">Sub Categories</a>
                                </li> -->
                                <li class="nav-item"> <a class="nav-link" href="photos">photos</a>
                                </li>
                            </ul>
                        </div>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#product" aria-expanded="false"
                            aria-controls="product">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Manage Shop</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="product">
                            <ul class="nav flex-column sub-menu">
                                <!-- <li class="nav-item"> <a class="nav-link" href="categories">Categories</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="sub_categories">Sub Categories</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="shop">Products</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#blog" aria-expanded="false"
                            aria-controls="blog">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Manage Blog</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="blog">
                            <ul class="nav flex-column sub-menu">
                                <!-- <li class="nav-item"> <a class="nav-link" href="categories">Categories</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="sub_categories">Sub Categories</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="blog">Blogs</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#order" aria-expanded="false"
                            aria-controls="order">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Manage Bookings</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="order">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="bookings">Pending <br> Booking</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="confirm_bookings">Confirm <br> Booking</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="complete_booking">Complete <br> Booking</a>
                                </li>
                            </ul>
                        </div>
                    </li>



                </ul>
            </nav>
            <!-- Modal -->
            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">ADMIN ACCOUNT</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="font-size:30px;">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <?php
                               foreach($fetch_admin->result() as $row)  
                            {  
                            ?>

                                <form action="<?php echo base_url('admin/update_login_admin')?>" method="post">
                                    <input type="hidden" class="form-control" name="id" value="<?php echo $row->id?>">
                                    <br>
                                    <label for="">Username</label>
                                    <input type="text" class="form-control" name="username"
                                        value="<?php echo $row->username?>"> <br>
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        value="<?php echo $row->email?>"> <br>
                                    <label for="">Password</label>
                                    <input type="text" class="form-control" name="password"
                                        value="<?php echo $row->password?>"> <br>
                                    <div>
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                                <?php
                                }
                              ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>