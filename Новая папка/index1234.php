<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Установка межкомнатных дверей</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>



  <header>
    <nav>
      <ul>
        <li><a href="#about">О нас</a></li>
        <li><a href="#services">Услуги</a></li>
        <li><a href="#contact">Контакты</a></li>
<li><a href="index1.html">К1</a></li>
	
      </ul>
    </nav>
  </header>

  <section id="hero">
    <div class="hero-content">
      <h1>Установка межкомнатных дверей под ключ</h1>
      <p>Мы предлагаем качественную установку дверей по доступным ценам.</p>
      <a href="#contact" class="btn">Заказать</a>
    </div>
  </section>

  <section id="about">
    <div class="about-content">
      <h2>О нас</h2>
      <p>Мы команда профессионалов, занимающихся установкой межкомнатных дверей более 10 лет. Наша цель - обеспечить клиентов качественными услугами и удовлетворить их потребности.</p>
    </div>
  </section>

  <section id="services">
    <div class="services-content">
      <h2>Наши услуги</h2>
      <ul>
        <li>Установка межкомнатных дверей</li>
        <li>Замена дверных ручек и замков</li>
        <li>Регулировка и обслуживание дверей</li>
        <li>Консультации по выбору дверей</li>
      </ul>
    </div>
  </section>



  



  <section id="contact">
    <div class="contact-content">
      <h2>Оставьте заявку</h2>
      <form id="orderForm">
        <input type="text" name="customer_name" placeholder="Ваше имя" required>
        <input type="email" name="customer_email" placeholder="Ваш Email" required>
        <input type="tel" name="customer_phone" placeholder="Ваш телефон" required>
        <textarea name="door_details" placeholder="Укажите модель и характеристики двери" required></textarea>
        <button type="submit" class="btn">Отправить</button>

      </form>
    </div>
  </section>


  <h2>Регистрация</h2>

<form method="post" action="process_registration.php">
  <label>FIO:</label>
  <input type="text" name="fio" required><br>
  <label>Email:</label>
  <input type="email" name="email" required><br>
  <label>Phone:</label>
  <input type="tel" name="phone" required><br>
  <label>Login:</label>
  <input type="text" name="login" required><br>
  <label>Password:</label>
  <input type="password" name="password" required><br>
  <input type="submit" name="register" value="Register">
</form>



<form method="post" action="login.php">
  <label>Login:</label>
  <input type="text" name="login" required><br>
  <label>Password:</label>
  <input type="password" name="password" required><br>
  <input type="submit" name="login_submit" value="Login">
</form>

<?php
session_start();
if (isset($_SESSION['user_login'])) {
    echo '<h2>Welcome, ' . $_SESSION['user_login'] . '!</h2>';
}
?>
>


<?php
session_start();
include 'db_config.php'; // Include your database connection code here

if (isset($_POST['submit_review'])) {
  if (!isset($_SESSION['user_id'])) {
    // User not logged in, show error message or redirect to login page
  } else {
    $user_id = $_SESSION['user_id'];
    $review_text = $_POST['review_text'];
    $rating = $_POST['rating'];

    // Perform data validation and error handling as needed

    $sql = "INSERT INTO otzivi (user_id, review_text, rating)
            VALUES ('$user_id', '$review_text', '$rating')";
    $conn->query($sql);
    // You can add code here to handle the database insertion and show success/failure messages
  }
}
?>

<!-- ... Other HTML code ... -->

<form method="post" id="reviewForm">
  <label>Отзывы:</label>
  <textarea name="review_text" required></textarea><br>
  <div class="star-rating">
    <span class="star" data-rating="1"></span>
    <span class="star" data-rating="2"></span>
    <span class="star" data-rating="3"></span>
    <span class="star" data-rating="4"></span>
    <span class="star" data-rating="5"></span>
    <input type="hidden" name="rating" id="ratingInput" required>
  </div>
  <input type="submit" name="submit_review" value="Submit Review">
</form>






<footer>
  <p>© 2023 Установка дверей под ключ</p>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // ... JavaScript code for star rating ...

    $('#reviewForm').submit(function(event) {
      event.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
        type: 'POST',
        url: 'submit_review.php',
        data: formData,
        success: function(response) {
          alert('Review submitted successfully!');
          // You can add code here to reload the reviews section to show the new review immediately
        },
        error: function() {
          alert('Failed to submit review. Please try again.');
        }
      });
    });
  });
</script>

</body>
</html>
