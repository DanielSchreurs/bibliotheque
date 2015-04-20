<main class="container">
    <?php Components\Session::flash(); ?>
    <h1 class="header-block-one"><?php echo($data['title']); ?></h1>
    <?php
    $editor = $data['data']['editors'];
    isset($data['data']['errors']) ? $errors = $data['data']['errors'] : '';
    isset($data['data']['sent']) ? $sent = $data['data']['sent'] : '';
    $_GET = $_SERVER['REQUEST_METHOD'] == 'GET';
    ?>
    <form class="form-create large"
          action="<?php echo($html->createLink('editor', 'admin_edit_editor', ['id' => $editor->id])); ?>" method="post"
          enctype="multipart/form-data">
        <p class="form-create__infos"> Les champs précédés d’un <strong
                class="form-create--obligatoire">(*)</strong> sont obligatoires!</p>

        <label for="name">Nom de l'éditeur<strong
                class="form-create--obligatoire">*</strong></label>
        <input type="text"
               class="form-create__simple-imput"
               name="name"
               id="name"
               value="<?php echo(isset($errors['name']) || $_GET ? $editor->editor_name : $sent->name); ?>"
               placeholder="Madelaine"
               title="Introduisez le titre de votre livre"/>
        <?php if (isset($errors['name'])): ?>
            <p class="form-create__message--info"><?php echo($errors['name']); ?><span class="flash-box__btn">X</span>
            </p>
        <?php endif; ?>
        <label for="website">Site de l'éditeur de l'éditeur<strong
                class="form-create--obligatoire">*</strong></label>
        <input type="text"
               class="form-create__simple-imput"
               name="website"
               id="website"
               value="<?php echo(isset($errors['website']) || $_GET ? $editor->author_website : $sent->website); ?>"
               placeholder="Madelaine"
               title="Introduisez le titre de votre livre"/>
        <?php if (isset($errors['website'])): ?>
            <p class="form-create__message--info"><?php echo($errors['website']); ?><span class="flash-box__btn">X</span>
            </p>
        <?php endif; ?>

        <label for="logo">Couverture du livre 200/200px (.png)<strong
                class="form-create--obligatoire">*</strong></label>
        <input class="form-create__simple-imput" type="file" name="logo" id="logo"
               title="Chargez le couverture de votre livre"/>
        <?php if (isset($errors['logo'])): ?>
            <p class="form-create__message--info">
                <?php foreach ($errors['logo'] as $error): ?>
                    <?php echo($error); ?>
                <?php endforeach; ?>

                <span class="flash-box__btn">X</span></p>
        <?php endif; ?>
        <label for="bio_text">&Agrave; propos<strong
                class="form-create--obligatoire">*</strong></label>
        <textarea class="form-create__long-text" name="bio_text" id="bio_text" cols="30"
                  rows="10"><?php echo(isset($errors['bio_text']) || $_GET ? $editor->bio_text : $sent->bio_text); ?></textarea>
        <?php if (isset($errors['bio_text'])): ?>
            <p class="form-create__message--info"><?php echo($errors['bio_text']); ?><span
                    class="flash-box__btn">X</span></p>
        <?php endif; ?>
        <input type="submit" value="Modifier l’éditeur" class="btnVert"/>
    </form>
</main>