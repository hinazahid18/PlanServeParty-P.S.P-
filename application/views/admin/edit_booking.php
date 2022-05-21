<title>
    UPDATE BOOKING
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

                <div>
                    <?php
                    foreach($edit_data->result()as $row){
                    ?>
                    <div class="btn-group" style="float:right; margin:10px 10px 10px 10px;">

                        <?php $orderstatus = $row->booking_status; 
                            if ($orderstatus == 'complete') {?>
                        <a title="Click to pandding"
                            href="update_status?sid=<?php echo $row->booking_id;?>&svalue=<?php echo $row->booking_status?>"><button
                                class="btn btn-success text-white fw-bold">Complete</button></a>

                        <?php } elseif($orderstatus == 'confirm') {?>
                        <a title="Click to Activate"
                            href="update_status?sid=<?php echo $row->booking_id;?>&svalue=<?php echo $row->booking_status?>"><button
                                class="btn btn-warning text-white fw-bold ">Confirm</button></a>
                        <a href="" data-toggle="modal" data-target="#mail"> <button class="btn btn-primary mx-4">
                                Send Mail
                            </button> </a>
                        <?php }else{?>
                        <a title="Click to Cancel"
                            href="update_status?sid=<?php echo $row->booking_id;?>&svalue=<?php echo $row->booking_status?>"><button
                                class="btn btn-danger text-white fw-bold">Pending</button></a>
                        <a href="" data-toggle="modal" data-target="#mail"> <button class="btn btn-primary mx-4">
                                Send Mail
                            </button> </a>
                        <?php } ?>
                    </div>
                    <?php
                     }
                    ?>
                    <div class="btn-group" style="float:right; margin:10px 10px 10px 10px;">

                    </div>

                    <div class="modal fade" id="mail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                        aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Send Mail</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" style="font-size:30px;">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <?php
                               foreach($edit_data->result() as $row)  
                            {  
                            ?>

                                        <form action="<?php echo base_url('admin/booking_mail')?>" method="post">
                                            <label for="">To</label>
                                            <input type="email" class="form-control" name="email"
                                                value="<?php echo $row->email?>"> <br>
                                                <label for="">Subject</label>
                                            <input type="text" class="form-control" name="subject"  value="<?php echo $row->booking_status?>"> <br>
                                                <!-- <label for="">Message</label>
                                                <textarea name="message" class="form-control" cols="5"
                                                    rows="5"></textarea> -->
                                           
                                            <input type="hidden" class="form-control" name="booking_status"
                                                value="<?php echo $row->booking_status; ?>">
                                    
                                    <div class="col-lg-6 mt-3">
                                        <input type="hidden" name="id" value="<?php echo $row->booking_id; ?>">

                                        <input type="hidden" class="form-control" name="booking_name"
                                            value="<?php echo $row->booking_name; ?>">
                                    </div>
                                    <div class="col-lg-6 mt-3">

                                        <input type="hidden" class="form-control" name="city_name"
                                            value="<?php echo $row->city; ?>">
                                    </div>
                                    <div class="col-lg-6 mt-3">

                                        <input type="hidden" id="date_picker" class="form-control" name="event_date"
                                            value="<?php echo $row->event_date; ?>">
                                    </div>
                                    <div class="col-lg-6 mt-3">

                                        <input type="hidden" class="form-control" name="booking_date"
                                            value="<?php echo $row->booking_date; ?>" readonly>
                                    </div>
                                    <div class="col-lg-6 mt-3">

                                        <input type="hidden" id="guest" class="form-control" name="guest"
                                            value="<?php echo $row->guest; ?>">
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                 
                                    <input type="hidden" class="form-control" name="function_time"
                                        value="<?php echo $row->function_time; ?>">
                                </div>
                                    <div class="col-lg-6 mt-3">

                                        <input type="hidden" class="form-control" name="user_name"
                                            value="<?php echo $row->user_name; ?>">
                                    </div>
                                    <div class="col-lg-6 mt-3">

                                        <input type="hidden" class="form-control" name="phone"
                                            value="<?php echo $row->phone; ?>">
                                    </div>
                                    <div class="col-lg-6 mt-3">

                                        <input type="hidden" class="form-control" name="email"
                                            value="<?php echo $row->email; ?>">
                                    </div>

                                    <div class="col-lg-6 mt-3">

                                        <input type="hidden" id="price" class="form-control" name="price"
                                            value="<?php echo $row->price; ?>">
                                    </div>
                                   
                                    <!-- <label for="">Subject</label>
                                            <input type="text" class="form-control" name="subject"> <br>
                                            <label for="">Message</label>
                                            <textarea name="message" class="form-control" cols="5" rows="5"></textarea> -->
                                    <div class="mt-3">
                                        <button class="btn btn-primary">Send Mail</button>
                                    </div>
                                    </form>
                                    <?php
                                }
                              ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <h4 class="text-center">
                    UPDATE BOOKING
                </h4>
                <form action="<?php echo base_url('admin/updatebooking')?>" method="post" enctype="multipart/form-data"
                    class="mt-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <?php
                                    if($edit_data->num_rows()> 0){
                                    foreach($edit_data->result() as $row){
                                    ?>
                                <div class="col-lg-6 mt-3">
                                    <input type="hidden" name="id" value="<?php echo $row->booking_id; ?>">
                                    <label for="">Booking Name</label>
                                    <input type="text" class="form-control" name="booking_name"
                                        value="<?php echo $row->booking_name; ?>">
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <label for="">City Name</label>
                                    <input type="text" class="form-control" name="city_name"
                                        value="<?php echo $row->city; ?>">
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <label for="">Event Date</label>
                                    <input type="date" id="date_picker" class="form-control" name="event_date"
                                        value="<?php echo $row->event_date; ?>">
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <label for="">Booking Date</label>
                                    <input type="text" class="form-control" name="booking_date"
                                        value="<?php echo $row->booking_date; ?>" readonly>
                                </div>
                                <?php
                                if($row->guest==null){
                                   
                                }
                               else{
                                   echo ' <div class="col-lg-6 mt-3">
                                   <label for="">Guest</label>
                                   <input type="text" id="guest" class="form-control" name="guest"
                                       value='.$row->guest.'>
                               </div>';
                               }
                                ?>
                                <div class="col-lg-6 mt-3">
                                    <label for="">Function Time</label>
                                    <input type="text" class="form-control" name="function_time"
                                        value="<?php echo $row->function_time; ?>">
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <label for="">User Name</label>
                                    <input type="text" class="form-control" name="user_name"
                                        value="<?php echo $row->user_name; ?>">
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <label for="">Phone Number</label>
                                    <input type="text" class="form-control" name="phone"
                                        value="<?php echo $row->phone; ?>">
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="email"
                                        value="<?php echo $row->email; ?>">
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label for="">Price</label>
                                    <input type="text" id="price" class="form-control" name="price"
                                        value="<?php echo $row->price; ?>">
                                </div>
                                
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="mt-4">
                                <button class="btn btn-primary">UPDATE BOOKING</button>
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
<script language="javascript">
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#date_picker').attr('min', today);
</script>

<script>
    $(document).ready(function () {
        $('#guest,#price').keyup(function () {
            var textValue1 = $('#guest').val();
            var textValue2 = $('#price').val();
            $('#total').val(textValue1 * textValue2);


        });
    });
</script>