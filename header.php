<?php

?>
<!doctype HTML>
<html>
<head>
  <title>Bootstrap 4 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <style>

  body{
    margin: 0px;
  }
  ul {
    font-family: sans-serif;
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
  }

  #list{
      float: left;
  }

  #list a{
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
  }

  a:hover{
      background-color:green;
  }

    h1{
      margin: 0px;
      background-color: lightblue;
      font-size: 50px;
      text-align: center;
      text-shadow:
    }
    h2{margin:5px;
      text-align: center;
      background-color: blanchedalmond;
    }
    .logo {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 15%;
          }

          .dropdown{
          }
          .dropdown .dropbtn {
              font-size: 16px;
              border: none;
              outline: none;
              color: white;

              background-color: inherit;
              font-family: inherit;
              margin: 0;
          }
          .dropdown:hover .dropbtn {
              background-color: green;
          }
          .dropdown-content {
              display: none;
              position: absolute;
              background-color: #333;
              min-width: 160px;
              box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
              z-index: 1;
              color:white;
          }

          .dropdown-content a {
              float: none;
              color: black;
              padding: 12px 16px;
              text-decoration: none;
              display: block;
              text-align: left; color:white;
          }

          .dropdown-content a:hover {
              background-color: green;
          }

          .dropdown:hover .dropdown-content {
              display: block;
          }

</style>
</head>
<body>
<h1>BHARAT COKING COAL LIMITED</h1>
<img src="logo.jpg" alt="BCCL logo" class="logo" align>
<h2>QUARTER ALLOTMENT PORTAL</h2>
<ul>
  <li id="list"><a href="home.php">Home</a></li>
  <li id="list">
    <div class="dropdown">
    <button class="dropbtn"><a href="#">Application </a>
     </button>
    <div class="dropdown-content">
      <a href="apply.php">Application Form</a>
      <a href="change.php">Apply for change</a>
      <a href="status.php">Status Track</a>
    </div>
    </div>
  </li>
  <li id="list"><a href="avail.php">Quarter Availability</a></li>
  <li id="list"><a href="help.php">Helpdesk</a></li>
  <li style="float:right" id="list"><a class="active" href="login.php">Login</a></li>
</ul>

</body>
</html>
