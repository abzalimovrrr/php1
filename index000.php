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
    $conn->query($sql);
}

// Удаление записи из базы данных
if (isset($_GET['delete_order'])) {
    $id = $_GET['delete_order'];

    $sql = "DELETE FROM orders1 WHERE id=$id";
    $conn->query($sql);
}


$sql = "SELECT * FROM orders1";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-8">
    <title>Просмотр заказов</title>
   <link rel="stylesheet" type="text/css" href="styles.css">
  
</head>
<body>
    <h2>Список заказов</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Email</th>
            <th>Телефон</th>
            <th>Детали двери</th>
            <th>Дата заказа</th>
            <th>Действия</th>
        </tr>
        <?php // рисунок таблицы + инфа из базы данных
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['customer_name'] . '</td>';
                echo '<td>' . $row['customer_email'] . '</td>';
                echo '<td>' . $row['customer_phone'] . '</td>';
                echo '<td>' . $row['door_details'] . '</td>';
                echo '<td>' . $row['order_date'] . '</td>';
                echo '<td>';
                echo '<a href="view_orders5.php?delete_order=' . $row['id'] . '">Удалить</a> | ';
                echo '<a href="edit_order.php?id=' . $row['id'] . '">Изменить</a> | ';
				echo '<a href="add_order.php?id=' . $row['id'] . '">Изменить</a> | ';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="7">Нет заказов.</td></tr>';
        }
        ?>
    </table>
<meta charset="UTF-8">
    <!-- Форма добавления записи -->
    <h2>Добавить заказ</h2>
    <form method="post">
        <input required type=="text" name="customer_name" placeholder="Введите имя*"  id="name" required>
        <input type="email" name="customer_email" placeholder="Введите Email*"  required>
        <input type="tel" name="customer_phone" placeholder="Введите телефон*"  required>
        <input type="text" name="door_details"  placeholder="Введите детали двери:*" required>
        <input type="submit" name="add_order" value="Добавить">
    </form>
<meta charset="UTF-8">

    <script>
        function showEditForm(orderId) {
            var editForm = document.getElementById('editForm');
            var customer_name = document.getElementById('customer_name');
            var customer_email = document.getElementById('customer_email');
            var customer_phone = document.getElementById('customer_phone');
            var door_details = document.getElementById('door_details');

            editForm.style.display = 'block';
            customer_name.value = document.getElementById('customer_name_' + orderId).innerText;
            customer_email.value = document.getElementById('customer_email_' + orderId).innerText;
            customer_phone.value = document.getElementById('customer_phone_' + orderId).innerText;
            door_details.value = document.getElementById('door_details_' + orderId).innerText;

            document.getElementById('orderId').value = orderId;
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>