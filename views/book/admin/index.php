<main>
    <?php Components\Session::flash(); ?>
  <h2>Administrer son site, en quelques clics</h2>
<nav class="main-nav">
    <h2 class="hidden">Navigattion des liens d'administration</h2>
    <a class="main-nav__item--small" href="<?php echo($html->createLink('author','admin')); ?>" title="">Administrer les auteurs</a>
    <a class="main-nav__item--small" href="<?php echo($html->createLink('genre','admin')); ?>" title="">Administrer les genres</a>
    <a class="main-nav__item--small" href="<?php echo($html->createLink('user','admin')); ?>" title="">Administrer les utilisateurs</a>
</nav>


</main>