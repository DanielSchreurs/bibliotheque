<?php $genre = $data['data'][0]; ?>
<main>
    <?php Components\Session::flash(); ?>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <article class="">
        <h2>
            <a href="#"
               title=""><?php echo($genre->genre_name); ?></a>
        </h2>

        <?php if (isset($genre->book_title)): ?>
            <ul class="liste_livres">
                <?php foreach ($data['data'] as $book): ?>
                <li>
                    <h3><a href="<?php echo($html->createLink('book', 'view',
                            ['id' => $book->book_id])); ?>"><?php echo($book->book_title); ?></a></h3>
                    <a href="<?php echo($html->createLink('book', 'view', ['id' => $book->book_id])); ?>"><img
                            src="./img/books_covers/logo/<?php echo($book->book_cover); ?>.png"
                            alt="Image de la première de couverture du livre <?php echo($book->book_title) ?>"/></a>

                    <p><?php echo($html->cutText($book->summary, 200)); ?></p>
                    <a class="btnVert"
                       href="<?php echo($html->createLink('book', 'view', ['id' => $book->book_id])); ?>">Voir la fiche
                        du livre</a>
                    <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <h3 class="noBoook">Il n'y a pas encore de Livre dans ce genre</h3>
            <a class="btnVert" href="<?php echo($html->createLink('genre', 'index')); ?>">Voir les autres genres</a>
        <?php endif; ?>
    </article>
</main>
