<?php

require_once("./models/MainManager.model.php");



class ExerciceManager extends MainManager {

    // private $utilisateurManager; // Gestionnaire d'utilisateur
    // private $exerciceManager; // Gestionnaire d'exercice
    // // table intermediaire


    
    //     public function __construct() {
    //         $this->utilisateurManager = new UtilisateurManager();  // Initialisation du gestionnaire utilisateur
    //         $this->exerciceManager = $this;  // L'instance courante (ExerciceManager) gère les exercices
    //     }

    public function bdAjoutPersonalisation($login, $zone, $niveau, $objectif) {
        $req = "
            INSERT INTO user_exercices (user_login, exercice_id)
            SELECT :login, e.ID_exercice
            FROM exercices e
            WHERE e.zone = :zone
              AND e.niveau_difficulte = :niveau
              AND e.type_exercice = :objectif
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':login', $login, PDO::PARAM_STR);
        $stmt->bindValue(':zone', $zone, PDO::PARAM_STR);
        $stmt->bindValue(':niveau', $niveau, PDO::PARAM_STR);
        $stmt->bindValue(':objectif', $objectif, PDO::PARAM_STR);
        $stmt->execute();
    }
    


    public function getUserSeance($user) {
        $niveau = $user['niveau'];
        $zone = $user['zone'];
        $objectif = $user['objectif'];

        $req = "
            SELECT e.*
            FROM exercices e
            JOIN user_exercices ue ON e.ID_exercice = ue.exercice_id
            WHERE ue.user_login = :user_id
            AND e.niveau_difficulte = :niveau
            AND e.zone = :zone
            AND e.type_exercice = :objectif
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindParam(':user_id', $user['login']);
        $stmt->bindParam(':niveau', $niveau);
        $stmt->bindParam(':zone', $zone);
        $stmt->bindParam(':objectif', $objectif);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function supprimerPersonalisation($login)
{
    try {
        $req = "DELETE FROM user_exercices WHERE user_login = :login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':login', $login, PDO::PARAM_STR);
        $stmt->execute();
        error_log("Exercices supprimés pour l'utilisateur $login");
    } catch (PDOException $e) {
        error_log("Erreur lors de la suppression des exercices pour l'utilisateur $login : " . $e->getMessage());
    }
}



}






