<?php
use \Components\Session; ?>
<footer class="main-footer">
    <div class="float_left" role="navigation">
        <a class="block footer__lits__item" href="<?php echo($_SERVER['PHP_SELF']); ?>"
           title="Renvois vers la page d'accueil">Accueil</a>
        <a class="block footer__lits__item" href="<?php echo($html->createLink('page', 'about')); ?>"
           title="Renvois vers la page Comment ça marche">&Agrave; propos</a>
        <a class="block footer__lits__item" href="<?php echo($html->createLink('page', 'help')); ?>"
           title="Renvois vers la page Comment ça marche">Comment
            ça
            marche</a>
        <?php if (Session::isUserLogged()): ?>
            <a href="<?php echo($html->createLink('user', 'logout')); ?>" class="block footer__lits__item">Se
                déconnecter</a>
            <?php if (Session::isAdmin()): ?>
                <a href="<?php echo($html->createLink('book', 'admin_index')); ?>"
                   class="block footer__lits__item">Administration</a>
            <?php else: ?>
                <a href="<?php echo($html->createLink('user', 'user_userIndex',
                    ['id' => isset($_SESSION['userId']) ? $_SESSION['userId'] : $_COOKIE['userId']])); ?>"
                   class="">Mes livres</a>
            <?php endif; ?>
        <?php endif; ?>
        <?php if ($controller->view == 'user/create.php'): ?>
            <a href="<?php echo($_SERVER['PHP_SELF']); ?>" class="block footer__lits__item">Retour à l'acceuil</a>
        <?php endif; ?>
    </div>
    <div class="float_left" role="navigation" title="Navigation des différentes sections des livres">
        <a class="block footer__lits__item" href="<?php echo($html->createLink('author', 'index')) ?>"
           title="affiche tous les auteurs">Tous les
            auteurs</a>
        <a class="block footer__lits__item" href="<?php echo($html->createLink('editor', 'index')) ?>"
           title="affiche tous les editeurs">Tous
            les éditeurs</a>
        <a class="block footer__lits__item" href="<?php echo($html->createLink('genre', 'index')); ?>"
           title="affiche tous les genres">Tous les
            genres</a>
        <a class="block footer__lits__item" href="<?php echo($html->createLink('year', 'index')) ?>" title="affiche tous les annees">Toutes
            les
            années</a>
        <a class="block footer__lits__item" href="<?php echo($html->createLink('book', 'index')) ?>" title="affiche tous les annees">Toutes
            les
            Livres</a>
    </div>
    <p class="copy clearfix">Designed by &copy; <a href="daniel.schreurs.com">Daniel Schreurs
            <time>2015</time>
        </a></p>
</footer>