<html>
<head>
    <meta charset="UTF-8">
    <title>ОЕде</title>
    <link rel="stylesheet" type="text/css" href="style/main.css"><!--First comment of Venera-->
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
$master ="Home";
$menu_second="";
if (session_id()=='')
{
    session_start();
}
$_SESSION['idpost'] = $menu_second;
$_SESSION['type'] = $master;
?>
<?php
include_once("template_header.html");
?>

<div class="flex-container2">
    <div>
        <?php
        include("text-home.html");
        ?>
    </div>
</div>
<?php
include_once("template_footer.html");
?>
</body>
</html>
