<?php foreach($fetch->result() as $row){ ?>
<title>Photos</title>

<?php } ?>
<div class="container" style="margin-top:10%;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo site_url()?>">Home</a></li>
            <?php foreach($fetch->result() as $row){ ?>
            <?php } ?>
            <li class="breadcrumb-item"><?php echo $row->description?></li>

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

<section id="portfolio" class="portfolio"  >

    <div class="container" data-aos="fade-up">
        <div class="row gy-4 portfolio-container">
                <?php
                 foreach($fetch->result() as $row){
                ?>
            <div class="col-lg-4  hmm col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                    <img src="assets/img/<?php echo $row->photo?>" class="img-fluid" alt="">
                 <div class="mt-3 text-center" >
                 <span><?php echo $row->description?></span>
                 </div>
                    <div class="portfolio-info">
                          <span><?php echo $row->description?></span>
                        <div class="portfolio-links">
                            <a href="assets/img/<?php echo $row->photo?>" data-gallery="portfolioGallery"
                                class="portfokio-lightbox" title="<?php echo $row->description?>"><i class="bi bi-plus"></i></a>

                        </div>
                    </div>
                </div>
            </div>
                <?php
                 }
                ?>
        </div>
    </div>
</section>