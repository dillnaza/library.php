<?php
$add = $mysqli->query("INSERT INTO `book` (`count`, `name`, `category`) VALUES (`тут count болу керек`,`$book`,`$cat`)");

if ($add == true) echo "Информация занесена в базу данных";
else echo "Информация не занесена в базу данных";
echo "</br>";
?>
