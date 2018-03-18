<html>
<head>
    <meta charset="utf-8">
    <title>Soups</title>
    <link rel="stylesheet" type="text/css" href="../php/style/main.css">
</head>
<body>
<?php
if (isset($_SESSION['login']))
{}
else
{$_SESSION['login']="";}
?>
<?php
$master ="Soups";
$menu_second = ++$_GET['id'];
if (session_id()=='');
session_start();
?>

<?php
include_once("template_header.html");
?>

<div class="flex-container">
    <div class="flex-item">
        <?php
        include("menu_second.php");
        ?>
    </div>
    <div class="flex-item">
        <?php
        $host = "localhost"; // адрес сервера
        $database = "oede"; // имя базы данных
        $user = "root"; // имя пользователя
        $password = ""; // пароль
        $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));

        // изменение набора символов на cp1251
        if (!mysqli_set_charset($link, "cp1251")) {
            echo "Ошибка при загрузке набора символов cp1251";
            mysqli_error($link);
            exit();
        }
        ?>
        <?php
        $query ="SELECT ingrid, recipi FROM soups WHERE idsoup='$menu_second'";
        $_SESSION['idpost'] = $menu_second;
        $_SESSION['type'] = $master;
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        if($result)
        {
            $rows = mysqli_num_rows($result); // количество полученных строк
            for ($i = 0 ; $i < $rows ; ++$i)
            {
                $row = mysqli_fetch_row($result);
                echo "<p>";
                echo "<strong>";
                echo "Для приготовления вам понадобятся: ";
                echo $row[0];
                echo "</strong>";
                echo "</p>";
                echo "<br>";
                echo $row[1];
            }
        }

        ?>
        <div id="coment">
        <?php
        include ("coments.html")
        ?>
        </div>
    </div>
</div>

<?php
include_once("template_footer.html");
?>
</body>
</html>
