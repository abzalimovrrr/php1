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

// Изменение записи в базе данных
if (isset($_POST['edit_order'])) {
    $id = $_POST['id'];
    $name = $_POST['customer_name'];
    $email = $_POST['customer_email'];
    $phone = $_POST['customer_phone'];
    $details = $_POST['door_details'];

    $sql = "UPDATE orders1 SET customer_name='$name', customer_email='$email', 
            customer_phone='$phone', door_details='$details' WHERE id=$id";
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
  
   <script>
function updateOrderStatus(status, orderId) {
    // Отправка AJAX запроса на сервер для обновления статуса заказа
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Обработка ответа от сервера (можно обновить страницу или выполнить другие действия)
            console.log("Статус заказа обновлен");
        }
    };
    xhttp.open("GET", "update_order_status.php?status=" + status + "&id=" + orderId, true); // Путь к файлу для обновления статуса
    xhttp.send();
}
</script>



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
            <th>Состояние заказа</th>
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
                echo '<select name="order_status" onchange="updateOrderStatus(this.value, ' . $row['id'] . ')">';
                echo '<option value="Заказано">Заказано</option>';
                echo '<option value="Оплачено">Оплачено</option>';
                echo '<option value="В рассмотрении">В рассмотрении</option>';
                echo '</select>';
                echo '</td>';
                echo '<td>';
              

                echo '<a href="index.php?delete_order=' . $row['id'] . '">
<?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
<svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10 11V17" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M14 11V17" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M4 7H20" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
</a>  ';
                echo '<a href="edit_order.php?id=' . $row['id'] . '">


                <?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                <svg width="30px" height="30px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.7 5.12758L19.266 6.37458C19.4172 6.51691 19.5025 6.71571 19.5013 6.92339C19.5002 7.13106 19.4128 7.32892 19.26 7.46958L18.07 8.89358L14.021 13.7226C13.9501 13.8037 13.8558 13.8607 13.751 13.8856L11.651 14.3616C11.3755 14.3754 11.1356 14.1751 11.1 13.9016V11.7436C11.1071 11.6395 11.149 11.5409 11.219 11.4636L15.193 6.97058L16.557 5.34158C16.8268 4.98786 17.3204 4.89545 17.7 5.12758Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12.033 7.61865C12.4472 7.61865 12.783 7.28287 12.783 6.86865C12.783 6.45444 12.4472 6.11865 12.033 6.11865V7.61865ZM9.23301 6.86865V6.11865L9.23121 6.11865L9.23301 6.86865ZM5.50001 10.6187H6.25001L6.25001 10.617L5.50001 10.6187ZM5.50001 16.2437L6.25001 16.2453V16.2437H5.50001ZM9.23301 19.9937L9.23121 20.7437H9.23301V19.9937ZM14.833 19.9937V20.7437L14.8348 20.7437L14.833 19.9937ZM18.566 16.2437H17.816L17.816 16.2453L18.566 16.2437ZM19.316 12.4937C19.316 12.0794 18.9802 11.7437 18.566 11.7437C18.1518 11.7437 17.816 12.0794 17.816 12.4937H19.316ZM15.8863 6.68446C15.7282 6.30159 15.2897 6.11934 14.9068 6.2774C14.5239 6.43546 14.3417 6.87397 14.4998 7.25684L15.8863 6.68446ZM18.2319 9.62197C18.6363 9.53257 18.8917 9.13222 18.8023 8.72777C18.7129 8.32332 18.3126 8.06792 17.9081 8.15733L18.2319 9.62197ZM8.30001 16.4317C7.8858 16.4317 7.55001 16.7674 7.55001 17.1817C7.55001 17.5959 7.8858 17.9317 8.30001 17.9317V16.4317ZM15.767 17.9317C16.1812 17.9317 16.517 17.5959 16.517 17.1817C16.517 16.7674 16.1812 16.4317 15.767 16.4317V17.9317ZM12.033 6.11865H9.23301V7.61865H12.033V6.11865ZM9.23121 6.11865C6.75081 6.12461 4.7447 8.13986 4.75001 10.6203L6.25001 10.617C6.24647 8.96492 7.58269 7.62262 9.23481 7.61865L9.23121 6.11865ZM4.75001 10.6187V16.2437H6.25001V10.6187H4.75001ZM4.75001 16.242C4.7447 18.7224 6.75081 20.7377 9.23121 20.7437L9.23481 19.2437C7.58269 19.2397 6.24647 17.8974 6.25001 16.2453L4.75001 16.242ZM9.23301 20.7437H14.833V19.2437H9.23301V20.7437ZM14.8348 20.7437C17.3152 20.7377 19.3213 18.7224 19.316 16.242L17.816 16.2453C17.8195 17.8974 16.4833 19.2397 14.8312 19.2437L14.8348 20.7437ZM19.316 16.2437V12.4937H17.816V16.2437H19.316ZM14.4998 7.25684C14.6947 7.72897 15.0923 8.39815 15.6866 8.91521C16.2944 9.44412 17.1679 9.85718 18.2319 9.62197L17.9081 8.15733C17.4431 8.26012 17.0391 8.10369 16.6712 7.7836C16.2897 7.45165 16.0134 6.99233 15.8863 6.68446L14.4998 7.25684ZM8.30001 17.9317H15.767V16.4317H8.30001V17.9317Z" fill="#ffffff"/>
                </svg>    
