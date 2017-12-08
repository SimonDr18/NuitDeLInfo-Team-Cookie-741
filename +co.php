<?php require_once("includes/_db.php"); ?>
<?php
session_start();

if(isset($_REQUEST["Pseudo"]) AND isset($_REQUEST["Pass"])){
  if(isset($file_db)){
    echo "YATTA";
  } else {
    header("Location: 404.php");
  }
} else {
  header("Location: connexion.php");
}
?>
