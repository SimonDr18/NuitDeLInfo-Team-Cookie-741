<?php
session_start();
$_SESSION["page"]="inscription.php";
?>
<!DOCTYPE html>
<html>
<?php include_once("includes/_head.php"); ?>


<?php require_once("includes/_db.php"); ?>
<body>
<div class="container">
    <div class="row">
        <?php include_once("includes/_header.php"); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Inscription</h1>
            </div>
            <div class="panel-body ajout">
                <div class="ajoutbox">
                    <form action="inscription.php" method="post">
                        <div class="form-group">
                            <label>Nom :</label> <input type="text" name="nom" /><br />
                        </div>
                        <div class="form-group">
                            <label>Prenom :</label> <input type="text" name="prenom" /><br />
                        </div>
                        <div class="form-group">
                            <label>Pseudo :</label> <input type="text" name="pseudo" /><br />
                        </div>
                        <div class="form-group">
                            <label>Adresse Email :</label> <input type="email" name="email1"/><br/>
                        </div>
                        <div class="form-group">
                            <label>Re-Adresse Email : </label><input type="email" name="email2"/><br/>
                        </div>
                        <div class="form-group">
                            <label>Mot de passe :</label> <input type="password" name="pass1" /><br />
                        </div>
                        <div class="form-group">
                            <label>Re-Mot de passe : </label><input type="password" name="pass2" /><br />
                        </div>
                        <div class="form-group">
                            <label>Age :</label> <input type="number" name="age" /><br />
                        </div>
                        <div class="form-group">
                            <label>Ville : </label><input type="text" name="ville" /><br />
                        </div>
                        <div>
                            <input type="submit" value="Inscription" class="btn btn-default">
                        </div>
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
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
