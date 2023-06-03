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
    <title>agent create</title>
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
                            <h3>Add New Agent</h3>
                            <p class="text-muted">Complete the form below to add a new agent</p>
                        </div>

                        <div class="row">
                            <div class="card-body">
                                <!-- <canvas id="TrafficChart"></canvas>   -->

                                <div class="container d-flex justify-content-center">
                                    <form action="" method="post" style="width:50vw; min-width:300px;">
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="aname"
                                                    placeholder="Agent name">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" required name="aemail"
                                                    placeholder="Agent email">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Phone no</label>
                                                <input type="text" class="form-control" name="aphone"
                                                    placeholder="Agent phone no">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Address</label>
                                                <input type="text" class="form-control" name="aaddress"
                                                    placeholder="Agent address">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">City</label>
                                                <input type="text" class="form-control" name="acity"
                                                    placeholder="Agent city">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Branch</label>
                                                <select name="abranch" id="" class="form-control">
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
                                                        # code...
                                                    } else { ?>
                                                        <option value="">No Branch Found</option>
                                                    <?php
                                                    }



                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">User name</label>
                                                <input type="text" class="form-control" name="ausername"
                                                    placeholder="Agent username">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Password</label>
                                                <input type="text" class="form-control" name="apassword"
                                                    placeholder="Agent password">
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Status</label>
                                                <input type="text" class="form-control" name="astatus"
                                                    placeholder="Agent status">
                                            </div>
                                        </div>

                                        <div>
                                            <button type="submit" class="btn btn-success" name="submit">Save</button>
                                            <a href="agent_Read.php" class="btn btn-danger">Cancel</a>
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
    $aname = $_POST['aname'];
    $aemail = $_POST['aemail'];
    $aphone = $_POST['aphone'];
    $aaddress = $_POST['aaddress'];
    $acity = $_POST['acity'];
    $abranch = $_POST['abranch'];
    $ausername = $_POST['ausername'];
    $apassword = $_POST['apassword'];
    $astatus = $_POST['astatus'];

    $insert_query = "INSERT INTO `tbl_agent`(`name`, `email`, `phone_no`, `address`, `city`, `branch`, `user_name`, `password`, `status`) VALUES ('$aname','$aemail','$aphone','$aaddress','$acity','$abranch','$ausername','$apassword','$astatus')";

    $execute_query = mysqli_query($connect, $insert_query);

    if ($execute_query) {
        header("Location: agent_Read.php?msg=New record created successfully");
    } else {
        echo "Failed: " . mysqli_error($connect);
    }
}
ob_end_flush();
?>