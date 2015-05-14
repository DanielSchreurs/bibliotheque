<form name="global" class="form_recherche" method="get" action="<?php echo($html->createLink('page', 'search')); ?>">
    <input type="hidden" name="m" value="page">
    <input type="hidden" name="a" value="search">
    <input type="search" placeholder="Un livre, un auteur" name="search" id="recherche">
    <input type="submit" value="Rechercher !">
</form>
<?php if(isset($data['data']['error'])):?>
    <p class="form_recherche__message form_recherche__message--error"><?php //echo($data['data']['error']); ?></p>
<?php endif; ?>