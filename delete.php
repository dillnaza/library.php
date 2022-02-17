<?php
$sql = $mysqli->query("DELETE FROM `book` WHERE `book`.`count` = 10");
if ($add == true) echo "Информация удалена из базы данных";
else echo "Информация не удалена из базы данных";
echo "</br>";
?>
