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
    <title>service create</title>
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
                            <h3>Add New Service</h3>
                            <p class="text-muted">Complete the form below to add a new service</p>
                        </div>

                        <div class="row">
                            <div class="card-body">
                                <!-- <canvas id="TrafficChart"></canvas>   -->

                                <div class="container d-flex justify-content-center">
                                    <form action="" method="post" style="width:50vw; min-width:300px;">

                                        <div class="row mb-3">
                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" class="form-control" name="sname" placeholder="Enter Name">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <label class="form-label">Description</label>
                                                    <input type="text" class="form-control" name="sdescription" placeholder="Enter Description">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <label class="form-label">Money</label>
                                                    <input type="number" min="1" class="form-control" name="smoney" placeholder="Enter Money">
                                                </div>
                                            </div>

                                            <div>
                                                <button type="submit" class="btn btn-success" name="submit">Save</button>
                                                <a href="service_Read.php" class="btn btn-danger">Cancel</a>
                                            </div>
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
    $sname = $_POST['sname'];
    $sdescription = $_POST['sdescription'];
    $smoney = $_POST['smoney'];


    $insert_query = "INSERT INTO `tbl_service`( `name`, `description`, `money`) VALUES ('$sname','$sdescription','$smoney')";

    $execute_query = mysqli_query($connect, $insert_query);

    if ($execute_query) {
        $_SESSION["msg"] = "Service added successfully";
        header("Location: service_Read.php");
    } else {
        echo "Failed: " . mysqli_error($connect);
    }
}
ob_end_flush();
?>