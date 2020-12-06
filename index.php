<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'function.php';

?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Guest Book</title>
</head>

<body>
    <div>
        <?php
        echo '<br>';
        echo $_SERVER['REQUEST_METHOD'];
        echo '<br>';
        echo '<pre>';
        print_r($_POST);
        echo '<pre>';
        ?>
    </div>

    <div id="posts">
        <div class="post">
            <p class="name">
                Имя
            </p>
            <p class="data">
                09:35 10.10.2020
            </p>
            <div class="message">
                <p>
                    Сообщение, длинной десять, двадцать, тридцать слов, то есть, приблизительно триста, да пусть хоть тысяча символов. (1000 символов).
                </p>
            </div>
        </div>
    </div>
    <div id="posts">
        <div class="post">
            <p class="name">
                <?php echo $name; ?>
            </p>
            <p class="data">
                <?php echo $date; ?>
            </p>
            <div class="message">
                <p>
                    <?php echo $post; ?>
                </p>
            </div>
        </div>
    </div>
    <div class="message_fo_user">
        <p>
            <?php echo $msg; ?>
        </p>
    </div>
    <div id="form">
        <form method="post">
            <p>
                <label for="name">Имя<em>*</em></label>
                <br>
                <input type="text" name="name" value="<?php echo $name_f; ?>" id="name" placeholder="Напиши Имя">
            </p>
            <label for="post">Cообщение<em>*</em></label>
            <br>
            <textarea name="post" id="post" tabindex="4" placeholder="Напиши сообщение"></textarea>
            <p>
                <input type="submit" value="Отправить">
            </p>
        </form>
    </div>

</body>
