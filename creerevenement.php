<?php
session_start();
$_SESSION["page"]="creerevenement.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Créer un événement</title>
    <?php require_once("includes/_head.php"); ?>
</head>

<body>
<div class="container">
    <div class="row">
        <?php require_once("includes/_header.php"); ?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Signaler un évènement</h1>
                </div>
                <div class="panel-body ajout" >
                    <div class="ajoutbox">
                        <form action="#" method="post">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Titre evenement :</label><input  type="text" name="event" />
                                </div>
                                <div class="form-group">
                                    <label>Type : </label><input  type="text" name="type" />
                                </div>
                                <div class="form-group">
                                    <label>Nombre de blessés : </label><input  type="number" name="nbblesses" />
                                </div>
                            </div>
                            <div>
                                <input type="submit" value="Créer" class="btn btn-default">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


