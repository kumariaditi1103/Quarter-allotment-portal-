<?php
if(isset($_SESSION['role']))
{
include 'db.php';
session_start();
  $pDatabase = Database::getInstance();
  $_SESSION['abc']=$abc = $_REQUEST['reciever'];
  $role=$_SESSION['role'];
$q=$pDatabase->query("SELECT * from application INNER JOIN userdetail ON application.pisno=userdetail.pisno where application.pisno='$abc'");
    $t=mysqli_fetch_assoc($q);
     $name = $_SESSION['name']=$t["name"];
  $post = $t["position"];
  $appointdate = $t["appointmentdate"];
  $category = $t["currentcategory"];
  $basicsal = $t["salary"];
  $office = $t["workplace"];
  $date=$t['dates'];
  
  
  ?>
  <html>
  <head>
  </head>
    <body>


   
 <b style="position: relative;left:300px;">EMPLOYEE DETAILS</b> 
     <table style="position: relative;left:300px;">
           
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
               Position :  
            </th>
            <td>
              <?php echo $post ?>
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
              Application Date :
            </th>
            <td>
              <?php echo $date ?>
            </td>
          </tr>
        </table>
          <?php 
          $role=$_SESSION['role'];
            $qa="SELECT * from allocation where pisno='$abc'";
        $qat=$pDatabase->query($qa);
        $fe=mysqli_fetch_assoc($qat);
        
        $quatno=$fe['quarterno'];
        $sec=$fe['sector'];
        $type=$fe['type'];
          if($role=="director")
              { ?> </br><b style="position: relative;left:300px;">QUARTER DETAILS:</b> 
     <table style="position: relative;left:300px;">
                
               
                <tr>
                  <th>
                    TYPE:
                  </th>
                  <td>
                      <?php echo $type;?>
                  </td>
                </tr>
                <tr>
                  <th>
                    SECTOR NO:
                  </th>
                  <td>
                      <?php echo $sec;?>
                  </td>
                </tr>
                <tr>
                  <th>
                    QUARTER NO:
                  </th>
                  <td>
                      <?php echo $quatno;?>
                  </td>
                </tr>
              </table>
             <?php }
              ?>
           <div style="position: relative;left: 400px;top:30px;">
              <input  type="submit" name="approve" value="Approve">
              
              <input style="position:relative;left:80px;" type="submit" name="decline" value="Decline">
              <input style="position:relative;left:90px;" type="text" placeholder="write the reason for declining" name="remarks" min="10">
        </div>
</body>
</html>
<?php }
else{echo"PLEASE LOGIN FIRST"; }
?>