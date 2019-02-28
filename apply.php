<?php                   //database creation

include 'db.php';
//include 'applyphp.php';
include 'headerboot.php';
$pDatabase = Database::getInstance();

?>
<!doctype HTML>
<head>
  <style>
  .form-horizontal{
    width: 50%;
    margin-left: auto;
    margin-right: auto;
    background-color: #f0f0f0;
  }
  .error{
      color: red;
      margin: 0px;
      padding-bottom: 10px;
    }
  </style>
  <link href="https://fonts.googleapis.com/css?family=Bangers|Berkshire+Swash" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
  <title>BHARAT COKING COAL LIMITED</title>
</head>
<html>

<body>

<div class="container-fluid">
  </br>
  <div class="abc"><h4 style="text-align:center"><p style="background-color:#f0f0f0;padding:0px;">APPLICATION FORM</p></h4></div>

<form class="form-horizontal border border-dark p-3 rounded" method="post" action="applyphp.php">
<p class="error"> *Every field is required </p>
  <ol type="1">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-4 col-form-label"> Name :</label>
    <div class="col-sm-6">
      <input type="name" name="name" required class="form-control form-control-sm" id="inputEmail3" >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputFathername" class="col-sm-4 col-form-label">Father Name :</label>
    <div class="col-sm-6">
      <input type="name" name="fathername" required class="form-control form-control-sm" id="inputPassword3">
    </div>
  </div>


  <div class="form-group row">
    <label for="inputPosition" class="col-sm-4 col-form-label">Position :</label>
    <div class="col-sm-6">
      <input type="text" name="position" required class="form-control form-control-sm" id="inputPassword3">
    </div>
    </div>

  <div class="form-group row">
    <label for="inputDivision" class="col-sm-4 col-form-label">Division :</label>
    <div class="col-sm-6">
      <input type="text" name="division" required class="form-control form-control-sm" id="inputPassword3">
    </div>
  </div>

 <div class="form-group row">
    <label for="inputDirectorate" class="col-sm-4 col-form-label">Directorate :</label>
    <div class="col-sm-6">
      <input type="text" name="directorate" required class="form-control form-control-sm" id="inputPassword3">
    </div>
  </div>

<div class="form-group row">
  <label for="inputAppointmentdate" class="col-sm-4 col-form-label">Appointment Date :</label>
  <div class="col-sm-6">
    <input type="date" name="appointmentdate" required class="form-control form-control-sm" id="inputPassword3">
  </div>
</div>
<div class="form-group row">
  <label for="inputjoiningdate" class="col-sm-4 col-form-label">BCCL Joining Date :</label>
  <div class="col-sm-6">
    <input type="date" name="joiningdate" required class="form-control form-control-sm" id="inputPassword3">
  </div>
</div>
<div class="form-group row">
  <label for="inputPassword3" class="col-sm-4 col-form-label">Current Category :</label>
  <div class="col-sm-6">
    <input type="text" name="currentcategory" required class="form-control form-control-sm" id="inputPassword3">
  </div>
</div>
<div class="form-group row">
  <label for="inputPassword3" class="col-sm-4 col-form-label">Present Basic :</label>
  <div class="col-sm-6">
    <input  type="number" name="basicsalary" required class="form-control form-control-sm" id="inputPassword3">
  </div>
</div>
<div class="row">
      <legend class="col-form-label col-sm-4 pt-0">Choose Category : (Choose only one) </legend>
      <div class="col-sm-5">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="grade" value="Executive" checked id="gridRadios1">
          <label class="form-check-label" for="gridRadios1">
            Executives Grade :           <select class="custom-select custom-select-md mb-2 mt-2" name="executivesgrade">
              <option value="null">none</option>
              <option value="E1">E1</option>
              <option value="E2">E2</option>
              <option value="E3">E3</option>
              <option value="E4">E4</option>
              <option value="E5">E5</option>
              <option value="E6">E6</option>
              <option value="E7">E7</option>
              <option value="E8">E8</option>
              </select>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input"  type="radio" name="grade" value="Non Executive" id="gridRadios2">
          <label class="form-check-label" for="gridRadios2">
            Non Executive Grade : <select class="custom-select custom-select-md mb-3 mt-2" name="nonexecutivesgrade">
            <option value="null">none</option>
            <option value="Supervisor">Supervisor</option>
            <option value="Technician">Technician</option>
          </select>
          </label>
        </div>
      </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-4 col-form-label">HOD Name :</label>
    <div class="col-sm-6">
      <input  type="text" name="hodname" required class="form-control form-control-sm" id="inputPassword3">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-4 col-form-label">PIS No. :</label>
    <div class="col-sm-6">
      <input type="number" name="pisno" required class="form-control form-control-sm" id="inputPassword3">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-4 col-form-label">Office Address :</label>
    <div class="col-sm-6">
      <input  type="text" name="workplace" required class="form-control form-control-sm" id="inputPassword3">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-4 col-form-label">Department Number :</label>
    <div class="col-sm-6">
      <input  type="number" name="depn" required class="form-control form-control-sm" id="inputPassword3">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-4 col-form-label">Employee Number :</label>
    <div class="col-sm-6">
      <input  type="number" name="empn" required class="form-control form-control-sm" id="inputPassword3">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-offset-2 col-sm-10">
      <button  value="Apply" name="submit" type="submit" class="btn btn-success" style="position:relative;left:200px;">Submit Form</button>
    </div>
  </div>
</ol>
</form>
</div>
</body>
</html>
