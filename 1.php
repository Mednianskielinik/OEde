<html>
<head>
    <meta charset="utf-8">
    <title>Soups</title>
    <link rel="stylesheet" type="text/css" href="style/main.css">
</head>
<body>
<?php
$master ="Soups";
$menu_second="Home_soups";
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
include_once("Soups_home.php");
?>
    </div>
</div>

<?php
include_once("template_footer.html");
?>

</body>
</html>