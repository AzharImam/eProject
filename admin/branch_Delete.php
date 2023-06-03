<?php
require_once "config.php";
$id = $_GET["id"];
$delete_query = "DELETE FROM `tbl_branch` WHERE id = $id";
$delete_execute = mysqli_query($connect, $delete_query);

if ($delete_execute) {
  header("Location: branch_read.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}

?>
