<?php
session_start();
if($_GET['id']) {
    if($_GET['method'] == 'add')
    {
        $check = false;
        foreach($_SESSION['basket'] as $id)
        {
            if($id == $_GET['id']) $check = true;
        }
        if($check == false)
        {
            $_SESSION['basket'][] = $_GET['id'];
        }
        header('Location: /basket/');
    }
    else if($_GET['method'] == 'delete')
    {
        unset($_SESSION['basket'][$_GET['index']]);
        header('Location: /basket/');
    }
}