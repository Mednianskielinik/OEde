<?php
$master = $_SESSION['type'];
$menu_second = $_SESSION['idpost'];

if ($master == "home")
{
    include ("index.php");
}

elseif ($master == "Soups")
{
    include ('1.php');
}

elseif ($master == "Dessert")
{
    include ('2.php');
}

elseif ($master == "Porridges")
{
    include ('3.php');
}

?>