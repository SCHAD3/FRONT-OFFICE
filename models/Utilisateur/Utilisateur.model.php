<?php
require_once("./models/MainManager.model.php");

class UtilisateurManager extends MainManager
{

  private function getPasswordUser($login)
  {
    $req = "SELECT password FROM user WHERE login=:login";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $result['password'];
  }

  public function bdModifPassword($login, $password)
  {
    $req = "UPDATE user set password = :password WHERE login = :login";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->bindValue(":password", $password, PDO::PARAM_STR);
    $stmt->execute();
    $modif = ($stmt->rowCount() > 0);
    $stmt->closeCursor();
    return $modif;
  }
  public function isCombinaisonValide($login, $password)
  {
    $passwordDB = $this->getPasswordUser($login);
    // echo $passwordDB;
    return password_verify($password, $passwordDB);
  }

  public function isCompteActif($login)
  {
    // return false;
    $req = "SELECT  est_valide FROM user WHERE login=:login";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return ((int)$result['est_valide'] === 1);
  }

  public function getUserInformation($login)
  {
    $req = "SELECT * FROM user WHERE login = :login";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $resultat;
  }

  public function bdModifMail($login, $mail)
  {
    $req = "UPDATE user set mail = :mail WHERE login = :login";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->bindValue(":mail", $mail, PDO::PARAM_STR);
    $stmt->execute();
    $modif = ($stmt->rowCount() > 0);
    $stmt->closeCursor();
    return $modif;
  }

  public function bdAjoutImage($login, $image)
  {
    $req = "UPDATE user set image = :image WHERE login = :login";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->bindValue(":image", $image, PDO::PARAM_STR);
    $stmt->execute();
    $modif = ($stmt->rowCount() > 0);
    $stmt->closeCursor();
    return $modif;
  }

  public function getImageUtilisateur($login)
  {
    $req = "SELECT image FROM user WHERE login = :login";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $resultat['image'];
  }

  public function bdModifZone($login, $zone)
  {
    $req = "UPDATE user SET zone = :zone WHERE login = :login";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->bindValue(":zone", $zone, PDO::PARAM_STR);
    $stmt->execute();
    $modif = ($stmt->rowCount() > 0);
    $stmt->closeCursor();
    return $modif;
  }

  public function bdModifDuree($login, $dureeMax)
  {
    $req = "UPDATE user SET duree_max = :duree_max WHERE login = :login";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->bindValue(":duree_max", $dureeMax, PDO::PARAM_INT);
    $stmt->execute();
    $modif = ($stmt->rowCount() > 0);
    $stmt->closeCursor();
    return $modif;
  }
  
  public function bdModifNiveau($login, $niveau)
  {
    $req = "UPDATE user SET niveau = :niveau WHERE login = :login";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->bindValue(":niveau", $niveau, PDO::PARAM_STR);
    $stmt->execute();
    $modif = ($stmt->rowCount() > 0);
    $stmt->closeCursor();
    return $modif;
  }
  public function bdModifObjectif($login, $objectif)
  {
    $req = "UPDATE user SET objectif = :objectif WHERE login = :login";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->bindValue(":objectif", $objectif, PDO::PARAM_STR);
    $stmt->execute();
    $modif = ($stmt->rowCount() > 0);
    $stmt->closeCursor();
    return $modif;
  }
  public function bdModifRituel($login, $rituel)
  {
    $req = "UPDATE user SET rituel = :rituel WHERE login = :login";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->bindValue(":rituel", $rituel, PDO::PARAM_STR);
    $stmt->execute();
    $modif = ($stmt->rowCount() > 0);
    $stmt->closeCursor();
    return $modif;
  }

  public function bdModifJours($login, $joursJson) {
    $req = "UPDATE user SET jours = :jours WHERE login = :login";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->bindValue(":jours", $joursJson, PDO::PARAM_STR);
    $stmt->execute();
    $modif = ($stmt->rowCount() > 0);
    $stmt->closeCursor();
    return $modif;
}
}
