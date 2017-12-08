<?php require_once("includes/_db.php"); ?>
<?php
session_start();

if(isset($_REQUEST["soirID"]) AND isset($_REQUEST["dateDSoirée"]) AND isset($_REQUEST["dateFSoirée"])){
  if(isset($file_db)){
    $req = "SELECT max(idGroupeSoiree) as maxId FROM GROUPESOIREE";
    $stmt = $file_db->query($req);
    $newId = ($stmt->fetch())['maxId']+1;

    echo $newId;

    $adresse = $_POST["adresse"];
    $dateDeb = $_POST["dateDSoirée"];
    $dateFin = $_POST["dateFSoirée"];

    $insert = "INSERT INTO GROUPESOIREE (idGroupeSoiree, adresse, dateDeb, dateFin)
              VALUES (:newId, :adresse, :dateDeb, :dateFin);";
    $stmt = $file_db->prepare($insert);
    $stmt->bindParam(':newId', $newId, PDO::PARAM_STR);
    $stmt->bindParam(':adresse', $adresse, PDO::PARAM_STR);
    $stmt->bindParam(':dateDeb', $dateDeb, PDO::PARAM_STR);
    $stmt->bindParam(':dateFin', $dateFin, PDO::PARAM_STR);
    $stmt->execute();

    if(isset($_POST["idU"])){
      $estSAM = false;
      $idU = $_POST["idUtil"];

      $insert = "INSERT INTO Participe (estSAM, idGroupeSoiree, idU)
                VALUES (:estSAM, :idGroupeSoiree, :idU);";
      $stmt = $connexion->prepare($insert);
      $stmt->bindParam(':estSAM', $estSAM, PDO::PARAM_STR);
      $stmt->bindParam(':idGroupeSoiree', $idGroupeSoiree, PDO::PARAM_STR);
      $stmt->bindParam(':idU', $idU, PDO::PARAM_STR);
      $stmt->execute();
    }
  }
}

  header("Location: index.php");
?>
