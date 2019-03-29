<?php

include ("connection.php");

//pre_r($result)
session_start();
$_SESSION['message'] = '';
$division = "";
$div_id = 0;

if (isset($_POST['save'])){
  $division = $_POST['division'];
        mysqli_query($con,"INSERT INTO tbl_division (division) VALUES('$division')")or die($con->error);

          $_SESSION['message'] = "Record has been ADDED!";
          $_SESSION['msg_type'] = "success";
         header("location: admin_division.php");
}
if (isset($_GET['delete'])){
  $div_id = $_GET['delete'];
  mysqli_query($con,"DELETE FROM tbl_division WHERE div_id=$div_id")or die($con->error);

  $_SESSION['message'] = "Record has been DELETED!";
  $_SESSION['msg_type'] = "danger";

  header("location: admin_division.php");
}

if (isset($_GET['edit'])){
  $div_id = $_GET['edit'];
  $result = mysqli_query($con,"SELECT * FROM tbl_division WHERE div_id=$div_id")or die($con->error);


    $row = $result->fetch_array();
    $division = $row['division'];
  
}

if (isset($_POST['update'])){
  $div_id = $_POST['div_id'];
  $division = $_POST['division'];

  mysqli_query($con,"UPDATE tbl_division SET division='$division' WHERE div_id= $div_id")or die($con->error);
  header("location: admin_division.php");

}

?>

<form action="admin_division2.php" method="post" enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" name="div_id" value="<?php echo $div_id; ?>">
    <div class = "form-group">
    <label><h1>UPDATE Division</h1></label>
    <input type="text" class = "form-control" name="division"  value="<?php echo $row['division']; ?>" required>
    </div>
    <div class = "form-group">
    <input class="btn btn-info btn-xl js-scroll-trigger" type="submit" name="update" value="UPDATE">
    </div>
</form>

