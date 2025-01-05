<?php
require_once("./models/MainManager.model.php");

class VisiteurManager extends MainManager {

    public function getUtilisateurs() {
        $req = $this->getBdd()->prepare("SELECT * FROM user");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }

    public function isLoginDispo($login) {
        $req = "SELECT * FROM user WHERE login = :login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->execute();
        $dispo = ($stmt->rowCount() === 0);
        $stmt->closeCursor();
        return $dispo;
    }

    
        public function bdCreationCompte($login, $passwordCrypte, $mail, $clef, $formData = []) {
            try {
                $req = "INSERT INTO user (
                    login, password, mail, est_valide, role, clef,
                    age_range, niveau, maladie, objectif, zone,
                    duree_max, rituel, jours, image
                ) VALUES (
                    :login, :password, :mail, 1, 'utilisateur', :clef,
                    :age_range, :niveau, :maladie, :objectif, :zone,
                    :duree_max, :rituel, :jours, ''
                )";
        
                $stmt = $this->getBdd()->prepare($req);
                
                // Bind des valeurs obligatoires
                $stmt->bindValue(":login", $login, PDO::PARAM_STR);
                $stmt->bindValue(":password", $passwordCrypte, PDO::PARAM_STR);
                $stmt->bindValue(":mail", $mail, PDO::PARAM_STR);
                $stmt->bindValue(":clef", $clef, PDO::PARAM_INT);
                
                // Conversion et bind des valeurs du formulaire
                // age_range est un INT dans la BD
                $stmt->bindValue(":age_range", (int)($formData['age_range'] ?? 0), PDO::PARAM_INT);
                $stmt->bindValue(":niveau", $formData['niveau'] ?? '', PDO::PARAM_STR);
                // maladie est un TINYINT(1) dans la BD
                $stmt->bindValue(":maladie", (int)($formData['maladie'] ?? 0), PDO::PARAM_INT);
                $stmt->bindValue(":objectif", $formData['objectif'] ?? '', PDO::PARAM_STR);
                $stmt->bindValue(":zone", $formData['zone'] ?? '', PDO::PARAM_STR);
                // duree_max est un INT dans la BD
                $stmt->bindValue(":duree_max", (int)($formData['duree_max'] ?? 0), PDO::PARAM_INT);
                $stmt->bindValue(":rituel", $formData['rituel'] ?? '', PDO::PARAM_STR);
                // jours doit être du JSON dans la BD
                $stmt->bindValue(":jours", 
                    !empty($formData['jours']) ? json_encode($formData['jours']) : 'null', 
                    PDO::PARAM_STR
                );
        
                $stmt->execute();
                return ($stmt->rowCount() > 0);
            } catch (PDOException $e) {
                // Log l'erreur pour le débogage
                error_log("Erreur SQL : " . $e->getMessage());
                return false;
            }
        }
    }