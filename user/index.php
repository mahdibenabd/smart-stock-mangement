<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		<script src="jquery.min.js"></script>
		
	    <link rel="stylesheet" href="css/style.css">

		
		<title>Registration : NodeMCU V3 ESP8266 / ESP12E with MYSQL Database</title>
	</head>
	
	<body>

		<h2 align="center"><font color="white">RFID STOCK MANAGEMENT WITH NodeMCU V3 ESP8266 / ESP12E & PHP & MYSQL Database</font></h2>

		<div class="container">
			<br>
			<div class="center" style="margin: 0 auto; width:495px; border-style: solid; border-color: #f2f2f2;">
				<div class="row">
					<h3 align="center"><font color="white">User Login Form</font></h3>
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
	</body>
</html>