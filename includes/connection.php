<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="design.css" />
    <title>Social.dev [connexion]</title>
  </head>
  <?php session_start(); ?>
  <body>
    <header>
      <h1>Connection</h1>
    </header>
    <section>
      <form action="#" method="post">
        Pseudo : <input type="text" name="Pseudo"/><br />
        Mot de passe : <input type="password" name="Pass" /><br />
        <input type="submit" value="Connexion"/>
      </form>
    </section>
  </body>
</html>
