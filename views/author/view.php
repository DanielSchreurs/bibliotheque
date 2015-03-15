<?php $author = $data['data'][0];
var_dump($author) ?>

<main>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <article class="single_author">
        <h2>
            <a href="#"
               title=""><?php echo($author->first_name . ' ' . $author->first_name); ?></a>
        </h2>
        <a class="float_left" href="#"><img
                src="./img/authors_photo/<?php echo($author->author_photo); ?>.jpg"
                alt="photo de  <?php echo($author->first_name . ' ' . $author->first_name); ?>" width="300"
                height="450"></a>

        <p class="first_text"> Né le: <abbr title="<?php echo($author->datebirth); ?>"
                                            class="dtstart"><?php echo($html->dateToSTring($author->datebirth)); ?>
                <abbr></p>
        <?php if ($author->datedeath != ""): ?>
            <p> Mort le: <abbr title="<?php echo($author->datedeath); ?>"
                               class="dtstart"><?php echo($author->datedeath)//.' '.$date->createFromDate($author->datebirth)->age); ; ?>
                    <abbr></p>
        <?php endif; ?>

        <p class="">
            <?php echo($author->bio_text); ?>
        </p>
        <?php if (isset($author->book_title)): ?>
            <ul>
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
    </article>
</main>

