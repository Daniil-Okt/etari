<?php 
// ОТПРАВКА В ТЕЛЕГРАММ
// ==================================================================================================================
   $site = 'ETARi';
   $name = $_POST['name'];
   $phone = $_POST['tel'];
   //Отправка в Telegram
  
   $token = "6966371200:AAFYk2rC6BOLs7u_NcM5gUbyjzTBcZiShhU";
   
   $chat_id = "-1002047852405";
  
   // Формирование текста сообщения
  $message = "Заявка с сайта: $site\n";
  $message .= "Имя пользователя: $name\n";
  $message .= "Телефон: $phone\n";
  // Добавьте еще необходимые поля в сообщение, если нужно
  
  // Отправка запроса в Телеграм
  $url = "https://api.telegram.org/bot$token/sendMessage";
  $data = array(
      'chat_id' => $chat_id,
      'text' => $message
  );
  
  $options = array(
      'http' => array(
          'method' => 'POST',
          'header' => "Content-Type:application/x-www-form-urlencoded\r\n",
          'content' => http_build_query($data)
      )
  );
  
  $context = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  
  if ($result === false) {
    // Обработка ошибки
    echo "Ошибка при отправке заявки в Телеграм.";
  } else {
    // Успешная отправка
    echo "Заявка успешно отправлена в Телеграм.";
  }


// Отображение результата
echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);

if ($sendToTelegram) {$result = "success";} 
else {$result = "error";}

?>