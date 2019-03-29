<?php

include ("connection.php");

//pre_r($result)
session_start();
$_SESSION['message'] = '';
$unit = "";
$unit_id = 0;

if (isset($_POST['save'])){
  $unit = $_POST['unit'];
        mysqli_query($con,"INSERT INTO tbl_unit (unit) VALUES('$unit')")or die($con->error);

          $_SESSION['message'] = "Record has been ADDED!";
          $_SESSION['msg_type'] = "success";
         header("location: admin_unit.php");
}
if (isset($_GET['delete'])){
  $unit_id = $_GET['delete'];
  mysqli_query($con,"DELETE FROM tbl_unit WHERE unit_id=$unit_id")or die($con->error);

  $_SESSION['message'] = "Record has been DELETED!";
  $_SESSION['msg_type'] = "danger";

  header("location: admin_unit.php");
}

if (isset($_GET['edit'])){
  $unit_id = $_GET['edit'];
  $result = mysqli_query($con,"SELECT * FROM tbl_unit WHERE unit_id=$unit_id")or die($con->error);


    $row = $result->fetch_array();
    $unit = $row['unit'];
  
}

if (isset($_POST['update'])){
  $unit_id = $_POST['unit_id'];
  $unit = $_POST['unit'];

  mysqli_query($con,"UPDATE tbl_unit SET unit='$unit' WHERE unit_id= $unit_id")or die($con->error);
  header("location: admin_unit.php");

}

?>

<form action="admin_unit2.php" method="post" enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" name="unit_id" value="<?php echo $unit_id; ?>">
    <div class = "form-group">
    <label><h1>UPDATE Unit</h1></label>
    <input type="text" class = "form-control" name="unit"  value="<?php echo $row['unit']; ?>" required>
    </div>
    <div class = "form-group">
    <input class="btn btn-info btn-xl js-scroll-trigger" type="submit" name="update" value="UPDATE">
    </div>
</form>

