<html>
<head>
    <meta charset="UTF-8">
    <title>Soups</title>
    <link rel="stylesheet" type="text/css" href="style/main.css"><!--First comment of Venera-->
</head>
<body>
<?php
if (session_id()=='');
session_start();
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    echo "<p><a href=\"auth.html\" target=\"REG-AUTH\">НАЗАД</a></p>";
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);
// подключаемся к базе
include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь


$query ="SELECT * FROM users WHERE login='$login'";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
$row = mysqli_fetch_row($result);


if (empty($row[0]))
{
    //если пользователя с введенным логином не существует
    mysqli_close($link);
    echo "<p><a href=\"index.php\" target=\"REG-AUTH\">НАЗАД</a></p>";
    exit ("Извините, введённый вами login неверный");
}
else {
    //если существует, то сверяем пароли
    if ($row[2]==$password) {
        //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
        $_SESSION['login']=$row[1];
        $_SESSION['surname']=$row[3];
        $_SESSION['first_name']=$row[4];
        $_SESSION['e_mail']=$row[5];
        $_SESSION['id']=$row[0];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
        include ("index.php");

    }
    else {
        //если пароли не сошлись
        echo "<p><a href=\"index.php\" target=\"REG-AUTH\">НАЗАД</a></p>";
        mysqli_close($link);
        exit ("Извините, введённый вами пароль неверный.");
    }
}
?>
</body>
</html>
