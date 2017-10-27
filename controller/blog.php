<?php

class BlogController extends Controller
{
  public function create()
  {
    $this->render('blog.create');
  }

  public function store()
  {
      $article = new Model('article');
      $article->titre = $_POST['titre'];
      $article->contenu = $_POST['contenu'];
      $article->auteur = $_POST['auteur'];
      $article->save();
      header('Location: /blog/index');
  }

  public function index()
  {
      $article = new Model('article');
      $GLOBALS['article'] = $article->all();
      $this->render('blog.index');
  }

  public function edit()
  {
      $article = new Model('article');
      $article->find($_GET['id']);
      $GLOBALS['article'] = $article;
      $this->render('blog.edit');
  }

  public function update()
  {
      $article = new Model('article');
      $article->find($_GET['id']);
      $article->titre = $_POST['titre'];
      $article->contenu = $_POST['contenu'];
      $article->auteur = $_POST['auteur'];
      $article->save();

      header('location:/blog/index');
  }
  public function delete()
  {
      $article = new Model('article');
      $article->delete($_GET['id']);

      header('location:/blog/index');
  }
}
