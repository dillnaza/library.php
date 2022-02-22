<?php
$sqlCount=$mysqli->query("SELECT category.category, Count(name) AS Cname
FROM category INNER JOIN book ON category.count = book.category
GROUP BY category.category
HAVING ((category.category)=$cat)");
while ($resul = mysqli_fetch_array($sqlCount))
    echo "{$resul['Cname']}</br>";
