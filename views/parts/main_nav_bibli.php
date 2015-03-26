<nav class="main-nav">
    <h2 class="hidden">Navigation des différentes sections des livres</h2>
        <a class="main-nav__item" href="<?php echo($html->createLink('author', 'index')) ?>" title="affiche tous les auteurs">tous les
                auteurs</a>
        <a class="main-nav__item" href="<?php echo($html->createLink('editor', 'index')) ?>" title="affiche tous les editeurs">tous
                les editeurs</a>
        <a class="main-nav__item" href="<?php echo($html->createLink('genre', 'index')); ?>" title="affiche tous les genres">tous les
                genres</a>
        <a class="main-nav__item" href="<?php echo($html->createLink('year', 'index')) ?>" title="affiche tous les annees">tous les
                annees</a>
</nav>