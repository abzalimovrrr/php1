document.getElementById("orderForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Отменяем стандартное поведение формы (перезагрузка страницы)
  
    // Получаем данные из формы
    const formData = new FormData(this);
  
    // Создаем объект запроса
    const xhr = new XMLHttpRequest();
  
    // Указываем URL для обработки данных на сервере
    const url = "process_order.php";
  
    // Устанавливаем метод POST и URL для отправки запроса
    xhr.open("POST", url, true);
  
    // Устанавливаем обработчик события для ответа от сервера
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // Здесь можно обработать ответ от сервера после успешной обработки данных
          // Например, показать сообщение об успешной отправке или обработать полученные данные
          console.log(xhr.responseText);
        } else {
          // Здесь можно обработать ошибку при обработке данных на сервере
          console.error("Ошибка при обработке данных на сервере.");
        }
      }
    };
  
    // Отправляем запрос на сервер с данными из формы
    xhr.send(formData);
  });
  