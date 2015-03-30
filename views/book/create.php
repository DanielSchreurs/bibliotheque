<main>
    <?php Components\Flash::flash(); ?>
    <h2>Ajoutez un livre en quelques clics !</h2>
    <?php
    $authors = $data['data']['authors'];
    $editors = $data['data']['editors'];
    $genres = $data['data']['genres'];
    $librarys = $data['data']['librarys'];
    var_dump($librarys); ?>
    <form class="form-create-user" action="<?php $html->createLink('user', 'create'); ?>" method="post">
        <p class="form-create-user__infos"> Les champs précédés d’un <strong
                class="form-create-user__obligatoire">(*)</strong> sont obligatoires!</p>

        <label for="title">Titre du livre<strong class="form-create-user__obligatoire">*</strong></label>
        <input type="text" name="title" id="title" value=""
               placeholder="Madelaine"
               title="Introduisez le titre de votre livre"/>
        <label for="author_id">Auteur du livre</label>
        <select name="author_id" id="author_id">
            <?php foreach ($authors as $author): ?>
                <option
                    value="<?php echo($author->author_id); ?> "><?php echo($author->first_name . ' ' . $author->last_name); ?></option>
            <?php endforeach; ?>
        </select>
        <label for="language_id">La langue du livre</label>
        <select name="language_id" id="language_id">
            <?php foreach ($authors as $author): ?>
                <option
                    value="<?php echo($author->author_id); ?> "><?php echo($author->first_name . ' ' . $author->last_name); ?></option>
            <?php endforeach; ?>
        </select>
        <label for="editor_id">Editeur du livre</label>
        <select name="editor_id" id="editor_id">
            <?php foreach ($editors as $editor): ?>
                <option
                    value="<?php echo($editor->editor_id); ?> "><?php echo($editor->editor_name); ?></option>
            <?php endforeach; ?>
        </select>
        <label for="genre_id">Genre du livre</label>
        <select name="genre_id" id="genre_id">
            <?php foreach ($genres as $genre): ?>
                <option
                    value="<?php echo($genre->id); ?> "><?php echo($genre->name); ?></option>
            <?php endforeach; ?>
        </select>
        <label for="front_cover">Couverture du livre 300/400px<strong
                class="form-create-user__obligatoire">*</strong></label>
        <input type="file" name="front_cover" id="front_cover"
               title="Chargez le couverture de votre livre"/>
        <label for="summary">Résumé du livre<strong
                class="form-create-user__obligatoire">*</strong></label>
        <textarea name="summary" id="summary" cols="30" rows="10"></textarea>

        <label for="isbn">ISBN du livre<strong
                class="form-create-user__obligatoire">*</strong></label>
        <input type="text" name="isbn" id="isbn"
               title="Introduisez votre ISBN"/>
        <label for="nbpages">Nombre de page<strong
                class="form-create-user__obligatoire">*</strong></label>
        <input type="number" name="nbpages" id="nbpages"
               title="Introduisez votre ISBN"/>
        <label for="library_id">bibliothèque</label>

        <input type="submit" value="Soumettre l'inscription" class="btnVert"/>
    </form>
</main>