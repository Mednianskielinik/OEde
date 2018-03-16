<html>
<head>
    <meta charset="utf-8">
    <title>Soups</title>
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

?>
<?php
include_once("template_header.html");
?>

<div class="flex-container">
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
