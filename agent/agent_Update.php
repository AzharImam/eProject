<?php
ob_start();
require_once "sidebar.php";
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $aname = $_POST['aname'];
    $aemail = $_POST['aemail'];
    $aphone = $_POST['aphone'];
    $abranch = $_POST['abranch'];
    $ausername = $_POST['ausername'];
    $apassword = $_POST['apassword'];
    $astatus = $_POST['astatus'];

    $update_query = "UPDATE `tbl_agent` SET `name`='$aname',`email`='$aemail',`phone_no`='$aphone',`branch`='$abranch',`user_name`='$ausername',`password`='$apassword',`status`='$astatus' WHERE `id`='$id'";

    $execute_query = mysqli_query($connect, $update_query);

    if ($execute_query) {
        // Check if a new image is selected
        if (!empty($_FILES["aimage"]["name"])) {
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
                    // Update the image column in the database
                    $updateImageQuery = "UPDATE `tbl_agent` SET `image`='$target_file' WHERE `id`='$id'";
                    $executeUpdateImageQuery = mysqli_query($connect, $updateImageQuery);
                    if (!$executeUpdateImageQuery) {
                        echo "Failed to update the image in the database.";
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
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
    <style>
        #image-container {
            text-align: center;
            margin-top: 20px;
        }

        #image-container img {
            max-width: 200px;
            max-height: 200px;
        }
    </style>
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
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label class="form-label">Phone no</label>
                                                        <input type="text" class="form-control" name="aphone" value="<?php echo $row['phone_no'] ?>" placeholder="Agent phone no">
                                                    </div>

                                                    <div class="col">
                                                        <label class="form-label">Branch</label>
                                                        <select name="abranch" id="" class="form-control">
                                                            <?php
                                                            $fetch_branch = "SELECT * FROM `tbl_branch`";
                                                            $run_query = mysqli_query($connect, $fetch_branch);
                                                            if (mysqli_num_rows($run_query) > 0) {
                                                                while ($data = mysqli_fetch_array($run_query)) {
                                                                    $selected = ($data[0] == $row['branch']) ? 'selected' : '';
                                                            ?>
                                                                    <option value="<?php echo $data[0]; ?>" <?php echo $selected; ?>>
                                                                        <?php echo $data[1]; ?>
                                                                    </option>
                                                                <?php
                                                                }
                                                            } else {
                                                                ?>
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
                                                        <input type="file" id="image-upload" class="form-control" name="aimage">
                                                        <div id="image-container"></div>
                                                    </div>

                                                    <script>
                                                        document.getElementById('image-upload').addEventListener('change', function(e) {
                                                            var file = e.target.files[0];
                                                            var reader = new FileReader();

                                                            reader.onload = function(e) {
                                                                var img = document.createElement('img');
                                                                img.src = e.target.result;

                                                                var container = document.getElementById('image-container');
                                                                container.innerHTML = '';
                                                                container.appendChild(img);
                                                            }

                                                            reader.readAsDataURL(file);
                                                        });
                                                    </script>

                                                    <?php
                                                    // Check if the form is submitted
                                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                        // Get the new image file if it's uploaded
                                                        $newImage = $_FILES["aimage"]["name"];

                                                        // Check if a new image file is selected
                                                        if (!empty($newImage)) {
                                                            // Process and save the new image file

                                                            // Update the database with the new image file name
                                                            $updateImageQuery = "UPDATE `tbl_agent` SET `image`='$newImage' WHERE `id`='$id'";
                                                            $executeUpdateImageQuery = mysqli_query($connect, $updateImageQuery);

                                                            if ($executeUpdateImageQuery) {
                                                                // Move the uploaded file to the desired directory
                                                                $targetDirectory = "uploads/";
                                                                $targetFilePath = $targetDirectory . basename($_FILES["aimage"]["name"]);

                                                                // Move the temporary file to the target location
                                                                if (move_uploaded_file($_FILES["aimage"]["tmp_name"], $targetFilePath)) {
                                                                    // File upload successful
                                                                    echo "The file " . htmlspecialchars(basename($_FILES["aimage"]["name"])) . " has been uploaded.";
                                                                } else {
                                                                    // File upload failed
                                                                    echo "Sorry, there was an error uploading your file.";
                                                                }
                                                            } else {
                                                                // Database update failed
                                                                echo "Failed to update the image in the database.";
                                                            }
                                                        } else {
                                                            // No new image file selected, keep the existing image in the database
                                                        }
                                                    }

                                                    ?>

                                                    <div class="col-6">
                                                        <label class="form-label">Status</label>
                                                        <select name="astatus" id="" required class="form-control">
                                                            <?php
                                                            $statusOptions = array("Not Working", "Working");
                                                            foreach ($statusOptions as $option) {
                                                                $selected = ($option == $row['status']) ? 'selected' : '';
                                                            ?>
                                                                <option value="<?php echo htmlspecialchars($option); ?>" <?php echo $selected; ?>>
                                                                    <?php echo htmlspecialchars($option); ?>
                                                                </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                </div>

                                                <div>
                                                    <button type="submit" class="btn btn-success" name="submit">Update</button>
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