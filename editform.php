<?php                   //database creation
session_start();
 include 'db.php';
//include 'applyphp.php';
include 'headlogout.php';
$pDatabase = Database::getInstance();
$exegrade=$nonexegrade=$grade="null";
//---------------
 $apn="";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
 $apn=$_POST['applicationno'];
  $a="SELECT applicationno from application where applicationno='$apn'";
  $que = $pDatabase->query($a);
  $r=mysqli_num_rows($que);
  $p=$pDatabase->query("SELECT pisno from application where applicationno='$apn'");
  $w=mysqli_fetch_assoc($p);
  if($r!=0)
  {
    $pis = $w['pisno'];
    $q=$pDatabase->query("SELECT * from application,userdetail where application.pisno=userdetail.pisno and application.pisno='$pis'");
        $t=mysqli_fetch_assoc($q);
         $name = $t["name"];
      $fname = $t["fathername"];
      $post = $t["position"];
      $division = $t["division"];
      $directorate = $t["directorate"];
      $appointdate = $t["appointmentdate"];
      $joindate = $t["joiningdate"];
      $category = $t["currentcategory"];
      $basicsal = $t["salary"];
      $grade = $t["grade"];
      if($grade=="Executive")
      {
        $exegrade = $t["executivesgrade"];
      }
      elseif ($grade=="Non Executive")
      {
        $nonexegrade = $t["nonexecutivesgrade"];
      }
      $hod = $t["hodname"];
      $p=$pis = $t["pisno"];
      $office = $t["workplace"];
      $departmentno = $t["depn"];
      $employeeno = $t["empn"];
      //cotinued on form last this page
?>

<!doctype HTML>
<head>
  <style>
  .form-horizontal{
    width: 50%;
    margin-left: auto;
    margin-right: auto;
    background-color: #f0f0f0;
  }
  .error{
      color: red;
      margin: 0px;
      padding-bottom: 10px;
    }
  </style>
  <link href="https://fonts.googleapis.com/css?family=Bangers|Berkshire+Swash" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
  <title>BHARAT COKING COAL LIMITED</title>
</head>
<html>

<body>

<div class="container-fluid">
  </br>
  <div class="abc"><h4 style="text-align:center"><p style="background-color:#f0f0f0;padding:0px;">APPLICATION FORM</p></h4></div>

<form class="form-horizontal border border-dark p-3 rounded" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<p class="error"> *Every field is required </p>
  <ol type="1">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-4 col-form-label"> Name :</label>
    <div class="col-sm-6">
      <input type="name" name="name" value="<?php echo $name;?>"required class="form-control form-control-sm">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputFathername" class="col-sm-4 col-form-label">Father Name :</label>
    <div class="col-sm-6">
      <input type="name" name="fathername" value="<?php echo $fname;?>" required class="form-control form-control-sm" >
    </div>
  </div>


  <div class="form-group row">
    <label for="inputPosition" class="col-sm-4 col-form-label">Position :</label>
    <div class="col-sm-6">
      <input type="text" name="position" required  value="<?php echo $post;?>"class="form-control form-control-sm" >
    </div>
    </div>

  <div class="form-group row">
    <label for="inputDivision" class="col-sm-4 col-form-label">Division :</label>
    <div class="col-sm-6">
      <input type="text" name="division" required value="<?php echo $division;?>"class="form-control form-control-sm" >
    </div>
  </div>

 <div class="form-group row">
    <label for="inputDirectorate" class="col-sm-4 col-form-label">Directorate :</label>
    <div class="col-sm-6">
      <input type="text" name="directorate" required value="<?php echo $directorate;?>"class="form-control form-control-sm" >
    </div>
  </div>

<div class="form-group row">
  <label for="inputAppointmentdate" class="col-sm-4 col-form-label">Appointment Date :</label>
  <div class="col-sm-6">
    <input type="date" name="appointmentdate" required value="<?php echo $appointdate;?>" class="form-control form-control-sm" >
  </div>
</div>
<div class="form-group row">
  <label for="inputjoiningdate" class="col-sm-4 col-form-label">BCCL Joining Date :</label>
  <div class="col-sm-6">
    <input type="date" name="joiningdate" required value="<?php echo $joindate;?>" class="form-control form-control-sm">
  </div>
</div>
<div class="form-group row">
  <label for="inputPassword3" class="col-sm-4 col-form-label">Current Category :</label>
  <div class="col-sm-6">
    <input type="text" name="currentcategory" required value="<?php echo $category;?>" class="form-control form-control-sm" >
  </div>
</div>
<div class="form-group row">
  <label for="inputPassword3" class="col-sm-4 col-form-label">Present Basic :</label>
  <div class="col-sm-6">
    <input  type="number" name="salary" required class="form-control form-control-sm"  value="<?php echo $basicsal;?>" >
  </div>
</div>
<div class="row">
      <legend class="col-form-label col-sm-4 pt-0">Choose Category : (Choose only one) </legend>
      <div class="col-sm-5">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="grade" <?php  if (isset($grade) && $grade=="Executive") echo "checked";?> value="Executive" id="gridRadios1" >
          <label class="form-check-label" for="gridRadios1">
            Executives Grade : <select class="custom-select custom-select-md mb-2 mt-2"  name="executivesgrade" >
              <option value="null">none</option>
              <option <?php if ($t['executivesgrade'] == 'E1') { ?>selected="true" <?php }; ?>value="E1">E1</option>
              <option <?php if ($t['executivesgrade'] == 'E2') { ?>selected="true" <?php }; ?>value="E2">E2</option>
              <option <?php if ($t['executivesgrade'] == 'E3') { ?>selected="true" <?php }; ?>value="E3">E3</option>
              <option <?php if ($t['executivesgrade'] == 'E4') { ?>selected="true" <?php }; ?>value="E4">E4</option>
              <option <?php if ($t['executivesgrade'] == 'E5') { ?>selected="true" <?php }; ?>value="E5">E5</option>
              <option <?php if ($t['executivesgrade'] == 'E6') { ?>selected="true" <?php }; ?>value="E6">E6</option>
              <option <?php if ($t['executivesgrade'] == 'E7') { ?>selected="true" <?php }; ?>value="E7">E7</option>
              <option <?php if ($t['executivesgrade'] == 'E8') { ?>selected="true" <?php }; ?>value="E8">E8</option>
              </select>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input"  type="radio" name="grade" value="Non Executive" <?php echo $grade; if (isset($grade) && $grade=="Non Executive") echo "checked";?> id="gridRadios2" >
          <label class="form-check-label" for="gridRadios2">
            Non Executive Grade :<select class="custom-select custom-select-md mb-3 mt-2" name="nonexecutivesgrade" >
            <option value="null">none</option>
            <option <?php if ($t['nonexecutivesgrade'] == 'Supervisor') { ?>selected="true" <?php }; ?>value="Supervisor">Supervisor</option>
            <option <?php if ($t['nonexecutivesgrade'] == 'Technician') { ?>selected="true" <?php }; ?>value="Technician">Technician</option>
          </select>
        </div>
      </label>
      </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-4 col-form-label">HOD Name :</label>
    <div class="col-sm-6">
      <input  type="text" value="<?php echo $hod;?>" name="hodname" required class="form-control form-control-sm" >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-4 col-form-label">PIS No. :</label>
    <div class="col-sm-6">
      <input type="number" name="pisno" required value="<?php echo $pis;?>" class="form-control form-control-sm" >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-4 col-form-label">Office Address :</label>
    <div class="col-sm-6">
      <input  type="text" name="workplace" required value="<?php echo $office;?>" class="form-control form-control-sm" >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-4 col-form-label">Department Number :</label>
    <div class="col-sm-6">
      <input  type="number" name="depn" required value="<?php echo $departmentno;?>"  class="form-control form-control-sm" >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-4 col-form-label">Employee Number :</label>
    <div class="col-sm-6">
      <input  type="number" name="empn" value="<?php echo $employeeno;?>" required class="form-control form-control-sm" >
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-offset-2 col-sm-10">
      <button  value="Apply" name="submit" type="submit" class="btn btn-success" style="position:relative;left:200px;">Submit </button>
    </div>
  </div>
<?php
  }
  else{
      echo "No Previous form found";
      }
}
if(isset($_POST['submit']))
  {$name = test_input($_POST["name"]);
  $fname = test_input($_POST["fathername"]);
  $post = test_input($_POST["position"]);
  $division = test_input($_POST["division"]);
  $directorate = test_input($_POST["directorate"]);
  $appointdate = test_input($_POST["appointmentdate"]);
  $joindate = test_input($_POST["joiningdate"]);
  $category = test_input($_POST["currentcategory"]);
  $basicsal = test_input($_POST["salary"]);
  $grade = test_input($_POST["grade"]);
  if($grade=="Executive")
  {
    $exegrade = test_input($_POST["executivesgrade"]);
  }
  elseif ($grade=="Non Executive")
  {
    $nonexegrade = test_input($_POST["nonexecutivesgrade"]);
  }
  $hod = test_input($_POST["hodname"]);
  $pis = test_input($_POST["pisno"]);
  $office = test_input($_POST["workplace"]);
  $departmentno = test_input($_POST["depn"]);
  $_SESSION['emp']=$employeeno=test_input($_POST["empn"]);
  date_default_timezone_set("Asia/Calcutta");
  $time=date("h:i:sa");
  $dt=date("Y/m/d");
 //$app=$_SESSION['app'];
 $ipadd=getRealIpAddr();

  
    $quer="UPDATE application set depn='$departmentno',empn='$employeeno',pisno='$pis',workplace='$office',hodname='$hod',grade='$grade',executivesgrade='$exegrade',nonexecutivesgrade='$nonexegrade',dates='$dt',times='$time',ip='$ipadd'  where applicationno='$apn'" or die(mysql_error());
    $query = $pDatabase->query($quer);
    $pa="UPDATE userdetail  set name='$name',fathername='$fname',position='$post',salary='$basicsal',appointmentdate='$appointdate',joiningdate='$joindate',currentcateogory='$category',pisno='$pis',division='$division',directorate='$directorate' where pisno='$p'" or die(mysql_error());
    $p=$pDatabase->query($pa);
    
  
}

function getRealIpAddr()
{
   if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
   {
     $ip=$_SERVER['HTTP_CLIENT_IP'];
   }
   elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
   {
     $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
   }
   else
   {
     $ip=$_SERVER['REMOTE_ADDR'];
   }
   return $ip;
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
</ol>
</form>
</div>
</body>
</html>
