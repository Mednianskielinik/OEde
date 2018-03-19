<html>
<head>
    <meta charset="UTF-8">
    <title>Dessert</title>
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
$master ="Dessert";
$menu_second="Home_dessert";

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
      include_once("Dessert_home.php");
      ?>
    </div>
</div>
<?php
include_once("template_footer.html");
?>

</body>

</body>
</html>