<?php
	session_start();
	require '../database.php';

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
		<script src="jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				 $("#getUID").load("UIDContainer.php");
				setInterval(function() {
					$("#getUID").load("UIDContainer.php");	
				}, 500);
			});
		</script>
	    <link rel="stylesheet" href="../css/style.css">

		
		<title>Login : SMART STOCK MANAGEMENT SYSTEM </title>
	</head>
	
	<body>

		<h2 align="center"><font color="white">RFID STOCK MANAGEMENT WITH NodeMCU V3 ESP8266 / ESP12E & PHP & MYSQL Database</font></h2>

		<div class="container">
			<br>
			<div class="center" style="margin: 0 auto; width:495px; border-style: solid; border-color: #f2f2f2;">
				<div class="row">
					<h3 align="center"><font color="white">User Login Form</font></h3>
					<h3 align="center"><font color="white">OR</font></h3>
					<h3 align="center" id="blink"><font color="white">Please Scan Tag to Login</font></h3>

				</div>
				<br>
				<?php
				if (isset($_GET['error']) && $_GET['error'] === 'invalid_credentials') {
    echo '<p style="color: red;">Error: Please check credentials</p>';
}
	if (isset($_GET['error']) && $_GET['error'] === 'empty_fields') {
    echo '<p style="color: red;">Error: Please check empty fields</p>';
}
?>
				<form class="form-horizontal" action="check_login.php" method="post" >
					
					
					<div class="control-group">
						<label class="control-label">Username</label>
						<div class="controls">
							<input name="user" type="text" placeholder="" required>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Password</label>
						<div class="controls">
							<input name="pass" type="password"  placeholder="" required>
						</div>
					</div>
					
					<div class="form-actions">
						<button type="submit" class="btn btn-success">Login</button>
						    <button type="button" class="btn btn-primary" onclick="window.location.href='register.php'">Register</button>

                    </div>
				</form></font>
				
			</div>               
		</div> <!-- /container -->	
		<script>
			var myVar = setInterval(myTimer, 1000);
			var myVar1 = setInterval(myTimer1, 1000);
			var oldID="";
			clearInterval(myVar1);

			function myTimer() {
				var getID=document.getElementById("getUID").innerHTML;
				oldID=getID;
				if(getID!="") {
					myVar1 = setInterval(myTimer1, 500);
					showUser(getID);
					clearInterval(myVar);
				}
			}
			
			function myTimer1() {
				var getID=document.getElementById("getUID").innerHTML;
				if(oldID!=getID) {
					myVar = setInterval(myTimer, 500);
					clearInterval(myVar1);
				}
			}
			function showUser(str) {
				xmlhttp.open("GET","check_login.php?type=1&id="+str,true);
					xmlhttp.send();
				
				
				
			}
			var blink = document.getElementById('blink');
			setInterval(function() {
				blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
			}, 750); 
			</script>
	</body>
</html>