<?session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$title?></title>

   <link rel="icon" href="/img/favicon.ico"/>

  <script>
      if (window.XMLHttpRequest) {
          xhr = new XMLHttpRequest();
          xhr2 = new XMLHttpRequest();
      } else {
          xhr = new ActiveXObject("Microsoft.XMLHTTP");
          xhr2 = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xhr.open("GET",'/vendor/bootstrap/css/bootstrap.min.css',false);
      xhr.send();
      var lazyStyle = document.createElement('style');
      lazyStyle.innerHTML = xhr.responseText;
      document.head.appendChild(lazyStyle);

  </script>

  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">

</head>

<body>