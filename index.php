<?php
session_start(); 

if (!isset($_SESSION['user_id'])) {
    header("Location: /user");    exit();
}
	$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
?>

<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
	    <link rel="stylesheet" href="css/style.css">

		
		<title>Home : SMART STOCK SYSTEM MANAGEMENT</title>
	</head>
	
	<body>
<h2 align="center"><font color="white">RFID STOCK MANAGEMENT WITH NodeMCU V3 ESP8266 / ESP12E & PHP & MYSQL Database</font></h2>		<?php require_once 'header.php'; ?>

		
		<img src="bg.jpg" alt="" width="1920" height="1000">
	</body>
</html>