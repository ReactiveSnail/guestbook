<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'Qwerty1234');
define('DB_NAME', 'guestbook');

function dbConect(){
    try {
    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
    echo 'Ошибка при подключении к базе данных: '.$e->getMessage().'<br>';
    }
    return $pdo;
}

function recordPost($name, $post){
    $pdo = dbConect();
    $date = time();
    $name = $name;
    $post = $post;
    
    try {
    $query = 'INSERT INTO `message` (date, name, post) VALUES (:date, :name, :post)';
    $query = $pdo->prepare($query);
    $query->bindParam(':date', $date);
    $query->bindParam(':name', $name);
    $query->bindParam(':post', $post);
    $query->execute();
    } catch (PDOException $e) {
    echo 'Ошибка в запросе: '.$e->getMessage();
    }
}

function getPosts(){
    $pdo = dbConect();
    
    $query = 'SELECT id, date, name, post FROM message';
    $result = $pdo->query($query);
    $table = $result->fetchAll(PDO::FETCH_ASSOC);
    
    return $table;
}



?>
