<?php
	session_start();
	include 'db.php';
	include 'headerboot.php';
	$pDatabase= Database::getInstance();
	$emp=$_SESSION['emp'];
	$app="SELECT applicationno from application where empn='$emp'";
	$q=$pDatabase->query($app);
	$r=mysqli_fetch_assoc($q);
    $a=$r['applicationno'];
	//echo(" ");

	?>
	<html>
	<head>
		<title>
			Registration successfull!
		</title>
	</head>
	<body>
		<p style="position:relative;left:400px;top:50px;">
			Your Application is successfully submitted. Your application number is <b>
				<kbd><?php echo $a; ?></kbd>
				</br>
				Please note it down for further enquiry.
			</b>
		</p>

	</body>
	</html>
