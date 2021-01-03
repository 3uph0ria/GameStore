<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/action_header.php';

// Проверка прав
if($user['add_data'] == 0)
{
    header('Location: /admin/');
    exit;
}

// Удаление товара
$Database->DeleteGame($_POST['id']);

// Редирект обратно
$_SESSION['alert'] = 'Игра успешно удалена.';
header("Location: ". $_SERVER['HTTP_REFERER']);