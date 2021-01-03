<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/include/class/Database.php';
$Database = new Database();

$title = "Каталог";
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php';
?>
    <!-- Navigation -->
<?
$directory = 'catalog';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/navbar.php';
?>

    <!-- Game -->
<? require_once $_SERVER['DOCUMENT_ROOT'] . '/include/catalog.php' ?>

    <!-- Footer -->
<?require_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php'?>