<?php
 error_reporting(0);
 include 'headlogout.php';
if(isset($_SESSION['role']))
{
 include 'db.php';
 session_start();
 $pDatabase = Database::getInstance();
if (isset($_POST['submit2']))
   {
     $role=test_input($_POST['role']);
     $pisno=test_input($_POST['pis']);
     $depn=test_input($_POST['depn']);
     $password=password_hash(test_input($_POST['password']),PASSWORD_DEFAULT);
   //$options = array("cost"=>4);
    //$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
     $t="SELECT pisno FROM login where pisno='$pisno'";
     $q = $pDatabase->query($t);
     $r=mysqli_num_rows($q);
  //echo $password;
     if($r == 0)
     {
       $quer="INSERT INTO login(pis,password,depn,role) values('$pisno','$password','$depn','$role')"or die(mysql_error());
       $que = $pDatabase->query($quer);
       if($que)
       {
         echo  'Success';
       }
       else
       {
         echo 'FAILED';
       }
     }
     else
     {
       echo 'Duplicate Profile';
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

<!doctype HTML>
<html>
<head>
<title> MASTER PROFILE </title>


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
  <div class="container-fluid p-0">
</br>
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#access">Add Access</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#change">Change Form</a>
      </li>
    </ul>

<div class="tab-content">
  <div id="access" class="container tab-pane active"><br>
      <form class="form-horizontal border border-dark p-3 rounded" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <h3 align="center">Enter Details</h3>

        <div class="form-group row">
         <label for="inputEmail3" class="col-sm-6 col-form-label">PIS No. :</label>
         <div class="col-sm-5">
           <input type="number" name="pis" class="form-control" id="inputEmail3" required>
         </div>
        </div>

        <div class="form-group row">
         <label for="inputEmail3" class="col-sm-6 col-form-label">Department No. :</label>
         <div class="col-sm-5">
           <input type="number" name="depn" class="form-control" id="inputEmail3" required>
         </div>
        </div>

        <div class="form-group row">
         <label for="inputEmail3" class="col-sm-6 col-form-label">Password :</label>
         <div class="col-sm-5">
           <input type="password" name="password" class="form-control" id="inputEmail3" required>
         </div>
        </div>

        <div class="form-group row">
         <label for="inputEmail3" class="col-sm-6 col-form-label">Role :</label>

         <div class="radio">
         <label><input type="radio" value="hod" name="role">HOD</label>
         </div>

         <div class="radio">
        <label><input type="radio" value="admin" name="role">Admin</label>
        </div>

        <div class="radio">
        <label><input type="radio" value="director"  name="role">Director</label>
        </div>
        </div>

        <div class="form-row">
         <div class="col-sm-offset-2 col-sm-10">
          <button  value="SUBMIT" name="submit2" type="submit" class="btn btn-success" data-toggle="modal" data-target="#myModal" style="position:relative;left:200px;">SUBMIT</button>
         </div>
       </div>
      </form>
  </div>


  <div id="change" class="container tab-pane fade"><br>
      <form class="form-horizontal border border-dark p-3 rounded" method="post" action="editform.php">
         <div class="form-group row">
          <label for="inputEmail3" class="col-sm-7 col-form-label">Enter Application Number :</label>
          <div class="col-sm-5">
            <input type="number" name="applicationno" class="form-control" id="inputEmail3" required>
          </div>
         </div>
         <div class="form-row">
          <div class="col-sm-offset-2 col-sm-10">
           <button  value="submit" name="submit3" type="submit" class="btn btn-success" data-toggle="modal" data-target="#myModal" style="position:relative;left:200px;">submit</button>
          </div>
        </div>
      </form>

      <!--
        ?>-->
    </div>
  </div>
</div>
</body>
</html>
<?php }
else{
  echo"PLEASE LOGIN FIRST";
}
?>