<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Добавить заказ</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<h2>Добавить заказ</h2>
<form method="post">
    <input required type="text" name="customer_name" placeholder="Введите имя*" id="name" required><br>
    <input type="email" name="customer_email" placeholder="Введите Email*" required><br>
    <input type="tel" name="customer_phone" placeholder="Введите телефон*" required><br>
    <input type="text" name="door_details" placeholder="Введите детали двери:*" required><br>
    <!-- <input type="submit" name="add_order" value="Добавить"> -->
    <button type="submit" name="add_order">Добавить</button>
</form>

<?php
include 'db_config.php';

// Добавление записи в базу данных
if (isset($_POST['add_order'])) {
    $name = $_POST['customer_name'];
    $email = $_POST['customer_email'];
    $phone = $_POST['customer_phone'];
    $details = $_POST['door_details'];

    $sql = "INSERT INTO orders1 (customer_name, customer_email, customer_phone, door_details, order_date)
            VALUES ('$name', '$email', '$phone', '$details', NOW())";
    
    if ($conn->query($sql) === TRUE) {
        // Успешное добавление, перенаправление на index.php
        header("Location: index.php");
        exit; // Важно завершить выполнение кода после перенаправления
    } else {
        echo "Ошибка при добавлении заказа: " . $conn->error;
    }
}

$conn->close();
?>

</body>
</html>
