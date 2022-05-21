<?php foreach($fetch->result() as $row){ ?>
<title>E-Invites</title>
<?php } ?>
<div class="container" style="margin-top:10%;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo site_url()?>">Home</a></li>
            <?php foreach($fetch->result() as $row){ ?>
            <?php } ?>
            <li class="breadcrumb-item"><?php echo $row->name?></li>

        </ol>
    </nav>
    <div>
        <div class="btn-group" style="float:right;">
            <!-- <input type="search" name="" id="myInput" placeholder="Search Here!" class="form-control" id=""> -->
            <form id="live-search" action="" class="styled" method="post">
                <fieldset>
                    <input type="text" placeholder="Search Here!" class=" text-input form-control" id="filter"
                        value="" />
                    <span id="filter-count"></span>
                </fieldset>
            </form>
            <!-- <button class="btn-grids mx-2"> <i class="fas fa-th-large mx-1"></i> grid</button>
            <button class="btn-grids  mx-2"> <i class="fas fa-bars mx-1"></i> list</button> -->

        </div>
    </div>
</div>

<div class="container">
    <p>Filter Products by Price</p>
    <div id="slider-container" ></div>
    <p>
        <label for="amount">Price range:</label>
        <input type="" id="amount" readonly style="border: 0; color: #511378; font-weight: bold;" />
    </p>
</div>
<div class="container">
    <div class="row ">
        <?php
              foreach($fetch->result() as $row){
            ?>
        <div class="col-lg-4 hmm" id="computers">
            <div class="system" data-price="<?php echo $row->price?>">
                <a href="e_invites_details?id=<?php echo $row->invites_id ?>">
                    <div class="box services-card ">
                        <img src="assets/img/<?php echo $row->image?>" class="img-fluid services-img" alt="">
                        <div class=" p-4">
                            <h5 class=""><?php echo $row->name?></h3>
                              <div class="d-flex justify-content-around">
                              <p class="mt-3">RS:<?php echo $row->price?></p>
                                        <p class="mt-3">Per Card</p>
                              </div>
                                    <div>
                                        
                                        <p class="mt-3"><?php echo $row->description?></p>
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
<div id="slider-range"></div>