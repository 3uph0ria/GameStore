<?session_start();
if(!$_SESSION['userId'])
{
    header('Location: /signin/');
    exit;
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/class/Database.php';
$Database = new Database();
$user = $Database->SelectAdmin($_SESSION['userId']);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$title?></title>

   <link rel="icon" href="/img/favicon.ico"/>

    <link href="/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <link href="/css/mdb.min.css" rel="stylesheet">
    <link href="/css/sb-admin-2.css" rel="stylesheet">
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

  	<link href="/css/style.css" rel="stylesheet">

</head>

<body>
<div class=" d-flex m-0 p-0">