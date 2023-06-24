<?php
ob_start();
require_once "sidebar.php";

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

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

        <div class="clearfix"></div>
        <!-- Orders -->
        <div class="orders">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Orders </h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th class="avatar">Avatar</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="serial">1.</td>
                                            <td class="avatar">
                                                <div class="round-img">
                                                    <a href="#"><img class="rounded-circle" src="images/avatar/1.jpg" alt=""></a>
                                                </div>
                                            </td>
                                            <td> #5469 </td>
                                            <td> <span class="name">Louis Stanley</span> </td>
                                            <td> <span class="product">iMax</span> </td>
                                            <td><span class="count">231</span></td>
                                            <td>
                                                <span class="badge badge-complete">Complete</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="serial">2.</td>
                                            <td class="avatar">
                                                <div class="round-img">
                                                    <a href="#"><img class="rounded-circle" src="images/avatar/2.jpg" alt=""></a>
                                                </div>
                                            </td>
                                            <td> #5468 </td>
                                            <td> <span class="name">Gregory Dixon</span> </td>
                                            <td> <span class="product">iPad</span> </td>
                                            <td><span class="count">250</span></td>
                                            <td>
                                                <span class="badge badge-complete">Complete</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="serial">3.</td>
                                            <td class="avatar">
                                                <div class="round-img">
                                                    <a href="#"><img class="rounded-circle" src="images/avatar/3.jpg" alt=""></a>
                                                </div>
                                            </td>
                                            <td> #5467 </td>
                                            <td> <span class="name">Catherine Dixon</span> </td>
                                            <td> <span class="product">SSD</span> </td>
                                            <td><span class="count">250</span></td>
                                            <td>
                                                <span class="badge badge-complete">Complete</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="serial">4.</td>
                                            <td class="avatar">
                                                <div class="round-img">
                                                    <a href="#"><img class="rounded-circle" src="images/avatar/4.jpg" alt=""></a>
                                                </div>
                                            </td>
                                            <td> #5466 </td>
                                            <td> <span class="name">Mary Silva</span> </td>
                                            <td> <span class="product">Magic Mouse</span> </td>
                                            <td><span class="count">250</span></td>
                                            <td>
                                                <span class="badge badge-pending">Pending</span>
                                            </td>
                                        </tr>
                                        <tr class=" pb-0">
                                            <td class="serial">5.</td>
                                            <td class="avatar pb-0">
                                                <div class="round-img">
                                                    <a href="#"><img class="rounded-circle" src="images/avatar/6.jpg" alt=""></a>
                                                </div>
                                            </td>
                                            <td> #5465 </td>
                                            <td> <span class="name">Johnny Stephens</span> </td>
                                            <td> <span class="product">Monitor</span> </td>
                                            <td><span class="count">250</span></td>
                                            <td>
                                                <span class="badge badge-complete">Complete</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
                        </div>
                    </div> <!-- /.card -->
                </div> <!-- /.col-lg-8 -->

                <div class="col-xl-4">
                    <div class="row">
                        <div class="col-lg-6 col-xl-12">
                            <div class="card br-0">
                                <div class="card-body">
                                    <div class="chart-container ov-h">
                                        <div id="flotPie1" class="float-chart"></div>
                                    </div>
                                </div>
                            </div><!-- /.card -->
                        </div>

                        <div class="col-lg-6 col-xl-12">
                            <div class="card bg-flat-color-3  ">
                                <div class="card-body">
                                    <h4 class="card-title m-0  white-color ">August 2018</h4>
                                </div>
                                <div class="card-body">
                                    <div id="flotLine5" class="flot-line"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.col-md-4 -->
            </div>
        </div>
        <!-- /.orders -->
        <!-- Calender Chart Weather  -->
        <div class="row">
            <div class="col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="box-title">Chandler</h4> -->
                        <div class="calender-cont widget-calender">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div><!-- /.card -->
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card ov-h">
                    <div class="card-body bg-flat-color-2">
                        <div id="flotBarChart" class="float-chart ml-4 mr-4"></div>
                    </div>
                    <div id="cellPaiChart" class="float-chart"></div>
                </div><!-- /.card -->
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card weather-box">
                    <h4 class="weather-title box-title">Weather</h4>
                    <div class="card-body">
                        <div class="weather-widget">
                            <div id="weather-one" class="weather-one"></div>
                        </div>
                    </div>
                </div><!-- /.card -->
            </div>
        </div>
        <!-- /Calender Chart Weather -->
        <!-- Modal - Calendar - Add New Event -->
        <div class="modal fade none-border" id="event-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><strong>Add New Event</strong></h4>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success save-event waves-effect waves-light">Create
                            event</button>
                        <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#event-modal -->
        <!-- Modal - Calendar - Add Category -->
        <div class="modal fade none-border" id="add-category">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><strong>Add a category </strong></h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Category Name</label>
                                    <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Choose Category Color</label>
                                    <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                        <option value="success">Success</option>
                                        <option value="danger">Danger</option>
                                        <option value="info">Info</option>
                                        <option value="pink">Pink</option>
                                        <option value="primary">Primary</option>
                                        <option value="warning">Warning</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                    </div>
                </div>
            </div>
        </div>
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