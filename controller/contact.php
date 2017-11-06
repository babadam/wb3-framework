<?php

class ContactController extends Controller
{
  public function create()
  {
      // Cette fonction create n'a pas vraiment de traitement particulier. Son objectif est simplement de nous retourner la vue : Firmualire de contact : view/contact/create.php
    $this->render('contact.create'); // La fonction render a ét crée dans le controller général mais est diposnible car ContactController hérite du controller général.
    // L'objectif de la fonction render est de faire un require du bon fichier de 'view'
  }

  public function store()
  {
      // Dans cette fonction, on va devoir intéragir avec la BDD, et donc on récupère un objet de la classe Model en précisant la table à interroger : contacts
      $contact = new Model('contacts');

      // on créer 3 variables à la volée dans notre objet(prneom, nom, phone ) auxquelles on affecte les infos transmises via le formualire
      $contact->prenom = $_POST['prenom'];
      $contact->nom = $_POST['nom'];
      $contact->phone = $_POST['phone'];

      // La fonction save permet d'éfféecruer un INSERT dans la BDD 
      $contact->save();
      header('Location: /contact/index');
  }

  public function index()
  {
      $contact = new Model('contacts');
      $GLOBALS['contacts'] = $contact->all();
      $this->render('contact.index');
  }

  public function edit()
  {
      $contact = new Model('contacts');
      $contact->find($_GET['id']);
      $GLOBALS['contact'] = $contact;
      $this->render('contact.edit');
  }

  public function update()
  {
      $contact = new Model('contacts');
      $contact->find($_GET['id']);
      $contact->prenom = $_POST['prenom'];
      $contact->nom = $_POST['nom'];
      $contact->phone = $_POST['phone'];
      $contact->save();

    //   header('Location: /contact/index');
  }
  public function delete()
  {
      $contact = new Model('contacts');
      $contact->delete($_GET['id']);
  }
}
