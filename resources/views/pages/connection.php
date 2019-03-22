<?php
$con=mysqli_connect("localhost", "root", "", "dost");

  if(mysqli_connect_errno()){
    echo "Server connection failed.";
    echo mysqli_connect_error(); 
  }
?>

