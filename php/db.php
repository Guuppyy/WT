<?php
$host = 'localhost'; // Хост базы данных
$db = 'miniondb'; // Имя базы данных
$user = 'root'; // Имя пользователя
$pass = '1234'; // Пароль

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Ошибка подключения: " . $e->getMessage();
}
?>