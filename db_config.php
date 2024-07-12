<?php
// Пример записи данных в базу данных MySQL
//$servername = "localhost";
//$username = "m98762oq_bd";
//$password = "Abz35907xyz";
//$dbname = "m98762oq_bd";


// Параметры подключения к базе данных
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "m98762oq_bd";
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
