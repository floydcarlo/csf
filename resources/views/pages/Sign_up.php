<?php

session_start();
$_SESSION['message'] = '';

include ("connection.php");

//Data loading in unit
$query = mysqli_query($con,"SELECT unit_id, unit FROM tbl_unit");
$query_display = mysqli_query($con,"SELECT * FROM tbl_unit");

//Data loading in division
$query1 = mysqli_query($con,"SELECT div_id, division FROM tbl_division");
$query_display1 = mysqli_query($con,"SELECT * FROM tbl_divsion");

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	if ($_POST['password'] == $_POST['confirmpassword']){
		$username = $con->real_escape_string($_POST['username']);
		$division = $con->real_escape_string($_POST['division']);
		$unit = $con->real_escape_string($_POST['unit']);
		$id_no = $con->real_escape_string($_POST['id_no']);
		$email = $con->real_escape_string($_POST['email']);
		$password = md5($_POST['password']); //md5 hash password security
		$mobile = $con->real_escape_string($_POST['mobile']);
		$avatar = $con->real_escape_string('image/'.$_FILES['avatar']['name']);


		//make sure file type is image
		if (preg_match("!image!", $_FILES['avatar']['type'])){
			//copy image to images folder
			if (copy($_FILES['avatar']['tmp_name'],$avatar)){

				$sql = "INSERT INTO tbl_user (username, div_id, unit_id, email, password, mobile, avatar, id_no) 
  				VALUES('$username', '$division', '$unit', '$email', '$password', '$mobile','$avatar', '$id_no')";

					if(!mysqli_query($con, $sql)){
    					die('Error:' . mysqli_error($con));


					}
					header("location: pending.html");
			}

		}

	}

	else {
    $_SESSION['message'] = 'Two passwords do not match!';
	}
	mysqli_close($con);
}
	


?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DOST-CAR Member Sign-up</title>

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
			color:#4FB1BA;
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
		color:#4FB1BA;
		font-size:45px;
		}
		
		table, tr, td{
		font-family:Arial;
			font-size:40px;
			paddng-left:10px;
			paddng-right:10px;
		}
	
		body{
			background-color:#3E4750;
			font-family:Arial;
			font-size:30px;
			color:white;
		}
		
		input:hover{
			color:black;
			
		}
		 select{
		 color:#003700;
		 font-size:45px;
		 }

		.alert-error {
  		color: #f00;
		}
		
</style>

</head>

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
              <a class="nav-link js-scroll-trigger" href="Log_in.php">Log-in</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
</head>
<body>
<center>
<br/>
<br/>
<br/>
<br/>
<br/>
<h1><b>Sign-up</b></h1>
<a  class="btn btn-warning btn-xl js-scroll-trigger" href="Log_in.php" target="_self">Sign-in </a> if you have an account. <br/><br/><br/>
<form name="flog" action="Sign_up.php" method="post" enctype="multipart/form-data" autocomplete="off">
 <div class="alert alert-error"> <?=$_SESSION['message'] ?> </div>
<table border=0 cellspacing=50>
<tr>
<td>Full Name:</td>
<td><input type="text" name="username"  value="" required></td>
</tr>
<tr>
<tr>
<td> Division</td>
<td colspan=3>  
	<select name="division">
		<?php
			while($row=mysqli_fetch_array($query1))
			{
			    echo "<option value='". $row['div_id']."'>".$row['division']
			 .'</option>';
			 }
		?>
	</select>
</td>
</tr>
<td> Unit</td>
<td colspan=3> 
	<select name="unit">
		<?php
			while($row=mysqli_fetch_array($query))
			{
			    echo "<option value='". $row['unit_id']."'>".$row['unit']
			 .'</option>';
			}
		?>
	</select>
</td>
</tr>
<tr>
<td>ID Number:</td>
<td><input type="text" name="id_no"  value="" required></td>
</tr>
<tr>
<td>Email:</td>
<td><input type="email" name="email" value="" required></td>
</tr>
<tr>
<td>Password:</td>
<td><input type="password" name="password" value="" required></td>
</tr>
<tr>
<td>Confirm Password:</td>
<td><input type="password" name="confirmpassword" value="" required></td>
</tr>
<tr>
<td>Mobile Number.:</td>
<td><input type="text" name="mobile"  value="" ></td>
</tr>
<tr>
<td>Select your avatar:</td>
<td><input type="file" name="avatar" accept="image/*"/ required></td>
</tr>

</table>

<br/>
<input class="btn btn-info btn-xl js-scroll-trigger" type="submit" name="SignUp_btn" value="Register">
</form>



</center>
</body>
</html>