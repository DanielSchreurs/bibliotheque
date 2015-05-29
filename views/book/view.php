<?php
$book = $data['data']['data'];
?>
<main class=" container">
    <?php Components\Session::flash(); ?>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <h1 class="header-block-one "><?php echo($book->title); ?></h1>
    <div class="single_book single_book--small">
        <?php if ($data['data']['isDispo']): ?>
            <a class="float_left book-book"
               href="<?php echo($html->createLink('book', 'user_reserve', ['id' => $book->book_id])); ?>"
               title="Réserver <?php echo($book->title); ?>"><img class="book-cover-img"
                    src="./img/books_covers/<?php echo($book->front_cover); ?>"
                    alt="première du <?php echo($book->title); ?>" width="300" height="450" class="book-book__img">

                <p class="book-book__text inline-link">Réserver</p></a>
        <?php else: ?>
            <img
                class="float_left book-book book-cover-img"
                src="./img/books_covers/<?php echo($book->front_cover); ?>"
                alt="première du <?php echo($book->title); ?>" width="300" height="450">
        <?php endif; ?>

        <p class="column"><?php echo($book->summary); ?> </p>
        <?php if ($data['data']['isDispo']): ?>
            <a class="btnVert btnVert--block"
               href="<?php echo($html->createLink('book', 'user_reserve', ['id' => $book->book_id])) ?>">Réserver ce
                livre</a>
        <?php endif; ?>
        <dl class="info_Livre clearfix">
            <dt>Auteur</dt>
            <dd><a href="<?php echo($html->createLink('author', 'view', ['id' => $book->author_id])); ?>"
                   title="Renvoie vers une page qui reprend tous les livres de <?php echo($book->author_first_name . ' ' . $book->author_last_name); ?>"><?php echo($book->author_first_name . ' ' . $book->author_last_name); ?></a>
            </dd>
            <dt>Editeur</dt>
            <dd><a href="<?php echo($html->createLink('editor', 'view', ['id' => $book->editor_id])); ?>"
                   title="Renvoie vers une page qui reprend tous les livres de la maison d'édition, <?php echo($book->editor_name); ?>"><?php echo($book->editor_name); ?></a>
            </dd>
            <dt>Genre</dt>
            <dd><a href="<?php echo($html->createLink('genre', 'view', ['id' => $book->genre_id])); ?>"
                   title="Renvoie vers une page qui reprend tous les livres du genre <?php echo($book->genre_name); ?>"><?php echo($book->genre_name); ?></a>
            </dd>
            <dt>Année</dt>
            <dd><a href="<?php echo($html->createLink('book', 'allBooksFromYear',
                    ['year' => date('Y', strtotime($book->datepub))])); ?>"
                   title="Renvoie vers une page qui reprend tous les livres de l'année <?php echo($book->datepub); ?>"><?php echo(date('Y',
                        strtotime($book->datepub))); ?></a>
            </dd>
        </dl>
    </div>
</main>