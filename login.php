<?php
error_reporting(0);
session_start();
include 'db.php';
include 'headerboot.php';
$pageno=2;
$pDatabase = Database::getInstance();
if (isset($_POST['submit']))
{
$_SESSION['pis']=$pis=$_POST['pis'];
$psd=$_POST['password'];
//$role=$_POST['role'];
  //$q= mysql_query("SELECT depn,role from login where pis='$pis' and password='$psd'");                       //duplicate primary key entry btata
  $query = "SELECT depn,role,password from login where pis='$pis'";
  $q = $pDatabase->query($query);
  $r=mysqli_num_rows($q);
  if($r!=0)
  {
  $t=mysqli_fetch_assoc($q);
  $_SESSION['depn']=$t['depn'];
  $_SESSION['role']=$rol=$t['role'];
  if(password_verify($psd,$t['password']))
  { //$_SESSION['flag']=1;
  switch ($rol)
    {
    case 'hod':{
    header("Refresh:0;url='hodprofile.php'");}
    break;
    case 'director':
    header("Refresh:0;url='direct.php'");
    break;
    case 'admin':
    header("Refresh:0;url='admin.php'");
    break;
    case 'master':
    header("Refresh:0;url='masterprofile.php'");
    break;
    default:
      echo "Error in login";
    break;
    }
  }
    else {
      header("Refresh:0;url='loginerror.php'");
    }
  }
}
  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>

<html lang="en">
<head>
  <style>
  .form-horizontal{
    width: 350px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 40px;
  }
</style>
</head>
<body>
  <div class="container-fluid">
<!--yahan s login form h-->

  <div class="abc"><h4 style="text-align:center"><p style="background-color:#f0f0f0;padding:0px;">LOGIN</p></h4></div>

<form class="form-horizontal bg-light border border-dark p-3 rounded" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<div class="form-group row">
  <label for="inputEmail3" class="col-sm-5 col-form-label">PIS :</label>
  <div class="col-sm-7">
    <input type="number" name="pis" class="form-control" id="inputEmail3" placeholder="" required>
  </div>
</div>
<div class="form-group row">
  <label for="inputPassword3" class="col-sm-5 col-form-label">Password :</label>
  <div class="col-sm-7">
    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="" required>
  </div>
</div>
  <div class="form-row">
    <div class="col-sm-offset-2 col-sm-10">
      <button  value="Login" name="submit" type="submit" class="btn btn-success" style="position:relative;left:150px;">Login</button>
    </div>
  </div>
</form>


</div>
</body>
</html>
