<main class="container">
    <?php include('./views/parts/main_nav_admin.php'); ?>
    <?php Components\Session::flash(); ?>
    <h1 class="header-block-one"><?php echo($data['title']); ?></h1>
    <?php
    $authors = $data['data']['authors'];
    $editors = $data['data']['editors'];
    $genres = $data['data']['genres'];
    $langues = $data['data']['langues'];
    $book = $data['data']['book'];
    isset($data['data']['errors']) ? $errors = $data['data']['errors'] : '';
    isset($data['data']['sent']) ? $sent = $data['data']['sent'] : '';
    $_GET = $_SERVER['REQUEST_METHOD'] == 'GET';
    ?>
    <form class="form-create form-create--large"
          action="<?php echo($html->createLink('book', 'admin_edit_book', ['id' => $book->book_id])); ?>" method="post"
          enctype="multipart/form-data">
        <p class="form-create__infos"> Les champs précédés d’un <strong
                class="form-create--obligatoire">(*)</strong> sont obligatoires!</p>

        <p class="form-create__infos">Vous pouvez ajouter un éditeur, genre et auteur par le bouton
            <svg version="1.1" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 141.7 141.7"
                 enable-background="new 0 0 141.7 141.7" xml:space="preserve">
                     <title>bouton pour ajouter</title>
                <desc>le symbole plus itégré dans un cercle</desc>
                <path fill="#333333"
                      d="M70.9,0C31.9,0,0,31.9,0,70.9s31.9,70.9,70.9,70.9s70.9-31.9,70.9-70.9S109.9,0,70.9,0z M106.3,77.9H78v28.3H63.8V77.9H35.4V63.7h28.3V35.4H78v28.3h28.3V77.9z"/>
            </svg>
            s'il n'est pas défini.
        </p>
        <input name="update_at" type="hidden" value="<?php setlocale(LC_TIME, 'fra_fra');
        echo strftime('%Y-%m-%d'); ?>"/>
        <input name="user_id" type="hidden"
               value="<?php echo(isset($_SESSION['userId']) ? $_SESSION['userId'] : $_COOKIE['userId']); ?>"/>
        <label for="title">Titre du livre<strong
                class="form-create--obligatoire">*</strong></label>
        <input type="text"
               class="form-create__simple-imput"
               name="title"
               id="title"
               value="<?php echo(isset($errors['title']) || $_GET ? $book->title : $sent->title); ?>"
               placeholder="Madelaine"
               title="Introduisez le titre de votre livre"/>
        <?php if (isset($errors['title'])): ?>
            <?php foreach ($errors['title'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <label for="author_id">Auteur du livre
            <a class="form-create__add-btn" href="<?php echo($html->createLink('author', 'admin_create_author')); ?>"
               title="Renvois, vers un formulaire qui permet d'ajouter au auteur">
                <svg version="1.1"
                     x="0px" y="0px" width="30px" height="30px" viewBox="0 0 141.7 141.7"
                     enable-background="new 0 0 141.7 141.7"
                     xml:space="preserve">
                         <title>bouton pour ajouter</title>
                    <desc>le symbole '+' intégré dans un cercle</desc>
                    <path fill="#333333"
                          d="M70.9,0C31.9,0,0,31.9,0,70.9s31.9,70.9,70.9,70.9s70.9-31.9,70.9-70.9S109.9,0,70.9,0z M106.3,77.9H78v28.3H63.8V77.9H35.4V63.7h28.3V35.4H78v28.3h28.3V77.9z"/>
                    </svg>
            </a>
        </label>
        <select class="form-create__select" name="author_id" id="author_id">
            <?php foreach ($authors as $author): ?>
                <option
                    <?php echo($author->author_id == $book->author_id ? 'selected' : ''); ?>
                    value="<?php echo($author->author_id); ?>"><?php echo($author->first_name . ' ' . $author->last_name); ?></option>
            <?php endforeach; ?>
        </select>
        <label for="language_id">La langue du livre</label>
        <select class="form-create__select" name="language_id" id="language_id">
            <?php foreach ($langues as $langue): ?>
                <option
                    <?php echo($langue->language_id == $book->language_id ? 'selected' : ''); ?>
                    value="<?php echo($langue->language_id); ?>"><?php echo($langue->language); ?></option>
            <?php endforeach; ?>
        </select>
        <label for="editor_id">Editeur du livre
            <a class="form-create__add-btn" href="<?php echo($html->createLink('editor', 'admin_create_editor')); ?>"
               title="Renvois, vers un formulaire qui permet d'ajouter au auteur">
                <svg version="1.1"
                     x="0px" y="0px" width="30px" height="30px" viewBox="0 0 141.7 141.7"
                     enable-background="new 0 0 141.7 141.7"
                     xml:space="preserve">
                         <title>bouton pour ajouter</title>
                    <desc>le symbole '+' intégré dans un cercle</desc>
                    <path fill="#333333"
                          d="M70.9,0C31.9,0,0,31.9,0,70.9s31.9,70.9,70.9,70.9s70.9-31.9,70.9-70.9S109.9,0,70.9,0z M106.3,77.9H78v28.3H63.8V77.9H35.4V63.7h28.3V35.4H78v28.3h28.3V77.9z"/>
                    </svg>
            </a>
        </label>
        <select class="form-create__select" name="editor_id" id="editor_id">
            <?php foreach ($editors as $editor): ?>
                <option
                    <?php echo($editor->editor_id == $book->editor_id ? 'selected' : ''); ?>
                    value="<?php echo($editor->editor_id); ?>"><?php echo($editor->editor_name); ?></option>
            <?php endforeach; ?>
        </select>
        <label for="genre_id">Genre du livre
            <a class="form-create__add-btn" href="<?php echo($html->createLink('genre', 'admin_create_genre')); ?>"
               title="Renvois, vers un formulaire qui permet d'ajouter au auteur">
                <svg version="1.1"
                     x="0px" y="0px" width="30px" height="30px" viewBox="0 0 141.7 141.7"
                     enable-background="new 0 0 141.7 141.7"
                     xml:space="preserve">
                         <title>bouton pour ajouter</title>
                    <desc>le symbole '+' intégré dans un cercle</desc>
                    <path fill="#333333"
                          d="M70.9,0C31.9,0,0,31.9,0,70.9s31.9,70.9,70.9,70.9s70.9-31.9,70.9-70.9S109.9,0,70.9,0z M106.3,77.9H78v28.3H63.8V77.9H35.4V63.7h28.3V35.4H78v28.3h28.3V77.9z"/>
                    </svg>
            </a>
        </label>
        <select class="form-create__select" name="genre_id" id="genre_id">
            <?php foreach ($genres as $genre): ?>
                <option
                    <?php echo($genre->id == $book->genre_id ? 'selected' : ''); ?>
                    value="<?php echo($genre->id); ?>"><?php echo($genre->name); ?></option>
            <?php endforeach; ?>
        </select>
        <label for="front_cover_edit">Couverture du livre 300/450px<strong
                class="form-create--obligatoire">*</strong></label>
        <input class="form-create__simple-imput" type="file" name="front_cover_edit" id="front_cover_edit"
               title="Chargez le couverture de votre livre"/>
        <?php if (isset($errors['front_cover_edit'])): ?>
            <?php foreach ($errors['front_cover_edit'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="form-create__example-box">
            <p class="form-create__example-box__text">Vous devez insérer une image au format (.jpg) et qui fait 300
                pixel de large et 450 pixel de haut. C’est l’image de base.</p>
        </div>
        <label for="front_cover_presentation_edit">Petite couverture 270/200px<strong
                class="form-create--obligatoire">*</strong></label>
        <input class="form-create__simple-imput" type="file" name="front_cover_presentation_edit"
               id="front_cover_presentation_edit"
               title="Chargez le couverture de votre livre"/>

        <div class="form-create__example-box">
            <p class="form-create__example-box__text">Vous devez insérer une image au format (.jpg) et qui fait 270
                pixel de large et 200 pixel de haut. Cette image peut apparaître sur la pagge accueil dans la section, 3
                derniers livres ajoutés</p>
        </div>
        <?php if (isset($errors['front_cover_presentation_edit'])): ?>
            <?php foreach ($errors['front_cover_presentation_edit'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <label for="summary">Résumé du livre<strong
                class="form-create--obligatoire">*</strong></label>
        <textarea class="form-create__long-text" name="summary" id="summary" cols="30"
                  rows="10"><?php echo(isset($errors['summary']) || $_GET ? $book->summary : $sent->summary); ?></textarea>
        <?php if (isset($errors['summary'])): ?>
            <?php foreach ($errors['summary'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <label for="isbn">ISBN du livre<strong
                class="form-create--obligatoire">*</strong></label>
        <input class="form-create__simple-imput" type="text" name="isbn" id="isbn"
               title="Introduisez votre ISBN"
               value="<?php echo(isset($errors['isbn']) || $_GET ? $book->isbn : $sent->isbn); ?>"/>
        <div class="form-create__example-box">
            <p class="form-create__example-box__text">L’<i>ISB</i> est un nombre de minmum 8 chiffres sans caractères spéciaux</p>
        </div>
        <?php if (isset($errors['isbn'])): ?>
            <?php foreach ($errors['isbn'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <label for="nbpages">Nombre de page<strong
                class="form-create--obligatoire">*</strong></label>
        <input class="form-create__simple-imput" type="number" name="nbpages" id="nbpages"
               title="Introduisez le nombre de page du livre"
               value="<?php echo(isset($errors['nbpages']) || $_GET ? $book->nbpages : $sent->nbpages); ?>"/>
        <?php if (isset($errors['nbpages'])): ?>
            <?php foreach ($errors['nbpages'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <label for="datepub">Date de publication (jj-mm-aaaa)<strong
                class="form-create--obligatoire">*</strong></label>
        <input class="form-create__simple-imput" type="date" name="datepub" min="2" id="datepub"
               title="Introduisez la date de publication" placeholder="12/03/2014"
               value="<?php echo(isset($errors['datepub']) || $_GET ? $book->datepub : $sent->datepub); ?>"/>

        <div class="form-create__example-box">
            <p class="form-create__example-box__text">Attention la date doit être dans le passé.</p>
        </div>
        <?php if (isset($errors['datepub'])): ?>
            <?php foreach ($errors['datepub'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <label for="nb_copy">Le nombre de copies<strong
                class="form-create--obligatoire">*</strong></label>
        <input class="form-create__simple-imput <?php echo(isset($errors['nb_copy']) ? 'error' : ''); ?>" type="text"
               name="nb_copy" min="2" id="nb_copy"
               title="Introduisez la date de publication" placeholder="ex:5"
               value="<?php echo(isset($errors['nb_copy']) || $_GET ? $book->nb_copy : $sent->nb_copy); ?>"/>

        <div class="form-create__example-box">
            <p class="form-create__example-box__text">Attention ceci doit être un nombre</p>
        </div>
        <?php if (isset($errors['nb_copy'])): ?>
            <?php foreach ($errors['nb_copy'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <label for="vedette">Mettre en vedette</label>
        <input type="checkbox" name="vedette" id="vedette" value="1"/>
        <input type="submit" value="Modifier le livre" class="btnVert"/>
    </form>
</main>