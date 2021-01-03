<?php
if(!$_GET['id']) die('No data');

require_once $_SERVER['DOCUMENT_ROOT'] . '/include/class/Database.php';
$Database = new Database();
$game = $Database->SelectGame($_GET['id']);
$title = "Купить " . $game['name'];
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php';
?>
<!-- Navigation -->
<? require_once $_SERVER['DOCUMENT_ROOT'] . '/include/navbar.php' ?>

<!-- Game -->
<? require_once $_SERVER['DOCUMENT_ROOT'] . '/include/payment.php' ?>

<!-- Footer -->
<?require_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php'?>
