<html>
<head>
    <meta charset="UTF-8">
    <title>Soups</title>
    <link rel="stylesheet" type="text/css" href="style/main.css">
</head>
<body>
<?php
if (isset($_SESSION['login']))
{
}
else
{$_SESSION['login']="";}
?>
<?php
$master ="";
$menu_second="";
if (session_id()=='')
{
    session_start();
}
?>
<?php
include_once("template_header.html");
?>
<div id="coment">
<?php
$host = "localhost"; // адрес сервера
$database = "oede"; // имя базы данных
$user = "root"; // имя пользователя
$password = ""; // пароль
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));

if (!mysqli_set_charset($link, "utf8"))
{
    echo "Ошибка при загрузке набора символов UTF-8";
    mysqli_error($link);
    exit();
}
function search ($link,$query)
{
    $query = trim($query);
    $query = htmlspecialchars($query);

    if (!empty($query))
    {
        if (strlen($query) < 3) {
            $text = '<p>Слишком короткий поисковый запрос.</p>';
        } else if (strlen($query) > 128) {
            $text = '<p>Слишком длинный поисковый запрос.</p>';
        } else {
            $q = "SELECT `idsoup`, `name`, `categori`
                  FROM `soups` WHERE `name` LIKE '%$query%'
                  OR `categori` LIKE '%$query%'";
            $result = mysqli_query($link, $q) or die("Ошибка " . mysqli_error($link));

            if($result)
            {
                $rows = mysqli_num_rows($result); // количество полученных строк
                if($rows!==0)
                {
                $text = '<p>По вашему запросу <b>'.$query.'</b> найден рецепт: </p>';
                $text.='--------------------------------------------------------------------------';
                $text.= "<br>";

                    $row = mysqli_fetch_row($result);
                    $_SESSION['type'] = $row[2];
                    $_SESSION['idpost'] = $row[0];
                    $text .= "<p>";
                    $text .= "<strong>";
                    $text .= "Категория\"";
                    $text .= $row[2];
                    $text .= "\"";
                    $text .= "</strong>";
                    $text .= "</p>";
                    $text .=  $row[1];
                    $text .= "<br>";
                    $text .= "<a href='check.php'>Смотреть рецепт</a>";
                    $text .= "<br>";
                }
                else
                {
                    $text = '<p>По вашему запросу <b>'.$query.'</b> ничего не найдено: </p>';
                }

            }
        }
    }
    else
    {

    }
    return $text;
}
?>
<?php
if (!empty($_POST['query'])) {
    $search_result = search ($link,$_POST['query']);
    echo $search_result;
}
?>
</div>
<?php
include_once("template_footer.html");
?>
</body>
</html>
