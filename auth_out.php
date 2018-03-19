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

$_SESSION['login']="";
$_SESSION['surname']="";
$_SESSION['first_name']="";
$_SESSION['e_mail']="";
$_SESSION['id']="";

include ("index.php");
?>
</body>
</html>
