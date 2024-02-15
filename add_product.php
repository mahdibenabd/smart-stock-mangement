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
		<script src="jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				 $("#getUID").load("UIDContainer.php");
				setInterval(function() {
					$("#getUID").load("UIDContainer.php");
				}, 500);
			});
		</script>
	    <link rel="stylesheet" href="css/style.css">

		
		<title>Registration : NodeMCU V3 ESP8266 / ESP12E with MYSQL Database</title>
	</head>
	
	<body>

		<h2 align="center"><font color="white">RFID STOCK MANAGEMENT WITH NodeMCU V3 ESP8266 / ESP12E & PHP & MYSQL Database</font></h2>
		<?php require_once 'header.php'; ?>

		<div class="container">
			<br>
			<div class="center" style="margin: 0 auto; width:495px; border-style: solid; border-color: #f2f2f2;">
				<div class="row">
					<h3 align="center"><font color="white">Add Product</font></h3>
				</div>
				<br>
				<form class="form-horizontal" action="insertDB.php" method="post" >
					<div class="control-group">
						<label class="control-label"><font color="white">ID</label>
						<div class="controls">
							<textarea name="id" id="getUID" placeholder="Please Scan your Card / Key Chain to display ID" rows="1" cols="1" required></textarea>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Name</label>
						<div class="controls">
							<input id="div_refresh" name="name" type="text"  placeholder="" required>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Categorie</label>
						<div class="controls">
							<select name="categorie">
								<option value="Alimentation">Alimentation</option>
								<option value="Meubles">Meubles</option>
								<option value="Pretaporter">Pret a porter</option>
								<option value="Hygiene">Hygiene</option>
							</select>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Emplacement</label>
						<div class="controls">
							<input name="emplacement" type="text" placeholder="" required>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Stock</label>
						<div class="controls">
							<input name="stock" type="text"  placeholder="" required>
						</div>
					</div>
					
					<div class="form-actions">
						<button type="submit" class="btn btn-success">Save</button>
                    </div>
				</form></font>
				
			</div>               
		</div> <!-- /container -->	
	</body>
</html>