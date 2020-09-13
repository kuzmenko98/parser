<?php
//// создание нового cURL ресурса
//$ch = curl_init();
//
//// установка URL и других необходимых параметров
//curl_setopt($ch, CURLOPT_URL, "https://www.google.com/");
//curl_setopt($ch, CURLOPT_HEADER, 0);
//
//// загрузка страницы и выдача её браузеру
//curl_exec($ch);
//
//// завершение сеанса и освобождение ресурсов
//curl_close($ch);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@400;500&display=swap" rel="stylesheet">

    <title>Document</title>
</head>
<body>
<div class="wrapper">

    <form action="grab.php" methos="get">
        <h1>Parser</h1>
        <input type="text" placeholder="Введите запрос" name="query">
        <button type="submit">Спарсить</button>
    </form>
</div>
</body>
</html>
