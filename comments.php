<?php
if (isset($_POST['comment'])) { $comment = $_POST['comment']; if ($comment == '') { unset($comment);} }

if (empty($comment)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    echo "<p><a href=\"reg.html\" target=\"CONTENT\">НАЗАД</a></p>";
    mysqli_close($link);
    exit ("Вы не оставили комментарий");
}

if (session_id()=='');
session_start();

if ($_SESSION['login']=="")
{
    echo "Чтобы оставить комментарий, необходимо зарегистрироваться&emsp;<a href=\"reg.html\" target=\"CONTENT\">Регистрация</a><a href=\"reg.html\" target=\"CONTENT\">Назад</a></center>";
}
else
{
    $login = $_SESSION['login'];
    $idpost = 2;
}
// подключаемся к базе
include ('bd.php');

    $query ="INSERT INTO comments (idpost,user,comment) VALUES('$idpost','$user','$comment')";
    $result2 = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

mysqli_close($link);

// Проверяем, есть ли ошибки
if ($result2=='TRUE')
{
    echo "Ваш комментарий отправлен<a href='index.php' target=\"CONTENT\">Главная страница</a>";
}
else {
    echo "<p><a href=\"index.php\" target=\"CONTENT\">НАЗАД</a></p>";
    mysqli_close($link);
    exit ("Ошибка! Вы не оставиликомментрарий");
}

?>
