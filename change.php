<?php
$chan = $mysqli->query("UPDATE book SET name = $_POST[book1Input], category = $_POST[cat1Input] WHERE count = 35;");
if ($chan == true) echo "Информация изменена";
else echo "Информация не не изменена";
echo "</br>";
?>
