<h1>Hello World</h1>


<?php
//framework.dev/contact/create
// localhost/framework/index.php?controller=contact&method=create

function dd($var)
{
  echo '<pre>'; print_r($var); echo '</pre>';
}

// On inclu/require le controleur général de l'application qui va interpréter l'url et lancer le bon controleur et lancer la bonne méthode. C'est la fonction handleRequest qui va faire le tri dans ce qu'il y a dans l'URL et lancé l'application.

require('controller/controller.php');
$controller = new Controller;
$controller->handleRequest();
