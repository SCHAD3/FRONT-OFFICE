<?php
require_once("./controllers/MainController.controller.php");
require_once("./models/Utilisateur/Utilisateur.model.php");

class UtilisateurController extends MainController{
     private $utilisateurManager;

     public function __construct() {
        $this->utilisateurManager = new utilisateurManager();
     }

   public function validation_login($login,$password){
     if($this->utilisateurManager->isCombinaisonValide($login,$password)){
      if($this->utilisateurManager->isCompteActif($login)){
        Toolbox::ajouterMessageAlerte("Bon retour sur Coach.Me " .$login." !", Toolbox::COULEUR_VERTE);
        header("Location:".URL."compte/profil");
        $_SESSION['profil']=[
          "login" => $login,
        ];
      }else{
      Toolbox::ajouterMessageAlerte("Le compte " .$login." n'a pas été activé par e-mail", Toolbox::COULEUR_ROUGE);
      //renvoyer le mail de validation a ajouter
    header("Location:".URL."formLogin");
    }
   }else{
        Toolbox::ajouterMessageAlerte("La combinaison Login/ Mot de passe est incorrecte", Toolbox::COULEUR_ROUGE);
      header("Location:".URL."formLogin");
     }
   }
   public function profil(){
    $datas = $this->utilisateurManager->getUserInformation($_SESSION['profil']['login']);
    // print_r($datas);
    $_SESSION['profil']["role"] = $datas['role'];
    
    $data_page = [
        "page_description" => "Espace utilisateur contenant son programme personnalisé et ses informations de profil",
        "page_title" => "Espace utilisateur",
        "utilisateur" => $datas,
        "page_css" => ["accueil.css"],
        "page_javascript" => ['profil.js'],
        "view" => "views/Utilisateur/profil.view.php",
        "template" => "views/common/template.php"
    ];
    $this->genererPage($data_page);
}

public function validation_modifMail($mail){
  if($this->utilisateurManager->bdModifMail($_SESSION['profil']['login'],$mail)){
      Toolbox::ajouterMessageAlerte("La modification est effectuée", Toolbox::COULEUR_VERTE);
  } else {
      Toolbox::ajouterMessageAlerte("Aucune modification effectuée", Toolbox::COULEUR_ROUGE);
  }
  header("Location: ".URL."compte/profil");
}

public function modifPassword(){
  $data_page = [
      "page_description" => "Page de modification du password",
      "page_title" => "Page de modification du password",
      "page_javascript" => ["modifPassword.js"],
      "view" => "views/Utilisateur/formModifPassword.view.php",
      "template" => "views/common/template.php"
  ];
  $this->genererPage($data_page);
}
public function validation_modifPassword($ancienPassword,$nouveauPassword,$confirmationNouveauPassword){
  if($nouveauPassword === $confirmationNouveauPassword){
      if($this->utilisateurManager->isCombinaisonValide($_SESSION['profil']['login'],$ancienPassword)){
          $passwordCrypte = password_hash($nouveauPassword,PASSWORD_DEFAULT);
          if($this->utilisateurManager->bdModifPassword($_SESSION['profil']['login'],$passwordCrypte)){
              Toolbox::ajouterMessageAlerte("La modification du password a été effectuée", Toolbox::COULEUR_VERTE);
              header("Location: ".URL."compte/profil");
          } else {
              Toolbox::ajouterMessageAlerte("La modification a échouée", Toolbox::COULEUR_ROUGE);
              header("Location: ".URL."compte/modifPassword");
          }
      } else {
          Toolbox::ajouterMessageAlerte("La combinaison login / ancien password ne correspond pas", Toolbox::COULEUR_ROUGE);
          header("Location: ".URL."compte/modifPassword");
      }            
  } else {
      Toolbox::ajouterMessageAlerte("Les passwords ne correspondent pas", Toolbox::COULEUR_ROUGE);
      header("Location: ".URL."compte/modifPassword");
  }
}

public function adapterNiveau($utilisateur) { 
  if ($utilisateur['maladie'] == 1 || ($utilisateur['age_range'] == 4 && $utilisateur['niveau'] != 'advanced')) {
     return 'gently'; }
   elseif ($utilisateur['niveau'] == 'advanced') { 
    return 'balance'; 
  } else { 
    return $utilisateur['niveau'];
   } 
  }

  public function modificationPassword(){
        $data_page = [
            "page_description" => "Page de modification du password",
            "page_title" => "Page de modification du password",
            "page_javascript" => ["modificationPassword.js"],
            "view" => "views/Utilisateur/modificationPassword.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function validation_modifImage($file){
      try{
          $repertoire = "public/Assets/images/profils/".$_SESSION['profil']['login']."/";
          // error_log("Chemin du répertoire : " . $repertoire); var_dump($repertoire);
  
          $nomImage = Toolbox::ajoutImage($file, $repertoire); // ajout image dans le répertoire
          // error_log("Nom de l'image : " . $nomImage);
          // var_dump($nomImage);
          // var_dump($repertoire);
  
          // Suppression de l'ancienne image
          $this->dossierSuppressionImageUser($_SESSION['profil']['login']);
          error_log("Ancienne image supprimée pour l'utilisateur : " . $_SESSION['profil']['login']);
  
          // Ajout de la nouvelle image dans la BD
          $nomImageBD = "profils/".$_SESSION['profil']['login']."/".$nomImage;
          // error_log("Chemin de l'image dans la BD : " . $nomImageBD);
          // var_dump($nomImageBD);
  
          if($this->utilisateurManager->bdAjoutImage($_SESSION['profil']['login'], $nomImageBD)){
              Toolbox::ajouterMessageAlerte("La modification de l'image est effectuée", Toolbox::COULEUR_VERTE);
          } else {
              Toolbox::ajouterMessageAlerte("La modification de l'image n'a pas été effectuée", Toolbox::COULEUR_ROUGE);
          }
      } catch(Exception $e){
          Toolbox::ajouterMessageAlerte($e->getMessage(), Toolbox::COULEUR_ROUGE);
          // error_log("Erreur : " . $e->getMessage());
      }
  
       header("Location: ".URL."compte/profil");
  }
  
  private function dossierSuppressionImageUser($login){
      $ancienneImage = $this->utilisateurManager->getImageUtilisateur($_SESSION['profil']['login']);
      if($ancienneImage){
          error_log("Ancienne image à supprimer : " . $ancienneImage);
          unlink("public/Assets/images/".$ancienneImage);
      }
  }
  

public function deconnexion(){
  Toolbox::ajouterMessageAlerte("Vous êtes deconnectée", Toolbox::COULEUR_VERTE);
  unset($_SESSION['profil']);
  header("Location:".URL."accueil");
}
    public function pageErreur($msg){
        parent::pageErreur($msg);
    }
}
