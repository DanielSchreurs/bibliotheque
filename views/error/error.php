<main>
    <?php Components\Flash::flash(); ?>
    <h2><a href="<?php echo($html->createLink('book','index')) ?>" title="Vous renvois vers la page d'acceuil"><?php echo($data['title']); ?></a></h2>
    <a href="<?php echo($html->createLink('book','index')) ?>" title="Vous renvois vers la page d'acceuil"> Retour à la page d'acceuil</a>
</main>