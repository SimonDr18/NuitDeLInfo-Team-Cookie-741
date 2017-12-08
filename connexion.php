<?php
session_start();
$_SESSION["page"]="connexion.php";
?>
<!DOCTYPE html>
<html>
<?php include_once("includes/_head.php"); ?>

<body>
<div class="container">
    <div class="row">
        <?php include_once("includes/_header.php"); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 >Connexion</h1>
            </div>
            <div class="panel-body ajout"> <!--loginform-->
                <div class="ajoutbox"> <!--loginbox-->
                    <?php
                    if(isset($_REQUEST["err"]))
                        echo "Utilisateur inconnu";
                    ?>
                    <form action="+co.php" method="post">
                        <div class="form-group">
                            <label>Login : </label><input type="text" name="Pseudo"/><br />
                        </div>
                        <div class="form-group">
                            <label>Mot de passe : </label><input type="password" name="Pass" /><br />
                        </div>
                        <div>
                            <input type="submit" value="Connexion" class="btn btn-default"/>
                        </div>
                    </form>
                    <form action="inscription.php" style="margin: 5%" method="post">
                        <input type="submit" value="Inscription" class="btn btn-default">
                    </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
