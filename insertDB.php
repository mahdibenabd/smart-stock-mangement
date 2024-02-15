<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track post values
        $name = $_POST['name'];
		$id = $_POST['id'];
		$categorie = $_POST['categorie'];
        $emp = $_POST['emplacement'];
        $stock = $_POST['stock'];
        
		// insert data
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO tbl_products (name,id,categorie,emplacement,stock) values(?, ?, ?, ?, ?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($name,$id,$categorie,$emp,$stock));
		Database::disconnect();
		header("Location: user data.php");
    }
?>