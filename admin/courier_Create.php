<?php
ob_start();
require_once "sidebar.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
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
                                    <form action="" method="post" style="width:50vw; min-width:300px;" onsubmit="return validateForm()">
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Track number</label>
                                                <input type="number" min="0" class="form-control" name="track_number" value="<?php $digits = 3;
                                                                                                                                echo rand(pow(10, $digits - 1), pow(10, $digits) - 1); ?>" placeholder="">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Branch</label>
                                                <select name="branch_id" id="" required class="form-control">
                                                    <option value="" selected disabled>Select branch</option>
                                                    <?php
                                                    $fetch_branch = "SELECT * FROM `tbl_branch`";
                                                    $run_query = mysqli_query($connect, $fetch_branch);
                                                    if (mysqli_num_rows($run_query) > 0) {
                                                        while ($data = mysqli_fetch_array($run_query)) {
                                                    ?>
                                                            <option value="<?php echo $data[0] ?>">
                                                                <?php echo $data[1] ?>
                                                            </option>
                                                        <?php
                                                        }
                                                    } else { ?>
                                                        <option value="">No Branch Found</option>
                                                    <?php
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Service</label>
                                                <select name="abranch" id="" required class="form-control">
                                                    <option value="" selected disabled>Select service</option>
                                                    <?php
                                                    $fetch_branch = "SELECT * FROM `tbl_service`";
                                                    $run_query = mysqli_query($connect, $fetch_branch);
                                                    if (mysqli_num_rows($run_query) > 0) {
                                                        while ($data = mysqli_fetch_array($run_query)) {
                                                    ?>

                                                            <option value="<?php echo $data[0] ?>">
                                                                <?php echo $data[1] ?>
                                                            </option>
                                                        <?php
                                                        }
                                                        # code...
                                                    } else { ?>
                                                        <option value="">No Service Found</option>
                                                    <?php
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Date</label>
                                                <input type="date" id="date" class="form-control" name="shipment_date">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Sender name</label>
                                                <input type="text" class="form-control" name="sender_name" placeholder="">
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Sender city</label>
                                                <select name="sender_city" id="" required class="form-control">
                                                    <option value="" selected disabled>Select city</option>
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
                                                <input type="text" class="form-control" name="sender_address" placeholder="">
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Sender phone no</label>
                                                <input type="tel" class="form-control" name="sender_phone_no" placeholder="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label class="form-label">Sender email</label>
                                                <input type="text" class="form-control" name="sender_email" placeholder="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Receiver name</label>
                                                <input type="text" class="form-control" name="receiver_name" placeholder="">
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Receiver city</label>
                                                <select name="receiver_city" id="" required class="form-control">
                                                    <option value="" selected disabled>Select city</option>
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
                                                <input type="text" class="form-control" name="receiver_address" placeholder="">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Receiver phone no</label>
                                                <input type="tel" class="form-control" name="receiver_phone_no" placeholder="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label class="form-label">Receiver email</label>
                                                <input type="text" class="form-control" name="receiver_email" placeholder="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">No of parcel</label>
                                                <input type="number" min="1" class="form-control" name="no_of_parcel" placeholder="">
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Parcel weight</label>
                                                <input type="number" min="1" class="form-control" name="parcel_weight" placeholder="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label class="form-label">Description</label>
                                                <input type="text" class="form-control" name="description" placeholder="">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Delivery charges</label>
                                                <input type="number" min="150" class="form-control" name="delivery_charges" placeholder="">
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Total charges</label>
                                                <input type="number" min="0" class="form-control" name="total_charges" placeholder="">
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
    <script>
        function validateForm() {
            var submittedDate = new Date(document.getElementById('date').value);
            var currentDate = new Date();

            if (submittedDate < currentDate) {
                alert('Invalid date. Please select a future date.');
                return false; // Prevent form submission
            }

            return true; // Allow form submission
        }
    </script>

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
    $no_of_parcel = $_POST['no_of_parcel'];
    $parcel_weight = $_POST['parcel_weight'];
    $description = $_POST['description'];
    $delivery_charges = $_POST['delivery_charges'];
    $total_charges = $_POST['total_charges'];

    $insert_query = "INSERT INTO `tbl_courier`(`branch_id`, `shipment_date`, `sender_name`, `sender_city`, `sender_address`, `sender_phone_no`, `sender_email`, `receiver_name`, `receiver_city`, `receiver_address`, `receiver_phone_no`, `receiver_email`, `no_of_parcel`, `parcel_weight`, `description`, `delivery_charges`, `total_charges`) VALUES ('$branch_id','$shipment_date','$sender_name','$sender_city','$sender_address','$sender_phone_no','$sender_email','$receiver_name','$receiver_city','$receiver_address','$receiver_phone_no','$receiver_email','$no_of_parcel','$parcel_weight','$description','$delivery_charges','$total_charges')";

    $execute_query = mysqli_query($connect, $insert_query);

    if ($execute_query) {
        //Inserting tracking number into `tbl_tracking`
        $last_id = mysqli_insert_id($connect);
        $insert_in_Track_table = mysqli_query($connect, "INSERT INTO `tbl_tracking`(`courier_id`, `track_no`) VALUES($last_id,'$track_number')");

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'azharimam99@gmail.com';                     //SMTP username
            $mail->Password   = 'mvhebewogahbuylk';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('azharimam99@gmail.com', 'Azhar Imam');
            $mail->addAddress($receiver_email, $receiver_name);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Courier Received';
            $mail->Body    = 'Dear customer, your courier has been received and is being processed.';
            $mail->Body    = 'Dear ' . $receiver_name . ', your courier with tracking number <b>' . $track_number . '</b> has been received and is being processed.';


            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        $_SESSION["msg"] = "Courier added successfully";
        header("Location: courier_Read.php");
    } else {
        echo "Failed: " . mysqli_error($connect);
    }
}
ob_end_flush();
?>