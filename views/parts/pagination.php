<?php $i = 1;
$c = $data['nbrPage'];
$current = $data['currentPage'];

?>
<ul class="pagination">
    <?php if($current>1):?>
        <li class="page_number">
            <a  class="numberBtn large"
                href="<?php echo($html->createLink('book', 'index', ['page' =>$current-1 ])) ?>">Précédent</a>
        </li>
    <?php endif; ?>
    <?php for ($i = 1; $i <= $c; $i++): ?>
        <?php if ($i ==$c): ?>
            <li class="page_number"><span class="numberBtn"> ... </span></li>
        <?php endif; ?>
        <li class="page_number">
            <a  class="numberBtn <?php echo($i==$current?'large':''); ?>"
                href="<?php echo($html->createLink('book', 'index', ['page' => $i])) ?>">
            <?php echo($i); ?></a>
        </li>
    <?php endfor ?>
    <?php if($current<$c):?>
        <li class="page_number">
            <a  class="numberBtn large"
                href="<?php echo($html->createLink('book', 'index', ['page' => $current+1])) ?>">Suivant</a>
        </li>
    <?php endif; ?>



</ul>
