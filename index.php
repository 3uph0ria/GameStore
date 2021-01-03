<?php
require_once  'include/class/Database.php';
$Database = new Database();

$title = "game-store";
require_once 'include/header.php';
?>

<!-- Navigation -->
<?
$directory = 'home';
require_once 'include/navbar.php';
?>

<!-- Carousel -->
<?require_once 'include/carousel.php'?>

<!-- Catalog -->
<?require_once 'include/catalog_mini.php'?>

<!-- Stock -->
<?require_once 'include/stock.php'?>

<!-- Footer -->
<?require_once 'include/footer.php'?>
