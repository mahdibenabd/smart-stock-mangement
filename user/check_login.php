<?php
session_start(); // Start the session

require '../database.php';
date_default_timezone_set('Africa/Tunis');

$type = $_REQUEST['type'];

if ($type == 1) {
    $id = null;
    if (!empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $login_sql = "SELECT * FROM tbl_usr WHERE tag_id = ?";
    $login_query = $pdo->prepare($login_sql);
    $login_query->execute(array($id));
    $user_row = $login_query->fetch(PDO::FETCH_ASSOC);

    if ($user_row) {
        $_SESSION['user_id'] = $user_row['id'];
        $_SESSION['user'] = $user_row['user'];
        Database::disconnect();
        header("Location: ../index.php");
        exit();
    } else {
        Database::disconnect();
        header("Location: index.php?error=invalid_credentials");
        exit();
    }
} else {
    if (!empty($_POST['user']) && !empty($_POST['pass'])) {
        $user = $_POST['user'];
        $password = $_POST['pass'];
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $login_sql = "SELECT * FROM tbl_usr WHERE user = ?";
        $login_query = $pdo->prepare($login_sql);
        $login_query->execute(array($user));
        $user_row = $login_query->fetch(PDO::FETCH_ASSOC);

        if ($user_row && strcmp($hashedPassword, $user_row['pass'])) {
            $_SESSION['user_id'] = $user_row['id'];
            $_SESSION['user'] = $user_row['user'];
            Database::disconnect();
            header("Location: ../index.php");
            exit();
        } else {
            Database::disconnect();
            header("Location: index.php?error=invalid_credentials");
            exit();
        }
    } else {
        header("Location: index.php?error=empty_fields");
        exit();
    }
}
?>
