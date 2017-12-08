<?php
session_start();
$_SESSION["page"]="index.php";
?>
<!DOCTYPE html>
<html lang='fr'>
<?php include_once("includes/_head.php"); ?>
<?php include_once("includes/_header.php"); ?>



<!-- COOKIES ! -->
<body>
<div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="static/images/arrive.jpg" alt="Image">
            </div>

            <div class="item">
                <img src="static/images/GameSquare.jpg" alt="Image2">
            </div>

            <div class="item">
                <img src="static/images/BlackSquare.jpg" alt="Image3">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div>
    Météo d'une ville random :<br/>
    <div id="cont_NDUyMzR8MXwxfDR8NHwwMDAwMDB8MXxGQUUwMzF8Y3wx"><div id="spa_NDUyMzR8MXwxfDR8NHwwMDAwMDB8MXxGQUUwMzF8Y3wx"><a id="a_NDUyMzR8MXwxfDR8NHwwMDAwMDB8MXxGQUUwMzF8Y3wx" href="http://www.meteocity.com/france/orleans_v45234/" target="_blank" style="color:#333;text-decoration:none;">Météo Orléans</a> ©<a href="http://www.meteocity.com">meteocity.com</a></div><script type="text/javascript" src="http://widget.meteocity.com/js/NDUyMzR8MXwxfDR8NHwwMDAwMDB8MXxGQUUwMzF8Y3wx"></script></div>
</div>

<div>
    Numéros urgence :<br/>
    Samu - 15<br/>
    Police Secours - 17<br/>
    Pompiers - 18<br/>
    Général - 112<br/>
</div>

<div>
    Contactez-nous : clement.guichard1@etu.univ-orleans.fr
</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="static/bootstrap3-dist/js/bootstrap.min.js"></script>
