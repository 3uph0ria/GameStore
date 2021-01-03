<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/include/class/Database.php';
$Database = new Database();
$title = "Корзина";
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php';
?>
<!-- Navigation -->
<?
$directory = 'basket';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/navbar.php'
?>

<!-- Game -->
<? require_once $_SERVER['DOCUMENT_ROOT'] . '/include/basket.php' ?>

<!-- Footer -->
<?require_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php'?>
