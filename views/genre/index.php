<main class="container">
    <?php Components\Session::flash(); ?>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <h1 class="header-block-one"><?php echo($data['title']); ?></h1>
    <ul class="simple-liste">
        <?php foreach ($data['data'] as $genre): ?>
            <li>
                <a class="simple-liste__item" href="<?php echo($html->createLink('genre', 'view',
                    ['id' => $genre->id])); ?>"><?php echo($genre->name) ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</main>