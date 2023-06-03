<?php
$connect = mysqli_connect('localhost', 'root', '', 'eproject');

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
?>