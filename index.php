<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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
                    <li class="nav-item"><a>About</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<section id="promo" class="promo section offset-header">
    <div class="container text-center">
        <h2 class="title">Библиотека</h2>
        <div class="btn" id="butt">
        <button class="btn btn-cta-secondary" value=1 name="cat[]" onclick="catForm()">1-категория</button>
        <button class="btn btn-cta-primary" value="2" name="cat[]" onclick="catForm()">2-категория</button>
        <button class="btn btn-cta-secondary" value="3" name="cat[]" onclick="catForm()">3-категория</button>
        <button class="btn btn-cta-primary" value="4" name="cat[]" onclick="catForm()">4-категория</button>
        <button class="btn btn-cta-secondary"  value="5" name="cat[]" onclick="catForm()">5-категория</button>
    </div>
    </div>
</section>

<script>
    function catForm()
    {
        event.preventDefault();
        //мнда категорияны алп оны $cat ка жазатн код керек
    }
</script>

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

<form id="catForm" align="center">
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
    <div>
        <?php $cat=2;?>
        <h2>Список книг <?php echo "$cat" ?> категории:</h2>
        <div>
            <button id="add" class="btn btn-cta-secondary" onclick="openAddForm()">Добавить новую книгу</button>
            <h4 style="color: #122b40; padding-left: 68%" >Количество книг:
                <?php
                $sqlCount=$mysqli->query("SELECT category.category, Count(name) AS Cname
FROM category INNER JOIN book ON category.count = book.category
GROUP BY category.category
HAVING ((category.category)=$cat)");
                while ($resul = mysqli_fetch_array($sqlCount))
                    echo "{$resul['Cname']}</br>";
                ?>
            </h4>
            <h3>
                <?php
                $sql = $mysqli->query("SELECT category.count, book.name
FROM category INNER JOIN book ON category.count = book.category
WHERE ((category.count)=$cat);");
                while ($result = mysqli_fetch_array($sql))
                    echo "<div content id='block'>{$result['name']}
<img id='change' class='images' src='/css/noun-edit-1644623.png' onclick='changeForm()' alt='Изменить'>
<img id='dell' class='images' src='/css/noun-delete-4602521.png' onclick='openDeleteForm()' alt='Удалить'>
</div> </br>";
                ?>
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
</script>

<form id="addForm" style="display: none;">
    <h3 class="fw-bold mb-0">Добавлить данные</h3><br>
    <div>
        <label for="bookInput"> Называние книги:</label>
        <input type="text" id="bookInput">
    </div><br>
    <div>
        <label for="catInput">Категория книги: <?php $cat?></label>
    </div><br>
    <button type="submit " class="btn btn-cta-secondary" onclick="reAddForm()">Добавить</button>
    <button  class="btn btn-cta-secondary" onclick="closeAddForm()">Закрыть</button>
</form>

<script>
    function reAddForm() {
        event.preventDefault();
        let book = document.getElementById('bookInput').value;
        let cat=document.getElementById('catInput').value;
        document.getElementById('addForm').style.display = "block";

        /*$add = $mysqli->query("INSERT INTO `book` (`count`, `name`, `category`) VALUES (`тут count болу керек`,`$book`,`$cat`)");

        if ($add == true) echo "Информация занесена в базу данных";
        else echo "Информация не занесена в базу данных";
        echo "</br>";
        */
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

<form align="center" id="changeForm" style="display: none;">
    <h3>Изменение</h3>
    <div>
        <label for="bookInput"> Называние книги:</label>
        <input type="text" id="book1Input">
    </div><br>
    <div>
        <label for="catInput">Категория книги:</label>
        <input type="text" id="cat1Input">
    </div><br>
    <button type="submit " class="btn btn-cta-secondary" onclick="reChangeForm()">Изменить</button>
    <button  class="btn btn-cta-secondary" onclick="closeChangeForm()">Закрыть</button>
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
        //sql на ихменение
        document.getElementById('changeForm').style.display = "none";
        document.getElementById('book1Input').value = "";
        document.getElementById('cat1Input').value = "";
    }
</script>

<form align="center" id="deleteForm" style="display: none;">
    <h3>Удаление</h3>
    <p>Вы уверены, что хотите удалить?</p>
    <div>
        <button type="submit " class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-right" onclick="deleteForm()">Удалить</button>
        <button type="button " class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0" onclick="cancelForm()">Отмена</button>
    </div>
</form>

<script>
    function openDeleteForm() {
        event.preventDefault();
        document.getElementById('deleteForm').style.display = "block";
    }

    function closeDelForm() {
        event.preventDefault();
        //удалить ке х деген кнопка кою керек
        document.getElementById('bookDelete').value = "";
        document.getElementById('catDelete').value = "";
    }

    function deleteForm() {
        event.preventDefault();
        document.getElementById('deleteForm').style.display = "none";

        /*$sql = $mysqli->query("DELETE FROM `book` WHERE `book`.`count` = 10");
        if ($add == true) echo "Информация удалена из базы данных";
        else echo "Информация не удалена из базы данных";
        echo "</br>";*/
    }

    function cancelForm() {
        event.preventDefault();
        document.getElementById('deleteForm').style.display = "none";
    }
</script>

<script>
    let modal = document.getElementById('addForm');

    let btn = document.getElementById("add");

    let span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>
</html>
