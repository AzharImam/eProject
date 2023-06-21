<?php
require_once "sidebar.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>track read</title>
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
                            <h3>Track Information</h3>
                        </div>
                        <div class="row">
                            <div class="card-body">
                                <!-- <canvas id="TrafficChart"></canvas>   -->

                                <div class="container">
                                    <!-- <a href="track_Create.php" class="btn btn-success mb-3">Add New</a> -->

                                    <table class="table table-hover text-center">
                                        <thead class="table-success">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Courier id</th>
                                                <th scope="col">Track number</th>
                                                <th scope="col">Status</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $select_query = "SELECT * FROM `tbl_tracking`";
                                            $execute_select = mysqli_query($connect, $select_query);
                                            $check_row = mysqli_num_rows($execute_select);

                                            if ($check_row > 0) {
                                                while ($row = mysqli_fetch_assoc($execute_select)) {
                                            ?>
                                                    <tr id="<?php echo $row["id"] ?>">
                                                        <td>
                                                            <?php echo $row["id"] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["courier_id"] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["track_no"] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["status"] ?>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            } else {
                                                echo "<tr class='bg-info'>
                             <td colspan = '5' style='text-align:center' class='text-danger'>No records</td>
                              </tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>