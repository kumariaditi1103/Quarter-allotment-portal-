<?php

include 'db.php';
  $pDatabase = Database::getInstance();
  if(isset($_POST['approve']))
  {
    echo "Successfully Approved.";
    $qa=$pDatabase->query("INSERT into application set approved_by_hod='Y' where pisno='$abc'");
    //echo"<script type='text/javascript'>alert('This application is approved successfully.')</script>";
    //session_unset($_SESSION['pisn']);
    //header("Refresh:0;url=hodprofile.php");
    echo "Successfully Approved.";

  }
  elseif(isset($_POST['decline']))
  {
    $qn=$pDatabase->query("UPDATE application set approved_by_hod='N' where pisno='$abc'");
    //echo"<script type='text/javascript'>alert('This application is rejected successfully.')</script>";
    echo "Delined!";
  }
  ?>
