<?php
include ("connection.php");
session_start();

if (isset($_GET['delete'])){
	$emp_id = $_GET['delete'];
	mysqli_query($con,"DELETE FROM tbl_user WHERE emp_id=$emp_id")or die($con->error);

	$_SESSION['message'] = "Record has been DELETED!";
	$_SESSION['msg_type'] = "danger";

	header("location: getvals.php");
}

if (isset($_GET['edit'])){
	$emp_id = $_GET['edit'];
	mysqli_query($con,"SELECT * FROM tbl_user WHERE emp_id=$emp_id")or die($con->error);

	if (count($result)==1) {
		$row = $result->fetch_array();
		$username = $row['username'];
		$unit_id = $row['unit_id'];
	}


}

?>