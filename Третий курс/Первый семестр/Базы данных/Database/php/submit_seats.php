<!DOCTYPE html>
<html lang="RU-ru">
<head>
    <title>Добавить место</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="main_content">
    <?php
    $db = new PDO('mysql:host=db;dbname=kinos', 'devuser', 'devpass');
    if (!empty($_POST)) {
        $insert = $db->prepare("INSERT INTO seats (cinema_halls_id, row_index, seat_index) VALUES (:cinema_halls_id, :row_index, :seat_index)");

        $unique_seat_check = $db->prepare("select * from seats where row_index=:row_index and seat_index=:seat_index and cinema_halls_id=:cinema_halls_id");
        $unique_seat_check->execute($_POST);
        $duplicate_seats = $unique_seat_check->fetchAll(PDO::FETCH_ASSOC);

        if (!$duplicate_seats && $insert->execute($_POST)) {
            echo "Данные введены успешно";
        } elseif ($duplicate_seats) {
            echo "Ошибка в введеных данных: Место с данным номером ряда и номером места уже существуют";
        } else {
            echo "Ошибка в запросе";
        }
    }
    ?>
    <form action="submit_seats.php" method="post">
        <p class="foreign_items">Название зала<label title="Название зала">
                <select name="cinema_halls_id">
                    <?php
                    foreach ($db->query("select * from cinema_halls") as $row) {
                        echo "<option value={$row['id']}>{$row['name_of_hall']}</option>";
                    }
                    ?>
                </select>
            </label></p>
        <p>Номер ряда
            <label title="Номер ряда">
                <input type="number" name="row_index" value="">
            </label></p>
        <p>Номер места
            <label title="Номер места">
                <input type="number" name="seat_index" value="">
            </label></p>
        <p><input type="submit"></p>

        <a class="buttons" href="index.php">Назад</a>
    </form>
</div>
</body>
</html>
