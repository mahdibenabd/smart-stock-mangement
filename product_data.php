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

		
		<title>User Data : SMART STOCK MANAGEMENT SYSTEM</title>
	</head>
	
	<body>
<h2 align="center"><font color="white">RFID STOCK MANAGEMENT WITH NodeMCU V3 ESP8266 / ESP12E & PHP & MYSQL Database</font></h2>		<?php require_once 'header.php'; ?>
		<br>
		<div class="container">
            <div class="row">
                <h3><font color="white">Product Data Table</font></h3>
            </div>
            <div class="row">
                <table class="table table-striped table-bordered" style="background-color:#669999">
                  <thead>
                    <tr bgcolor="#0066cc" color="#FFFFFF">
                      <th>Name</th>
                      <th>ID</th>
					  <th>Categorie</th>
					  <th>Emplacement</th>
                      <th>Stock</th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM tbl_products ORDER BY name ASC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['id'] . '</td>';
                            echo '<td>'. $row['categorie'] . '</td>';
							echo '<td>'. $row['emplacement'] . '</td>';
							echo '<td>'. $row['stock'] . '</td>';
							echo '<td><a class="btn btn-success" href="product_data_edit_page.php?id='.$row['id'].'">Edit</a>';
							echo ' ';
							echo '<a class="btn btn-danger" href="product_data_delete_page.php?id='.$row['id'].'">Delete</a>';
							echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
				</table>
			</div>
		</div> <!-- /container -->
	</body>
</html>