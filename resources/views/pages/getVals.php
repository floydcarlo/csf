<?php

include ("connection.php");
$result = mysqli_query($con, "SELECT * FROM tbl_user") or die($con->error);
//pre_r($result)
?>

<html>
<head>

	<!-- Bootstrap core CSS -->
    <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Plugin CSS -->
    <link href="../../assets/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../assets/css/lib/creative.min.css" rel="stylesheet">

	<style>
		a{
			color:#640E33;
			text-decoration:none;
			font-size:23px;
		}
		a:hover{
			text-decoration:underline;
			font-size:24px;
			color:yellow;
		}
		a:active{
			text-decoration:underline;
			font-size:23px;
			color:white;
		}
		
		h1{
			color:#2c2954;
			font-family:Arial;
			font-size:25px;
		}
	</style>
</head>
<body>
<center>



<div class="container">
			<h1><b>Member's Information</b></h1>
<?php
	if (isset($_SESSION['message'])): ?>
		<div class = "alert alert-<?=$_SESSION['msg_type']?>">
			<?php
				echo $_SESSION['message'];
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif; ?>

<table class = "table">

  			<thead>
  				<tr>
  					<th>Name</th>
  					<th>Unit</th>
  					<th>Division</th>
  					<th>Role</th>
  					<th>Email</th>
  					<th>Password</th>
  					<th>Mobile Number</th>
  					<th>ID number</th>
  					<th>Avatar</th>
  					<th>Status</th>
  					<th>Registration Date</th>
  					<th>Updated Date</th>
  					<th colspan="2">Action</th>
  				</tr>
  			</thead>

  		<?php
  			while ($row = $result->fetch_assoc())
  			{
  		?>
  				<tr>
  					<td> <?php echo $row['username']; ?> </td>
  					<td> <?php echo $row['unit_id']; ?> </td>
  					<td> <?php echo $row['div_id']; ?> </td>
  					<td> <?php echo $row['role_id']; ?> </td>
  					<td> <?php echo $row['email']; ?> </td>
  					<td> <?php echo $row['password']; ?> </td>
  					<td> <?php echo $row['mobile']; ?> </td>
  					<td> <?php echo $row['id_no']; ?> </td>
  					<td> <img src="<?php echo $row['avatar']; ?>"height="75" width="75"> </td>
  					<td> <?php echo $row['status']; ?> </td>
  					<td> <?php echo $row['created_at']; ?> </td>
  					<td> <?php echo $row['updated_at']; ?> </td>
  					<td>
  						<a href="Sign_up.php?edit=<?php echo $row['emp_id']; ?>" 
  							class = "btn btn-info">EDIT</a>
  					</td>	
  					<td>	
  						<a href="admin_crud.php?delete=<?php echo $row['emp_id']; ?>" 
  							class = "btn btn-danger">DELETE</a>
  					</td>
  				</tr>
  		<?php 
  			}
  		 ?>		
  		</table>

  <?php

	  function pre_r($array){
	  	echo '<pre>';
	  	print_r($array);
	  	echo '</pre>';
	  }
  ?>
</div>		
</center>

</body>
</html>



  		

