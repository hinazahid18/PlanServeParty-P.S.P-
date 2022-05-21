<?php foreach($fetch->result() as $row){ ?>
<title>
Events
</title>
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
          <input type="text" placeholder="Search Here!" class=" text-input form-control"  id="filter" value="" />
          <span id="filter-count"></span>
      </fieldset>
  </form>
            <!-- <button class="btn-grids mx-2"> <i class="fas fa-th-large mx-1"></i> grid</button>
            <button class="btn-grids  mx-2"> <i class="fas fa-bars mx-1"></i> list</button>
       -->
        </div>
    </div>
</div>
 <div class="container">
    <p>Filter Events by Price</p>
<div id="slider-container" ></div>
<p>
    <label for="amount">Price range:</label>
    <input type="" id="amount" readonly style="border: 0; color: #f6931f; font-weight: bold;" />
</p>
</div>
<div class="container">
    <div class="row ">
        <?php
              foreach($fetch->result() as $row){
            ?>
        <div class="col-lg-4 hmm" id="computers">
            <div class="system" data-price="<?php echo $row->price?>">
                <a href="event_details?id=<?php echo $row->event_id?>">
                    <div class="box services-card ">
                        <img src="assets/img/<?php echo $row->image?>" class="img-fluid services-img" alt="">
                        <div class=" p-4">
                            <h5 class=""><?php echo $row->name?></h3>
                               <h6 class="mt-3"><i class="fas fa-map-marker"></i> <?php echo $row->city?></h4>
                                    <div class="d-flex justify-content-between">
                                        <p class="mt-3">RS:<?php echo $row->price?></p>
                                        <p class="mt-3">Per Event</p>
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