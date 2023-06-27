<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';

ob_start();
require_once "sidebar.php";
$id = $_GET['id'];

// Retrieve receiver email and name from the database
$select_query = "SELECT receiver_email, receiver_name FROM tbl_courier WHERE id = $id";
$result = mysqli_query($connect, $select_query);
$row = mysqli_fetch_assoc($result);
$receiver_email = $row['receiver_email'];
$receiver_name = $row['receiver_name'];

// Retrieve the track_no from tbl_tracking for a specific courier_id
$select_track_query = "SELECT track_no FROM tbl_tracking WHERE courier_id = $id";
$track_result = mysqli_query($connect, $select_track_query);
$track_row = mysqli_fetch_assoc($track_result);
$track_no = $track_row['track_no'];

function sendStatusEmail($status, $receiver_email, $receiver_name, $track_no)
{
    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'azharimam99@gmail.com';                // SMTP username
        $mail->Password   = 'mvhebewogahbuylk';                      // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable implicit TLS encryption
        $mail->Port       = 465;                                    // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        // Recipients
        $mail->setFrom('azharimam99@gmail.com', 'Azhar Imam');
        $mail->addAddress($receiver_email, $receiver_name);         // Add a recipient

        // Set email subject and body based on the status
        switch ($status) {
            case 'out_for_delivery':
                $mail->Subject = 'Courier Out for Delivery';
                $mail->Body = 'Dear ' . $receiver_name . ', your courier with tracking number ' . $track_no . ' is In Transit.
                
                Best regards,
                [Courier Management System]';
                break;
            case 'delivered':
                $mail->Subject = 'Courier Delivered';
                $mail->Body = 'Dear ' . $receiver_name . ', 
                We are happy to inform you that your courier with tracking number ' . $track_no . ' has been delivered. 
                Thank you for choosing our services. 
                Have a great day!

                Best regards,
                [Courier Management System]';
                break;
            default:
                return; // If the status is not 'out for delivery' or 'delivered', do not send an email
        }

        // Send the email
        $mail->send();

        echo 'Email sent successfully!';
    } catch (Exception $e) {
        echo 'Email could not be sent. Error: ' . $mail->ErrorInfo;
    }
}

if (isset($_POST['submit'])) {
    $status = $_POST['status'];

    $query = "UPDATE tbl_tracking SET status = '$status' WHERE courier_id = $id";

    // Execute the combined query
    $result = mysqli_multi_query($connect, $update_query . $query);

    // Check if the query executed successfully
    if ($result) {
        // Consume the result set of the previous query
        while (mysqli_next_result($connect)) {
            if (!mysqli_more_results($connect)) {
                break;
            }
            if (!$result = mysqli_store_result($connect)) {
                echo "Error consuming result set: " . mysqli_error($connect);
                break;
            }
            mysqli_free_result($result);
        }

        $_SESSION["msg"] = "Data updated";

        // Send the email if the status has changed
        if ($status != 'pending') {
            sendStatusEmail($status, $receiver_email, $receiver_name, $track_no);
        }
        header("Location: track_Read.php");
        exit();
    } else {
        echo "Error updating data: " . mysqli_error($connect);
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
    <title>track update</title>
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
                            <h3>Update Track Information</h3>
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
                                                    <div class="col-6">
                                                        <label class="form-label">Track number</label>
                                                        <?php
                                                        $t1_query = "SELECT * FROM `tbl_tracking` WHERE courier_id = $row[id]";
                                                        $t2_execute = mysqli_query($connect, $t1_query);
                                                        $t3_check_row = mysqli_num_rows($t2_execute);
                                                        if ($t3_check_row > 0) {
                                                            $t4 = mysqli_fetch_assoc($t2_execute); ?>
                                                            <input type="text" class="form-control" value="<?php echo $t4["track_no"]; ?>" readonly>
                                                        <?php  } else { ?>
                                                            <option value="">No Track number Found</option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <?php
                                                    // Fetch the status from tbl_tracking for a specific tbl_courier ID
                                                    $select_query = "SELECT t.status FROM tbl_tracking t INNER JOIN tbl_courier c ON t.courier_id = c.id WHERE c.id = '$id'";
                                                    $select_result = mysqli_query($connect, $select_query);

                                                    if ($select_result && mysqli_num_rows($select_result) > 0) {
                                                        $row = mysqli_fetch_assoc($select_result);
                                                        $status = $row['status'];
                                                    } else {
                                                        // Handle the case when no data is found for the provided ID or there's an error in the query
                                                        $status = 'pending'; // Default status if not found or error
                                                    }
                                                    ?>

                                                    <!-- Your HTML form code here -->

                                                    <div class="col-6">
                                                        <label class="form-label">Status</label>
                                                        <select name="status" class="form-control">
                                                            <option value="pending" <?php if ($status == "pending") echo "selected"; ?>>Pending</option>
                                                            <option value="out_for_delivery" <?php if ($status == "out_for_delivery") echo "selected"; ?>>Out for Delivery</option>
                                                            <option value="delivered" <?php if ($status == "delivered") echo "selected"; ?>>Delivered</option>

                                                        </select>
                                                    </div>


                                                </div>
                                                <div>
                                                    <button type="submit" class="btn btn-success" name="submit">Update</button>
                                                    <a href="track_Read.php" class="btn btn-danger">Cancel</a>
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