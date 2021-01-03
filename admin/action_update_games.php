<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/action_header.php';

// Проверка прав
if($user['upd_data'] == 0)
{
    header('Location: /admin/');
    exit;
}

// Обновленипе товара
$Database->Updategame($_POST['id'], $_POST['name'], $_POST['cost'], $_POST['amount'], $_POST['img'], $_POST['description'], $_POST['activation'], $_POST['platform'], $_POST['region'], $_POST['category'], $_POST['activation_type']);

// Редирект обратно
$_SESSION['alert'] = 'Изменения успешно сохранены.';
header("Location: ". $_SERVER['HTTP_REFERER']);