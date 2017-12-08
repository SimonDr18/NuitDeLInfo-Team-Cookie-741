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
      <form action="inscription.php" method="post">
        Nom : <input type="text" name="nom" /><br />
        Prenom : <input type="text" name="prenom" /><br />
        Pseudo : <input type="text" name="pseudo" /><br />
        Adresse Email : <input type="email" name="email1"/><br/>
        Re-Adresse Email : <input type="email" name="email2"/><br/>
        Mot de passe : <input type="password" name="pass1" /><br />
        Re-Mot de passe : <input type="password" name="pass2" /><br />
        Age : <input type="number" name="age" /><br />
        Ville : <input type="text" name="ville" /><br />
        <input type="submit" value="INSCRIPTION"/>
      </form>

      <?php
      if (isset($_POST['pseudo']) && isset($_POST['email2']) && isset($_POST['email1']) && isset($_POST['pass1']) && isset($_POST['pass2'])){
              $pseudo = htmlspecialchars(str_replace("'", "\'",$_POST['pseudo']));
              $email = htmlspecialchars(str_replace("'", "\'",$_POST['email2']));
              $MDP = htmlspecialchars(sha1(str_replace("'","\'",$_POST['pass1'])));

              if(isset($file_db)){
                $req = "SELECT login FROM MEMBRE WHERE login=:login GROUP BY idU ORDER BY prenom, nom";
                $stmt = $file_db->prepare($req);
                $stmt->bindParam(":login", $_REQUEST["pseudo"]);
                $stmt->execute();
                $data = $stmt->fetch();
                if(isset($data['login'])){
                  $samePseudo = 1;
                } else {
                  $samePseudo = 0;
                }
              } else {
                $samePseudo = 1;
              }

              if(isset($file_db)){
                $req = "SELECT adresse_Email FROM MEMBRE WHERE adresse_Email=:adresse_Email GROUP BY idU ORDER BY prenom, nom";
                $stmt = $file_db->prepare($req);
                $stmt->bindParam(":adresse_Email", $_REQUEST["email2"]);
                $stmt->execute();
                $data = $stmt->fetch();
                if(isset($data['adresse_Email'])){
                  $sameEmail = 1;
                } else {
                  $sameEmail = 0;
                }
              } else {
                $sameEmail = 1;
              }

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
                        $req = "SELECT max(idU) FROM MEMBRE;";
                        $res = $file_db->query($req);
                        $id = ($res->fetch())['max(idU)']+1;

                        $req = "INSERT INTO MEMBRE VALUES (:idU ,:nom , :prenom , :login, :adresse_Email, :mdp, :age , :ville)";
                        $stmt = $file_db->prepare($req);
                        $stmt->bindParam(":idU", $id);
                        $stmt->bindParam(":nom", $_REQUEST['nom']);
                        $stmt->bindParam(":prenom", $_REQUEST['prenom']);
                        $stmt->bindParam(":login", $_REQUEST['pseudo']);
                        $stmt->bindParam(":adresse_Email", $_REQUEST['email1']);
                        $stmt->bindParam(":mdp", $_REQUEST['pass1']);
                        $stmt->bindParam(":age", $_REQUEST['age']);
                        $stmt->bindParam(":ville", $_REQUEST['ville']);
                        $stmt->execute();
                        $stmt->closeCursor();
                        echo "yatta";
                        header("Location: connexion.php");
                      }
                      if(isset($erreurSame))
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
