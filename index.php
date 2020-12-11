<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'function.php';

?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Guest Book</title>
</head>

<body>
    <div class="container">

        <div id="posts">
            <?php foreach ($s as $value): ?>
            <div class="post">
                <div class="flexrow">
                    <p class="name">
                        <?php echo $value['name']; ?>
                    </p>
                    <p class="data">
                        <?php echo date('H:i:s m.d.Y', $value['date']); ?>
                    </p>
                </div>
                <div class="message">
                    <p>
                        <?php echo $value['post']; ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="messagetouser">
            <div class="msgtu">
                <p>
                    <?php echo $msg; ?>

                </p>
            </div>
        </div>
        <div id="form">
            <form method="post">

                <label for="name">Имя<em>*</em></label>

                <input type="text" name="name" value="<?php echo $name_f; ?>" id="name" placeholder="Напиши Имя">

                <div class="between"></div>

                <label for="post">Cообщение<em>*</em></label>

                <textarea name="post" id="post" tabindex="4" placeholder="Напиши сообщение"></textarea>
                <p>
                    <input type="submit" value="Отправить">
                </p>
            </form>
        </div>
    </div>
</body>
