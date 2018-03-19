<?php
$host = "localhost"; // адрес сервера
$database = "oede"; // имя базы данных
$user = "root"; // имя пользователя
$user_password = ""; // пароль
$link = mysqli_connect($host, $user, $user_password, $database) or die("Ошибка " . mysqli_error($link));

// изменение набора символов на cp1251
if (!mysqli_set_charset($link, "utf8"))
{
    echo "Ошибка при загрузке набора символов  UTF-8";
    mysqli_error($link);
    exit();
}
?>
