<?php 

    require_once './autoload.php';

?>

<html>

    <head>
    
        <title>Homework</title>
    
    </head>
    
    <body>
    
    <h1>Введите автора</h1>

    <form method="post" action="input_text.php">
    
        <label>Автор: </label><input type="text" size="20"> <input type="submit" value="Добавить">
        <label>Текст: </label><input type="textaria" size="20"> <input type="submit" value="Добавить">
        <label>Email: </label><input type="textaria" size="20"> <input type="submit" value="Добавить">
    
    </form>
    
    </body>
    
    </html>