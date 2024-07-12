<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Просмотр товаров</title>
</head>
<body>
    <?php
    include 'db_config.php';

    // Define the default number of records per page and the maximum allowed step
    $defaultRecordsPerPage = 5;
    $maxStep = 20;

    // Determine the current page number
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $currentPage = (int)$_GET['page'];
    } else {
        $currentPage = 1; // Default to the first page if no page parameter is set
    }

    // Determine the current records per page (pagination step)
    if (isset($_GET['step']) && is_numeric($_GET['step']) && $_GET['step'] <= $maxStep) {
        $recordsPerPage = (int)$_GET['step'];
    } else {
        $recordsPerPage = $defaultRecordsPerPage; // Use the default value if no step parameter is set or if the value exceeds the maximum
    }

    // Calculate the offset for the LIMIT clause
    $offset = ($currentPage - 1) * $recordsPerPage;

    // Get the total number of records in the table
    $sqlTotalRecords = "SELECT COUNT(*) AS total FROM box";
    $resultTotalRecords = $conn->query($sqlTotalRecords);
    $totalRecords = $resultTotalRecords->fetch_assoc()['total'];

    // Calculate the total number of pages
    $totalPages = ceil($totalRecords / $recordsPerPage);

    // Get the records for the current page
    $sql = "SELECT * FROM box LIMIT $offset, $recordsPerPage";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Your existing code to display each record goes here
             echo "ID: " . $row["id"] . "<br>";
		echo "Код: " . $row["code"] . "<br>";
		echo "url: " . $row["url"] . "<br>";		
		echo "categoryId: " . $row["categoryId"] . "<br>";
		echo "Фото: " . $row["picture"] . "<br>";
		echo "<img height=150 src='" . $row["picture"] . "'>". "<br><br>";
        echo "Название: " . $row["name"] . "<br>";
        echo "Цена: " . $row["price"] . "<br>";
        echo "Описание: " . $row["desctiption"] . "<br><br>";
		echo "Тип материала : " . $row["class1"] . "<br>";
		echo "Остекление: " . $row["class2"] . "<br>";
		echo "Стиль двери: " . $row["class3"] . "<br>";
		echo "Оптовая цена: " . $row["class4"] . "<br>";		
        echo "Размер полотна: " . $row["class5"] . "<br>";
		echo "Артикул: " . $row["class6"] . "<br>";		
		echo "Цвет: " . $row["class7"] . "<br>";
        }
    } else {
        echo "Нет товаров.";
    }

    $conn->close();
    ?>
    <!-- Navigation buttons -->
    <?php if ($currentPage > 1) { ?>
        <a href="?page=<?php echo $currentPage - 1; ?>&step=<?php echo $recordsPerPage; ?>">Предыдущая</a>
    <?php } ?>
    <?php if ($currentPage < $totalPages) { ?>
        <a href="?page=<?php echo $currentPage + 1; ?>&step=<?php echo $recordsPerPage; ?>">Следующая</a>
    <?php } ?>

    <!-- Input field for changing the number of box per page (pagination step) -->
    <form method="get">
        <label>Количество товаров на странице:</label>
        <input type="number" name="step" min="1" max="<?php echo $maxStep; ?>" value="<?php echo $recordsPerPage; ?>" required>
        <input type="submit" value="Применить">
    <!-- Pagination links -->

    </form>
</body>
</html>
