<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Библиотека</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid" >
        <a class="navbar-brand" href="#">Библиотека "READER"</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-sm-2" type="text" placeholder="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Поиск</button>
            </form>
        </div>
    </div>
</nav>
<form method="post">
    <div align="center">
        <button  type="submit" class="btn btn-outline-warning" value="1" name="cat">1-категория</button>
        <button type="submit" class="btn btn-outline-success" value="2" name="cat">2-категория</button>
        <button type="submit" class="btn btn-outline-info" value="3" name="cat">3-категория</button>
        <button type="submit" class="btn btn-outline-success" value="4" name="cat">4-категория</button>
        <button  type="submit" class="btn btn-outline-warning" value="5" name="cat">5-категория</button>
    </div>
</form>
<form>
    <?php
    $cat = $_POST['cat'];
    ?>
    <div class="card text-white bg-warning mb-3">
    <div class="card-header">x-категория</div>
    <div class="card-body">
        <h4 class="card-title">Количество книг:</h4>
        <p class="card-text">первая</p>
        <p class="card-text">вторая</p>
    </div>
    </div>
</form>
<div align="center">
    <button type="button" class="btn btn-outline-warning">Добавить</button>
    <button type="button" class="btn btn-outline-danger">Удалить</button>
</div>
<?php

if (isset($_POST['kat']) && isset($_POST['st'])){

// Переменные с формы
    $kat = $_POST['kat'];
    $st = $_POST['st'];

// Параметры для подключения
    $host = "localhost";
    $user = "root"; // Логин БД
    $pass = ""; // Пароль БД
    $db_name = "бд"; // Имя БД
    $db_table = "категория"; // Имя Таблицы БД

// Подключение к базе данных
//$link = mysqli_connect($host, $user, $pass, $db_name);
    $mysqli = mysqli_connect($host,$user,$pass,$db_name);

// Если есть ошибка соединения, выводим её и убиваем подключение
    if ($mysqli->connect_error) {
        die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }

    $mysqli->set_charset('utf8');

    $result = $mysqli->query("INSERT INTO категория VALUES ('$kat','$st')");

    if ($result == true) echo "Информация занесена в базу данных";
    else echo "Информация не занесена в базу данных";
    echo "</br>";
    $sql = $mysqli->query("SELECT категория, ставка FROM категория");
    while ($result = mysqli_fetch_array($sql)) {
        echo "{$result['категория']}: {$result['ставка']} </br>";
    }
}
?>
</body>
</html>
