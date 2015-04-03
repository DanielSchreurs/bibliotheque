<form name="global" class="form_recherche" method="post" action="<?php echo($html->createLink('page', 'search')); ?>">
    <input type="search" list="tous" required placeholder="Un livre, un auteur" name="search" id="recherche">
    <input type="submit" value="Rechercher !">
</form>