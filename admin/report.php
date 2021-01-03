<?php
$title = "Админ панель";
$catalog = "stats";
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/admin_header.php';
?>
  <!-- Navigation -->
<? require_once $_SERVER['DOCUMENT_ROOT'] . '/include/admin_navbar.php' ?>

  <!-- Games -->
<? require_once $_SERVER['DOCUMENT_ROOT'] . '/include/report.php' ?>

  <!-- Footer -->
<?require_once $_SERVER['DOCUMENT_ROOT'] . '/include/admin_footer.php'?>