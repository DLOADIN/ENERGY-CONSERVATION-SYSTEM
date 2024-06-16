<?php
require 'connection.php';
$id = $_GET['id'];
$query = "DELETE FROM `electricity` WHERE id = $id";
if (mysqli_query($con, $query)) {
  header('location: report.php');
}
?>