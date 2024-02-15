<?php
     
require '../database.php';
date_default_timezone_set('Africa/Tunis');

if (!empty($_POST)) {
    // keep track post values
    $mail = $_POST['mail'];
    $user = $_POST['user'];
    $password = $_POST['pass'];
    $current_time = date('d-m-y H:i:s');

    // Check if the user already exists
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $check_sql = "SELECT COUNT(*) as count FROM tbl_usr WHERE user = ?";
    $check_query = $pdo->prepare($check_sql);
    $check_query->execute(array($user));
    $result = $check_query->fetch(PDO::FETCH_ASSOC);
    if ($result['count'] > 0) {
        // User already exists, handle the situation accordingly
        // For example, you can redirect back to the registration page with an error message
        // You can customize this based on your application's requirements
        Database::disconnect();
        header("Location: register.php?error=user_exists");
        exit(); // Stop further execution
    }

    // insert data
    $sql = "INSERT INTO tbl_usr (mail,user,pass,last_login) VALUES (?, ?, ?, ?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($mail, $user, $password, $current_time));
    Database::disconnect();
    header("Location: index.php");
}
?>
