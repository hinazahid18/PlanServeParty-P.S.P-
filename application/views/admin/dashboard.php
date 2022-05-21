<title>Dashboard</title>
<style>
a{
    text-decoration: none;
}
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class=" grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row gx-4">
                        <div class="col-lg-4 ">

                            <?php
                                 
                                   foreach($fetch_countpending->result()as $row){
                                ?>
                            <?php
                                }
                                
                                ?>
                          <a href="bookings" style=" text-decoration: none;">
                          <div class="card p-5  card-light-danger h-100">
                                <h5 class="text-white font-weight-bold">PENDING <br> BOOKINGS</h4>

                                    <h4 class="text-white font-weight-bold"><small
                                            class="text-white font-weight-bold">Total Pending Bookings:</small>
                                        <?php echo $row->total?></h4>

                            </div>
                          </a>

                        </div>

                        <div class="col-lg-4">
                            <?php
                         
                                   foreach($fetch_confirm->result()as $row){
                                ?>
                            <?php
                                }
                                
                                ?>
                            <a href="confirm_bookings" style=" text-decoration: none;">
                            <div class="card p-5 card-tale h-100">
                                <h5 class="text-white font-weight-bold">CONFIRM <br> BOOKINGS</h4>

                                    <h4 class="text-white font-weight-bold"><small
                                            class="text-white font-weight-bold">Total Confirm Bookings:</small> <?php echo $row->total?>
                                    </h4>

                            </div>
                            </a>

                        </div>
                        <div class="col-lg-4">
                        <?php
                                   foreach($fetch_countcomplete->result()as $row){
                                ?>
                            <?php
                                }
                                
                                ?>
                           <a href="complete_booking" style=" text-decoration: none;">
                           <div class="card p-5 card-dark-blue  h-100">
                                <h5 class="text-white font-weight-bold">COMPLETE <br> BOOKINGS</h4>

                                    <h4 class="text-white font-weight-bold"><small
                                            class="text-white font-weight-bold">Total Complete Bookings:</small>
                                            <?php echo $row->total?></h4>

                            </div>

                           </a>
                        </div>



                    </div>
                </div>
            </div>