<?php
$pw="";
include ("connection.php");
  
  $result = mysqli_query($con,"SELECT * FROM admin WHERE username='$_GET[usrnm]'");
  
  while($row = mysqli_fetch_array($result))
  	{
  		$GLOBALS['pw'] = $row['password'];
  	}
	
if($pw==$_GET["psw"]){
echo "Successful Log-in, go to" . " " . "<a href='getVals.php' target='_self'>Show Request</a>";
header("Location:admin_form.html");
}

else{
echo "Wrong Password, <a href='Admin_login.html' target='_self'>Try Again</a>. . .";
}
mysqli_close($con);

  
?>
