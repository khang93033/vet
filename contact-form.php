<?php

/* Задаем переменные */
$name = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars($_POST["email"]);
$tel = htmlspecialchars($_POST["tel"]);
$city = htmlspecialchars($_POST["city"]);
$message = htmlspecialchars($_POST["message"]);
$bezspama = htmlspecialchars($_POST["bezspama"]);

/* Ваш адрес и тема сообщения */
$address = "vatechsite@yandex.ru";
$sub = "Регистрация на конференцию";

/* Формат письма */
$mes = "Регистрация на конференцию .\n
Имя отправителя: $name 
Электронный адрес отправителя: $email
Телефон отправителя: $tel
Город отправителя: $city
Текст сообщения:
$message";


if (empty($bezspama)) /* Оценка поля bezspama - должно быть пустым*/
{
/* Отправляем сообщение, используя mail() функцию */
$from = "Reply-To: $email \r\n";
if (mail($address, $sub, $mes, $from)) {
	header('Refresh: 5; URL=http://vatechrussia.com');
	echo '<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>Письмо отправлено, через 5 секунд Вы будете направлены на сайт www.vatechrussia.com</body>';}
else {
	header('Refresh: 5; URL=http://xn--80adku2b.xn--p1ai/');
	echo '<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>Письмо не отправлено, через 5 секунд вы вернетесь на страницу регистрации</body>';}
}
exit; /* Выход без сообщения, если поле bezspama чем-то заполнено */
?>