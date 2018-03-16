<html>
<head>
    <meta charset="utf-8">
    <title>Soups</title>
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
$master ="Soups";
$menu_second="Soup 1";

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
    include_once("soup1.html");
    ?>
</div>
</div>

<?php
include_once("template_footer.html");
?>
</body>
</html>
