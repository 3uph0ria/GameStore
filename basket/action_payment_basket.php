<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/class/Database.php';
$Database = new Database();
$message = "Добрый день, благодарим Вас за покупку в нашем магазине!\n";
foreach($_SESSION['basket'] as $games)
{
    $game = $Database->SelectGame($games);
    if($game && $game['amount'] > 0)
    {
        // Генерируем ключ
        $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
        $max = 25;
        $size = StrLen($chars);
        while ($max--) $key .= $chars[rand(0, $size)];

        $message .= "Вы успешно приобрели ключ {$key} от игры {$game['name']} за {$game['cost']} руб \n"; // Сообщение

        // Обновляем данные
        $Database->AddSale($game['id'], date('Y-m-d H:i:s'));
        $Database->UpdateGame($game['id'], $game['name'], $game['cost'], $game['amount'] - 1, $game['img'], $game['description'], $game['activation'], $game['platform'], $game['region'], $game['category'], $game['activation_type']);
        echo "удаляю индеккс " . key($_SESSION['basket']);
    }
}
echo "отправляю письмо";
$mail = $_POST['email'];
$subject = 'Покупка в магазине game-store'; // Тема
// На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()
$message = wordwrap($message, 70, "\r\n");
mail($mail, $subject, $message);

// Сообщение при успешной покупке
$_SESSION['alert'] = 'Вы успешно оплатили заказ, проверьте почту, которую указали при покупке.';
unset($_SESSION['basket']); // чистим корзину


// Редирект обратно
header("Location: ". $_SERVER['HTTP_REFERER']);
