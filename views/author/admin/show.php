<?php $author = $data['data'];
?>

<main class="single_book container">
    <?php Components\Session::flash(); ?>
    <?php include('./views/parts/main_nav_admin.php'); ?>
    <div class="functions">
        <a class="delete-book_btn" href="<?php echo($html->createLink('author', 'admin_delete_author',['id' => $author->author_id])); ?>"
           title="Ajouter un livre">Supprimer &laquo;&nbsp;<?php echo($author->first_name.'-'.$author->last_name); ?>&nbsp;&raquo;</a>
        <a class="edit-book_btn" href="<?php echo($html->createLink('author', 'admin_edit_author', ['id' => $author->author_id])); ?>"
           title="Ajouter un livre">Modifier &laquo;&nbsp;<?php echo($author->first_name.'-'.$author->last_name); ?>&nbsp;&raquo;</a>
        <a class="back-btn" href="<?php echo($html->createLink('author', 'admin_index_author')); ?>"
           title="Ajouter un livre">Retour à l'administartion</a>
    </div>
    <h1 class="header-block-one ">Supprimer un auteur &laquo;&nbsp;<?php echo($author->first_name.'-'.$author->last_name); ?>&nbsp;&raquo;</h1>
    <div class="threeColumnBlock">
        <a  href="#"><img
                src="./img/authors_photo/<?php echo($author->author_photo); ?>"
                alt="Portrait de  <?php echo($author->first_name.'-'.$author->last_name); ?>" width="300" height="450"></a>
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
        <p><?php echo($author->bio_text); ?> </p>

    </div>
</main>