<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Библиотека</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" id="theme-style" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" id="theme-style" href="css/style.css">
</head>

<body data-spy="scroll">
<header id="header" class="header">
    <div class="container">
        <nav role="navigation">
            <div class="navbar-collapse collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><h2>Библиотека "GoodReader"</h2></li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<form id="promo" class="promo section offset-header" method="get">
    <div class="container text-center">
        <div class="btn">
            <button class="btn btn-cta-secondary" value=1 name="cat[]" onclick="click1()">1-категория</button>
            <button class="btn btn-cta-primary" value="2" name="cat[]" onclick="click2()">2-категория</button>
            <button class="btn btn-cta-secondary" value="3" name="cat[]" onclick="click3()">3-категория</button>
            <button class="btn btn-cta-primary" value="4" name="cat[]" onclick="click4()">4-категория</button>
            <button class="btn btn-cta-secondary" value="5" name="cat[]" onclick="click5()">5-категория
            </button>
        </div>
    </div>
</form>

<?php include 'connect.php'; ?>

<script>
    let cat = 1

    function click1() {
        cat = 1
    }

    function click2() {
        cat = 2
    }

    function click3() {
        cat = 3
    }

    function click4() {
        cat = 4
    }

    function click5() {
        cat = 5
    }
</script>

<form id="catForm" align="center">
    <div>
        <h2>Список книг
            <script>let cat = 1</script>
            категории:
        </h2>
        <div>
            <div style="padding-left: 65%">
                <button id="add" class="btn btn-cta-secondary" onclick="openAddForm()">Добавить новую книгу</button>
            </div>
            <h4 style="color: #122b40; padding-right: 65%">
                <img src="/css/noun-sort-1590833.png" class="images" onclick="sort()" alt="Сортироваит">
                Количество книг:
                <?php include 'category.php' ?>
            </h4>
            <h3>
                <?php include 'bookname.php' ?>
            </h3>
        </div>
    </div>
</form>


<script>
    function openAddForm() {
        event.preventDefault();
        document.getElementById('addForm').style.display = "block";
    }

    function changeForm() {
        event.preventDefault();
        document.getElementById('changeForm').style.display = "block";
    }

    function openDeleteForm() {
        event.preventDefault();
        document.getElementById('deleteForm').style.display = "block";
    }

    function favorite() {

    }

    function sort() {
        //<php include 'sort.php'?>
    }

</script>

<form align="center" id="addForm" style="display: none" class="hystmodaladd" method="post">
    <h3 class="fw-bold mb-0">Добавить данные</h3><br>
    <div>
        <label for="bookInput"> Называние книги:</label>
        <input type="text" name="bookInput" id="bookInput">
    </div>
    <br>
    <div>
        <label for="catInput">Категория книги:</label>
        <input type="text" name="catInput" id="catInput">
    </div>
    <br>
    <button type="submit" class="btn btn-cta-secondary" onclick="reAddForm()">Добавить</button>
    <button class="btn btn-cta-secondary" onclick="closeAddForm()">Закрыть</button>
</form>

<script>
    function reAddForm() {
        event.preventDefault();
        <?php include 'add.php';?>
        document.getElementById('addForm').style.display = "none";
        document.getElementById('bookInput').value = "";
        document.getElementById('catInput').value = "";
    }

    function closeAddForm() {
        event.preventDefault();
        document.getElementById('addForm').style.display = "none";
        document.getElementById('bookInput').value = "";
        document.getElementById('catInput').value = "";
    }
</script>

<form align="center" id="changeForm" style="display: none;" class="hystmodalchan" method="post">
    <h3>Изменение</h3>
    <div>
        <label for="book1Input"> Называние книги:</label>
        <input type="text" name="book1Input" id="book1Input">
    </div>
    <br>
    <div>
        <label for="cat1Input">Категория книги: </label>
        <input type="text" name="сat1Input" id="cat1Input">
    </div>
    <br>
    <button type="submit " class="btn btn-cta-secondary" onclick="reChangeForm()">Изменить</button>
    <button class="btn btn-cta-secondary" onclick="closeChangeForm()">Закрыть</button>
</form>

<script>
    function closeChangeForm() {
        event.preventDefault();
        document.getElementById('changeForm').style.display = "none";
        document.getElementById('book1Input').value = "";
        document.getElementById('cat1Input').value = "";
    }

    function reChangeForm() {
        event.preventDefault();
        <?php include 'change.php'?>
        document.getElementById('changeForm').style.display = "none";
        document.getElementById('book1Input').value = "";
        document.getElementById('cat1Input').value = "";
    }
</script>

<form align="center" id="deleteForm" style="display: none;" class="hystmodaldel">
    <h3>Удаление</h3>
    <p>Вы уверены, что хотите удалить?</p>
    <div>
        <button type="submit " class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-right"
                onclick="deleteForm()">Удалить
        </button>
        <button class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0" onclick="cancelForm()">
            Отмена
        </button>
    </div>
</form>

<script>
    function deleteForm() {
        event.preventDefault();
        <?php include 'delete.php';?>
        document.getElementById('deleteForm').style.display = "none";
    }

    function cancelForm() {
        event.preventDefault();
        document.getElementById('deleteForm').style.display = "none";
    }
</script>
</body>
</html>
