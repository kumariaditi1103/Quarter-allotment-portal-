<?php
include 'db.php';
include 'headerboot.php';
session_start();
$pDatabase = Database::getInstance();

function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
     }
?>
<!doctype HTML>
<html>
<head>
  <style>
  .form-horizontal{
    width: 350px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 40px;

  .avail{border: 2px 2px 2px 2px;
    padding-top: 10px;
    background-color: #ccffcc;
    position: relative;
    width: 20%;
    left:450px;
    margin-top: 20px;
    margin-bottom: 30px;
  }
  .n{padding-top: 10px;

    float: left;
  }
  .tab{
  position: absolute;
  left: 100px;
  margin-right: 0px;
  padding-right: 0px;
  }
td{
  padding-right: 50px;
}
  </style>
</head>
<body>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-horizontal bg-light border border-dark p-3 rounded">
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-7 col-form-label">Quarter Type:</label>
        <select class="dropdown-toggle" data-toggle="dropdown" name="type">
          <div class="dropdown-menu">
                    <option class="dropdown-item" value="A">Type-A</option>
                    <option class="dropdown-item" value="B">Type-B</option>
                    <option class="dropdown-item" value="C">Type-C</option>
                    <option class="dropdown-item" value="D">Type-D</option>
                    <option class="dropdown-item" value="E">Type-E</option>
                  </select>
            </div>
        </div>
                <input type="submit" class="btn btn-success" name="submit" style="position:relative;left:80px;">


  </form>

</br></br>
  <div class="tab">
  <h3>Quarter Details :</h3>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
  $quarter = test_input($_POST["type"]);

  $t="SELECT * from quarter where vaccancy='vaccant' and type='$quarter'";
  $q = $pDatabase->query($t);
      echo "<table class='table table-hover table-striped' border='solid' width='400px'>
          <tr >
  <th height='30px'>Type</th>
  <th>Sector</th>
  <th>Quarter No.</th>
  <th>Condition </th>
  </tr>";
  while($row = mysqli_fetch_array($q))
    {
    echo "<tr>";
    echo "<td height='30px'>" . $row['type'] . "</td>";
    echo "<td>" . $row['sector'] . "</td>";
    echo "<td>" . $row['quarterno'] . "</td>";
    echo "<td>" . $row['conditions'] . "</td>";
    echo "</tr>";
    }
  echo "</table>";
}
  ?>
</div>
</body>
</html>
