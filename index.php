<h1>Hello World</h1>

<?php

function dd($var)
{
  echo '<pre>'; print_r($var); echo '</pre>';
}

require('controller/controller.php');
$controller = new Controller;
$controller->handleRequest();
