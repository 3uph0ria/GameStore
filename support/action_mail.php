<?php
session_start();
$_SESSION['mail'] = 'mail';
$mail = 's3rgey@bk.ru';       // mail
$subject = $_POST['subject']; // Тема
$message = $_POST['message']; // Сообщение

// На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()
$message = wordwrap($message, 70, "\r\n");

// Отправляем
mail($mail, $subject, $message);

// Редирект обратно
header("Location: ". $_SERVER['HTTP_REFERER']);