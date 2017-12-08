<?php require_once("includes/_db.php"); ?>
<?php
session_start();

if(isset($_REQUEST["Pseudo"]) AND isset($_REQUEST["Pass"])){
  if(isset($file_db)){
    $req = "SELECT idU, login, mdp FROM MEMBRE WHERE login=:login AND mdp=:mdp GROUP BY idU ORDER BY prenom, nom";
    $stmt = $file_db->prepare($req);
    $stmt->bindParam(":login", $_REQUEST["Pseudo"]);
    $stmt->bindParam(":mdp", $_REQUEST["Pass"]);
    $stmt->execute();
    $data = $stmt->fetch();
    if(isset($data['idU'])){
      $_SESSION["idU"]=$data['idU'];
      $_SESSION["login"]=$data['login'];
      $_SESSION["mdp"]=$data['mdp'];
      header("Location: index.php");
    } else {
      header("Location: connexion.php?err=1");
    }
  } else {
    header("Location: 404.php");
  }
} else {
  header("Location: connexion.php");
}
?>
