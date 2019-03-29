<?php

include ("connection.php");
$result = mysqli_query($con, "SELECT * FROM tbl_unit") or die($con->error);
//pre_r($result)
$_SESSION['message'] = '';
//Data loading in unit
$unit = "";?>

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
      <h1><b>Units</b></h1>
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
            <th>Unit ID</th>
            <th>Unit</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>

      <?php
        while ($row = $result->fetch_assoc())
        {
      ?>
          <tr>
            <td> <?php echo $row['unit_id']; ?> </td>
            <td> <?php echo $row['unit']; ?> </td>

            <td>
              <a href="admin_unit2.php?edit=<?php echo $row['unit_id']; ?>" 
                class = "btn btn-info">EDIT</a>
            </td> 
            <td>  
              <a href="admin_unit2.php?delete=<?php echo $row['unit_id']; ?>" 
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
  <br/>
  <br/>

<form action="admin_unit2.php" method="post" enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" name="unit_id" value="<?php echo $unitv_id; ?>">
    <div class = "form-group">
    <label><h1>Add Unit</h1></label>
    <input type="text" class = "form-control" name="unit"  value="<?php echo $unit; ?>" required>
    </div>
    <div class = "form-group">
    <input class="btn btn-info btn-xl js-scroll-trigger" type="submit" name="save" value="SAVE">
    </div>
</form>

</div>      
</center>

</body>
</html>



      

