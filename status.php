<?php
error_reporting(0);
include 'headerboot.php';
include 'db.php';
$pDatabase = Database::getInstance();

if (isset($_POST['submit']))
{
  $apn = test_input($_POST["applicationno"]);
  $t= "SELECT empn,applicationno,approved_by_hod,approved_by_admin,approved_by_director from application where applicationno='$apn'";
  $q = $pDatabase->query($t);
                         //duplicate primary key entry btata h
  $row = mysqli_fetch_array($q);
  $e=$row['empn'];
  //$name=$row['hodname'];
  $ap=$row['applicationno'];
  $aph=$row['approved_by_hod'];
  $apa=$row['approved_by_admin'];
  $apd=$row['approved_by_director'];
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<!doctype html>
<html>
<head>
<title> BHARAT COKING COAL LIMITED </title>
<style>

 .form-horizontal{
   width: 40%;
   margin-left: auto;
   margin-right: auto;
   margin-top: 40px;
   background-color: #f0f0f0;
 }

</style>
</head>
  <body>
</br>
  <div class="container-fluid p-0">
    <div class="abc"><h4 style="text-align:center"><p style="background-color:#f0f0f0;padding:0px;">TRACK STATUS</p></h4></div>

<form class="form-horizontal border border-dark p-3 rounded" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<div class="form-group row">
  <label for="inputEmail3" class="col-sm-6 col-form-label">Enter your Application Number :</label>
  <div class="col-sm-5">
    <input type="number" name="applicationno" class="form-control" id="inputEmail3" required>
  </div>
</div>
  <div class="form-row">
    <div class="col-sm-offset-2 col-sm-10">
      <button  value="Track" name="submit" type="submit" class="btn btn-success" data-toggle="modal" data-target="#myModal" style="position:relative;left:200px;">Track</button>
    </div>
  </div>

  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Status</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
<?php

          echo "Employee number :".$e."</br>";
          echo "Application no :".$ap."</br>";
          if($apd!='Y')
          {
            if($aph=='Y')
            {
              echo "Your application is approved by HOD - ".$aph."</br>";
              if($apa=='Y')
              {
              echo "Your application is approved by Adminstration - ".$apa."</br>";
              }
            }
          }
          else if($apd=='Y')
          {
              $alot=$pDatabase->query("SELECT * from allocation LEFT JOIN application on allocation.pisno=application.pisno where application.applicationno='$ap'");
              $qa=mysqli_fetch_assoc($alot);
              echo "<b>"."PIS NO:  ".$qa['pisno']."</br>";
              echo "Sector:  ".$qa['sector']."</br>";
              echo "Quarter Number:  ".$qa['quarterno'];
          }
?>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

</form>
  </div>
  <!-- The Modal -->

</body>
</html>
