<!DOCTYPE html>
<html lang='fr'>
<?php include_once("includes/_head.php"); ?>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Cookies Prévention</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="soiree.php">Creer soirée</a></li>
                <li><a href="event.php">Signaler event</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Infos <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Evenement</a></li>
                        <li><a href="#">Condition route</a></li>
                        <li><a href="#">Transport</a></li>
                    </ul>
                </li>
                <li><a href="formation.php">Formation</a></li>
                <li class="dropdown">
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><button type="submit" class="btn btn-primary btn-sm"><a href="connexion.php">Connexion</a></button></li>
            </ul>

        </div><!--/.nav-collapse -->

    </div>
</nav>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="static/bootstrap3-dist/js/bootstrap.min.js"></script>
