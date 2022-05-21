<title>Manage Sub Categories </title>
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
                                <h5 class="modal-title" id="exampleModalLabel">ADD SUB CATEGORIES</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo base_url('admin/addsubcategories')?>" method="post" enctype="multipart/form-data">
                                    <label for="">SELECT CATEGORIES</label>
                                        <select name="category" id="" class="form-control">
                                            <option value="">Select</option>
                                        <?php
                                        foreach($fetch_categories->result() as $row){
                                        ?>
                                        <option value="<?php echo $row->categories_id?>"><?php echo $row->categories_name?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                    <label for="" class="mt-4">SUB CATEGORIES NAME</label>
                                    <input type="text" class="form-control" name="addsubcategories">
                                    <label for="" class="mt-4">SUB CATEGORIES IMAGE</label>
                                    <input type="file" class="form-control" name="image">
                                    <?php  $error?>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary">ADD SUB CATEGORIES</button>
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
                           Sub Categories</button>
                    </div>
                    <!--END BUTTON FOR ADD CATEGORIES  -->

                    <!-- FETCH DATA FROM DATABASE IN CATEGORIES TABLE -->
                    <div class="table-responsive" >
                        <table class="table table-striped table-borderless" id="table_categories">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>Sub Category Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                foreach($fetch_subcategories->result() as $row)
                                {
                                ?>
                                <tr class="text-center">
                                    <td style="width:100px;">
                                        <?php echo $i?>
                                    </td>
                                    <td>
                                        <?php echo $row->categories_name?>
                                    </td>
                                    <td>
                                        <?php echo $row->sub_categories?>
                                    </td>
                                  <td>
                                        <img src="../assets/img/<?php echo $row->subcat_image?>" class="img-fluid" alt="">
                                       <!-- <a href="download?id=<?php echo $row->id?>"><?php echo $row->image?></a>  -->
                                    </td>
                                    <td style="width:200px">
                                        <a href="edit_subcategory?id=<?php echo $row->sub_id?>"><button class="btn btn-primary  px-4
                                            py-2">Edit</button></a>
                                        <a href="deletesubcategories?id=<?php echo  $row->sub_id?>"
                                            onclick="return confirm('Do you want Delete?');"><button
                                                class="btn btn-danger px-4
                                            py-2">Delete</button></a>
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
</div>