<?php
session_start();
$con=mysqli_connect('localhost','root','','energy');

if(!$con){
  die(mysqli_error($con));
}
?>
