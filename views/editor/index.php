<main>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <ul class="liste_editors">
        <?php  foreach($data['data'] as $editor): ?>
            <li>
                <h3><a href="<?php echo($html->createLink('editor','view',['id'=>$editor->editor_id])); ?>"><?php echo($editor->editor_name); ?></a></h3>
                <a href="<?php echo($html->createLink('editor','view',['id'=>$editor->editor_id])); ?>"><img height="250" width="250" src="./img/editors_logos/<?php echo($editor->editor_logo) ?>.png" alt="logo de <?php echo($editor->editor_name); ?>"/></a>
                <p><?php echo($html->cutText($editor->bio_text,200)); ?></p>
                <a class="btnVert" href="<?php echo($html->createLink('editor','view',['id'=>$editor->editor_id])); ?>">Voir la fiche de l'éditeur</a>
            </li>
        <?php endforeach; ?>

    </ul>
</main>

