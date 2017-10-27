<?php

class ContactController extends Controller
{
  public function create()
  {
    $this->render('contact.create');
  }

  public function store()
  {
      $contact = new Model('contacts');
      $contact->prenom = $_POST['prenom'];
      $contact->nom = $_POST['nom'];
      $contact->phone = $_POST['phone'];
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
