<?php
session_start();
$_SESSION["page"]="connexion.php";
?>
<!DOCTYPE html>
<html>
<?php include_once("includes/_head.php"); ?>

    <?php require_once("includes/_header.php"); ?>
    <body >
    <div id="connexion">
    <header id="titreCo">
      <h1 >Connexion</h1>
    </header>
    <section class="panel-body ajout">
      <?php
        if(isset($_REQUEST["err"]))
          echo "Utilisateur inconnu";
      ?>
      <form action="+co.php" method="post">
        Login : <input type="text" name="Pseudo"/><br />
        Mot de passe : <input type="password" name="Pass" /><br />
        <input type="submit" value="Connexion"/>
      </form>
      <form action="inscription.php" style="margin: 5%" method="post">
        <input type="submit" value="inscription"/>
      </form>
    </section>
    </div>
  </body>
</html>
