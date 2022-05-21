<title>
    UPDATE SUB CATEGORIE
</title>
<style>
    label {
        font-weight: bold;
    }
    h4 {
        font-weight: bold;
    }
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class=" grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4>
                        UPDATE SUB CATEGORIE
                    </h4>
                    <form action="<?php echo base_url('admin/updatesubcategory')?>" method="post"
                        enctype="multipart/form-data" class="mt-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="">Select Category</label>
                                        <select name="category" id="" class="form-control">
                                            <option value="">Select</option>
                                            <?php
                                              foreach($fetch_categories->result() as $row){
                                            ?>
                                            <option value="<?php echo $row->categories_id?>" <?php if($row->categories_id=='id') {echo 'selected';}?>><?php echo $row->categories_name?></option>
                                            <?php
                                             }
                                            ?>
                                        </select>
                                    </div>
                                    <?php
                                    foreach($get_byid_subcategory->result() as $row){
                                    ?>
                                    <div class="col-lg-6">
                                        <input type="hidden" name="id" value="<?php echo $row->sub_id; ?>">
                                        <label for="">Sub Category Name</label>
                                        <input type="text" class="form-control" name="subcategories"
                                        value="<?php echo $row->sub_categories; ?>">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="">Product Image</label>
                                        <input type="file" class="form-control" name="image">
                                        <img src="../assets/img/<?php echo $row->subcat_image?>" class="img-fluid w-50 mt-3" alt="">
                                    </div>
                                </div>
                                <div class="mt-4 text-center">
                                    <button class="btn btn-primary">UPDATE SUB CATEGORY</button>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
