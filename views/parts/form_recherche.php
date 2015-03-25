<form name="global" class="form_recherche" method="post" action="<?php echo($html->createLink('page', 'search')); ?>">
    <input type="search" list="tous" required placeholder="Un livre, un auteur" name="search" id="recherche">

    <select name="blibliotheque">
        <option value="Chiroux" title="Selectionner votre blibliotheque">LA HESTRE(Manage)</option>
        <option value="Chiroux" title="Selectionner votre blibliotheque">LA HULPE</option>
        <option value="Chiroux" title="Selectionner votre blibliotheque">LA LOUVIERE</option>
        <option value="Chiroux" title="Selectionner votre blibliotheque">La Louvière</option>
        <option value="Chiroux" title="Selectionner votre blibliotheque">LA LOUVIERE (Boussoit)</option>
        <option value="Chiroux" title="Selectionner votre blibliotheque">LA LOUVIERE (Haine-Saint-Pierre)</option>
        <option value="Chiroux" title="Selectionner votre blibliotheque">LA LOUVIERE (Houdeng-Goegnies)</option>
        <option value="Chiroux" title="Selectionner votre blibliotheque">LA LOUVIERE (Strépy-Bracquegnies)</option>
        <option value="Chiroux" title="Selectionner votre blibliotheque">LA LOUVIERE Strépy-Bracquegnies</option>
        <option value="Chiroux" title="Selectionner votre blibliotheque">LA REID (Theux)</option>
        <option value="Chiroux" title="Selectionner votre blibliotheque">LAEKEN (Bruxelles)</option>
        <option value="Chiroux" title="Selectionner votre blibliotheque">LIEGE</option>
    </select>
    <input type="submit" value="Rechercher !">
</form>