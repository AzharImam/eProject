<?php
ob_start();
require_once "sidebar.php";
?>
<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="fa fa-industry"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text">$<span class="count">23569</span></div>
                                    <div class="stat-heading">Revenue</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="fa fa-truck"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text">
                                        <span class="count">
                                            <?php
                                            $select_courier = "SELECT * FROM `tbl_courier`";
                                            $select_query = mysqli_query($connect, $select_courier);
                                            $count_courier = mysqli_num_rows($select_query);
                                            echo $count_courier;
                                            ?>
                                        </span>
                                    </div>
                                    <div class="stat-heading">Courier</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-3">
                                <i class="fa-solid fa-building"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text">
                                        <span class="count">
                                            <?php
                                            $select_branch = "SELECT * FROM `tbl_branch`";
                                            $select_query = mysqli_query($connect, $select_branch);
                                            $count_branch = mysqli_num_rows($select_query);
                                            echo $count_branch;
                                            ?>
                                        </span>
                                    </div>
                                    <div class="stat-heading">Branches</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-4">
                                <i class="fa fa-user-secret"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text">
                                        <span class="count">
                                            <?php
                                            $select_agent = "SELECT * FROM `tbl_agent`";
                                            $select_query = mysqli_query($connect, $select_agent);
                                            $count_agent = mysqli_num_rows($select_query);
                                            echo $count_agent;
                                            ?>
                                        </span>
                                    </div>
                                    <div class="stat-heading">Agents</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Widgets -->


        <div class="clearfix"></div>
        <!-- Orders -->
        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Orders </h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">Id</th>
                                            <th>Track No</th>
                                            <th>Receiver Name</th>
                                            <th>Receiver Email</th>
                                            <th>Total Charges</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                      $select_query = "SELECT * FROM `tbl_courier`";
                      $execute_select = mysqli_query($connect, $select_query);
                      $check_row = mysqli_num_rows($execute_select);

                      if ($check_row > 0) {
                        while ($row = mysqli_fetch_assoc($execute_select)) {
                      ?>
                          <tr id=<?php echo $row["id"] ?>>
                            <td>
                              <?php echo $row["id"] ?>
                            </td>
                            <td>
                              <!-- fetching `track_no` from tbl_tracking -->
                              <?php
                              $t1_query = "SELECT * FROM `tbl_tracking` WHERE courier_id = $row[id]";
                              $t2_execute = mysqli_query($connect, $t1_query);
                              $t3_check_row = mysqli_num_rows($t2_execute);
                              if ($t3_check_row > 0) {
                                $t4 = mysqli_fetch_assoc($t2_execute);
                                echo $t4["track_no"];
                              }
                              ?>
                            </td>
                            <td>
                              <?php echo $row["receiver_name"] ?>
                            </td>
                            <td>
                              <?php echo $row["receiver_email"] ?>
                            </td>
                            <td>
                              <?php echo $row["total_charges"] ?>
                            </td>
                            <td>
                              <?php echo $row["description"] ?>
                            </td>
                            <td>
                              <!-- fetching `status` from tbl_tracking -->
                              <?php echo $t4["status"]; ?>
                            </td>
                        </tr>
                      <?php
                        }
                      } else {

                        echo "<tr class='bg-info'>
                             <td colspan = '10' style='text-align:center' class='text-danger'>No records</td>
                              </tr>";
                      }
                      ?>
                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
                        </div>
                    </div> <!-- /.card -->
                </div> <!-- /.col-lg-8 -->

                <div class="col-xl-4">
                            <!--  Search-Work  -->
        <div class="form-container">
            <form method="GET" action="index.php">
                <input type="text" name="search_query" placeholder="Enter search query">
                <select name="search_option">
                    <option value="tracking_number">Tracking Number</option>
                    <option value="sender_email">Sender Email</option>
                    <option value="sender_name">Sender Name</option>
                </select>
                <button type="submit">Search</button>
            </form>
        </div>
        <?php
        // Check if the form is submitted
        if (isset($_GET['search_query']) && isset($_GET['search_option'])) {
            $searchQuery = $_GET['search_query'];
            $searchOption = $_GET['search_option'];

            // Perform the search based on the selected option
            if ($searchOption === 'tracking_number') {
                // Search by tracking number
                $query = "SELECT tbl_tracking.track_no, tbl_courier.sender_email, tbl_courier.sender_name, tbl_tracking.status
              FROM tbl_tracking 
              INNER JOIN tbl_courier ON tbl_tracking.courier_id = tbl_courier.id 
              WHERE tbl_tracking.track_no = '$searchQuery'";
            } elseif ($searchOption === 'sender_email') {
                // Search by sender email
                $query = "SELECT tbl_tracking.track_no, tbl_courier.sender_email, tbl_courier.sender_name, tbl_tracking.status
              FROM tbl_tracking 
              INNER JOIN tbl_courier ON tbl_tracking.courier_id = tbl_courier.id 
              WHERE tbl_courier.sender_email = '$searchQuery'";
            } elseif ($searchOption === 'sender_name') {
                // Search by sender name
                $query = "SELECT tbl_tracking.track_no, tbl_courier.sender_email, tbl_courier.sender_name, tbl_tracking.status
              FROM tbl_tracking 
              INNER JOIN tbl_courier ON tbl_tracking.courier_id = tbl_courier.id 
              WHERE tbl_courier.sender_name = '$searchQuery'";
            }

            // Execute the query only if it has been defined
            if (isset($query)) {
                // Execute the query and fetch the results
                $result = mysqli_query($connect, $query);

                // Check if any results are returned
                if (mysqli_num_rows($result) > 0) {
                    // Loop through the results and display them
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Display the tracking number
                        echo "Tracking Number: " . $row['track_no'] . "<br>";

                        // Display the sender email
                        echo "Sender Email: " . $row['sender_email'] . "<br>";

                        // Display the sender name
                        echo "Sender Name: " . $row['sender_name'] . "<br>";

                        // Display the status
                        echo "Status: " . $row['status'] . "<br>";

                        echo "<hr>";
                    }
                } else {
                    echo "No results found.";
                }

                // Free the result set
                mysqli_free_result($result);
            }
        }
        ?>
        <!--  /Search-Work -->
                </div> <!-- /.col-md-4 -->
            </div>
        </div>
        <!-- /.orders -->

        <!-- /#add-category -->
    </div>
    <!-- .animated -->
</div>
<!-- /.content -->
<div class="clearfix"></div>
</div>
<!-- /#right-panel -->

<?php
require_once "footer.php";
ob_end_flush();
?>