<?php
$add = $mysqli->query("INSERT INTO 'book' ('count', 'name', 'category') VALUES (10,'$_POST('bookInput')','$_POST('catInput')')");

if ($add == true) echo "Информация занесена в базу данных";
else echo "Информация не занесена в базу данных";
echo "</br>";
?>
