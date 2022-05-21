<title>Manage Invitation </title>
<style>
    .table td img, .jsgrid .jsgrid-table td img {
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
