<main class="container">
    <?php include('./views/parts/main_nav_admin.php'); ?>
    <?php Components\Session::flash(); ?>
    <h1 class="header-block-one"><?php echo($data['title']); ?></h1>
    <?php
    $editor = $data['data']['editor'];
    isset($data['data']['errors']) ? $errors = $data['data']['errors'] : '';
    isset($data['data']['sent']) ? $sent = $data['data']['sent'] : '';
    $_GET = $_SERVER['REQUEST_METHOD'] == 'GET';
    ?>
    <form class="form-create form-create--large"
          action="<?php echo($html->createLink('editor', 'admin_edit_editor', ['id' => $editor->id])); ?>" method="post"
          enctype="multipart/form-data">
        <p class="form-create__infos"> Les champs précédés d’un <strong
                class="form-create--obligatoire">(*)</strong> sont obligatoires!</p>
        <input name="update_at" value="<?php echo(date("Y-m-d")); ?>" type="hidden"/>
        <label for="name">Nom de l'éditeur<strong
                class="form-create--obligatoire">*</strong></label>
        <input type="text"
               class="form-create__simple-imput"
               name="name"
               id="name"
               value="<?php echo(isset($errors['name']) || $_GET ? $editor->editor_name : $sent->name); ?>"
               placeholder="Poche"
               title="Introduisez le titre de votre livre"/>
        <?php if (isset($errors['name'])): ?>
            <?php foreach ($errors['name'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <label for="website">Site de l'éditeur<strong
                class="form-create--obligatoire">*</strong></label>
        <input type="text"
               class="form-create__simple-imput"
               name="website"
               id="website"
               value="<?php echo(isset($errors['website']) || $_GET ? $editor->author_website : $sent->website); ?>"
               placeholder="http://www.livredepoche.com"
               title="Introduisez le titre de votre livre"/>
        <?php if (isset($errors['website'])): ?>
            <?php foreach ($errors['website'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="form-create__example-box">
            <p class="form-create__example-box__text">Vous devez insérer l'url du site officiel de la maison d'édition.
                Quelque chose comme ceci:&nbsp;
                <bold>&nbsp;&laquo;https://www.nomDuSite.be&nbsp;&raquo;.</bold>
            </p>
        </div>
        <label for="logo_edit">Logo de l’éditeur 200/200px (.png)<strong
                class="form-create--obligatoire">*</strong></label>
        <input class="form-create__simple-imput" type="file" name="logo_edit" id="logo_edit"
               title="Chargez le couverture de votre livre"/>
        <?php if (isset($errors['logo_edit'])): ?>
            <?php foreach ($errors['logo_edit'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="form-create__example-box">
            <p class="form-create__example-box__text">Vous devez insérer une image au format (.png) et qui fait 200
                pixel de large et 200 pixel de haut.</p>
        </div>
        <label for="bio_text">&Agrave; propos<strong
                class="form-create--obligatoire">*</strong></label>
        <textarea class="form-create__long-text" name="bio_text" id="bio_text" cols="30"
                  rows="10"><?php echo(isset($errors['bio_text']) || $_GET ? $editor->bio_text : $sent->bio_text); ?></textarea>
        <?php if (isset($errors['bio_text'])): ?>
            <?php foreach ($errors['bio_text'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <input type="submit" value="Modifier l’éditeur" class="btnVert"/>
    </form>
</main>