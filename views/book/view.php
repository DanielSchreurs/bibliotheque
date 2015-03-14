<?php $book = $data['data']; ?>
<main>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <article class="single_book">
        <h2>
            <a href="<?php echo($html->createLink('book', 'view', ['id' => $book->book_id])); ?>"
               title="Renvois vers une page avec uniquement le livre Anthologie de <?php echo($book->title); ?>"><?php echo($book->title); ?></a>
        </h2>
        <a class="float_left" href="<?php echo($html->createLink('book', 'view', ['id' => $book->book_id])); ?>"><img
                src="./img/books_covers/<?php echo($book->front_cover); ?>.jpg"
                alt="première du <?php echo($book->title); ?>" width="300" height="450"></a>

        <p class=""><?php echo($book->summary); ?> </p>
        <dl class="info_Livre clearfix">
            <dt>Auteur</dt>
            s
            <dd><a href="<?php echo($html->createLink('author', 'view', ['id' => $book->author_id])); ?>"
                   title="Renvois vers une page qui reprend tous les livre de <?php echo($book->author_first_name . ' ' . $book->author_last_name); ?>"><?php echo($book->author_first_name . ' ' . $book->author_last_name); ?></a>
            </dd>
            <dt>Editeur</dt>
            <dd><a href="<?php echo($html->createLink('edithor', 'view', ['id' => $book->editor_id])); ?>"
                   title="Renvois vers une page qui reprend tous de la maison d'édition, <?php echo($book->editor_name); ?>"><?php echo($book->editor_name); ?></a>
            </dd>
            <dt>Genre</dt>
            <dd><a href="<?php echo($html->createLink('genre', 'view', ['id' => $book->genre_id])); ?>"
                   title="Renvois vers une page qui reprend tous les livre du genre <?php echo($book->genre_name); ?>"><?php echo($book->genre_name); ?></a>
            </dd>
            <dt>Année</dt>
            <dd><a href="<?php //echo($html->createLink('book','view',['id'=>$book->editor_id]));?>"
                   title="Renvois vers une page qui reprend tous les livre de l'année <?php echo($book->datepub); ?>"><?php echo(date('Y',
                        strtotime($book->datepub))); ?></a>
            </dd>
            <dt>Bibliothèque</dt>
            <dd><a href="<?php echo($html->createLink('book', 'view', ['id' => $book->library_id])); ?>"
                   title="Renvois vers une page qui reprend tous les Bibliothèques de la bibliothèque <?php echo($book->library_name); ?>"><?php echo($book->library_name); ?></a>
            </dd>
        </dl>
    </article>
</main>