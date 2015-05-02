<?php if($data['data']['step']==1): ?>
        <p class="admin_nav_steps__info">Avant de pouvoir réinitialiser votre mot de passe, vous devez insérer votre identiifiant.</p>
    <?php endif; ?>
<ol class="admin_nav_steps clearfix" role="navigation" title="Navigattion des liens d'administration.">
    <li class="admin_nav_steps__item admin_nav_steps__item--numerique icon <?php echo($data['data']['step']>1?'admin_nav_steps__item--success':''); echo($data['data']['step']==1?'admin_nav_steps__item--active':''); ?>">1</li>
    <li class="admin_nav_steps__item admin_nav_steps__item--numerique icon <?php echo($data['data']['step']>2?'admin_nav_steps__item--success':''); echo($data['data']['step']==2?'admin_nav_steps__item--active':''); ?>">2</li>
    <li class="admin_nav_steps__item admin_nav_steps__item--numerique icon <?php echo($data['data']['step']>3?'admin_nav_steps__item--success':''); echo($data['data']['step']==3?'admin_nav_steps__item--active':''); ?>">3</li>
    <li class="admin_nav_steps__item admin_nav_steps__item--numerique icon <?php echo($data['data']['step']>4?'admin_nav_steps__item--success':''); echo($data['data']['step']==4?'admin_nav_steps__item--active':''); ?>">4</li>
</ol>