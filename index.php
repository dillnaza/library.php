<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Библиотека</title>
</head>

<body>
<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db_name = "baza";
    $db_table = "category";

    $mysqli = mysqli_connect($host,$user,$pass,$db_name);

    if ($mysqli->connect_error) {
        die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }

    $mysqli->set_charset('utf8');
?>

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
                <button class="btn btn-secondary my-2 my-sm-0" type="submit" id="butt">Поиск</button>
            </form>
        </div>
    </div>
</nav>

<form>
    <div align="center" id="butt">
        <input  type="button" class="btn btn-outline-warning" value="1-категория" name="cat[]" onclick="opForm()">
        <input type="button" class="btn btn-outline-success" value="2-категория" name="cat[]" onclick="opForm()">
        <input type="button" class="btn btn-outline-info" value="3-категория" name="cat[]" onclick="opForm()">
        <input type="button" class="btn btn-outline-success" value="4-категория" name="cat[]" onclick="opForm()">
        <input  type="button" class="btn btn-outline-warning" value="5-категория" name="cat[]" onclick="opForm()">
    </div>
</form>

<form id="Form">
    <script>
        let ind;
        function ins(e){
            let o = document.getElementsByName('cat[]');
            let l = o.length;
            let i;
            for (i=0; i<l; i++)
                if (o[i] == e) {ind = i; break;}
            alert(ind);
        }
    </script>
    <div class="card text-white bg-warning mb-3">
        <div class="card-header">1-категория</div>
        <div class="card-body">
            <h4 class="card-title">Количество книг:
            <?php
            $sqlCount=$mysqli->query("SELECT category.category, Count(name) AS Cname
FROM category INNER JOIN book ON category.count = book.category
GROUP BY category.category
HAVING ((category.category)=1)");
            while ($resul = mysqli_fetch_array($sqlCount))
            echo "{$resul['Cname']} </br>";"</h4>";
            $sql = $mysqli->query("SELECT category.count, book.name
FROM category INNER JOIN book ON category.count = book.category
WHERE ((category.count)=1);");
            while ($result = mysqli_fetch_array($sql))
                echo "{$result['name']} </br>";
            ?>
        </div>
    </div>
</form>

<form>
    <button type="button" class="btn btn-outline-warning" onclick="openForm()">Добавить/Удалить</button>
</form>

<div class="modal-content rounded-5 shadow" style="display: none; position: fixed">
    <div class="modal-header p-5 pb-4 border-bottom-0"
    <form id="mForm">
        <h4 class="fw-bold mb-0">Добавление/Удаление данных</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeForm()"></button>
    </div>

        <div class="modal-body p-5 pt-0">
                <div>
                    <input type="text" id="bookInput"><label for="bookInput"> Называние книги</label>
                </div>
                <div>
                    <input type="text" id="catInput"><label for="catInput">Категория книги</label>
                </div>
                <button type="button" class="btn btn-outline-warning" onclick="reForm()">Добавить</button>
                <button type="button" class="btn btn-outline-danger" onclick="openedForm()">Удалить</button>
        </div>
    </div>

    <script>
        function opForm() {
            document.getElementById("Form").style.display = "block";
        }

        function reForm() {
            let book = document.getElementById('bookInput').value;
            let cat=document.getElementById('catInput').value;
            document.getElementById("mForm").style.display = "block";
            <?php
            $add = $mysqli->query("INSERT INTO `book`(`count`, `name`, `category`) VALUES ('10','вино из одуванциков','1')");

            if ($add == true) echo "Информация занесена в базу данных";
            else echo "Информация не занесена в базу данных";
            echo "</br>";
            ?>
            document.getElementById('bookInput').value = "";
            document.getElementById('catInput').value = "";
        }

        function openForm() {
            document.getElementById("mForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("mForm").style.display = "none";
            document.getElementById('bookInput').value = "";
            document.getElementById('catInput').value = "";
        }

        function openedForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closedForm() {
            document.getElementById("myForm").style.display = "none";
            document.getElementById('bookInput').value = "";
            document.getElementById('catInput').value = "";
        }
    </script>

</form>

<div class="modal-content rounded-4 shadow" id="myForm" style="display: none; position: fixed">
    <div class="modal-body p-4 text-center">
        <h5 class="mb-0">Удаление</h5>
        <p class="mb-0">Вы уверены, что хотите удалить?</p>
    </div>
    <div class="modal-footer flex-nowrap p-0">
        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-right" onclick="closedForm()"><strong>Да, удалить</strong></button>
        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0" data-bs-dismiss="modal" onclick="closedForm()">Нет, спасибо</button>
    </div>
</div>

</body>
</html>
