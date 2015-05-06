<?php use Components\Session; ?>
<main class="<?php echo((Session::isUserLogged()) ? 'container' : 'home') ?>">
    <h1 class="hidden"><i>Bookme,</i> La plus grande commauté de livres</h1>
    <?php if (!Session::isUserLogged()): ?>
        <asside class="welcome-bloc">
            <h2 class="bounceOutRight"><a href="<?php echo($html->createLink('user', 'create')); ?>"
                                          class="welcome-bloc__header">Rejoins, la plus grande communauté de
                    livres&nbsp;!</a></h2>

            <p class="welcome-bloc__sub-heading">Ici tu peux échanger, partager et emprunter tous les livres que tu
                aimes.</p>
            <a class="welcome-bloc__link" href="<?php echo($html->createLink('user', 'create')); ?>">Je veux m’inscrire&nbsp;!</a>
        </asside>
    <?php endif; ?>
    <?php Components\Session::flash(); ?>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <section class="container clearBoth">
        <h2 class="header-block-one">Les livres du mois</h2>
        <?php foreach ($data['data']['book_month'] as $book): ?>
            <article class="book-presentation">
                <a title="Réserver ce livre"
                   href="<?php echo($html->createLink('book', 'user_reserve', ['id' => $book->book_id])); ?>"
                   class="book-presentation__container"><img
                        class="book-presentation__picture" width="270" height="200"
                        src="./img/books_covers/presentation/<?php echo($book->presentation_cover); ?>"
                        alt="andre_breton_anthologie_de_lhumour_noir"/><span
                        class="icon book-presentation__picture__btn hidden">Réserver</span></a>

                <h3><a title="Renvoie vers la fiche du livre"
                       class="book-presentation__header" href="<?php echo($html->createLink('book', 'view',
                        ['id' => $book->book_id])); ?>"><?php echo($book->title); ?></a></h3>

                <p class="book-presentation__text"><?php echo($html->cutText($book->summary, 200)); ?></p>
                <a class="book-presentation__btn-link" title="Renvoie vers la fiche du livre"
                   href="<?php echo($html->createLink('book', 'view', ['id' => $book->book_id])); ?>">Voir la fiche du
                    livre</a>
            </article>
        <?php endforeach; ?>
    </section>

    <article class="single-author container clearBoth">
        <?php $author = $data['data']['author_month']; ?>
        <h2 class="header-block-one"><a title="Renvoie vers la fiche de l'auteur"
                                        href="<?php echo($html->createLink('author', 'view',
                                            ['id' => $author->author_id])); ?>">Auteur du mois</a></h2>
        <figure class="single-author__figure">
            <a class="single-author__figure__picture" title="Renvoie vers la fiche de l'auteur"
               href="<?php echo($html->createLink('author', 'view', ['id' => $author->author_id])); ?>"><img
                    src="./img/authors_photo/<?php echo($author->photo); ?>"
                    alt="Portrait de l'auteur<?php echo($html->createLink('author', 'view',
                        ['id' => $author->author_id])); ?>"/></a>
            <figcatiion>
                <h3 class="single-author__figure__header"><a title="Renvoie vers la fiche de l'auteur"
                                                             href="<?php echo($html->createLink('author', 'view',
                                                                 ['id' => $author->author_id])); ?>"><?php echo($author->first_name . ' ' . $author->last_name); ?></a>
                </h3>
            </figcatiion>
        </figure>
        <p class="single-author__text"><?php echo($html->cutText($author->bio_text, 500)); ?></p>
        <a title="Renvoie vers la fiche de l'auteur" class="btnVert"
           href="<?php echo($html->createLink('author', 'view', ['id' => $author->author_id])); ?>">Voir la
            fiche de l'auteur</a>
    </article>
</main>