<?php $genre = $data['data'][0]; ?>
<main class="container">
    <?php Components\Session::flash(); ?>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>

    <?php if (isset($genre->book_title)): ?>
        <h1 class="header-block-one"><?php echo($genre->genre_name); ?></h1>
        <?php foreach ($data['data'] as $book): ?>
            <article class="book-liste">
                <h2><a class="book-liste__header" href="<?php echo($html->createLink('book', 'view',
                        ['id' => $book->book_id])); ?>"><?php echo($book->book_title); ?></a></h2>
                <a href="<?php echo($html->createLink('book', 'view', ['id' => $book->book_id])); ?>"><img
                        src="./img/books_covers/logo/<?php echo($book->book_cover); ?>.png"
                        alt="Image de la première de couverture du livre <?php echo($book->book_title) ?>"/></a>

                <p><?php echo($html->cutText($book->summary, 200)); ?></p>
                <a class="btnVert"
                   href="<?php echo($html->createLink('book', 'view', ['id' => $book->book_id])); ?>">Voir la fiche
                    du livre</a>

            </article>
        <?php endforeach; ?>
    <?php else: ?>
        <h1 class="header-block-one error"><a href="<?php echo($html->createLink('genre', 'index')); ?>" title="Renvoie vers la page qui liste tous les genres">Il n'y a pas encore de livre dans le genre &nbsp;: <?php echo($genre->genre_name);?></a></h1>
        <a class="btnVert" href="<?php echo($html->createLink('genre', 'index')); ?>" title="Renvoie vers la page qui liste tous les genres">Voir les autres genres</a>
    <?php endif; ?>

</main>
