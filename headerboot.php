<html lang="en">
<head>
  <style>
  .logo {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 20%;
        }

        #h1{
          background-color: lightblue;
          text-align: center;
          font-size: 40px;
        }
        #h2{
          background-color: blanchedalmond;
          text-align: center;
        }

        #nav:hover{background-color: green;
        }
        .dropdown-menu .dropdown-item{
          background-color: #343a40;
        }
        .dropdown-menu .dropdown-item:hover{
          background-color: green;
        }

  </style>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container-fluid p-0">
    <h1 class="display-4 font-weight-bold rounded" id="h1">BHARAT COKING COAL LIMITED</h1>
    <img src="logo.jpg" class="rounded mx-auto d-block" alt="BCCL logo">
    <h2 class="display-6 mt-2 mb-2 font-weight-light rounded" id="h2">QUARTER ALLOTMENT PORTAL</h2>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark p-0 sticky-top rounded" class="ptblr-0">
  <ul class="navbar-nav">
    <li class="nav-item" id="nav">
      <a class="nav-link text-white" href="home.php">Home</a>
    </li>
    <li class="nav-item" id="nav">
      <a class="nav-link text-white" href="avail.php">Quarter Availability</a>
    </li>
    <li class="nav-item" id="nav">
      <a class="nav-link text-white" href="help.php">Helpdesk</a>
    </li>
    <!-- Dropdown -->
    <li class="nav-item" id="nav">
      <a class="nav-link text-white" href="login.php">Login</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">Application</a>
      <div class="dropdown-menu " style="background-color:#343a40;">
        <a class="dropdown-item text-white" href="apply.php">Apply</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item text-white" href="change.php">Change Quarter</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item text-white" href="status.php">Check status</a>
      </div>
    </li>

  </ul>
</nav>
  </div>

</body>

</html>
