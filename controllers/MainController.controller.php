<?php

require_once("models/MainManager.model.php");
require_once("controllers/Toolbox.class.php");

abstract class MainController{
    //   private $mainManager;

    //  public function __construct(){
    //      $this->mainManager = new MainManager();
    //  }

    protected function genererPage($data){
        extract($data);
        ob_start();
        require_once($view);
        $page_content = ob_get_clean();
        require_once($template);
    }

    // public function accueil(){
    //     $data_page = [
    //         "page_description" => "Page presentant trois programmes sportifs selon la cible du corps,  à personnaliser selon principalement selon l'objectif et le niveau. Le site cible les femmes souhaitant effectuer des exercices à domicile selon leur disponibilité.  ",
    //         "page_title" => "Accueil",
    //         "page_css" => ["accueil.css"],
    //         "view" => "views/accueil.view.php",
    //         "template" => "views/common/template.php"
    //     ];
    //     $this->genererPage($data_page);
    // }
    
    public function formLogin(){
        // $datas = $this->mainManager->getDatas();

        $_SESSION['alert'] = [
            "message" => "Exemple de message d'alerte",
            "type" => "alert-success"
        ];

        $data_page = [
            "page_description" => "Formulaire de connexion au compte utilisateur",
            "page_title" => "Login",
            // "datas" => $datas,
            "page_css" => ["accueil.css"],
            "view" => "./views/formLogin.view.php",
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
    public function pageConseil(){
        $data_page = [
            "page_description" => "Page affichant des articles trimestriels sur la santé, la nutrition et la psychologie",
            "page_title" => "Magazine Psycho & Nutrition",
            "page_css" => ["accueil.css"],
            "page_javascript" => ["page3.js"],
            "view" => "./views/Visiteur/pageConseil.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    
    protected function pageErreur($msg){
        $data_page = [
            "page_description" => "Page permettant de gérer les erreurs",
            "page_title" => "Page d'erreur",
            "msg" => $msg,
            "view" => "./views/erreur.view.php",
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

    
}