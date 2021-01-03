<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/action_header.php';

// Проверка прав
if($user['upd_data'] == 0)
{
    header('Location: /admin/');
    exit;
}

$idGame = explode(" (", $_POST['id_game']);

// Обновленипе товара
$Database->UpdateStock($idGame[0], $_POST['description'], $_POST['img']);

// Редирект обратно
$_SESSION['alert'] = 'Изменения успешно сохранены.';
header("Location: ". $_SERVER['HTTP_REFERER']);
