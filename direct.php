 <?php 

include 'headlogout.php';
if(isset($_SESSION['role']))
{session_start();
include'db.php';
//session_start();
$pDatabase=Database::getInstance();
//$q=$pDatabase->query("SELECT pisno from application where approved_by_hod='Y'");
$_SESSION['role']="director";
if(isset($_POST['approve']))
  {$abc=$_SESSION['abc'];
//echo $abc;
    $q=$pDatabase->query("UPDATE  application set approved_by_director='Y',alloted='alloted' where pisno='$abc'");
    echo"<script type='text/javascript'>alert('This application is approved successfully.')</script>";
    //session_unset($_SESSION['abc']);
    
  }
  elseif(isset($_POST['decline']))
  {$abc=$_SESSION['abc'];
//echo $abc;
    if($_POST['remarks']!="")
    {$remark=$_POST['remarks'];
    $res = $pDatabase->query( "UPDATE  application set approved_by_director='N',remarks='$remark' where pisno='$abc'");

    if($res) {
      echo"<script type='text/javascript'>alert('This application is rejected successfully.')</script>";
       //session_unset($_SESSION['abc']);
      $p=$pDatabase->query("SELECT * FROM allocation where pisno='$abc'");
      $o=mysqli_fetch_assoc($p);
      $type=$o['type'];
      $sector=$o['sector'];
      $quatno=$o['quarterno'];
      $t=$pDatabase->query("UPDATE quarter set vaccancy='vaccant' where type='$type' and sector='$sector' and quarterno='$quatno'");
      $w=$pDatabase->query( "DELETE from allocation where pisno='$abc'");

      $m=$pDatabase->query("UPDATE quarter set vaccancy='vaccant' where pisno='$abc'");
       header("Refresh:0;url=direct.php");
    }
    else{
      echo"<script type='text/javascript'>alert('Error!!')".mysqli_error()."</script>";
    }
  }
  else
{ 
echo"<script type='text/javascript'>alert('Write the reason for declining.(Reason is necessary for declining)')</script>";}
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>
        Profile
  </title>

  <script src = "jquery.js"> </script>

  <script>
    function getContent(object){
      var string = object.innerHTML;
      //alert(string);

      $.ajax({
          type:"post",
          url:"fetchDetails.php",
          data:{reciever:string},
          error: function(xhr, error){
            alert(xhr); alert(error);},
          success:function(data){
             //alert(data);
             ///window.open("employee.php");
             $("#application_details").html("<br>"+data+"<br>");
             //to replace
          }
        });
    }

  </script>
  <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 50%;


}
 #hod{
      opacity:0.4;
      font-size: 30px;

   text-align: left;}
td, th {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
}
#hea{background: black;
  color:white;
    }
#tab{
     position: relative;
     left:300px;
     top:15px;
}
tr:nth-child(even) {
    background-color: #dddddd;
}
.button{position: absolute;
      left: 1300px;}
</style>
</head>
<body>
<div class="container-fluid">

      <br>
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#home">New Applications</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#menu1">Notifications</a>
        </li>
      </ul>

<div class="tab-content">
<div id="home" class="container tab-pane active"><br>
<?php  
          //session_start();
         // $departmentno=$_SESSION['depn'];
          //$pis=$_SESSION['pis']
       //$r=$pDatabase->query("SELECT depn from application where depn='$departmentno and approved_by_hod=''");
      $q=$pDatabase->query("SELECT * from application INNER JOIN userdetail on application.pisno=userdetail.pisno where  application.approved_by_admin='Y' and application.approved_by_director=''");
//$r=array();
//$t=mysqli_num_rows($q);

  ?>

<p id="e">

<table id="tab">
  <tr>
    <td>PIS NO </td>
    <td>NAME </td>
    <td>Application No </td>
    <td>Application Date </td>
  </tr>
<caption id="hea">PIS Number(click on the PIS Number to get full details.) </caption>

<?php
while($row=mysqli_fetch_assoc($q))
{?>

      <tr>
        <td>
    <a onclick = "getContent(this)" onmouseover="this.style.cursor='pointer'"> <?php echo $row['pisno']; ?></a>
      </td>
      <td>
        <?php echo $row['name'];?>
      </td>
      <td>
        <?php echo $row['applicationno'];?>
      </td>
      <td>
        <?php echo $row['dates'];?>
      </td>
      </tr>
<?php  }?>

</table>
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

  <div id = "application_details">
  </div>

</form>
 </p>
</div>
<div id="menu1" class="container tab-pane fade"><br>
  <h3>Menu 1</h3>
  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
<div id="menu2" class="container tab-pane fade"><br>
  <h3>Menu 2</h3>
  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
</div>
</div>
</div>
</body>
</html>
<?php }

else
{
  echo "PLEASE LOGIN FIRST";
}
?>