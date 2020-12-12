<?php

$db = new PDO('mysql:host=db;dbname=kinos', 'devuser', 'devpass');
echo 'Все залы:';
echo '<table border="1" width="100%" cellpadding="5">';
echo '<tr>';
echo "<th>id</th>";
echo "<th>Название зала</th>";
echo "<th>Описание зала</th>";
echo "<th>Кол-во рядов</th>";
echo "<th>Кол-во мест</th>";
echo "</tr>";
foreach ($db->query('select * from cinema_halls') as $row) {
    echo '<tr>';
    echo "<th>{$row['id']}</th>";
    echo "<th>{$row['name_of_hall']}</th>";
    echo "<th>{$row['description']}</th>";
    echo "<th>{$row['number_of_rows']}</th>";
    echo "<th>{$row['number_of_seats']}</th>";
    echo "</tr>";
}
echo "</table>";