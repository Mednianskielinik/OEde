<?php
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (isset($_POST['surname'])) { $surname = $_POST['surname']; if ($surname == '') { unset($surname);} }
if (isset($_POST['first_name'])) { $first_name = $_POST['first_name']; if ($first_name == '') { unset($first_name);} }
if (isset($_POST['e_mail'])) { $e_mail = $_POST['e_mail']; if ($e_mail == '') { unset($e_mail);} }

if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    echo "<p><a href=\"reg.html\" target=\"CONTENT\">НАЗАД</a></p>";
    mysqli_close($link);
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}

//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);


// подключаемся к базе
include ('bd.php');

// проверка на существование пользователя с таким же логином
$query ="SELECT id FROM users WHERE login='$login'";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
$row = mysqli_fetch_row($result);
if (!empty($row[0]))
{
    echo "<p><a href=\"index.php\" target=\"CONTENT\">НАЗАД</a></p>";
    mysqli_close($link);
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
}
else
{
    // если такого нет, то сохраняем данные
    $query ="INSERT INTO users (login,password,surname,first_name,e_mail) VALUES('$login','$password','$surname','$first_name','$e_mail')";
    $result2 = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
}


// закрываем подключение
mysqli_close($link);

// Проверяем, есть ли ошибки
if ($result2=='TRUE')
{
    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php' target=\"CONTENT\">Главная страница</a>";
}
else {
    echo "<p><a href=\"index.php\" target=\"CONTENT\">НАЗАД</a></p>";
    mysqli_close($link);
    exit ("Ошибка! Вы не зарегистрированы.");
}

?>
