<?php $editor = $data['data'][0]; ?>
<main>
    <?php Components\Flash::flash(); ?>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <div class="threeColumnBlock">
        <h2><?php echo($editor->editor_name); ?></h2>
        <img
            src="./img/editors_logos/<?php echo($editor->editor_logo); ?>.png"
            alt="photo de  <?php echo($editor->editor_logo); ?>" width="200"
            height="200">

        <p class="">
            <?php echo($editor->bio_text); ?>
        </p>
    </div>
    <?php if (isset($editor->book_title)): ?>
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
    <?php endif; ?>

</main>

