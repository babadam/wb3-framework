<?php

class Controller
{
    //Ce controlleur général est instancié dans l'index.php

    // la fonction handleRequest va scanner l'url pour savoir quelle action a été demandée
  public function handleRequest()
  {
    require('model/model.php');  // on require Model qui va effectuer la connexion à la BDD
    $exploded = explode('/', $_SERVER['REQUEST_URI']); // transforme CC en array a partir du slash 1er indice framework.dev deuxieme indeici 'contact 3eme indice create en decomposant les infos dans l'URL
    $controller = $exploded[1];// $controller va contenir le controleur : cpntact
    $method = $exploded[2]; // $method va contenir l'action à effecvtuer : create

    require('controller/' . $controller . '.php'); // require le controleur dont on a besoin : controller/contact.php
    // ContactController :  Contact      Controller
    $controller = ucfirst($controller) . 'Controller';
    $controller = new $controller; // on instancie le controller dont a besoin en faisiant : $controller = new Contact
    $controller->$method(); // Depuis le controller que l'on vient de créer on lance la méthode damndée dans l'URL : $controller -> create();

    // En résumé :
    // Require('model/model.php');
    // require('controller/contact.php');
    // $controller = new ContactController;
    // $controller -> create();
  }
  public function render($view)
  {
      // Cette fonction attends un argument du type : nom_du_dossier.nom_du_fichier : contact.create
      // Elle va recréer le chemin complet de la vue à require en commencant par le dossier View , puis le nom du dossier puis le nom du fichier
      // str_replace permet de remplacer le '.'par un '/'
      // Le chemin de notre vue devient : view/contact/create.php
    $chemin_view = 'view/' . str_replace('.', '/', $view) . '.php';
    require($chemin_view);
    // On require la vue demandé
  }
}
