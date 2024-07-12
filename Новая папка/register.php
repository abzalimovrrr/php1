<?php
include 'db_config.php'; // Include your database connection code here

if (isset($_POST['register'])) {
  $fio = $_POST['fio'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $login = $_POST['login'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  // Perform data validation and error handling as needed

  $sql = "INSERT INTO polzovateli (fio, email, phone, login, password)
          VALUES ('$fio', '$email', '$phone', '$login', '$password')";
  $conn->query($sql);
  // Redirect to the main page or show a success message
}
?>
