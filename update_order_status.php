<?php
// Подключение к базе данных
include 'db_config.php';

// Получение нового статуса и ID заказа
$status = $_GET['status']; // Получение нового статуса
$orderId = $_GET['id']; // Получение ID заказа

// Обновление статуса заказа в базе данных
$sql = "UPDATE orders1 SET order_status='$status' WHERE id='$orderId'";

if ($conn->query($sql) === TRUE) {
    echo "Статус заказа успешно обновлен на: " . $status;
} else {
    echo "Ошибка при обновлении статуса заказа: " . $conn->error;
}

// Закрытие соединения с базой данных
$conn->close();
?>

