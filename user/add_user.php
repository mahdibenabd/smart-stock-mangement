<?php

require '../database.php';
date_default_timezone_set('Africa/Tunis');

if (!empty($_POST)) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $user = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
    $password = $_POST['pass'];

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $check_sql = "SELECT COUNT(*) as count FROM tbl_usr WHERE user = ?";
    $check_query = $pdo->prepare($check_sql);
    $check_query->execute(array($user));
    $result = $check_query->fetch(PDO::FETCH_ASSOC);
    if ($result['count'] > 0) {
        Database::disconnect();
        header("Location: register.php?error=user_exists");
        exit(); 
    }
    $sql = "INSERT INTO tbl_usr (tag_id, user, pass, last_login) VALUES (?, ?, ?, NOW())";
    $q = $pdo->prepare($sql);
    $q->execute(array($id, $user, $hashedPassword));
    Database::disconnect();
    header("Location: index.php");
}
?>
