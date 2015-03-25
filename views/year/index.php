<main>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <ul class="liste_genre">
        <?php foreach ($data['data'] as $annee): ;
            ?>
            <li>
                <h3><a href="<?php echo($html->createLink('book', 'liste',
                        ['id' => $annee->year])); ?>"><?php echo($annee->year) ?></a></h3>
            </li>
        <?php endforeach; ?>
    </ul>
</main>