<!DOCTYPE html>
<html>
	<head>
		<title>SQLite</title>
	</head>
	<body>
		<?php
      // script php d'initialisation de la bd
			date_default_timezone_set('Europe/Paris');
			try{
				$file_db = new PDO("sqlite:site.sqlite3");
				$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
			try{
				$sql = file_get_contents('reset.sql');
				$rep = $file_db->exec($sql);
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
			try{
				$sql = file_get_contents('db.sql');
				$rep = $file_db->exec($sql);
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		?>
	</body>
</html>
