<!DOCTYPE html>
<html lang="en">
<head>
    <title>Библиотека</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" id="theme-style"  href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" id="theme-style" href="css/style.css">
</head>

<body  data-spy="scroll">
<header id="header" class="header">
    <div class="container">
        <nav id="main-nav" class="main-nav navbar-right" role="navigation">
            <div class="navbar-collapse collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a class="scroll" href="#about">About</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<section id="promo" class="promo section offset-header">
    <div class="container text-center">
        <h2 class="title">Библиотека</h2>
        <div class="btn" id="butt" align="center">
            <input  type="button" class="btn btn-cta-secondary" target="_blank" value="1-категория" name="cat[]" onclick="opForm()">
            <input  type="button" class="btn btn-cta-primary" target="_blank" value="2-категория" name="cat[]" onclick="opForm()">
            <input  type="button" class="btn btn-cta-secondary" target="_blank" value="3-категория" name="cat[]" onclick="opForm()">
            <input  type="button" class="btn btn-cta-primary" target="_blank" value="4-категория" name="cat[]" onclick="opForm()">
            <input  type="button" class="btn btn-cta-secondary"  target="_blank" value="5-категория" name="cat[]" onclick="opForm()">
        </div>
        <ul class="meta list-inline">
        </ul>
    </div>
</section>

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
    <button type="button" class="btn btn-cta-secondary" target="_blank" onclick="openForm()">Добавить/Удалить</button>
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
