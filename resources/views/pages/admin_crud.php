<?php
include ("connection.php");
session_start();
$username = "";
$id_no = "";
$email = "";
$mobile = "";
$div_id = "";
$unit_id = "";
$role_id = "";
$status = "";
$updated_at = "";
$emp_id = 0;

if (isset($_GET['delete'])){
	$emp_id = $_GET['delete'];
	mysqli_query($con,"DELETE FROM tbl_user WHERE emp_id=$emp_id")or die($con->error);

	$_SESSION['message'] = "Record has been DELETED!";
	$_SESSION['msg_type'] = "danger";

	header("location: getvals.php");
}

if (isset($_GET['edit'])){
	$emp_id = $_GET['edit'];
	$result = mysqli_query($con,"SELECT * FROM tbl_user WHERE emp_id=$emp_id")or die($con->error);


		$row = $result->fetch_array();
		$username = $row['username'];
		$id_no = $row['id_no'];
		$email = $row['email'];
		$mobile = $row['mobile'];
		$div_id = $row['div_id'];
		$unit_id = $row['unit_id'];
		$role_id = $row['role_id'];
		$status = $row['status'];

}

if (isset($_POST['update'])){
	$emp_id = $_POST['emp_id'];
	$username = $_POST['username'];
	$id_no = $_POST['id_no'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$div_id = $_POST['div_id'];
	$unit_id = $_POST['unit_id'];
	$role_id = $_POST['role_id'];
	$status = $_POST['status'];


	mysqli_query($con,"UPDATE tbl_user SET username='$username', id_no='$id_no', email='$email', mobile='$mobile', div_id='$div_id', unit_id='$unit_id', role_id='$role_id', status='$status', updated_at=now() WHERE emp_id= $emp_id")or die($con->error);
	header("location: getvals.php");

}

?>
<?php

//Data loading in unit
$query = mysqli_query($con,"SELECT unit_id, unit FROM tbl_unit");
$query_display = mysqli_query($con,"SELECT * FROM tbl_unit");

//Data loading in division
$query1 = mysqli_query($con,"SELECT div_id, division FROM tbl_division");
$query_display1 = mysqli_query($con,"SELECT * FROM tbl_divsion");

//Data loading in role
$query2 = mysqli_query($con,"SELECT * FROM tbl_role");



?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">



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
			color:#bbdcf9;
			font-family:Arial;
			font-size:75px;
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


<body>
<center>
<br/>

<h1><b>Update Member's Account</b></h1>
<form name="flog" action="admin_crud.php" method="post" enctype="multipart/form-data" autocomplete="off">
 <div class="alert alert-error"> <?=$_SESSION['message'] ?> </div>
 <input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>">
<table border=0 cellspacing=50>
<tr>
<td><img src="<?php echo $row['avatar']; ?>"height="100" width="100"></td>
<td><b>Edit <?php echo $row['username']; ?>'s Profile </b></td>
</tr>
<tr>
<td>Full Name:</td>
<td><input type="text" name="username"  value="<?php echo $row['username']; ?>" required></td>
</tr>
<tr>
<td>ID Number:</td>
<td><input type="text" name="id_no"  value="<?php echo $row['id_no']; ?>" required></td>
</tr>
<tr>
<td>Email:</td>
<td><input type="email" name="email" value="<?php echo $row['email']; ?>" required></td>
</tr>
<tr>
<td>Mobile Number:</td>
<td><input type="text" name="mobile"  value="<?php echo $row['mobile']; ?>" ></td>
</tr>
<tr>
<td>Status:</td>
<td colspan=3>  
	<select name="status" >
		<option ><?php echo $row['status']; ?></option>
		<option> active </option>
		<option> inactive </option>
	</select>
</td>
</tr>
<tr>
<td>Division:</td>
<td colspan=3>  
	<select name="div_id" >
		<option ><?php echo $row['div_id']; ?></option>
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
<tr>
<td>Unit:</td>
<td colspan=3> 
	<select name="unit_id">
		<option ><?php echo $row['unit_id']; ?></option>
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
<td>Role:</td>
<td colspan=3> 
	<select name="role_id">
		<option><?php echo $row['role_id']; ?></option>
		<?php
			while($row=mysqli_fetch_array($query2))
			{
			    echo "<option value='". $row['role_id']."'>".$row['role']
			 .'</option>';
			}
		?>
	</select>
</td>
</tr>



</table>

<br/>
<input class="btn btn-info btn-xl js-scroll-trigger" type="submit" name="update" value="update">
</form>



</center>
</body>
</html>