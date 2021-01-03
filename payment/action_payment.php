<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/class/Database.php';
$Database = new Database();
$game = $Database->SelectGame($_POST['gameId']);
if($game['amount'] > 0)
{
    $title = "Оплата " . $game['name'];

// Генерируем ключ
    $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
    $max = 25;
    $size = StrLen($chars);
    while ($max--) $key .= $chars[rand(0, $size)];

    $subject = 'Покупка в магазине game-store'; // Тема
    $message = "Добрый день, благодарим Вас за покупку в нашем магазине! Вы успешно приобрели ключ {$key} от игры {$game['name']} за {$game['cost']} руб"; // Сообщение

// На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()
    $message = wordwrap($message, 70, "\r\n");

// email покупателя
    $mail = $_POST['email'];

// Отправляем
    mail($mail, $subject, $message);

    $Database->AddSale($_POST['gameId'], date('Y-m-d H:i:s'));
    $Database->UpdateGame($game['id'], $game['name'], $game['cost'], $game['amount'] - 1, $game['img'], $game['description'], $game['activation'], $game['platform'], $game['region'], $game['category'], $game['activation_type']);

// Сообщение при успешной покупке
    $_SESSION['alert'] = 'Вы успешно купили игру, проверьте почту, которую указали при покупке.';

// Редирект обратно
    header("Location: ". $_SERVER['HTTP_REFERER']);
}
else
{
    $_SESSION['alert'] = 'Данный товар закончился.';

// Редирект обратно
    header("Location: ". $_SERVER['HTTP_REFERER']);
}
