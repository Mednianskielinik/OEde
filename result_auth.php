<?php
echo "Здравствуйте,";
echo "<br>";
echo "<strong>";
echo $_SESSION['first_name'];
echo "</strong>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<hr>";

if ($_SESSION['login']=="")
{
    echo "<center><a href=\"index.php\" target=\"REG-AUTH\">Home</a>&emsp;<a href=\"reg.html\" target=\"CONTENT\">Регистрация</a></center>";
}
else
{
    echo "<center><a href=\"auth_out.php\" target=\"REG-AUTH\">Выйти</a>&emsp;<a href=\"reg.html\" target=\"CONTENT\">Регистрация</a></center>";
}
?>
