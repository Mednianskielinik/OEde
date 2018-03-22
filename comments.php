<?php

header("Content-type: text/plain; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
//sleep(2);
//echo "Ура получилось!<br>";


//if (isset($_POST['comment'])) { $comment = $_POST['comment']; if ($comment == '') { unset($comment);} }
//
//if (empty($comment))
//{
//    echo "<p><a href=\"check.php\" target=\"CONTENT\">НАЗАД</a></p>";
//    mysqli_close($link);
//    exit ("Вы не ввели свой комментарий");
//}

if (session_id()=='');
session_start();

if ($_SESSION['login']=="")
{
    echo "Чтобы оставить комментарий, необходимо зарегистрироваться&emsp;<a href=\"check.php\" target=\"CONTENT\">Назад</a></center>";
}
else
{
    $person = $_SESSION['login'];
    $idpost = $_SESSION['idpost'];
    $type = $_SESSION['type'];
}
// подключаемся к базе
include ('bd.php');
$comment=$_POST['comment'];
    $query ="INSERT INTO comments (idpost, type, person,comment) VALUES('$idpost','$type','$person','$comment')";
    $result2 = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

mysqli_close($link);
while(list ($key, $val) = each ($_POST))
{
    //$val = iconv("UTF-8","CP1251", $_POST[$key]);
    echo "<hr>";
    echo "<p>";
    echo "<strong>";
    echo "Пользователь ";
    echo $person;
    echo "</strong>";
    echo "</p>";
    echo "<br>";
    echo $comment;
    echo "<br>";
    //echo $comment.$person;
}
// Проверяем, есть ли ошибки
/*if ($result2=='TRUE')
{
    require ('check.php');
}
else {
    echo "<p><a href=\"1.php\" target=\"CONTENT\">НАЗАД</a></p>";
    mysqli_close($link);
    exit ("Ошибка! Вы не оставили комментрарий");
}*/

?>
