<?php
session_start();
include 'db.php';
include 'headerboot.php';
?>

<!doctype html>
<html>
<head>
<title> BHARAT COKING COAL LIMITED </title>
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
      <div class="abc"><h4 style="text-align:center"><p style="background-color:#f0f0f0;padding:0px;">CHANGE APPLICATION</p></h4></div>

  <form class="form-horizontal border border-dark p-3 rounded" method="post" action="changeform.php">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-6 col-form-label">Enter your Application Number :</label>
    <div class="col-sm-5">
      <input type="number" name="applicationno" class="form-control" id="inputEmail3" required>
    </div>
  </div>
    <div class="form-row">
      <div class="col-sm-offset-2 col-sm-10">
        <button  value="Track" name="submit" type="submit" class="btn btn-success"style="position:relative;left:200px;">Submit</button>
      </div>
    </div>
  </form>

    <!-- The Modal -->
  </div>


</body>
</html>
