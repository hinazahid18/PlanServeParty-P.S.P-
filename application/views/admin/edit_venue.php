<title>
    UPDATE PRODUCTS
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
                        UPDATE PRODUCT
                    </h4>
                    <form action="<?php echo base_url('admin/updatevenue')?>" method="post"
                        enctype="multipart/form-data" class="mt-5">
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="row">
                                  
                                    <?php
                                    if($edit_data->num_rows()> 0){
                                    foreach($edit_data->result() as $row){
                                    ?>
                                    <div class="col-lg-6">
                                        <input type="hidden" name="id" value="<?php echo $row->venue_id; ?>">
                                        <label for="">Venue Name</label>
                                        <input type="text" class="form-control" name="venue_name"
                                            value="<?php echo $row->name; ?>">
                                    </div>
                                    <div class="col-lg-6 ">
                                        <label for="">Venue Image</label>
                                        <input type="file" class="form-control" name="venue_image"> 
                                        <img src="../assets/img/<?php echo $row->image?>" class="img-fluid w-50" alt="" >
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <label for="">Price Per Plate</label>
                                        <input type="text" class="form-control" name="venue_price"
                                            value="<?php echo $row->price; ?>">

                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <label for="">Venue City</label>
                                        <input type="text" class="form-control" name="venue_city"
                                            value="<?php echo $row->city; ?>">

                                    </div>
                                   
                                    <div class="col-lg-12 mt-3">
                                        <label for="">Short Description</label>
                                        <textarea name="short_des" cols="3" rows="3"
                                            class="form-control"><?php echo $row->description; ?></textarea>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <label for="">Long Description</label>
                                        <textarea class="content"
                                            name="long_des"><?php echo $row->long_description; ?></textarea>
                                    </div>
                                    <?php
                                     }
                                     }
                                    ?>
                                </div>
                                <div class="mt-4">
                                    <button class="btn btn-primary">UPDATE PRODUCT</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- FOR COLOR -->
<script type="text/javascript">
    $(document).ready(function () {
        var maxField = 5; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML =
            '<div><label for="">Product Color</label><input type="text"  class="form-control" name="color[]" value=""/><a href="javascript:void(0);" class="remove_button"><i class="fas fa-minus"></i></a></div>'; //New input field html 
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function () {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function (e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>

<!-- FOR SIZE -->

<script type="text/javascript">
    $(document).ready(function () {
        var maxField = 5; //Input fields increment limitation
        var addButton = $('.add_size_button'); //Add button selector
        var wrapper = $('.field_size'); //Input field wrapper
        var fieldHTML =
            '<div><label for="">Product Size</label><input type="text"  class="form-control" name="size[]" value=""/><a href="javascript:void(0);" class="remove_button"><i class="fas fa-minus"></i></a></div>'; //New input field html 
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function () {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function (e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>