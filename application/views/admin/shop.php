<title>Manage Shop </title>
<style>
    .table td img, .jsgrid .jsgrid-table td img {
    width: 136px;
    height: 136px;
    border-radius: 0;
}
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class=" grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <!-- BUTTON FOR ADD CATEGORIES  -->
                    <div>
                      <a href="<?php echo base_url('admin/add_shop')?>"><button class="btn btn-primary mb-4">Add Product</button></a>  
                    </div>
                    <!--END BUTTON FOR ADD CATEGORIES  -->

                    <!-- FETCH DATA FROM DATABASE IN CATEGORIES TABLE -->
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless" id="table_categories">
                            <thead>
                                <tr class="text-center">
                                    <!-- <th>#</th> -->
                                    <th>Category Name</th>
                                    <th>Sub Category</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <!-- <th>City</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                
                                foreach($fetch_data->result() as $row){
                                ?>
                                <tr class="text-center">
                                    <!-- <td>
                                        <?php echo $i?>
                                    </td> -->
                                    <td>
                                        <?php echo $row->categories_name?>
                                    </td>
                                    <td>
                                        <?php echo $row->sub_categories ?>
                                    </td>
                                    <td>
                                        <?php echo $row->name?>
                                    </td>
                                    <td>
                                        <img src="../assets/img/<?php echo $row->image?>" class="img-fluid" alt="">
                                     
                                    </td>
                                    <td>
                                        <?php echo $row->price?>
                                    </td>
                                    <!-- <td>
                                        <?php echo $row->city?>
                                    </td> -->
                                    <td>
                                        <a href="edit_shop?id=<?php echo $row->shop_id?>">
                                         <button class="btn btn-primary px-4 py-2">Edit</button>
                                        </a>
                                        <a href="deleteshop?id=<?php echo $row->shop_id?>"
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
