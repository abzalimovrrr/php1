<?php
session_start();
include 'db_config.php'; // Include your database connection code here

if (isset($_POST['login_submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Perform data validation and error handling as needed

    $sql = "SELECT * FROM polzovateli WHERE login='$login'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_login'] = $row['login'];
            // Redirect the user to the main page or any other page after successful login
            header('Location: index.php');
            exit();
        } else {
            echo '<script>alert("Invalid login or password. Please try again.");</script>';
        }
    } else {
        echo '<script>alert("Invalid login or password. Please try again.");</script>';
    }
}
?>
