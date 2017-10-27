<a href="/blog/create/">Create a new article</a><br>

<?php foreach($GLOBALS['article'] as $article): ?>
    <div>
        Titre :
        <a href="/blog/edit/?id=<?= $article['id'] ?>">
             <?= $article['titre']?>
        </a><br>
        Contenu :  <?= $article['contenu']?> <br>
        Auteur :  <?= $article['auteur']?> <br>
        <a href="/blog/delete/?id=<?= $article['id'] ?>">Supprimer</a>
    </div>
    <hr>
<?php endforeach ?>
