<?php $i = 1;
$c = $data['nbrPage'];
$current = $data['currentPage'];
?>
<ul class="site-pagination">
    <?php if ($current > 1): ?>
        <li class="site-pagination__number">
            <a class="site-pagination__link--current"
               href="<?php echo($html->createLink('book', 'index', ['page' => $current - 1])) ?>">Précédent</a>
        </li>
    <?php endif; ?>
    <?php for ($i = 1; $i <= $c; $i++): ?>
        <?php if ($c > 3 && $i == $c): ?>
            <li class="site-pagination__number"><span class="site-pagination__link--nohover"> ... </span></li>
        <?php endif; ?>
        <li class="site-pagination__number">
            <a class=" <?php echo($i == $current ? 'site-pagination__link--current' : 'site-pagination__link'); ?>"
               href="<?php echo($html->createLink('book', 'index', ['page' => $i])) ?>">
                <?php echo($i); ?></a>
        </li>
    <?php endfor ?>
    <?php if ($current < $c): ?>
        <li class="site-pagination__number">
            <a class="site-pagination__link--current"
               href="<?php echo($html->createLink('book', 'index', ['page' => $current + 1])) ?>">Suivant</a>
        </li>
    <?php endif; ?>


</ul>
