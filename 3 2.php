<html>
<head>
    <meta charset="utf-8">
    <title>Porridges</title>
    <link rel="stylesheet" type="text/css" href="style/main.css">
</head>
<body>
<?php
if (isset($_SESSION['login']))
{}
else
{$_SESSION['login']="";}

?>
<?php
$master ="Porridges";
$menu_second="Porridge 1";

if (session_id()=='');
session_start();
?>

<?php
include_once("template_header.html");
?>

<div class="flex-container">
    <div class="flex-item">
        <?php
        include("menu_second.html");
        ?>
    </div>
    <div class="flex-item">
        <?php
        include_once("Porridge1.php");
        ?>
    </div>
        <?php
        include("menu_second.html");
        ?>
</div>
<?php
include_once("template_footer.html");
?>
</body>
</html>
