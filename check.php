<?php
if (session_id()=='')
{
    session_start();
}

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

elseif ($master == "Secondbl")
{
    include ('4.php');
}

elseif ($master == "Salad")
{
    include ('5.php');
}
?>