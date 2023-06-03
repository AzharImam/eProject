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
    <title>branch create</title>
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
                            <h3>Add New Branch</h3>
                            <p class="text-muted">Complete the form below to add a new branch</p>
                        </div>

                        <div class="row">
                            <div class="card-body">
                                <!-- <canvas id="TrafficChart"></canvas>   -->

                                <div class="container d-flex justify-content-center">
                                    <form action="" method="post" style="width:50vw; min-width:300px;">
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="bname"
                                                    placeholder="Branch name">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">City</label>
                                                <input type="text" class="form-control" name="bcity"
                                                    placeholder="Branch city">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Address</label>
                                                <input type="text" class="form-control" name="baddress"
                                                    placeholder="Branch address">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Contact no</label>
                                                <input type="text" class="form-control" name="bcontact"
                                                    placeholder="Branch contact no">
                                            </div>
                                        </div>

                                        <div>
                                            <button type="submit" class="btn btn-success" name="submit">Save</button>
                                            <a href="branch_Read.php" class="btn btn-danger">Cancel</a>
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
    $bname = $_POST['bname'];
    $bcity = $_POST['bcity'];
    $baddress = $_POST['baddress'];
    $bcontact = $_POST['bcontact'];

    $insert_query = "INSERT INTO `tbl_branch`(`name`, `city`, `address`, `contact_no`) VALUES ('$bname','$bcity','$baddress','$bcontact')";

    $execute_query = mysqli_query($connect, $insert_query);

    if ($execute_query) {
        header("Location: branch_Read.php?msg=New record created successfully");
    } else {
        echo "Failed: " . mysqli_error($connect);
    }
}
ob_end_flush();
?>