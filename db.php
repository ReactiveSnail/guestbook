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

//Вывод страниц с пагинацией
//почти все подглядел тут:
//https://www.etutorialspoint.com/index.php/50-simple-pagination-in-php

$start = 0;        //Начальное значение счетчика
$per_page = 5;     //Количество записей на странице
$page_counter = 0; //Счетчик страниц
$next = $page_counter + 1;
$previous = $page_counter - 1;

$pdo = dbConect();

if(isset($_GET['start'])){
    $start = $_GET['start'];
    $page_counter = $_GET['start'];
    $start = $start * $per_page;
    $next = $page_counter + 1;
    $previous = $page_counter - 1;
}

//Получаем записи из ДБ

$query = "SELECT*FROM message LIMIT $start, $per_page";
$query = $pdo->prepare($query);
$query->execute();

if($query->rowCount() > 0){
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
}

//Считем общее количество строк в таблице
$count_query = "SELECT*FROM message";
$count_query = $pdo->prepare($count_query);
$count_query->execute();
$count = $count_query->rowCount();

//Рассчитываем номера страниц пагинации,
//разделив общее количество строк на страницу.
$paginations = ceil($count / $per_page);









?>
