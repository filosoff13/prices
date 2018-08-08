<?php  
    //соединимся с БД
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'prices');
    // try {$pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
    
    // } catch (Exception $e) {
    // exit('Ошибка соединения с БД');
    // }
    // $pdo = null;
    $connection = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Ошибка соединения с БД');
    mysqli_set_charset($connection, "utf8") or die('Не установлена кодировка соединения');
?> 