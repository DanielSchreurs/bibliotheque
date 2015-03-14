<?php $html = new \Helpers\Html(); ?>
<main>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <ul>
        <?php foreach ($data['data'] as $library): ?>
            <h3><a href="<?php echo $html->createLink('library', 'view',
                    ['id' => $library->id]); ?>"><?php echo($library->name); ?></a></h3>
            <h2><a href="<?php echo $html->createLink('library', 'view',
                    ['id' => $library->id]); ?>"><?php echo($library->slogan) ?></a></h2>
            <p><?php echo($library->phone); ?></p>
            <a href="<?php echo($html->createLink('library', 'view', ['id' => $library->id])); ?>"><img
                    src="./img/librarys/logo/<?php echo($library->logo); ?>.png"
                    alt="Logo de <?php echo($library->name); ?>"/></a>
        <?php endforeach; ?>
        <li>
        </li>
    </ul>
</main>
