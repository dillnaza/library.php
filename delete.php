<?php
$dell = $mysqli->query("DELETE FROM book WHERE book.count = 35");

if ($dell == true) echo "Информация удалена из базы данных";
else echo "Информация не удалена из базы данных";
echo "</br>";
