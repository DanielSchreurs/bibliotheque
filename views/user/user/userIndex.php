<main class="container">
    <?php Components\Session::flash(); ?>
    <?php
    $user = $data['data']['user'];
    $books = $data['data']['books'];
    // var_dump($books); ?>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <h1 class="header-block-one">Bonjour <?php echo($user->first_name); ?></h1>
    <section class="container clearBoth">
        <h2 class="header-block-one">
            <?php if (isset($books[1])): ?>
                Vos livres réservés
            <?php else: ?>
                Votre livre réservé
            <?php endif; ?>
        </h2>
        <?php foreach ($books as $book): ?>
            <article class="book-presentation">
                <a title="Renvoie vers la fiche du livre"
                   href="<?php echo($html->createLink('book', 'view', ['id' => $book->book_id])); ?>"><img
                        class="book-presentation__picture" width="270" height="200"
                        src="./img/books_covers/presentation/<?php echo($book->presentation_cover); ?>.jpg"
                        alt="andre_breton_anthologie_de_lhumour_noir"/></a>
                <!--<a class="book-presentation__inline-link" href="">Réserver</a>-->

                <h3><a title="Renvoie vers la fiche du livre"
                       class="book-presentation__header" href="<?php echo($html->createLink('book', 'view',
                        ['id' => $book->book_id])); ?>"><?php echo($book->title); ?></a></h3>

                <p class="book-presentation__text"><?php echo($html->cutText($book->summary, 200)); ?></p>

                <p class="book-presentation__container__date">
                    <time class="book-presentation__date">
                        Du <?php echo($html->dateToSTring($book->reserved_from)); ?></time>
                    <time class="book-presentation__date">
                        Au <?php echo($html->dateToSTring($book->reserved_to)); ?></time>
                </p>
                <a class="book-presentation__btn-link" title="Renvoie vers la fiche du livre"
                   href="<?php echo($html->createLink('book', 'user_UpdateReserve',
                       ['id' => $book->book_reserved_id])); ?>">Modifier</a>
            </article>
        <?php endforeach; ?>
    </section>
</main>