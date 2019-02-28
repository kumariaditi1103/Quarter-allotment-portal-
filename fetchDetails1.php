<?php
include 'db.php';
  $pDatabase = Database::getInstance();
  $abc = $_REQUEST['reciever'];

  //echo "from data".$abc;
//echo "from data".$abc;
$q=$pDatabase->query("SELECT * from application INNER JOIN userdetail ON application.pisno=userdetail.pisno where application.pisno='$abc'");
    $t=mysqli_fetch_assoc($q);
     $name = $t["name"];
  $fname = $t["fathername"];
  $post = $t["position"];
  $division = $t["division"];
  $directorate = $t["directorate"];
  $appointdate = $t["appointmentdate"];
  $joindate = $t["joiningdate"];
  $category = $t["currentcategory"];
  $basicsal = $t["basicsalary"];
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
  $pis = $t["pisno"];
  $office = $t["workplace"];
  $departmentno = $t["depn"];
  $employeeno = $t["empn"];

  if(isset($_POST['approve']))
  {
    $q=$pDatabase->query("UPDATE application set approved_by_director='Y' where pisno='$abc'");
    echo"<script type='text/javascript'>alert('This application is approved successfully.')</script>";
    //session_unset($_SESSION['pisn']);
    header("Refresh:0;url=direct.php");

  }
  elseif(isset($_POST['decline']))
  {
    $q=$pDatabase->query("UPDATE application set approved_by_director='N' where pisno='$abc'");
    echo"<script type='text/javascript'>alert('This application is rejected successfully.')</script>";
  }
  ?>
          <html>
    <head>
      <title>
        <?php echo $name ?>
      </title>
      <style>
      table {
    border-collapse: collapse;
    width:50%;
    position: relative;
    left:300px;
    top:30px;
    }
      table,th,td{
        border: 2px solid black;
      }

  </style>
    </head>
    <body>
        <table>
          <caption> <b>EMPLOYEE DETAILS</b></caption>
          <tr>
            <th>
              Name :
            </th>
            <td>
              <?php echo $name ?>
            </td>
          </tr>
          <tr>
            <th>
               Father Name:
            </th>
            <td>
              <?php echo $fname ?>
            </td>
          </tr>
          <tr>
            <th>
               Position :
            </th>
            <td>
              <?php echo $post ?>
            </td>
          </tr>
          <tr>
            <th>
              Division :
            </th>
            <td>
              <?php echo $division ?>
            </td>
          </tr>
          <tr>
            <th>
              Directorate:
            </th>
            <td>
              <?php echo $directorate ?>
            </td>
          </tr>
          <tr>
            <th>
              Appointment Date :
            </th>
            <td>
              <?php echo $appointdate ?>
            </td>
          </tr>
          <tr>
            <th>
              BCCL Joining Date :
            </th>
            <td>
              <?php echo $joindate?>
            </td>
          </tr>
          <tr>
            <th>
              Current Category :
            </th>
            <td>
              <?php echo $category ?>
            </td>
          </tr>
          <tr>
            <th>
              Present Basic :
            </th>
            <td>
              <?php echo $basicsal ?>
            </td>
          </tr>
          <?php if($grade=="Executive")
    {?>
          <tr>
            <th>
              Executives Grade :
            </th>
            <td>
              <?php echo $exegrade?>
            </td>
          </tr>

  <?php }
  else if($grade=="Non Executive")
    {?>
      <tr>
            <th>
              Non Executives Grade :
            </th>
            <td>
              <?php echo $nonexegrade ?>
            </td>
          </tr>
          <?php } ?>
          <tr>
            <th>
              PIS No. :
            </th>
            <td>
              <?php echo $pis?>
            </td>
          </tr>
          <tr>
            <th>
              Office address :
            </th>
            <td>
              <?php echo $office ?>
            </td>
          </tr>
          <tr>
            <th>
              Department No. :
            </th>
            <td>
              <?php echo $departmentno ?>
            </td>
          </tr>
          <tr>
            <th>
              Employee No. :
            </th>
            <td>
              <?php echo $employeeno ?>
            </td>
          </tr>
        </table>
        <form action="<?php echo($_SERVER['PHP_SELF']) ?>" method="post" style="position: relative;left:550px;top:50px;">
          <input type="submit" name="approve" value="Approve">
          <input type="submit" name="decline" value="Decline">
        </form>





</body>
</html>
