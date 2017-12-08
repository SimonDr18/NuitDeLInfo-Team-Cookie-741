<?php
  $pass = $_POST['pass'];
  if($pass == "dans ce groupe les cookies sont la seule chose sur laquelle nous sommes tous ok"){
    header("Location:includes/enigme3.html");
  }
  else{
    header("Location:includes/enigme2.html");
}
?>
