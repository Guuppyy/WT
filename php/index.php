<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Сайт Миньонов</title>
</head>
<body>
<h1>Список Миньонов</h1>
<ul>
    <?php
    // Проверка подключения к базе данных
    if (isset($pdo)) {
        $stmt = $pdo->query("SELECT id, name, image FROM minions");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Путь к изображению, используя относительный путь
            $imagePath = "../" . htmlspecialchars($row['image'], ENT_QUOTES);
            $name = htmlspecialchars($row['name'], ENT_QUOTES);

            // Проверка, существует ли файл (опционально)
            if (file_exists($imagePath)) {
                echo "<li class='book'>
                            <img src='$imagePath' alt='$name' width='200' height='150'>
                            <strong>$name</strong>
                          </li>";
            } else {
                echo "<li class='book'>
                            <strong>$name</strong> <span>Изображение не найдено</span>
                          </li>";
            }
        }
    } else {
        echo "<li>Ошибка подключения к базе данных.</li>";
    }
    ?>
</ul>
</body>
</html>