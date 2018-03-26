<?php
header("Content-type: text/plain; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);

if (session_id()=='')
{
    session_start();
}

if ($_SESSION['login']=="")
{
    echo "Чтобы оставить комментарий, необходимо зарегистрироваться&emsp;<a href=\"check.php\" target=\"CONTENT\">Назад</a></center>";
}

else
{
    $person = $_SESSION['login'];
    $idpost = $_SESSION['idpost'];
    $type = $_SESSION['type'];
    $comment = $_POST['comment'];
}

include ('bd.php');

    $query ="INSERT INTO comments (idpost, type, person,comment) VALUES('$idpost','$type','$person','$comment')";
    $result2 = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

mysqli_close($link);
while(list ($key, $val) = each ($_POST))
{
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
}
?>
