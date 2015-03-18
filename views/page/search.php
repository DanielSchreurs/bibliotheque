<main>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <?php if (empty($data['data']['books']) && empty($data['data']['authors']) && empty($data['data']['editors'])): ?>
        <h2 class="error">Nous n'avons pas trouvé de résultats pour : <?php echo($data['title']); ?></h2>
    <?php else: ?>
        <h2>Résultats pour : <?php echo($data['title']); ?></h2>
        <ul class="liste_livres">
            <?php foreach ($data['data'] as $resultats): ?>
                <?php if (!empty($resultats)): ?>
                    <?php foreach ($resultats as $resultat): ?>
                        <?php var_dump($data['data']); ?>
                        <li>
                            <h3><a href="<?php echo($html->createLink(substr('tests', 0, -1), 'view',['id'=>$resultat->id])); ?>"><?php ?>ssss</a></h3>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>


</main>