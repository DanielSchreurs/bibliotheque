<?php $genre = $data['data'];;
 ?>
<main class="single_book container">
    <?php Components\Session::flash(); ?>
    <?php include('./views/parts/main_nav_admin.php'); ?>
    <div class="functions">
        <a class="delete-book_btn" href="<?php echo($html->createLink('genre', 'admin_delete_genre',['id' => $genre->id])); ?>"
           title="Ajouter un livre">Supprimer  &laquo;&nbsp;<?php echo($genre->name); ?>&nbsp;&raquo;</a>
        <a class="edit-book_btn" href="<?php echo($html->createLink('genre', 'admin_edit_genre', ['id' => $genre->id])); ?>"
           title="Ajouter un livre">Modifier  &laquo;&nbsp;<?php echo($genre->name); ?>&nbsp;&raquo;</a>
        <a class="back-btn" href="<?php echo($html->createLink('genre', 'admin_index_genre')); ?>"
           title="Ajouter un livre">Retour à l'administartion</a>
    </div>
    <h1 class="header-block-one "><?php echo($genre->name); ?></h1>
</main>