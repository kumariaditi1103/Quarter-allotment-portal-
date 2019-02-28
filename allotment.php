<?php
include 'db.php';
include 'headlogout.php';
if(isset($_SESSION['role']))
{
session_start();
$pDatabase=Database::getInstance();

  $pis=$_SESSION['abc'];
  $name=$_SESSION['name'];

 //echo $pis;
    $f="SELECT grade,executivesgrade,nonexecutivesgrade from application where pisno='$pis'";
    $fa=$pDatabase->query($f);
    $t=mysqli_fetch_assoc($fa);
    $grade=$t['grade'];
    $des=$t['executivesgrade'];
    $desi=$t['nonexecutivesgrade'];
    //*checking grade and alloting quarter
    if($grade=="Executive")
    {
      if($des=="E1" || $des=="E2")
      {
        $qa="SELECT * from quarter where vaccancy='vaccant' and type='B' group by 'type' order by 'quarterno'";
        $qat=$pDatabase->query($qa);
        $fe=mysqli_fetch_assoc($qat);
        $r=mysqli_num_rows($qat);
        $quatno=$fe['quarterno'];
        $sec=$fe['sector'];
        $type=$fe['type'];
        if($r!=0)  /*checking vaccancy of corresponding type*/
        {
          $u=$pDatabase->query("UPDATE quarter SET vaccancy='alloted' where quarterno='$quatno' and type='B'");
          
          //$o=$pDatabase->query("UPDATE application SET alloted='alloted' where pisno='$pis'");
          $quer="INSERT INTO allocation values('$pis','$name','$sec','$quatno','$type')";
          $up=$pDatabase->query($quer);
         

        }

      }
      else if($des=="E3" || $des=="E4" || $des=="E5" || $des=="E6")
      {
        $qa="SELECT * from quarter where vaccancy='vaccant' and type='C' group by 'type' order by 'quarterno'";
        $qat=$pDatabase->query($qa);
        $fe=mysqli_fetch_assoc($qat);
        $r=mysqli_num_rows($qat);
        $quatno=$fe['quarterno'];
        $sec=$fe['sector'];
        $type=$fe['type'];
        if($r!=0)
        {
          $u=$pDatabase->query("UPDATE quarter SET vaccancy='alloted' where quarterno='$quatno' and type='C'");
          //echo "Success";
         // $o=$pDatabase->query("UPDATE application SET alloted='alloted' where pisno='$pis'");
          $quer="INSERT INTO allocation values('$pis','$name','$sec','$quatno','$type')";
          $up=$pDatabase->query($quer);
          //echo $pis."</br>".$name."</br>".$sec."</br>".$quatno;
          
        }
      }
      elseif ($des=="E7" || $des=="E8")
      {
        $qa="SELECT * from quarter where vaccancy='vaccant' and type='D' group by 'type' order by 'quarterno'";
        $qat=$pDatabase->query($qa);
        $fe=mysqli_fetch_assoc($qat);
        $r=mysqli_num_rows($qat);
        $quatno=$fe['quarterno'];
        $sec=$fe['sector'];
        $type=$fe['type'];
        if($r!=0)
        {
          $u=$pDatabase->query("UPDATE quarter SET vaccancy='alloted' where quarterno='$quatno' and type='D'");
          echo "Success";
          //$o=$pDatabase->query("UPDATE application SET alloted='alloted' where pisno='$pis'");
          $quer="INSERT INTO allocation values('$pis','$name','$sec','$quatno','$type')";
          $up=$pDatabase->query($quer);
          //echo $pis."</br>".$name."</br>".$sec."</br>".$quatno;
          //echo "Success";
        }
      }

    }
    else if($grade=="Non Executive")
    {
      if($desi=="Technician" || $desi=="Supervisor")
      {
        $qa="SELECT * from quarter where vaccancy='vaccant' and type='A' group by 'type' order by 'quarterno'";
        $qat=$pDatabase->query($qa);
        $fe=mysqli_fetch_assoc($qat);
        $r=mysqli_num_rows($qat);
        $quatno=$fe['quarterno'];
        $sec=$fe['sector'];
        $type=$fe['type'];
        if($r!=0)
        {
          $u=$pDatabase->query("UPDATE quarter SET vaccancy='alloted' where quarterno='$quatno' and type='A'");
        
          //$o=$pDatabase->query("UPDATE application SET alloted='alloted' where pisno='$pis'");
          $quer="INSERT INTO allocation values('$pis','$name','$sec','$quatno','$type')";
          $up=$pDatabase->query($quer);
        
        }
      }
    }
    echo"<script type='text/javascript'>alert('This application is approved successfully.')</script>";
?>
<html>
<body>
   <meta http-equiv="refresh" content="0;url=admin.php">
</body>
</html>
<?php }
else
{
  echo "PLEASE LOGIN FIRST";
}
?>