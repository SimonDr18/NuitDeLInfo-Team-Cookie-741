<?php
session_start();
$_SESSION["page"]="inscription.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Inscription</title>
    <?php include_once("includes/_head.php"); ?>
  </head>
  <body>
    <?php require_once("includes/_header.php"); ?>
    <?php require_once("includes/_db.php"); ?>
    <header>
      <h1>Inscription</h1>
    </header>
    <section>
      <form action="+inscr.php" method="post">
        Nom : <input type="text" name="nom" /><br />
        Prenom : <input type="text" name="prenom" /><br />
        Pseudo : <input type="text" name="pseudo" /><br />
        Adresse Email : <input type="text" name="email1"/><br/>
        Re-Adresse Email : <input type="Text" name="email2"/><br/>
        Mot de passe : <input type="password" name="pass1" /><br />
        Re-Mot de passe : <input type="password" name="pass2" /><br />
        Age : <input type="text" name="age" /><br />
        Ville : <input type="text" name="ville" /><br />
        <input type="submit" value="INSCRIPTION"/>
      </form>

      <?php
      if (isset($_POST['pseudo']) && isset($_POST['email2']) && isset($_POST['email1']) && isset($_POST['pass1']) && isset($_POST['pass2'])){
              $pseudo = htmlspecialchars(str_replace("'", "\'",$_POST['pseudo']));
              $email = htmlspecialchars(str_replace("'", "\'",$_POST['email2']));
              $MDP = htmlspecialchars(sha1(str_replace("'","\'",$_POST['pass1'])));
              $samePseudo = 0;
              $sameEmail = 0;
              if(!empty($_POST['email1']) && !empty($_POST['email2']) || !empty($_POST['pass1']) && !empty($_POST['pass2'])){
                if ($_POST['email1']==$_POST['email2'] && !empty($_POST['email1']) && !empty($_POST['email2'])){
                  if($_POST['pass1']==$_POST['pass2'] && !empty($_POST['pass1']) && !empty($_POST['pass2'])){
                      echo "lancement du processus...";
                      if($samePseudo == 1){
                        $erreurSame = "Pseudo déjà pris !";
                      }
                      if($sameEmail == 1){
                        $erreurSame = "Email déjà utilisé !";
                      }
                      if($sameEmail == 1 && $samePseudo == 1){
                        $erreurSame = "Compte déjà existant !";
                      }
                      if($sameEmail == 0 && $samePseudo == 0) {
                        $erreurSame = "aucune erreur";
                      }
                      echo $erreurSame;
                  }
                  else {
                    echo "Mot de passe non vérifié !";
                  }
                }
                else{
                  echo "Email non vérifié !";
                }
              }
          }
        ?>
      </section>
  </body>
</html>
