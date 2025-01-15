<?php
require_once("./controllers/MainController.controller.php");
require_once("./models/Visiteur/Visiteur.model.php");

class VisiteurController extends MainController
{
    private $visiteurManager;

    public function __construct() {
        $this->visiteurManager = new visiteurManager();
    }

    public function accueil() {
        // $utilisateurs = $this->visiteurManager->getUtilisateurs();
        $data_page = [
            "page_description" => "Description de la page d'accueil",
            "page_title" => "Titre de la page d'accueil",
            // "utilisateurs" => $utilisateurs,
            "page_css" => ["accueil.css"],
            "view" => "views/Visiteur/accueil.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function formContact(){
        // $datas = $this->mainManager->getDatas();

        // $_SESSION['alert'] = [
        //     "message" => "Exemple de message d'alerte",
        //     "type" => "alert-success"
        // ];

        $data_page = [
            "page_description" => "Page de contact avec formulaire",
            "page_title" => "Contact",
            // "datas" => $datas,
            "page_css" => ["pageContact.css"],
            "view" => "./views/Visiteur/formContact.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function formProgrammeP(){
        $_SESSION['alert'] = [
            "message" => "Exemple de message d'alerte",
            "type" => "alert-danger"
        ];

        $data_page = [
            "page_description" => "Formulaire de questions à choix multiples permettant d'etablir un programme sportif personnalisé.",
            "page_title" => "QCM",
            "page_css" => ["accueil.css"],
            "view" => "./views/Visiteur/formProgrammeP.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function formLogin(){

        $data_page = [
            "page_description" => "Login",
            "page_title" => "Mon compte",
            "page_css" => ["accueil.css"],
            "view" => "./views/Visiteur/formLogin.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function formCreationCompte(){
        $data_page = [
            "page_description" => "Page de création de compte",
            "page_title" => "Creer mon compte",
            "page_css" => ["accueil.css"],
            "view" => "./views/Visiteur/formCreationCompte.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function validation_creationCompte($login, $password, $mail, $formData = []) {
        // Vérification si le login est disponible
        error_log("Vérification de la disponibilité du login: $login");
        if ($this->visiteurManager->isLoginDispo($login)) {
            error_log("Login disponible: $login");
    
            $passwordCrypte = password_hash($password, PASSWORD_DEFAULT);
            $clef = rand(0, 9999); // Générer une clé de validation
        
            // Tentative de création du compte utilisateur
            if ($this->visiteurManager->bdCreationCompte($login, $passwordCrypte, $mail, $clef, $formData)) {
                error_log("Compte créé pour le login: $login");
    
                // Vérification et association des préférences
                $zone = $formData['zone'] ?? '';
                $niveau = $formData['niveau'] ?? '';
                $objectif = $formData['objectif'] ?? '';
    
                // Log les paramètres
                error_log("Paramètres d'association - Zone: $zone, Niveau: $niveau, Objectif: $objectif");
    
                // Appel pour associer les préférences et exercices
                if ($this->visiteurManager->bdAjoutPersonnalisationExercices($login, $zone, $niveau, $objectif)) {
                    error_log("Exercices associés pour le login: $login");
                } else {
                    error_log("Échec de l'association des exercices pour le login: $login");
                }
        
                Toolbox::ajouterMessageAlerte(
                    "Votre compte a été créé avec succès. Un e-mail de validation vous a été envoyé !",
                    Toolbox::COULEUR_VERTE
                );
                header("Location:" . URL . "formLogin");
            } else {
                error_log("Échec de la création du compte pour le login: $login");
    
                Toolbox::ajouterMessageAlerte(
                    "Erreur lors de la création du compte. Veuillez recommencer",
                    Toolbox::COULEUR_ROUGE
                );
                header("Location:" . URL . "creationCompte");
            }
        } else {
            error_log("Login non disponible: $login");
    
            Toolbox::ajouterMessageAlerte(
                "Le login saisi n'est pas disponible. Veuillez en choisir un autre",
                Toolbox::COULEUR_ORANGE
            );
            header("Location:" . URL . "creationCompte");
        }
    }
    
    
    
    public function pageErreur($msg){
        parent::pageErreur($msg);
    }
}
