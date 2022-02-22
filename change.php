<?php
$book1=$_POST['book1Input'];
$category1=$_POST['cat1Input'];
$chan = $mysqli->query("UPDATE book SET name = $book1, category = $category1 WHERE count = 35;");
if ($chan == true) echo "Информация изменена";
else echo "Информация не не изменена";
echo "</br>";
