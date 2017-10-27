<?php

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Modifier un contact</title>
    </head>
    <body>
        <form class="" action="/contact/update/?id=<?= $GLOBALS['contact']->id ?>" method="post">
            <input type="text" name="nom" placeholder="nom" value="<?= $GLOBALS['contact']->nom ?>"><br>
            <input type="text" name="prenom" placeholder="Prénom" value="<?= $GLOBALS['contact']->prenom ?>"><br>
            <input type="text" name="phone" placeholder="Téléphone" value="<?= $GLOBALS['contact']->phone ?>"><br>
            <input type="submit" value"Envoyer"><br>
        </form>
    </body>
</html>
