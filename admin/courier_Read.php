<?php
require_once "sidebar.php";
?>
<?php
if (isset($_GET["msg"])) {
  $msg = $_GET["msg"];
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>branch read</title>
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
              <h3>Courier Information</h3>
            </div>
            <div class="row">
              <div class="card-body">
                <!-- <canvas id="TrafficChart"></canvas>   -->

                <div class="container">
                  <a href="courier_Create.php" class="btn btn-success mb-3">Add New</a>

                  <table class="table table-hover text-center">
                    <thead class="table-success">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Track Number</th>
                        <th scope="col">Branch Id</th>
                        <th scope="col">Shipment Date</th>
                        <th scope="col">Sender Name</th>
                        <th scope="col">Sender City</th>
                        <th scope="col">Sender Address</th>
                        <th scope="col">Sender Phone no</th>
                        <th scope="col">Sender Email</th>
                        <th scope="col">Receiver Name</th>
                        <th scope="col">Receiver City</th>
                        <th scope="col">Receiver Address</th>
                        <th scope="col">Receiver Phone no</th>
                        <th scope="col">Receiver Email</th>
                        <th scope="col">Shipment Status</th>
                        <th scope="col">No Of parcel</th>
                        <th scope="col">Parcel Length</th>
                        <th scope="col">Parcel width</th>
                        <th scope="col">Parcel Height</th>
                        <th scope="col">Parcel Weight</th>
                        <th scope="col">Description</th>
                        <th scope="col">Delivery Charges</th>
                        <th scope="col">Total Charges</th>
                        <th scope="col"></th>
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
                          <tr>
                            <td>
                              <?php echo $row["id"] ?>
                            </td>
                            <td>
                              <?php echo $row["track_number"] ?>
                            </td>
                            <td>
                              <?php echo $row["branch_id"] ?>
                            </td>
                            <td>
                              <?php echo $row["shipment_date"] ?>
                            </td>
                            <td>
                              <?php echo $row["sender_name"] ?>
                            </td>
                            <td>
                              <?php echo $row["sender_city"] ?>
                            </td>
                            <td>
                              <?php echo $row["sender_address"] ?>
                            </td>
                            <td>
                              <?php echo $row["sender_phone_no"] ?>
                            </td>
                            <td>
                              <?php echo $row["sender_email"] ?>
                            </td>
                            <td>
                              <?php echo $row["receiver_name"] ?>
                            </td>
                            <td>
                              <?php echo $row["receiver_city"] ?>
                            </td>
                            <td>
                              <?php echo $row["receiver_address"] ?>
                            </td>
                            <td>
                              <?php echo $row["receiver_phone_no"] ?>
                            </td>
                            <td>
                              <?php echo $row["receiver_email"] ?>
                            </td>
                            <td>
                              <?php echo $row["shipment_status"] ?>
                            </td>
                            <td>
                              <?php echo $row["no_of_parcel"] ?>
                            </td>
                            <td>
                              <?php echo $row["parcel_length"] ?>
                            </td>
                            <td>
                              <?php echo $row["parcel_width"] ?>
                            </td>
                            <td>
                              <?php echo $row["parcel_height"] ?>
                            </td>
                            <td>
                              <?php echo $row["parcel_weight"] ?>
                            </td>
                            <td>
                              <?php echo $row["description"] ?>
                            </td>
                            <td>
                              <?php echo number_format($row["delivery_charges"], 2, '.', ',') . " Rs" ; ?>
                            </td>
                            <?php 
                                $total_sum = $row["delivery_charges"] + $row["total_charges"];
                            ?>
                            <td>
                              <?php echo number_format($total_sum, 2, '.', ',') . " Rs" ;?>
                            </td>

                            <td>
                              <a href="courier_Update.php?id=<?php echo $row["id"] ?>" class="link-dark"><i
                                  class="fa fa-refresh fs-5 me-3" style="color: green"></i></a>
                              <a href="courier_Delete.php?id=<?php echo $row["id"] ?>" class="link-dark"><i
                                  class="fa fa-trash fs-5 me-3" style="color: red"></i></a>
                            </td>
                          </tr>
                          <?php
                        }
                      }else{

                        echo "<tr class='bg-info'>
                             <td colspan = '10' style='text-align:center' class='text-danger'>No records</td>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>