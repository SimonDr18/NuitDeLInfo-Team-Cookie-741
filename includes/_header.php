<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a <?php if($_SESSION["page"]=="index.php"){ echo "class='active'"; } ?> class="navbar-brand" href="index.php">Cookies Prévention</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a <?php if($_SESSION["page"]=="soiree.php"){ echo "class='active'"; } ?> href="soiree.php">Creer soirée</a></li>
                <li><a <?php if($_SESSION["page"]=="creerevenement.php"){ echo "class='active'"; } ?> href="creerevenement.php">Signaler évenement</a></li>
                <li class="dropdown">
                    <a <?php if($_SESSION["page"]=="infos.php"){ echo "class='active'"; } ?> href="infos.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Infos<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a <?php if($_SESSION["page"]=="infos_event.php"){ echo "class='active'"; } ?> href="infos.php?type=event">Evenement</a></li>
                        <li><a <?php if($_SESSION["page"]=="infos_route.php"){ echo "class='active'"; } ?> href="infos.php?type=route">Condition route</a></li>
                        <li><a <?php if($_SESSION["page"]=="infos_transport.php"){ echo "class='active'"; } ?> href="infos.php?type=transport">Transport</a></li>
                    </ul>
                </li>
                <li><a <?php if($_SESSION["page"]=="formation.php"){ echo "class='active'"; } ?> href="formation.php">Formation</a></li>
                <li class="dropdown">
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><button type="submit" class="btn btn-primary btn-sm"><a <?php if($_SESSION["page"]=="connexion.php"){ echo "class='active'"; } ?> href="connexion.php">Connexion</a></button></li>
            </ul>

        </div><!--/.nav-collapse -->

    </div>
</nav>
