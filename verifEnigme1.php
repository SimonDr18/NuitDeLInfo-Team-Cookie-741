<?php
  $pass = $_POST['pass'];
  if($pass == "j'aime les cookies"){
    header("Location:includes/enigme2.html");
  }
  else{
    header("Location:includes/enigme1.html");
  }
?>
