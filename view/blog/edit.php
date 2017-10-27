<?php

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Modifier un contact</title>
    </head>
    <body>
        <form class="" action="/blog/update/?id=<?= $GLOBALS['article']->id ?>" method="post">
            <input type="text" name="titre" placeholder="titre" value="<?= $GLOBALS['article']->titre ?>"><br>
            <input type="text" name="contenu" placeholder="contenu" value="<?= $GLOBALS['article']->contenu ?>"><br>
            <input type="text" name="auteur" placeholder="auteur" value="<?= $GLOBALS['article']->auteur ?>"><br>
            <input type="submit" value"Envoyer"><br>
        </form>
    </body>
</html>
