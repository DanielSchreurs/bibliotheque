<?php $editor = $data['data'];?>
<main class="single_book container">
    <?php Components\Session::flash(); ?>
    <?php include('./views/parts/main_nav_admin.php'); ?>
    <div class="functions">
        <a class="delete-book_btn" href="<?php echo($html->createLink('editor', 'admin_delete_editor',['id' => $editor->id])); ?>"
           title="Ajouter un livre">Supprimer  &laquo;&nbsp;<?php echo($editor->editor_name); ?>&nbsp;&raquo;</a>
        <a class="edit-book_btn" href="<?php echo($html->createLink('editor', 'admin_edit_editor', ['id' => $editor->id])); ?>"
           title="Ajouter un livre">Modifier  &laquo;&nbsp;<?php echo($editor->editor_name); ?>&nbsp;&raquo;</a>
        <a class="back-btn" href="<?php echo($html->createLink('editor', 'admin_index_editor')); ?>"
           title="Ajouter un livre">Retour à l'administartion</a>
    </div>
    <h1 class="header-block-one "><?php echo($editor->editor_name); ?></h1>
    <a class="float_left" href="#"><img
            src="./img/editors_logos/<?php echo($editor->logo); ?>.png"
            alt="logo de<?php echo($editor->editor_name); ?>" width="200" height="200"></a>
    <p class="column"><?php echo($editor->bio_text); ?> </p>
</main>