<?php
session_start(); // Start the session

require '../database.php';
date_default_timezone_set('Africa/Tunis');

if (!empty($_POST['user']) && !empty($_POST['pass'])) {
    $user = $_POST['user'];
    $password = $_POST['pass'];

    // Check if the user exists in the database
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $login_sql = "SELECT * FROM tbl_usr WHERE user = ? AND pass = ?";
    $login_query = $pdo->prepare($login_sql);
    $login_query->execute(array($user, $password));
    $user_row = $login_query->fetch(PDO::FETCH_ASSOC);

    if ($user_row) {
        // User exists and password is correct, create session and redirect to index page
        $_SESSION['user_id'] = $user_row['id']; // Assuming 'id' is the primary key column of tbl_usr
        $_SESSION['user'] = $user_row['user'];
        Database::disconnect();
        header("Location: ../index.php");
        exit();
    } else {
        // Invalid username or password, redirect back to the login page with an error message
        Database::disconnect();
        header("Location: login.php?error=invalid_credentials");
        exit();
    }
} else {
    // If the user or password fields are empty, redirect back to the login page with an error message
    header("Location: login.php?error=empty_fields");
    exit();
}
?>
