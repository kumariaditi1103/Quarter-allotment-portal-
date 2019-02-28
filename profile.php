<?php
include 'db.php';
$pDatabase= Database::getInstance();
session_start();
                        //duplicate primary key en
 $piss=$_SESSION['pis'];
  $t="SELECT role from login where pis='$piss'";                       //duplicate primary key entry btata
  //$r=mysql_num_rows($t);
  $q= $pDatabase->query($t);
	$row=mysqli_fetch_assoc($q);
    //$_SESSION['name']=$name=$row['hodname'];
    $role=$row['role'];
    //$pass=$row['password'];
   // $departmentno=$_SESSION['depn'];
 //session_destroy();
if($role=='hod')
{
  header("Location:hodprofile.php");
}
else if($role=='director')
{
  header("Location:direct.php");
}

?>
