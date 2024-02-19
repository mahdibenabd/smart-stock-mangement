<?php
     
    require 'database.php';
 
    if (!empty($_POST)) {
        $name = $_POST['name'];
        $id = $_POST['id'];
        $categorie = $_POST['categorie'];
        $emp = $_POST['emplacement'];
        $stock = $_POST['stock'];
        
        // Check if ID already exists
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $checkSql = "SELECT COUNT(*) AS count FROM tbl_products WHERE id = :id";
        $checkStmt = $pdo->prepare($checkSql);
        $checkStmt->bindParam(':id', $id);
        $checkStmt->execute();
        $row = $checkStmt->fetch(PDO::FETCH_ASSOC);
        if ($row['count'] > 0) {
            Database::disconnect();
        header("Location: add_product.php?error=id_exists");
        exit(); // Stop further execution
        }
        
        // Insert data
        $insertSql = "INSERT INTO tbl_products (name, id, categorie, emplacement, stock) VALUES (:name, :id, :categorie, :emp, :stock)";
        $insertStmt = $pdo->prepare($insertSql);
        $insertStmt->bindParam(':name', $name);
        $insertStmt->bindParam(':id', $id);
        $insertStmt->bindParam(':categorie', $categorie);
        $insertStmt->bindParam(':emp', $emp);
        $insertStmt->bindParam(':stock', $stock);
        $insertStmt->execute();
        
        Database::disconnect();
        header("Location: product_data.php");
    }
?>
