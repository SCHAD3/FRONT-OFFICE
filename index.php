<?php
session_start();

define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS'])? "https" : "http").
"://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]));

require_once("./controllers/Toolbox.class.php");
require_once("./controllers/Securite.class.php");
require_once("./controllers/Visiteur/Visiteur.controller.php");
require_once("./controllers/Utilisateur/Utilisateur.controller.php");
$visiteurController = new VisiteurController();
$utilisateurController = new UtilisateurController();

try {
    if(empty($_GET['page'])){
        $page = "accueil";
    } else {
        $url = explode("/", filter_var($_GET['page'],FILTER_SANITIZE_URL));
        $page = $url[0];
    }

    switch($page){
        case "accueil" : $visiteurController->accueil();
        break;
        case "formLogin" :$visiteurController->formLogin();
        break;
        case "validation_login" : 
        if(!empty($_POST['login']) && !empty ($_POST['password'])){
            $login=Securite::secureHTML($_POST['login']);
            $password=Securite::secureHTML($_POST['password']);
            $utilisateurController->validation_login($login,$password);
        }else{
            Toolbox::ajouterMessageAlerte("Veuillez renseigner votre login ou votre mot de passe", Toolbox::COULEUR_ROUGE);
            header('Location:'.URL."formLogin");
         }
        break;
        case "creationCompte" : $visiteurController->formCreationCompte();
        break;
        case "validation_creationCompte" : 
            if(!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['mail'])) {
                $login = Securite::secureHTML($_POST['login']);
                $password = Securite::secureHTML($_POST['password']);
                $mail = Securite::secureHTML($_POST['mail']);
                
                $formData = [
                    'age_range' => isset($_POST['age_range']) ? Securite::secureHTML($_POST['age_range']) : 0,
                    'niveau' => isset($_POST['niveau']) ? Securite::secureHTML($_POST['niveau']) : '',
                    'maladie' => isset($_POST['maladie']) ? (int)Securite::secureHTML($_POST['maladie']) : 0,
                    'objectif' => isset($_POST['objectif']) ? Securite::secureHTML($_POST['objectif']) : '',
                    'zone' => isset($_POST['zone']) ? Securite::secureHTML($_POST['zone']) : '',
                    'duree_max' => isset($_POST['duree_max']) ? (int)Securite::secureHTML($_POST['duree_max']) : 0,
                    'rituel' => isset($_POST['rituel']) ? Securite::secureHTML($_POST['rituel']) : '',
                    'jours' => isset($_POST['jours']) ? array_map([Securite::class, 'secureHTML'], $_POST['jours']) : []
                ];
                
                $visiteurController->validation_creationCompte($login, $password, $mail, $formData);
            } else {
                Toolbox::ajouterMessageAlerte("Veuillez saisir tous les champs obligatoires", Toolbox::COULEUR_ROUGE);
                header("Location: ".URL."creationCompte");
            }
        break;
        case "compte" : 
            if(!Securite::isConnect()){
                Toolbox::ajouterMessageAlerte("Veuillez vous connecter",Toolbox::COULEUR_ORANGE);
                header('Location:'.URL."formLogin");

            }else {
            switch($url[1]){
                case "profil": $utilisateurController->profil();
                break;
                case"deconnexion": $utilisateurController->deconnexion();
                break;
                case "validation_modifMail" : $utilisateurController->validation_modifMail(Securite::secureHTML($_POST['mail']));
                break;
                case "modifPassword" : $utilisateurController->modifPassword();
                break;
                case "validation_modifPassword" :
                    if(!empty($_POST['ancienPassword']) && !empty($_POST['nouveauPassword']) && !empty($_POST['confirmNouveauPassword'])){
                        $ancienPassword = Securite::secureHTML($_POST['ancienPassword']);
                        $nouveauPassword = Securite::secureHTML($_POST['nouveauPassword']);
                        $confirmationNouveauPassword = Securite::secureHTML($_POST['confirmNouveauPassword']);
                        $utilisateurController->validation_modifPassword($ancienPassword,$nouveauPassword,$confirmationNouveauPassword);
                    } else {
                        Toolbox::ajouterMessageAlerte("Vous n'avez pas renseigné toutes les informations", Toolbox::COULEUR_ROUGE);
                        header("Location: ".URL."compte/modifPassword");
                    }
                break; 
                case "validation_modifImage" :
                    if($_FILES['image']['size'] > 0) {
                        $utilisateurController->validation_modifImage($_FILES['image']);
                    } else {
                        Toolbox::ajouterMessageAlerte("Vous n'avez pas modifié l'image", Toolbox::COULEUR_ROUGE);
                        header("Location: ".URL."compte/profil");
                    }
                break;
            }
            
        }
        break;
        case "formProgrammeP" : $visiteurController->formProgrammeP();
        break;
        case "pageConseil" : $visiteurController->pageConseil();
        break;
        case "formContact" : $visiteurController->formContact();
        break;
        default : throw new Exception("La page n'existe pas");
    }
} catch (Exception $e){
    $visiteurController->pageErreur($e->getMessage());
}

//index.php?page=accueil
//index.php?page=page1
//index.php?page=contact