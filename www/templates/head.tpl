<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Главная | ВебКадеми</title>
    <link rel="stylesheet" href="<?= HOST ?>assets/css/main.css" />

    <link rel="icon" type="image/x-icon" href="<?= HOST ?>assets/img/favicons/favicon.svg" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?= HOST ?>assets/img/favicons/apple-touch-icon.png" />
</head>

<body class="<?php if (isset($_COOKIE['theme']) && $_COOKIE['theme'] === "dark")
    echo ("dark") ?>">