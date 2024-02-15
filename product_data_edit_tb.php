<?php
session_start(); 

if (!isset($_SESSION['user_id'])) {
    header("Location: /user");    exit();
}
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    $pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM tbl_products where id = ?";
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	Database::disconnect();
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

		
		<title>Edit : SMART STOCK MANAGEMENT SYSTEM</title>
		
	</head>
	
	<body>

		<h2 align="center">SMART STOCK MANAGEMENT SYSTEM WITH NodeMCU V3 ESP8266 / ESP12E & PHP & MYSQL Database</h2>
		
		<div class="container">
     
			<div class="center" style="margin: 0 auto; width:495px; border-style: solid; border-color: #f2f2f2;">
				<div class="row">
					<h3 align="center">Edit User Data</h3>
					<p id="defaultGender" hidden><?php echo $data['categorie'];?></p>
				</div>
		 
				<form class="form-horizontal" action="user data edit tb.php?id=<?php echo $id?>" method="post">
					<div class="control-group">
						<label class="control-label">ID</label>
						<div class="controls">
							<input name="id" type="text"  placeholder="" value="<?php echo $data['id'];?>" readonly>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Name</label>
						<div class="controls">
							<input name="name" type="text"  placeholder="" value="<?php echo $data['name'];?>" required>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Gender</label>
						<div class="controls">
							<select name="categorie" id="mySelect">
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
							<input name="emplacement" type="text" placeholder="" value="<?php echo $data['emplacement'];?>" required>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Stock</label>
						<div class="controls">
							<input name="stock" type="text"  placeholder="" value="<?php echo $data['stock'];?>" required>
						</div>
					</div>
					
					<div class="form-actions">
						<button type="submit" class="btn btn-success">Update</button>
						<a class="btn" href="user data.php">Back</a>
					</div>
				</form>
			</div>               
		</div> <!-- /container -->	
		
		<script>
			var g = document.getElementById("defaultGender").innerHTML;
			if(g=="Male") {
				document.getElementById("mySelect").selectedIndex = "0";
			} else {
				document.getElementById("mySelect").selectedIndex = "1";
			}
		</script>
	</body>
</html>