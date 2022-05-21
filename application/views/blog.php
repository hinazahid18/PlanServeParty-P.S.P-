<?php foreach($fetch->result() as $row){ ?>
<title>
    Blogs
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
            <button class="btn-grids  mx-2"> <i class="fas fa-bars mx-1"></i> list</button> -->
            
        </div>
    </div>
</div>
<div class="container">
    <div class="row ">
        <?php
              foreach($fetch->result() as $row){
            ?>
        <div class="col-lg-4 hmm">
        <a href="blog_details?id=<?php echo $row->blog_id?>">
                <div class="box services-card">
                    <img src="assets/img/<?php echo $row->image?>" class="img-fluid services-img" alt="">
                   <!-- <div class="shadow p-2">-->
                       <div><br>
                    <h5 class=""><?php echo $row->description?></h5>
                    <h6 class="text-end"><?php echo $row->date?></h6>
                    <p class=""><?php echo $row->name?></p>
                    </div>
                </div>
            </a>
        </div>
        <?php
        }
        ?>
    </div>
</div>
