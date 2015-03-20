<main>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <?php if (empty($data['data']['books']) && empty($data['data']['authors']) && empty($data['data']['editors'])): ?>
        <h2 class="error">Nous n'avons pas trouvé de résultats pour : <?php echo($data['title']); ?></h2>
    <?php else: ?>
        <h2>Résultats pour : <?php echo($data['title']); ?></h2>
        <ul class="liste_livres">
            <?php if(!empty($data['data']['books'])): ?>
            <?php foreach ($data['data']['books'] as $book): ?>
                <li>
                    <h3><a href="<?php echo($html->createLink('book', 'view',
                            ['id' => $book->id])); ?>"><?php echo($book->title); ?></a></h3>
                </li>
            <?php endforeach; ?>
            <?php endif?>
            <?php if(!empty($data['data']['authors'])): ?>
            <?php foreach ($data['data']['authors'] as $author): ?>
                <li>
                    <h3><a href="<?php echo($html->createLink('author', 'view',
                            ['id' => $author->id])); ?>"><?php echo($author->first_name . ' ' . $author->last_name) ?></a>
                    </h3>
                </li>
            <?php endforeach; ?>
            <?php endif ?>
            <?php if(!empty($data['data']['editors'])): ?>
                <?php foreach ($data['data']['editors'] as $author): ?>
                    <li>
                        <h3><a href="<?php echo($html->createLink('editor', 'view',
                                ['id' => $author->id])); ?>"><?php echo($author->name) ?></a>
                        </h3>
                    </li>
                <?php endforeach; ?>
            <?php endif ?>
        </ul>
    <?php endif; ?>


</main>