<html>

<head>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 20px;
        }

        th {
            text-align: left;
        }
        h3{
            font-weight:bold;
            text-align:center;
            font-size:35px;
        }
        caption{
            font-weight:bold;
            font-size:25px;
        }
    </style>
</head>

<body>
    <h3>Plan Serve Party(P.S.P)</h3>
    <table style="width:100%">
        <caption style="margin-bottom:5%;">Bookings Details Report</caption>
     
        <tr>
            <th>#</th>
            <th>Booking Name</th>
            <th>City</th>
            <th>Event Date</th>
            <th>Booking Date</th>
            <th>Booking Status</th>
            <th>User Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Guest</th>
            <th>Price</th>
            
        </tr>
        <?php
                                $i=1;
                                
                                foreach($fetch->result() as $row){
                                ?>
                                <tr class="text-center">
                                    <td>
                                        <?php echo $i?>
                                    </td>
                                    <td>
                                        <?php echo $row->booking_name?>
                                    </td>
                                    <td>
                                        <?php echo $row->city ?>
                                    </td>
                                    <td>
                                        <?php echo $row->event_date?>
                                    </td>

                                    <td>
                                        <?php echo $row->booking_date?>
                                    </td>
                                    <td>
                                        <?php echo $row->booking_status?>
                                    </td>

                                    <td>
                                        <?php echo $row->user_name ?>
                                    </td>
                                    <td>
                                        <?php echo $row->phone?>
                                    </td>

                                    <td>
                                        <?php echo $row->email?>
                                    </td>
                                    <td>
                                        <?php echo $row->guest?>
                                    </td>
                                    <td>
                                        <?php echo $row->price?>
                                    </td>
                                   

                                </tr>
                               
                                <?php
                                $i++;
                                }
                                ?>
                                
    </table>
</body>

</html>

