<?php
session_start();
if(!$_SESSION['userId'])
{
    header('Location: /signin/');
    exit;
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/class/Database.php';
$Database = new Database();
$user = $Database->SelectAdmin($_SESSION['userId']);