<title>
    ADD VENUE
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
                    <!-- <div style="float:right;">
                        <a href="<?php echo base_url('admin/products')?>"><button class="btn btn-primary">View
                                Products</button></a>
                    </div> -->
                    <h4>
                        ADD VENUE
                    </h4>
                    <form action="<?php echo base_url('admin/addvenue')?>" method="post"
                        enctype="multipart/form-data" class="mt-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="">Select Category</label>
                                        <select name="category" id="category" class="form-control">
                                            <option value="">Select Category</option>
                                            <?php
                                        foreach($fetch_data->result() as $row){
                                        ?>
                                            <option value="<?php echo $row->categories_id?>"><?php echo $row->categories_name?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="">Select Sub Category</label>
                                        <select name="sub_category" id="sub_category" class="form-control" disabled>
                                            <option value="">Select Sub Category</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <label for="">Venue Name</label>
                                        <input type="text" class="form-control" name="venue_name">
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <label for="">Venue Image</label>
                                        <input type="file" class="form-control" name="venue_image">
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <label for="">Venue City</label>
                                        <input type="text" class="form-control" name="venue_city">
                                    </div>
                                   
                                    <div class="col-lg-6 mt-3">
                                        <label for="">Per Plate Price</label>
                                        <input type="text" class="form-control" name="venue_price">
                                    </div>
                                   
                                    <div class="col-lg-12 mt-3">
                                        <label for="">Venue Short Description</label>
                                        <textarea name="short_des" id="" cols="3" rows="3"
                                            class="form-control"></textarea>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <label for="">Venue Long Description</label>
                                        <textarea class="content" name="long_des"></textarea>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button class="btn btn-primary">ADD VENUE</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"></script>

<script>
    $(document).ready(function () {
        $('#category').on('change', function () {
            var category_id = $(this).val();
            if (category_id == '') {
                $('#sub_category').prop('disabled', true);
            } else {
                $('#sub_category').prop('disabled', false);
                $.ajax({
                    url: "<?php echo base_url('admin/get_sub_cat')?>",
                    type: "POST",
                    data: {
                        'categories_id': category_id
                    },
                    dataType: "json",
                    success: function (data) {
                        $('#sub_category').html(data);
                    },
                    error: function () {
                        alert('error...');
                    }
                });
            }
        });
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- FOR COLOR -->
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><label for="">Product Color</label><input type="text"  class="form-control" name="color[]" value=""/><a href="javascript:void(0);" class="remove_button"><i class="fas fa-minus"></i></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>

<!-- FOR SIZE -->

<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_size_button'); //Add button selector
    var wrapper = $('.field_size'); //Input field wrapper
    var fieldHTML = '<div><label for="">Product Size</label><input type="text"  class="form-control" name="size[]" value=""/><a href="javascript:void(0);" class="remove_button"><i class="fas fa-minus"></i></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>