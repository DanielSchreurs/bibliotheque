<main class="container">
    <?php Components\Session::flash(); ?>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <h1 class="header-block-one"><?php echo($data['title']) ?></h1>
    <ul class="book-liste">
        <?php foreach ($data['data'] as $author): ?>
            <li>
                <h2><a class="header-block-two" href="<?php echo($html->createLink('author', 'view',
                        ['id' => $author->author_id])); ?>"><?php echo($author->first_name . ' ' . $author->last_name) ?></a>
                </h2>
                <a href="<?php echo($html->createLink('author', 'view', ['id' => $author->author_id])); ?>"><img
                        src="./img/authors_photo/logo/<?php echo($author->logo); ?>"
                        alt="Image de <?php echo($author->first_name . ' ' . $author->last_name); ?> "/></a>

                <p><?php echo($html->cutText($author->bio_text, 200)); ?></p>
                <a class="btnVert"
                   href="<?php echo($html->createLink('author', 'view', ['id' => $author->author_id])); ?>">Voir la
                    fiche de l'auteur</a>
            </li>
        <?php endforeach; ?>
    </ul>
</main>