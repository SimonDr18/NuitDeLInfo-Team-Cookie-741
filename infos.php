<?php
session_start();
$_SESSION["page"]="infos.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Information</title>
    <?php include_once("includes/_head.php"); ?>
  </head>
  <body>
    <?php require_once("includes/_header.php"); ?>
  </body>
</html>
