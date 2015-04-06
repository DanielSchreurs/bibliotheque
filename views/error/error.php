<main class="container">
    <?php Components\Session::flash(); ?>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <h1><a class="header-block-one" href="<?php echo($html->createLink('book', 'index')) ?>"
           title="Vous renvois vers la page d'acceuil"><?php echo($data['title']); ?></a></h1>
    <a class="btnVert" href="<?php echo($html->createLink('book', 'index')) ?>"
       title="Vous renvois vers la page d'acceuil"> Retour à la page d'acceuil</a>
</main>