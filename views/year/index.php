<main class="container">
    <?php Components\Session::flash(); ?>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <h1 class="hidden"><?php echo($data['title']); ?></h1>
    <ul class="simple-liste">
        <?php foreach ($data['data'] as $annee): ;
            ?>
            <li>
                <a class="simple-liste__item" href="<?php echo($html->createLink('book','allBooksFromYear',
                        ['year' => $annee->year])); ?>"><?php echo($annee->year) ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</main>