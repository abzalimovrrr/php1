<?php   // Perform data validation and error handling as needed


include 'db_config.php'; // Include your database connection code here

if (isset($_POST['register'])) {
    $fio = $_POST['fio'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $login = $_POST['login'];
    $password = $_POST['password'];

    $sql = "INSERT INTO polzovateli (fio, email, phone, login, password)
            VALUES ('$fio', '$email', '$phone', '$login', '$password')";
    if ($conn->query($sql) === TRUE) {
        // Redirect back to index.php after successful registration
        header('Location: index.php');
        exit; // Make sure to exit after the redirection
    } else {
        echo "Ошибка при регистрации: " . $conn->error;
    }
}?>

<?php 
$conn->close();
?>
