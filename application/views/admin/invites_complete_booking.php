<title>Manage Invitation </title>
<style>
    .table td img,
    .jsgrid .jsgrid-table td img {
        /* width: 136px;
    height: 136px; */
        border-radius: 0;
    }
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class=" grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <!-- <div>
                        <div class="btn-group" style="float:right; margin:10px 10px 10px 10px;">

                            <a href="allreport" target="_blank" download="">
                                <button class="btn btn-primary text-white"
                                    style="float:right; margin:10px 10px 10px 10px; "><i class="fas fa-download"></i> Download All</button>
                            </a>
                        </div>
                        <div class="btn-group" style="float:right; margin:10px 10px 10px 10px;">

                            <a href="export">
                                <button class="btn btn-success text-white"
                                    style="float:right; margin:10px 10px 10px 10px; "><i class="fas fa-download"></i> Download
                                    CSV</button>
                            </a>
                        </div>

                    </div>
                    <div>
                        <div class="container " style="margin-top:15%; margin-bottom:10%;">
                            <form class="form-inline justify-content-center"
                                action="<?php echo base_url('admin/report')?>" method="post">
                                <div class="form-group mb-2">
                                    <label for="" class="fw-bold ">From Date: </label>
                                    <input type="date" name="from" class="form-control" required>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="" class="fw-bold">To Date: </label>
                                    <input type="date" name="to" class="form-control" required>
                                </div>
                                <button class="btn btn-primary mb-2"><i class="fas fa-download"></i> Genrate
                                    Report</button>
                            </form>
                        </div>
                    </div> -->
                    <!-- FETCH DATA FROM DATABASE IN CATEGORIES TABLE -->
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless" id="table_categories">
                        <thead>
                                <tr class="text-center">
                                    <!-- <th>#</th> -->
                                    <th>Invitation Card Name</th>
                                   
                                    <th>Event Date</th>
                                    <th>Booking Date</th>
                                    <th>Booking Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                
                                foreach($fetch->result() as $row){
                                ?>
                                <tr class="text-center">
                                    <!-- <td>
                                        <?php echo $i?>
                                    </td> -->
                                    <td>
                                        <?php echo $row->invite_name?>
                                    </td>
                                   
                                    <td>
                                        <?php echo $row->event_date?>
                                    </td>
                                 
                                    <td>
                                        <?php echo $row->invite_date?>
                                    </td>
                                    <td>
                                        <?php echo $row->invite_status?>
                                    </td>
                                    <td>
                                        <a href="edit_invite_booking?id=<?php echo $row->invite_id ?>">
                                         <button class="btn btn-primary px-4 py-2">Edit</button>
                                        </a>
                                        <a href="delet_invite_booking?id=<?php echo $row->invite_id ?>"
                                            onclick="return confirm('Do you want Delete?');"><button
                                            class="btn btn-danger px-4 py-2">Delete</button>
                                        </a>
                                    </td>

                                </tr>
                                <?php
                                $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>