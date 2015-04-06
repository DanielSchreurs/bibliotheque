<main class="container">
    <?php Components\Session::flash(); ?>
    <?php //var_dump($data); ?>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <h1 class="header-block-one">Derniers livres ajoutés</h1>
    <ul class="book-liste">
        <?php foreach ($data['data'] as $book): ?>
            <li>
                <h2 class="header-block-two">
                    <a href="<?php echo($html->createLink('book', 'view', ['id' => $book->book_id])); ?>"
                       title="Renvoie vers une page avec uniquement le livres Anthologie de <?php echo($book->title); ?>"><?php echo($book->title); ?></a>
                </h2>
                <a href="<?php echo($html->createLink('book', 'view', ['id' => $book->book_id])); ?>"><img
                        src="./img/books_covers/<?php echo($book->front_cover); ?>.jpg"
                        alt="première du <?php echo($book->title); ?>" width="180" height="270"></a>

                <p><?php echo($html->cutText($book->summary, 200)); ?> <a class="btnVert"
                                                                          href="<?php echo($html->createLink('book',
                                                                              'view', ['id' => $book->book_id])); ?>">Lire
                        la suite</a></p>
                <dl class="info_Livre clearfix">
                    <dt>Auteur</dt>
                    <dd><a href="<?php echo($html->createLink('author', 'view', ['id' => $book->author_id])); ?>"
                           title="Renvoie vers une page qui reprend tous les livres de <?php echo($book->author_first_name . ' ' . $book->author_last_name); ?>"><?php echo($book->author_first_name . ' ' . $book->author_last_name); ?></a>
                    </dd>
                    <dt>Editeur</dt>
                    <dd><a href="<?php echo($html->createLink('editor', 'view', ['id' => $book->editor_id])); ?>"
                           title="Renvoie vers une page qui reprend tous de la maison d'édition, <?php echo($book->editor_name); ?>"><?php echo($book->editor_name); ?></a>
                    </dd>
                    <dt>Genre</dt>
                    <dd><a href="<?php echo($html->createLink('genre', 'view', ['id' => $book->genre_id])); ?>"
                           title="Renvoie vers une page qui reprend tous les livres du genre <?php echo($book->genre_name); ?>"><?php echo($book->genre_name); ?></a>
                    </dd>
                    <dt>Année</dt>
                    <dd><a href="<?php echo($html->createLink('book', 'liste',
                            ['year' => date('Y', strtotime($book->datepub))])); ?>"
                           title="Renvoie vers une page qui reprend tous les livres de l'année <?php echo($book->datepub); ?>"><?php echo(date('Y',
                                strtotime($book->datepub))); ?></a>
                    </dd>
                    <dt>Bibliothèque</dt>
                    <dd><a href="<?php echo($html->createLink('library', 'view', ['id' => $book->library_id])); ?>"
                           title="Renvoie vers une page qui reprend tous les Bibliothèques de la bibliothèque <?php echo($book->library_name); ?>"><?php echo($book->library_name); ?></a>
                    </dd>
                </dl>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php if ($data['nbrPage'] > 1): ?>
        <?php include('./views/parts/pagination.php'); ?>
    <?php endif; ?>

</main>