</a>  ';
                echo '</td>';
                echo '</tr>';
            }
                
            
        } else {
            echo '<tr><td colspan="7">Нет заказов.</td></tr>';
        }
        echo '<a href="add_order.php">Добавить</a>  ';
        echo '<a href="add_order.php" style="float: right;"><svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.5 22V14.0833V7M7 14.5L22 14.5M2 13.6848V7C2 4.23858 4.23858 2 7 2H22C24.7614 2 27 4.23858 27 7V22C27 24.7614 24.7614 27 22 27H7C4.23858 27 2 24.7614 2 22V13.6848Z" stroke="white" stroke-width="4" stroke-linejoin="round"/>
                </svg></a>';

        ?>
    </table>

    <a href="add_order.php" style="float: right;"> <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.5 22V14.0833V7M7 14.5L22 14.5M2 13.6848V7C2 4.23858 4.23858 2 7 2H22C24.7614 2 27 4.23858 27 7V22C27 24.7614 24.7614 27 22 27H7C4.23858 27 2 24.7614 2 22V13.6848Z" stroke="white" stroke-width="4" stroke-linejoin="round"/>
                </svg></a>
<meta charset="UTF-8">
    <!-- Форма добавления записи -->
    <h2>Добавить заказ</h2>
    <form method="post">
        <input required type=="text" name="customer_name" placeholder="Введите имя*"  id="name" required>
        <input type="email" name="customer_email" placeholder="Введите Email*"  required>
        <input type="tel" name="customer_phone" placeholder="Введите телефон*"  required>
        <input type="text" name="door_details"  placeholder="Введите детали двери:*" required>
        <!-- <input type="submit" name="add_order" value="Добавить"> -->
        <button type="submit" name="add_order"> <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.5 22V14.0833V7M7 14.5L22 14.5M2 13.6848V7C2 4.23858 4.23858 2 7 2H22C24.7614 2 27 4.23858 27 7V22C27 24.7614 24.7614 27 22 27H7C4.23858 27 2 24.7614 2 22V13.6848Z" stroke="white" stroke-width="4" stroke-linejoin="round"/>
                </svg></button>

    </form>
<meta charset="UTF-8">
    <!-- Форма изменения записи
    <h2>Изменить заказ</h2> -->
    <form method="post" id="editForm" style="display: none;">
        <input type="hidden" name="id" id="orderId">
        <label>Имя:</label>
        <input type="text" name="customer_name" id="customer_name" required><br>
        <label>Email:</label>
        <input type="email" name="customer_email" id="customer_email" required><br>
        <label>Телефон:</label>
        <input type="tel" name="customer_phone" id="customer_phone" required><br>
        <label>Детали двери:</label>
        <input type="text" name="door_details" id="door_details" required><br>
        <input type="submit" name="edit_order" value="Сохранить">
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







