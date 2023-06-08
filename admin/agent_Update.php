<?php
ob_start();
require_once "sidebar.php";
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $aname = $_POST['aname'];
    $aemail = $_POST['aemail'];
    $aphone = $_POST['aphone'];
    // $aaddress = $_POST['aaddress'];
    // $acity = $_POST['acity'];
    $abranch = $_POST['abranch'];
    $ausername = $_POST['ausername'];
    $apassword = $_POST['apassword'];
    $aimage = $_FILES['aimage']['name'];
    $astatus = $_POST['astatus'];

    $update_query = "UPDATE `tbl_agent` SET `name`='$aname',`email`='$aemail',`phone_no`='$aphone',`branch`='$abranch',`user_name`='$ausername',`password`='$apassword',`image`='$aimage',`status`='$astatus' WHERE `id`='$id'";

    $execute_query = mysqli_query($connect, $update_query);

    if ($execute_query) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["aimage"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check file size
        if ($_FILES["aimage"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["aimage"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["aimage"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $_SESSION["msg"] = "Data updated";
        header("Location: agent_Read.php");
    } else {
        echo "Failed: " . mysqli_error($connect);
    }
}
//Select query to show data in form field
$select_query = "SELECT * FROM `tbl_agent` WHERE id = $id LIMIT 1";
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
                            <h3>Update Agent Information</h3>
                            <p class="text-muted">Click update after changing any information</p>
                        </div>

                        <div class="row">
                            <div class="card-body">
                                <!-- <canvas id="TrafficChart"></canvas>   -->

                                <div class="row">
                                    <div class="card-body">
                                        <!-- <canvas id="TrafficChart"></canvas>   -->

                                        <div class="container d-flex justify-content-center">
                                            <form action="" method="post" style="width:50vw; min-width:300px;" enctype="multipart/form-data">
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" class="form-control" name="aname" value="<?php echo $row['name'] ?>" placeholder="Agent name">
                                                    </div>

                                                    <div class="col">
                                                        <label class="form-label">Email</label>
                                                        <input type="text" class="form-control" name="aemail" value="<?php echo $row['email'] ?>" placeholder="Agent email">
                                                    </div>
                                                </div>
                                                <!-- <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Address</label>
                                                <input type="text" class="form-control" name="aaddress"
                                                value="<?php echo $row['address'] ?>" placeholder="Agent address">
                                            </div>
                                        </div> -->
                                                <div class="row mb-3">
                                                    <!-- <div class="col">
                                                <label class="form-label">City</label>
                                                <input type="text" class="form-control" name="acity"
                                                value="<?php echo $row['city'] ?>" placeholder="Agent city">
                                            </div> -->
                                                    <div class="col">
                                                        <label class="form-label">Phone no</label>
                                                        <input type="text" class="form-control" name="aphone" value="<?php echo $row['phone_no'] ?>" placeholder="Agent phone no">
                                                    </div>

                                                    <div class="col">
                                                        <label class="form-label">Branch</label>
                                                        <select name="abranch" id="" class="form-control">
                                                            <?php
                                                            $fetch_branch = "SELECT * FROM `tbl_branch` where id = '$row[branch]'";
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
                                                        <input type="text" class="form-control" name="ausername" value="<?php echo $row['user_name'] ?>" placeholder="Agent username">
                                                    </div>

                                                    <div class="col">
                                                        <label class="form-label">Password</label>
                                                        <input type="text" class="form-control" name="apassword" value="<?php echo $row['password'] ?>" placeholder="Agent password">
                                                    </div>
                                                </div>
                                                
                                                <div class="row mb-3">
                                                    <div class="col-6">
                                                        <label class="form-label">Image</label>
                                                        <input type="file" class="form-control" name="aimage">
                                                        <img src="uploads/<?php echo $row["image"] ?>" alt="" style="height: 100px;">

                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">Status</label>
                                                        <select name="astatus" id="" required class="form-control">
                                                            <option value="<?php echo $row['status'] ?>" selected><?php echo $row['status'] ?></option>
                                                            <option value="Not Working">Not working</option>
                                                            <option value="Working">Working</option>
                                                        </select>
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
ob_end_flush();
?>