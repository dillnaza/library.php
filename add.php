<?php
$book=$_POST['bookInput'];
$category=$_POST['catInput'];
$add = $mysqli->query("INSERT INTO book (count, name, category) VALUES (35, $book, $category)");

if ($add == true) echo "Информация занесена в базу данных";
else echo "Информация не занесена в базу данных";
echo "</br>";
