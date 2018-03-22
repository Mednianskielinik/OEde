<?php
$host = "localhost"; // адрес сервера
$database = "oede"; // имя базы данных
$user = "root"; // имя пользователя
$password = ""; // пароль
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));


if (!mysqli_set_charset($link, "utf8")) {
    echo "Ошибка при загрузке набора символов cp1251";
    mysqli_error($link);
    exit();
}
?>
<?php
$idpost =$_SESSION['idpost'];
$type =$_SESSION['type'];
$query ="SELECT person,comment FROM comments WHERE type='$type' AND idpost='$idpost'";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<hr>";
        echo "<p>";
        echo "<strong>";
        echo "Пользователь ";
        echo $row[0];
        echo "</strong>";
        echo "</p>";
        echo "<br>";
        echo $row[1];
        echo "<br>";
    }
}

?>