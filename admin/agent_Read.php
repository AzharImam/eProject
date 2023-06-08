<?php
require_once "sidebar.php";
?>
<?php
if (isset($_SESSION["msg"])) {
  $msg = $_SESSION["msg"];
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';

  unset($_SESSION["msg"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
              <h3>Agent Information</h3>
            </div>
            <div class="row">
              <div class="">
                <!-- <canvas id="TrafficChart"></canvas>   -->

                <div class="container">
                  <a href="agent_Create.php" class="btn btn-success mb-3">Add New</a>

                  <table class="table table-hover text-center">
                    <thead class="table-success">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone no</th>
                        <!-- <th scope="col">City</th> -->
                        <th scope="col">Branch</th>
                        <th scope="col">User name</th>
                        <th scope="col">Passwoard</th>
                        <th scope="col">Agent Image</th>
                        <th scope="col">Agent Status</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $select_query = "SELECT * FROM `tbl_agent`";
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
                              <?php echo $row["name"] ?>
                            </td>
                            <td>
                              <?php echo $row["email"] ?>
                            </td>
                            <td>
                              <?php echo $row["phone_no"] ?>
                            </td>
                            <td>
                              <?php
                              $fetch_branch = "SELECT * FROM `tbl_branch` where id = $row[branch] ";
                              $run_query = mysqli_query($connect, $fetch_branch);
                              if (mysqli_num_rows($run_query) > 0) {
                                $data = mysqli_fetch_array($run_query) ?>

                                <?php echo $data["name"] ?>
                                <?php
                              }
                              ?>
                            </td>
                            <td>
                              <?php echo $row["user_name"] ?>
                            </td>
                            <td>
                              <?php echo $row["password"] ?>
                            </td>
                            <td>
                              <img src="uploads/<?php echo $row["image"] ?>" alt="">
                            </td>
                            <td>
                              <?php echo $row["status"] ?>
                            </td>

                            <td>
                              <a href="agent_Update.php?id=<?php echo $row["id"] ?>" class="link-dark"><i
                                  class="fa fa-refresh fs-5 me-3" style="color: green"></i></a>
                              <a href="?id=<?php echo $row["id"] ?>" class="remove" class="link-dark"><i
                                  class="fa fa-trash fs-5 me-3" role="button" style="color: red"></i></a>
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
  <script type="text/javascript">
    $(".remove").click(function () {
      var id = $(this).parents("tr").attr("id");

      if (confirm('Are you sure you want to remove this record ?')) {
        $.ajax({
          url: 'agent_Delete.php',
          type: 'GET',
          data: { id: id },
          error: function () {
            alert('Something is wrong');
          },
          success: function (data) {
            $("#" + id).remove();
            // alert("Record removed successfully");
            // window.location.href = "branch_Read.php";

          }
        });
      }
    });

  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>