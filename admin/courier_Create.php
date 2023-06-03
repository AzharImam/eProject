<?php
ob_start();
require_once "sidebar.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>courier create</title>
</head>

<body>
    <!-- Content -->
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <!--  Traffic  -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="text-center mb-4">
                            <h3>Add New Courier</h3>
                            <p class="text-muted">Complete the form below to add a new courier</p>
                        </div>

                        <div class="row">
                            <div class="card-body">
                                <!-- <canvas id="TrafficChart"></canvas>   -->

                                <div class="container d-flex justify-content-center">
                                    <form action="" method="post" style="width:50vw; min-width:300px;">
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Track number</label>
                                                <input type="number" min="0" class="form-control" name="track_number"
                                                    placeholder="">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Branch id</label>
                                                <input type="number" min="0" class="form-control" name="branch_id"
                                                    placeholder="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Shipment date</label>
                                                <input type="datetime-local" class="form-control" name="shipment_date">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Sender name</label>
                                                <input type="text" class="form-control" name="sender_name"
                                                    placeholder="">
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Sender city</label>
                                                <select name="sender_city" id="" class="form-control">
                                                    <option value="" selected disabled>Select city</option>
                                                    <option value="" selected disabled>Select city</option>
                                                    <option value="Karachi">Karachi</option>
                                                    <option value="Lahore">Lahore</option>
                                                    <option value="Islamabad">Islamabad</option>
                                                    <option value="Peshawar">Peshawar</option>
                                                    <option value="Faisalabad">Faisalabad</option>
                                                    <option value="Multan">Multan</option>
                                                    <option value="Quetta">Quetta</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Sender address</label>
                                                <input type="text" class="form-control" name="sender_address"
                                                    placeholder="">
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Sender phone no</label>
                                                <input type="tel" class="form-control" name="sender_phone_no"
                                                    placeholder="">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Sender email</label>
                                                <input type="email" class="form-control" name="sender_email"
                                                    placeholder="">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Receiver name</label>
                                                <input type="text" class="form-control" name="receiver_name"
                                                    placeholder="">
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Receiver city</label>
                                                <select name="receiver_city" id="" class="form-control">
                                                    <option value="" selected disabled>Select city</option>
                                                    <option value="Karachi">Karachi</option>
                                                    <option value="Lahore">Lahore</option>
                                                    <option value="Islamabad">Islamabad</option>
                                                    <option value="Peshawar">Peshawar</option>
                                                    <option value="Faisalabad">Faisalabad</option>
                                                    <option value="Multan">Multan</option>
                                                    <option value="Quetta">Quetta</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Receiver address</label>
                                                <input type="text" class="form-control" name="receiver_address"
                                                    placeholder="">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Receiver phone no</label>
                                                <input type="tel" class="form-control" name="receiver_phone_no"
                                                    placeholder="">
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Receiver email</label>
                                                <input type="email" class="form-control" name="receiver_email"
                                                    placeholder="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Shipment status</label>
                                                <input type="text" class="form-control" name="shipment_status"
                                                    placeholder="">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">No of parcel</label>
                                                <input type="number" min="1" class="form-control" name="no_of_parcel"
                                                    placeholder="">
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Parcel length</label>
                                                <input type="number" min="1" class="form-control" name="parcel_length"
                                                    placeholder="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Parcel width</label>
                                                <input type="number" min="1" class="form-control" name="parcel_width"
                                                    placeholder="">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Parcel height</label>
                                                <input type="number" min="1" class="form-control" name="parcel_height"
                                                    placeholder="">
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Parcel weight</label>
                                                <input type="number" min="1" class="form-control" name="parcel_weight"
                                                    placeholder="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Description</label>
                                                <input type="text" class="form-control" name="description"
                                                    placeholder="">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Delivery charges</label>
                                                <input type="number" min="150" class="form-control"
                                                    name="delivery_charges" placeholder="">
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Total charges</label>
                                                <input type="number" min="0" class="form-control" name="total_charges"
                                                    placeholder="">
                                            </div>
                                        </div>

                                        <div>
                                            <button type="submit" class="btn btn-success" name="submit">Save</button>
                                            <a href="courier_Read.php" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div> <!-- /.row -->
                    <div class="card-body"></div>
                </div>
            </div><!-- /# column -->
        </div>
        <!--  /Traffic -->
        <!-- .animated -->
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>
    </div>
    <!-- /#right-panel -->
    <?php
    require_once "footer.php";
    ?>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $track_number = $_POST['track_number'];
    $branch_id = $_POST['branch_id'];
    $shipment_date = $_POST['shipment_date'];
    $sender_name = $_POST['sender_name'];
    $sender_city = $_POST['sender_city'];
    $sender_address = $_POST['sender_address'];
    $sender_phone_no = $_POST['sender_phone_no'];
    $sender_email = $_POST['sender_email'];
    $receiver_name = $_POST['receiver_name'];
    $receiver_city = $_POST['receiver_city'];
    $receiver_address = $_POST['receiver_address'];
    $receiver_phone_no = $_POST['receiver_phone_no'];
    $receiver_email = $_POST['receiver_email'];
    $shipment_status = $_POST['shipment_status'];
    $no_of_parcel = $_POST['no_of_parcel'];
    $parcel_length = $_POST['parcel_length'];
    $parcel_width = $_POST['parcel_width'];
    $parcel_height = $_POST['parcel_height'];
    $parcel_weight = $_POST['parcel_weight'];
    $description = $_POST['description'];
    $delivery_charges = $_POST['delivery_charges'];
    $total_charges = $_POST['total_charges'];

    $insert_query = "INSERT INTO `tbl_courier`(`track_number`, `branch_id`, `shipment_date`, `sender_name`, `sender_city`, `sender_address`, `sender_phone_no`, `sender_email`, `receiver_name`, `receiver_city`, `receiver_address`, `receiver_phone_no`, `receiver_email`, `shipment_status`, `no_of_parcel`, `parcel_length`, `parcel_width`, `parcel_height`, `parcel_weight`, `description`, `delivery_charges`, `total_charges`) VALUES ('$track_number','$branch_id','$shipment_date','$sender_name','$sender_city','$sender_address','$sender_phone_no','$sender_email','$receiver_name','$receiver_city','$receiver_address','$receiver_phone_no','$receiver_email','$shipment_status','$no_of_parcel','$parcel_length','$parcel_width','$parcel_height','$parcel_weight','$description','$delivery_charges','$total_charges')";

    $execute_query = mysqli_query($connect, $insert_query);

    if ($execute_query) {
        header("Location: courier_Read.php?msg=New record created successfully");
    } else {
        echo "Failed: " . mysqli_error($connect);
    }
}
ob_end_flush();
?>