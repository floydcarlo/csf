<?php
$d="D";
$a="A";

include ("connection.php");
	if($d==$_GET["RB"]){
	
	mysqli_query($con,"DELETE FROM pending WHERE email='$_GET[email]'");

	 //mysqli_close($con);
	 
	 //echo "<a  href='getVals.php' target='_self'>Back Account Requests</a>";
		header("Location:getVals.php");
		mysqli_close($con);
	}
	else{
	$sql = "INSERT INTO users (username, email, password, avatar, division) VALUES('$_GET[username]', '$_GET[email]', '$_GET[password]', '$_GET[avatar]', '$_GET[division]')";
  //echo "<a  href='getVals.php' //target='_self'>Back Account Requests</a>";
  if(!mysqli_query($con, $sql)){
   die('Error:' . mysqli_error($con));
  }
  
  mysqli_query($con,"DELETE FROM pending WHERE email='$_GET[email]'");
	mysqli_close($con);
	 echo "<a  href='getVals.php' //target='_self'>Back Account Requests</a>";
  }
 header("Location:getVals.php");
  mysqli_close($con);
?>
