<?php
ob_start();
require_once "sidebar.php";
$id = $_GET['id'];
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
    $no_of_parcel = $_POST['no_of_parcel'];
    $parcel_length = $_POST['parcel_length'];
    $parcel_width = $_POST['parcel_width'];
    $parcel_height = $_POST['parcel_height'];
    $parcel_weight = $_POST['parcel_weight'];
    $description = $_POST['description'];
    $delivery_charges = $_POST['delivery_charges'];
    $total_charges = $_POST['total_charges'];

    $update_query = "UPDATE `tbl_courier` SET `track_number`='$track_number',`branch_id`='$branch_id',`shipment_date`='$shipment_date',`sender_name`='$sender_name',`sender_city`='$sender_city',`sender_address`='$sender_address',`sender_phone_no`='$sender_phone_no',`sender_email`='$sender_email',`receiver_name`='$receiver_name',`receiver_city`='$receiver_city',`receiver_address`='$receiver_address',`receiver_phone_no`='$receiver_phone_no',`receiver_email`='$receiver_email',`no_of_parcel`='$no_of_parcel',`parcel_length`='$parcel_length',`parcel_width`='$parcel_width',`parcel_height`='$parcel_height',`parcel_weight`='$parcel_weight',`description`='$description',`delivery_charges`='$delivery_charges',`total_charges`='$total_charges' WHERE `id`='$id'";

    $execute_query = mysqli_query($connect, $update_query);

    if ($execute_query) {
        $_SESSION["msg"] = "Data updated";
        header("Location: courier_Read.php");
    } else {
        echo "Failed: " . mysqli_error($connect);
    }
}
//Select query to show data in form field
$select_query = "SELECT * FROM `tbl_courier` WHERE id = $id LIMIT 1";
$execute_select = mysqli_query($connect, $select_query);
$row = mysqli_fetch_assoc($execute_select);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>branch update</title>
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
                            <h3>Update Courier Information</h3>
                            <p class="text-muted">Click update after changing any information</p>
                        </div>

                        <div class="row">
                            <div class="card-body">
                                <!-- <canvas id="TrafficChart"></canvas>   -->

                                <div class="row">
                                    <div class="card-body">
                                        <!-- <canvas id="TrafficChart"></canvas>   -->

                                        <div class="container d-flex justify-content-center">
                                            <form action="" method="post" style="width:50vw; min-width:300px;">
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label class="form-label">Track number</label>
                                                        <input type="number" min="0" class="form-control"
                                                            name="track_number"
                                                            value="<?php echo $row['track_number'] ?>" placeholder="">
                                                    </div>

                                                    <div class="col">
                                                        <label class="form-label">Branch id/name</label>
                                                        <input type="text" class="form-control" name="branch_id"
                                                            value="<?php echo $row['branch_id'] ?>" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label class="form-label">Shipment date</label>
                                                        <input type="datetime-local" class="form-control"
                                                            name="shipment_date"
                                                            value="<?php echo $row['shipment_date'] ?>" placeholder="">
                                                    </div>

                                                    <div class="col">
                                                        <label class="form-label">Sender name</label>
                                                        <input type="text" class="form-control" name="sender_name"
                                                            value="<?php echo $row['sender_name'] ?>" placeholder="">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Sender city</label>
                                                        <select name="sender_city" id="" required class="form-control">
                                                            <option value="<?php echo $row['sender_city'] ?>" selected>
                                                                <?php echo $row['sender_city'] ?></option>
                                                            <option value="Karachi">Karachi</option>
                                                            <option value="Lahore">Lahore</option>
                                                            <option value="Islamabad">Islamabad</option>
                                                            <option value="Peshawar">Peshawar</option>
                                                            <option value="Faisalabad">Faisalabad</option>
                                                            <option value="Multan">Multan</option>
                                                            <option value="Gujranwala">Gujranwala</option>
                                                            <option value="Rawalpindi">Rawalpindi</option>
                                                            <option value="Quetta">Quetta</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label class="form-label">Sender address</label>
                                                        <input type="text" class="form-control" name="sender_address"
                                                            value="<?php echo $row['sender_address'] ?>" placeholder="">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Sender phone no</label>
                                                        <input type="tel" class="form-control" name="sender_phone_no"
                                                            value="<?php echo $row['sender_phone_no'] ?>"
                                                            placeholder="">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label class="form-label">Sender email</label>
                                                        <input type="text" class="form-control" name="sender_email"
                                                            value="<?php echo $row['sender_email'] ?>" placeholder="">
                                                    </div>

                                                    <div class="col">
                                                        <label class="form-label">Receiver name</label>
                                                        <input type="text" class="form-control" name="receiver_name"
                                                            value="<?php echo $row['receiver_name'] ?>" placeholder="">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Receiver city</label>
                                                        <select name="receiver_city" id="" required
                                                            class="form-control">
                                                            <option value="<?php echo $row['receiver_city'] ?>"
                                                                selected><?php echo $row['receiver_city'] ?></option>
                                                            <option value="Karachi">Karachi</option>
                                                            <option value="Lahore">Lahore</option>
                                                            <option value="Islamabad">Islamabad</option>
                                                            <option value="Peshawar">Peshawar</option>
                                                            <option value="Faisalabad">Faisalabad</option>
                                                            <option value="Multan">Multan</option>
                                                            <option value="Gujranwala">Gujranwala</option>
                                                            <option value="Rawalpindi">Rawalpindi</option>
                                                            <option value="Quetta">Quetta</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label class="form-label">Receiver address</label>
                                                        <input type="text" class="form-control" name="receiver_address"
                                                            value="<?php echo $row['receiver_address'] ?>"
                                                            placeholder="">
                                                    </div>

                                                    <div class="col">
                                                        <label class="form-label">Receiver phone no</label>
                                                        <input type="tel" class="form-control" name="receiver_phone_no"
                                                            value="<?php echo $row['receiver_phone_no'] ?>"
                                                            placeholder="">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Receiver email</label>
                                                        <input type="text" class="form-control" name="receiver_email"
                                                            value="<?php echo $row['receiver_email'] ?>" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label class="form-label">No of parcel</label>
                                                        <input type="number" min="1" class="form-control"
                                                            name="no_of_parcel"
                                                            value="<?php echo $row['no_of_parcel'] ?>" placeholder="">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Parcel length</label>
                                                        <input type="number" min="1" class="form-control"
                                                            name="parcel_length"
                                                            value="<?php echo $row['parcel_length'] ?>" placeholder="">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Parcel width</label>
                                                        <input type="number" min="1" class="form-control"
                                                            name="parcel_width"
                                                            value="<?php echo $row['parcel_width'] ?>" placeholder="">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Parcel height</label>
                                                        <input type="number" min="1" class="form-control"
                                                            name="parcel_height"
                                                            value="<?php echo $row['parcel_height'] ?>" placeholder="">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Parcel weight</label>
                                                        <input type="number" min="1" class="form-control"
                                                            name="parcel_weight"
                                                            value="<?php echo $row['parcel_weight'] ?>" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-6">
                                                        <label class="form-label">Description</label>
                                                        <input type="text" class="form-control" name="description"
                                                            value="<?php echo $row['description'] ?>" placeholder="">
                                                    </div>

                                                    <div class="col">
                                                        <label class="form-label">Delivery charges</label>
                                                        <input type="number" min="150" class="form-control"
                                                            name="delivery_charges"
                                                            value="<?php echo $row['delivery_charges'] ?>"
                                                            placeholder="">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Total charges</label>
                                                        <input type="number" min="0" class="form-control"
                                                            name="total_charges"
                                                            value="<?php echo $row['total_charges'] ?>" placeholder="">
                                                    </div>
                                                </div>

                                                <div>
                                                    <button type="submit" class="btn btn-success"
                                                        name="submit">Save</button>
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
ob_end_flush();
?>