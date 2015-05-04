<?php if ($data['data']['step'] == 1): ?>
    <p class="admin_nav_steps__info">Avant de pouvoir ajouter un livre vous devez ajouter son auteur, editeur et genre.
        Si tel est le cas, passer simplement à
        <a class="inline-link" href="<?php echo($html->createLink('book', 'admin_create_book', ['step' => 4])); ?>"
           title="Ajouter le livre">l'étape 4.</a></p>
<?php endif; ?>
<div class="admin_nav_steps clearfix" role="navigation" title="Navigattion des liens d'administration">
    <a class="admin_nav_steps__item admin_nav_steps__item--numerique icon <?php echo($data['data']['step'] > 1 ? 'admin_nav_steps__item--success' : '');
    echo($data['data']['step'] == 1 ? 'admin_nav_steps__item--active' : ''); ?>"
       href="<?php echo($html->createLink('author', 'admin_create_author', ['step' => 1])); ?>"
       title="Ajouter l’auteur du livre">1</a>
    <a class="admin_nav_steps__item admin_nav_steps__item--numerique icon <?php echo($data['data']['step'] > 2 ? 'admin_nav_steps__item--success' : '');
    echo($data['data']['step'] == 2 ? 'admin_nav_steps__item--active' : ''); ?>"
       href="<?php echo($html->createLink('editor', 'admin_create_editor', ['step' => 2])); ?>"
       title="Ajouter l’éditeur du livre">2</a>
    <a class="admin_nav_steps__item admin_nav_steps__item--numerique icon <?php echo($data['data']['step'] > 3 ? 'admin_nav_steps__item--success' : '');
    echo($data['data']['step'] == 3 ? 'admin_nav_steps__item--active' : ''); ?>"
       href="<?php echo($html->createLink('genre', 'admin_create_genre', ['step' => 3])); ?>"
       title="Ajouter le genre du livre">3</a>
    <a class="admin_nav_steps__item admin_nav_steps__item--numerique icon <?php echo($data['data']['step'] > 4 ? 'admin_nav_steps__item--success' : '');
    echo($data['data']['step'] == 4 ? 'admin_nav_steps__item--active' : ''); ?>"
       href="<?php echo($html->createLink('book', 'admin_create_book', ['step' => 4])); ?>"
       title="Ajouter le livre">4</a>
</div>