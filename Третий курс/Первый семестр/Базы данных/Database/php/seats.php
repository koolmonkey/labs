<!DOCTYPE html>
<html lang="RU-ru">
<head>
    <title>Места</title>
</head>
<body>

<?php
include 'cinema_halls.php';

$db = new PDO('mysql:host=db;dbname=kinos', 'devuser', 'devpass');
echo "Все места:";
echo '<table border="1" width="100%" cellpadding="5">';
echo '<tr>';
echo "<th>id</th>";
echo "<th>Номер ряда</th>";
echo "<th>Номер места</th>";
echo "<th style='color: blue' '>Номер зала</th>";
echo "<th style='color: blue' '>Название зала</th>";
echo "<th style='color: blue' '>Описание зала</th>";
echo "</tr>";
foreach ($db->query('select seats.id as seats_pk, cinema_halls_id, row_index, seat_index, name_of_hall, description from kinos.seats join cinema_halls ch on ch.id = seats.cinema_halls_id order by seats_pk') as $row) {
    echo '<tr>';
    echo "<th>{$row['seats_pk']}</th>";
    echo "<th>{$row['row_index']}</th>";
    echo "<th>{$row['seat_index']}</th>";
    echo "<th style='color: blue'>{$row['cinema_halls_id']}</th>";
    echo "<th style='color: blue'>{$row['name_of_hall']}</th>";
    echo "<th style='color: blue'>{$row['description']}</th>";
    echo "</tr>";
}
echo "</table>";

?>
<p><a target="_blank" href="submit_seats.php"> Добавить место </a>
<p><a target="_blank" href="delete_seats.php"> Удалить место </a>
<p><a target="_blank" href="update_seats.php"> Изменить место </a>
</body>
</html>