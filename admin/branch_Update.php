<?php
ob_start();
require_once "sidebar.php";
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $bname = $_POST['bname'];
    $bcity = $_POST['bcity'];
    $baddress = $_POST['baddress'];
    $bcontact = $_POST['bcontact'];

    $update_query = "UPDATE `tbl_branch` SET `name`='$bname',`city`='$bcity',`address`='$baddress',`contact_no`='$bcontact' WHERE `id`='$id'";

    $execute_query = mysqli_query($connect, $update_query);

    if ($execute_query) {
        header("Location: branch_Read.php?msg=Data updated successfully");
    } else {
        echo "Failed: " . mysqli_error($connect);
    }
}
//Select query to show data in form field
$select_query = "SELECT * FROM `tbl_branch` WHERE id = $id LIMIT 1";
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
                            <h3>Update Branch Information</h3>
                            <p class="text-muted">Click update after changing any information</p>
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
                                                    value="<?php echo $row['name'] ?>" placeholder="Branch name">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">City</label>
                                                <input type="text" class="form-control" name="bcity"
                                                    value="<?php echo $row['city'] ?>" placeholder="Branch city">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Address</label>
                                                <input type="text" class="form-control" name="baddress"
                                                    value="<?php echo $row['address'] ?>" placeholder="Branch address">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Contact no</label>
                                                <input type="text" class="form-control" name="bcontact"
                                                    value="<?php echo $row['contact_no'] ?>"
                                                    placeholder="Branch contact no">
                                            </div>
                                        </div>

                                        <div>
                                            <button type="submit" class="btn btn-success" name="submit">Update</button>
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
ob_end_flush();
?>