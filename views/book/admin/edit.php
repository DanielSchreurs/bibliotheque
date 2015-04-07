<main class="container">
    <?php Components\Session::flash(); ?>
    <h1 class="header-block-one"><?php echo($data['title']); ?></h1>
    <?php
    $authors = $data['data']['authors'];
    $editors = $data['data']['editors'];
    $genres = $data['data']['genres'];
    $langues = $data['data']['langues'];
    $book = $data['data']['book'];
    ?>
    <form class="form-create large" action="<?php echo($html->createLink('book', 'admin_edit_book',['id'=>$book->book_id])); ?>" method="post">
        <p class="form-create__infos"> Les champs précédés d’un <strong
                class="form-create--obligatoire">(*)</strong> sont obligatoires!</p>

        <label for="title">Titre du livre<strong class="form-create--obligatoire">*</strong></label>
        <input type="text"  class="form-create__simple-imput" name="title" id="title" value=""
               placeholder="Madelaine"
               title="Introduisez le titre de votre livre"/>
        <label for="author_id">Auteur du livre</label>
        <select class="form-create__select" name="author_id" id="author_id">
            <?php foreach ($authors as $author): ?>
                <option
                    value="<?php echo($author->author_id); ?> "><?php echo($author->first_name . ' ' . $author->last_name); ?></option>
            <?php endforeach; ?>
        </select>
        <label for="language_id">La langue du livre</label>
        <select class="form-create__select" name="language_id" id="language_id">
            <?php foreach ($langues as $langue): ?>
                <option
                    value="<?php echo($langue->language_id); ?> "><?php echo($langue->language); ?></option>
            <?php endforeach; ?>
        </select>
        <label for="editor_id">Editeur du livre</label>
        <select class="form-create__select" name="editor_id" id="editor_id">
            <?php foreach ($editors as $editor): ?>
                <option
                    value="<?php echo($editor->editor_id); ?> "><?php echo($editor->editor_name); ?></option>
            <?php endforeach; ?>
        </select>
        <label for="genre_id">Genre du livre</label>
        <select class="form-create__select" name="genre_id" id="genre_id">
            <?php foreach ($genres as $genre): ?>
                <option
                    value="<?php echo($genre->id); ?> "><?php echo($genre->name); ?></option>
            <?php endforeach; ?>
        </select>
        <label for="front_cover">Couverture du livre 300/400px<strong
                class="form-create--obligatoire">*</strong></label>
        <input class="form-create__simple-imput" type="file" name="front_cover" id="front_cover"
               title="Chargez le couverture de votre livre"/>
        <label for="front_cover">Petite couverture 270/200px<strong
                class="form-create--obligatoire">*</strong></label>
        <input class="form-create__simple-imput" type="file" name="front_cover" id="front_cover"
               title="Chargez le couverture de votre livre"/>
        <label for="summary">Résumé du livre<strong
                class="form-create--obligatoire">*</strong></label>
        <textarea class="form-create__long-text" name="summary" id="summary" cols="30" rows="10"></textarea>

        <label for="isbn">ISBN du livre<strong
                class="form-create--obligatoire">*</strong></label>
        <input class="form-create__simple-imput" type="text" name="isbn" id="isbn"
               title="Introduisez votre ISBN"/>
        <label for="nbpages">Nombre de page<strong
                class="form-create--obligatoire">*</strong></label>
        <input class="form-create__simple-imput" type="number" name="nbpages" min="2" id="nbpages"
               title="Introduisez votre ISBN"/>
        <label for="datepub">Date de publication (jj/mm/aaaa)<strong
                class="form-create--obligatoire">*</strong></label>
        <input class="form-create__simple-imput" type="date" name="datepub" min="2" id="datepub"
               title="Introduisez la date de publication" placeholder="12/03/2014"/>
        <input type="submit" value="Modifier le livre" class="btnVert"/>
    </form>
</main>