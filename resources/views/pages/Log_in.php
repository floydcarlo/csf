<?php

include ("connection.php");
session_start();
$_SESSION['message'] = '';


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
	 //Username and Password sent from Form
	 $email = $con->real_escape_string($_POST['email']);
	 $password = md5($_POST['password']); //md5 hash password security
	 $sql = "SELECT * FROM tbl_user WHERE email='$email' AND password = '$password' AND status='active' AND role_id ='1' ";
	 $query = mysqli_query($con, $sql);
	 $res=mysqli_num_rows($query);

	 $sql1 = "SELECT * FROM tbl_user WHERE email='$email' AND password = '$password' AND status='active' AND role_id ='2' ";
	 $query1 = mysqli_query($con, $sql1);
	 $res1=mysqli_num_rows($query1);
	 
	 //If result match $username and $password Table row must be 1 row
	 if($res == 1) {
	 header("Location: surveyhome.php");
	 }
	 elseif ($res1 ==1) {
	 	header("Location: admin_form.html");
	 }
	 else {
	    $_SESSION['message'] = 'You might have used a wrong password or your account is not yet approved by the administrator';
		}
	}

?>


<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DOST-CAR Member Log-in</title>

    <!-- Bootstrap core CSS -->
    <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Plugin CSS -->
    <link href="../../assets/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../assets/css/lib/creative.min.css" rel="stylesheet">


 
<style>

		p{
			color:white;
			font-family:Arial;
			font-size:100px;
		}
		
		h1{
			color:white;
			font-family:Arial;
			font-size:200px;
		}
			
		a{
			color:#25AAE2;
			text-decoration:none;
			font-size:35px;
		}
		a:hover{
			text-decoration:underline;
		}
		a:active{
			text-decoration:underline;
			color:#00005B;
		}
		
		input{
		color:#25AAE2;
		font-size:30px;
		}
		
		table, tr, td{
		font-family:Arial;
			font-size:40px;
			paddng-left:10px;
			paddng-right:10px;
		}
	
		body{
			background-color:#25AAE2;
			font-family:Arial;
			font-size:30px;
			color:white;
		}
		
		input:hover{
			color:black;
			
		}
		 select{
		 
		 font-size:30px;
		 }

		.alert-error {
  		color: #f00;
		}
		
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="http://www.car.dost.gov.ph/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="Sign_up.php">Sign-up</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<center>
<br/>
<br/>
<br/>
<br/>
<br/>
<h1><b>Log-in</b></h1>
<a class="btn btn-warning btn-xl js-scroll-trigger" href="Sign_up.php">Sign-up</a> if you dont have an account. <br/><br/><br/>
<form name="flog" action="Log_in.php" method="post">
<div class="alert alert-error"> <?=$_SESSION['message'] ?> </div>
<table border=0 cellspacing=50>
<tr>
<td>Email Address: </td>
<td><input type="email" name="email" value="" required></td>
</tr>
<tr>
<td>Password:</td>
<td><input type="password" name="password" value="" required></td>
</tr>


</table>
<br/>


<input class="btn btn-success btn-xl js-scroll-trigger" type="submit" name="LogIn_btn" value="Log-in">

</form>
</center>
</body>
</html>