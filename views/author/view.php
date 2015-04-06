<?php $author = $data['data'][0]; ?>
<main class="container">
    <?php Components\Session::flash(); ?>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <h1 class="header-block-one"><?php echo($author->first_name . ' ' . $author->first_name); ?></h1>
    <div class="threeColumnBlock">
        <a href="#"><img
                src="./img/authors_photo/<?php echo($author->author_photo); ?>.jpg"
                alt="photo de  <?php echo($author->first_name . ' ' . $author->first_name); ?>" width="300"
                height="450"></a>

        <p> Né le: <abbr title="<?php echo($html->birthToString($author->datebirth)); ?>"
                         class="dtstart"><?php echo($html->birthToString($author->datebirth)); ?>
                <abbr></p>
        <?php if ($author->datedeath != ""): ?>
            <p> Mort le: <abbr title="<?php echo($html->birthToString($author->datedeath)); ?>"
                               class="dtstart"><?php echo ($html->birthToString($author->datedeath)) . '&nbsp;(&nbsp;' . $date->createFromDate(date('Y',
                            strtotime($author->datedeath)), date('m', strtotime($author->datedeath)),
                            date('j', strtotime($author->datedeath)))->age . ' ans &nbsp;)'; ?>
                    <abbr></p>
        <?php endif; ?>
        <p>
            <?php echo($author->bio_text); ?>
        </p>
    </div>

    <?php if (isset($author->book_title)): ?>
        <ul class="book-liste">
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

