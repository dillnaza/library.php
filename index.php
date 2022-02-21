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

<form id="promo" class="promo section offset-header">
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
</form>

<script>
    function catForm()
    {
        event.preventDefault();
        //мнда категорияны алп оны $cat ка жазатн код керек
        // php $_GET(cat[$cat=2])?

    }
</script>

<?php include 'connect.php'?>

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
        <h2>Список книг <?php echo $cat=5?> категории:</h2>
        <div>
            <button id="add" class="btn btn-cta-secondary" onclick="openAddForm()">Добавить новую книгу</button>
            <h4 style="color: #122b40; padding-left: 68%" >Количество книг:
                <?php include 'category.php'?>
            </h4>
            <h3>
                <div >
                <?php include 'category 2.php'?>
                </div>
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

<form align="center" id="addForm" style="display: none"  class="hystmodaladd" method="post">
    <h3 class="fw-bold mb-0">Добавить данные</h3><br>
    <div>
        <label for="bookInput"> Называние книги:</label>
        <input type="text" name="bookInput">
    </div><br>
    <div>
        <label for="catInput">Категория книги:</label>
        <input type="text" name="catInput">
    </div><br>
    <button class="btn btn-cta-secondary" onclick="reAddForm()">Добавить</button>
    <button class="btn btn-cta-secondary" onclick="closeAddForm()">Закрыть</button>
</form>

<script>
    function reAddForm() {
        event.preventDefault();
        /*let book = document.getElementById('bookInput').value;
        let cat=document.getElementById('catInput').value;*/
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

<form align="center" id="changeForm" style="display: none;"  class="hystmodalchan">
    <h3>Изменение</h3>
    <div>
        <label for="bookInput"> Называние книги:</label>
        <input type="text" id="book1Input">
    </div><br>
    <div>

        <label for="catInput">Категория книги: <?php $cat?></label>
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

<form align="center" id="deleteForm" style="display: none;"  class="hystmodaldel">
    <h3>Удаление</h3>
    <p>Вы уверены, что хотите удалить?</p>
    <div>
        <button type="submit " class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-right" onclick="deleteForm()">Удалить</button>
        <button  class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0" onclick="cancelForm()">Отмена</button>
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
        <?php ?>
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
