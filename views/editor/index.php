<main class="container">
    <?php Components\Session::flash(); ?>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <h1 class="hidden"><?php echo($data['title']); ?></h1>
    <ul class="book-liste">
        <?php foreach ($data['data'] as $editor): ?>
            <li>
                <h2><a class="book-liste__header" href="<?php echo($html->createLink('editor', 'view',
                        ['id' => $editor->editor_id])); ?>"><?php echo($editor->editor_name); ?></a></h2>
                <a href="<?php echo($html->createLink('editor', 'view', ['id' => $editor->editor_id])); ?>"><img
                        height="250" width="250" src="./img/editors_logos/<?php echo($editor->editor_logo); ?>"
                        alt="logo de <?php echo($editor->editor_name); ?>"/></a>

                <p><?php echo($html->cutText($editor->bio_text, 200)); ?></p>
                <a class="btnVert" title="Afiche la fiche de l'éditeur"
                   href="<?php echo($html->createLink('editor', 'view', ['id' => $editor->editor_id])); ?>">Voir la
                    fiche de l'éditeur</a>
            </li>
        <?php endforeach; ?>
    </ul>
</main>
