<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/action_header.php';
// Проверка прав
if($user['add_data'] == 0)
{
    header('Location: /admin/');
    exit;
}

// Добавляем товар в БД
$Database->AddGame($_POST['name'], $_POST['cost'], $_POST['amount'], $_POST['img'], $_POST['description'], $_POST['activation'], $_POST['platform'], $_POST['region'], $_POST['category'], $_POST['activation_type']);

// Редирект обратно
$_SESSION['alert'] = 'Игра успешно добавлена.';
header("Location: ". $_SERVER['HTTP_REFERER']);