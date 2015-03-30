<main>
    <?php Components\Flash::flash(); ?>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <ul class="liste_genre">
        <?php foreach ($data['data'] as $genre): ?>
            <li>
                <h3><a href="<?php echo($html->createLink('genre', 'view',
                        ['id' => $genre->id])); ?>"><?php echo($genre->name) ?></a></h3>
            </li>
        <?php endforeach; ?>
    </ul>
</main>