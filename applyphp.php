<?php
include 'db.php';
session_start();
$pDatabase = Database::getInstance();

// define variables and set to empty values
$name=$fname=$basicsal=$exegrade=$hod=$pis=$office=$departmentno=$employeeno=$nonexegrade=$post=$division=$directorate=$appointdate=$joindate=$category= "";

if (isset($_POST['submit']))
{
  $name = test_input($_POST["name"]);
  $fname = test_input($_POST["fathername"]);
  $post = test_input($_POST["position"]);
  $division = test_input($_POST["division"]);
  $directorate = test_input($_POST["directorate"]);
  $appointdate = test_input($_POST["appointmentdate"]);
  $joindate = test_input($_POST["joiningdate"]);
  $category = test_input($_POST["currentcategory"]);
  $basicsal = test_input($_POST["basicsalary"]);
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

 $ipadd=getRealIpAddr();

  $t= "SELECT empn from application where empn='$employeeno'";                       //duplicate primary key entry btata h
  $q = $pDatabase->query($t);
  $r=mysqli_num_rows($q);
  if($r==0)
  {
    $quer="INSERT INTO application (depn,empn,pisno,workplace,hodname,grade,executivesgrade,nonexecutivesgrade,dates,times,ip) values('$departmentno','$employeeno','$pis','$office','$hod','$grade','$exegrade','$nonexegrade','$dt','$time','$ipadd')" or die(mysql_error());
    $query = $pDatabase->query($quer);
    $pa="INSERT INTO userdetail  values('$name','$fname','$post','$division','$directorate','$appointdate','$joindate','$category','$basicsal','$pis')" or die(mysql_error());
    $p=$pDatabase->query($pa);
    if($query)
    {
      if($p)
      {
      echo"SUCCESS";
      header("Location:register.php");
      }
      else echo "FAILED";
    }
  }
  else
  {
  echo "Already filled the form";
  }
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
