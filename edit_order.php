<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Изменить заказ</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <?php
    include 'db_config.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM orders1 WHERE id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
    ?>
    <h2>Изменить заказ</h2>
    <form method="post" action="index.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label>Имя:</label>
        <input type="text" name="customer_name" value="<?php echo $row['customer_name']; ?>" required><br>
        <label>Email:</label>
        <input type="email" name="customer_email" value="<?php echo $row['customer_email']; ?>" required><br>
        <label>Телефон:</label>
        <input type="tel" name="customer_phone" value="<?php echo $row['customer_phone']; ?>" required><br>
        <label>Детали двери:</label>
        <input type="text" name="door_details" value="<?php echo $row['door_details']; ?>" required><br>
        <!-- <input type="submit" name="edit_order" value="Сохранить"> -->
        <button type="submit" name="edit_order">Сохранить</button>
    </form>
    <?php
        } else {
            echo "Заказ не найден.";
        }
    } else {
        echo "Неверные параметры запроса.";
    }

    $conn->close();
    ?>

</body>
</html>
