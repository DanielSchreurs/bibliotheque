<?php $author = $data['data'][0];
use Helpers\Date;

?>
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
        <?php if ($author->datedeath != "" && $author->datedeath !== '0000-00-00'): ?>
            <p> Mort le: <abbr title="<?php echo($html->birthToString($author->datedeath)); ?>"
                               class="dtstart"><?php echo ($html->birthToString($author->datedeath)) . '&nbsp;(&nbsp;' . Date::getAge($author->datebirth,
                            $author->datedeath) . ' ans &nbsp;)'; ?>
                    <abbr></p>

        <?php endif; ?>
        <p>
            <?php echo($author->bio_text); ?>
        </p>
    </div>
    <aside>
        <h2 class="header-block-one">Les livres de l'auteur</h2>
        <ul class="book-liste">
            <?php foreach ($data['data'] as $book): ?>
            <li>
                <h3><a href="<?php echo($html->createLink('book', 'view',
                        ['id' => $book->book_id])); ?>"><?php echo($book->book_title); ?></a></h3>
                <a href="<?php echo($html->createLink('book', 'view', ['id' => $book->book_id])); ?>"><img
                        src="./img/books_covers/logo/<?php echo($book->book_cover); ?>.jpg" height="225" width="150"
                        alt="Image de la première de couverture du livre <?php echo($book->book_title) ?>"/></a>

                <p><?php echo($html->cutText($book->summary, 200)); ?></p>
                <a class="btnVert"
                   href="<?php echo($html->createLink('book', 'view', ['id' => $book->book_id])); ?>">Voir la fiche
                    du livre</a>
                <?php endforeach; ?>
        </ul>
    </aside>
    <?php if (isset($author->book_title)): ?>
    <?php endif; ?>
</main>

