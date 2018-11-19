<?php
// работа с данным скриптом показана в видео на сайте http://rek9.ru/otpravka-zayavok-v-google-forms/
// формируем запись в таблицу google (изменить)
$url = "https://docs.google.com/forms/d/e/1FAIpQLSfdno1w6Ia3JTg4hfsF4I2we7Fny9Zg1KkT-FuCkiBhSGY3cA/formResponse";
// сохраняем url, с которого была отправлена форма в переменную utm
$utm = $_SERVER["HTTP_REFERER"];
// ссылка для переадресации (изменить)
$link = "thank__page.html";

// массив данных (изменить entry, draft и fbzx)
$post_data = array (
 "entry.462497621" => $_POST['mark'],
 "entry.214321240" => $_POST['phone'],
 "entry.1731200902" => $_POST['what__problem'],
 "entry.940358586" => $_POST['data__time'],
 "draftResponse" => "[null,null,&quot;-3915010191327056463&quot;]",
 "pageHistory" => "0",
 "fbzx" => "-3915010191327056463"
);

// Далее не трогать
// с помощью CURL заносим данные в таблицу google
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// указываем, что у нас POST запрос
curl_setopt($ch, CURLOPT_POST, 1);
// добавляем переменные
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
//заполняем таблицу google
$output = curl_exec($ch);
curl_close($ch);

//перенаправляем браузер пользователя на скачивание оффера по нашей ссылке
header('Location: '.$link);
?>