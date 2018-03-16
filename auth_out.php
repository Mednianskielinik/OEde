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
