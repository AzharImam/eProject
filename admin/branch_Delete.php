<?php
require_once "config.php";
session_start();
$id = $_GET["id"];
$delete_query = "DELETE FROM `tbl_branch` WHERE id = $id";
$delete_execute = mysqli_query($connect, $delete_query);

if ($delete_execute) {
  $_SESSION["msg"] = "Data deleted successfully";
  header("Location: branch_Read.php");
} else {
  echo "Failed: " . mysqli_error($conn);
}

?>
