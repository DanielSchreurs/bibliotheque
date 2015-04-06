<?php $html = new \Helpers\Html(); ?>
<main class="container">
    <?php Components\Session::flash(); ?>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <h2>Nos Bibliothèques</h2>
    <ul>
        <li>
            <?php foreach ($data['data'] as $library): ?>
                <h3><a href="<?php echo $html->createLink('library', 'view',
                        ['id' => $library->id]); ?>"><?php echo($library->slogan) ?></a></h3>
                <p><?php echo($library->phone); ?></p>
                <a href="<?php echo($html->createLink('library', 'view', ['id' => $library->id])); ?>"><img
                        src="./img/librarys/logo/<?php echo($library->logo); ?>.png"
                        alt="Logo de <?php echo($library->name); ?>"/></a>
            <?php endforeach; ?>
        </li>
    </ul>
</main>
