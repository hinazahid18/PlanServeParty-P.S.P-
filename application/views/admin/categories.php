<title>Manage Categories </title>
<div class="main-panel">
    <div class="content-wrapper">
        <div class=" grid-margin stretch-card">
            <div class="card">

                <!--ADD CATEGORIES MODEL -->

                <div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ADD CATEGORIES</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo base_url('admin/addcategories')?>" method="post">
                                    <label for="">CATEGORIES NAME</label>
                                    <input type="text" class="form-control" name="addcategories">
                                    <div class="modal-footer">
                                        <button class="btn btn-primary">ADD CATEGORIES</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!--END ADD CATEGORIES MODEL -->
                <div class="card-body">
                    <!-- BUTTON FOR ADD CATEGORIES  -->
                    <div>
                        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#Add">Add
                            Categories</button>
                    </div>
                    <!--END BUTTON FOR ADD CATEGORIES  -->

                    <!-- FETCH DATA FROM DATABASE IN CATEGORIES TABLE -->
                    <div class="table-responsive" >
                        <table class="table table-striped table-borderless" id="table_categories">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                foreach($fetch_data->result() as $row)
                                {
                                ?>
                                <tr class="text-center">
                                    <td style="width:100px;">
                                        <?php echo $i?>
                                    </td>
                                    <td>
                                        <?php echo $row->categories_name?>
                                    </td>
                                    <td style="width:200px">
                                        <a href="categories?id=<?php echo $row->categories_id?>" data-toggle="modal"
                                            data-target="#update">
                                            <button class="btn btn-primary  px-4
                                            py-2">Edit</button>
                                        </a>
                                        <a href="deletecategories?id=<?php echo $row->categories_id?>"
                                            onclick="return confirm('Do you want Delete?');"><button
                                                class="btn btn-danger px-4
                                            py-2">Delete</button>
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
    </div>
    <!-- UPDATE MODEL -->
    <div class="modal fade" id="update" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">UPDATE CATEGORIES</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/updatecategories')?>" method="post">
                        <?php
                        if($edite_data->num_rows() > 0)  
                        {
                            foreach($edite_data->result() as $row)  
                            {  
                        ?>
                        
                        <label for="">CATEGORIES NAME</label>
                        <input type="text" class="form-control" name="id" value="<?php echo $row->id?>">
                        <input type="text" class="form-control" name="updatecategories"
                            value="<?php echo $row->categories_name?>">
                        <div class="modal-footer">
                            <button class="btn btn-primary">UPDATE CATEGORIES</button>
                        </div>
                        <?php
                        }
                        }
                        
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>