<main class="container">
    <?php include('./views/parts/main_nav_admin.php'); ?>
    <?php Components\Session::flash(); ?>
    <?php if (isset($data['data']['step'])): ?>
        <?php include('./views/parts/admin_nav_steps.php'); ?>
    <?php endif; ?>
    <h1 class="header-block-one"><?php echo($data['title']); ?></h1>
    <?php
    isset($data['data']['errors']) ? $errors = $data['data']['errors'] : '';
    isset($data['data']['sent']) ? $sent = $data['data']['sent'] : '';
    $_GET = $_SERVER['REQUEST_METHOD'] == 'GET';
    ?>
    <form class="form-create form-create--large"
          action="
                    <?php if (isset($data['data']['step'])): ?>
                        <?php echo($html->createLink('editor', 'admin_create_editor',['step'=>$data['data']['step']])); ?>
                    <?php else: ?>
                         <?php echo($html->createLink('editor', 'admin_create_editor')); ?>
                    <?php endif; ?>
          " method="post"
          enctype="multipart/form-data">
        <p class="form-create__infos"> Les champs précédés d’un <strong
                class="form-create--obligatoire">(*)</strong> sont obligatoires!</p>

        <label for="name">Nom de l'éditeur<strong
                class="form-create--obligatoire">*</strong></label>
        <input type="text"
               class="form-create__simple-imput"
               name="name"
               id="name"
               value="<?php echo(isset($errors['name']) || $_GET ? '' : $sent->name); ?>"
               placeholder="Madelaine"
               title="Introduisez le titre de votre livre"/>
        <?php if (isset($errors['name'])): ?>
            <p class="form-create__message--error"><?php echo($errors['name']); ?><span class="flash-box__btn">X</span>
            </p>
        <?php endif; ?>
        <label for="website">Site de l'éditeur de l'éditeur<strong
                class="form-create--obligatoire">*</strong></label>
        <input type="text"
               class="form-create__simple-imput"
               name="website"
               id="website"
               value="<?php echo(isset($errors['website']) || $_GET ? '' : $sent->website); ?>"
               placeholder="Madelaine"
               title="Introduisez le titre de votre livre"/>
        <?php if (isset($errors['website'])): ?>
            <p class="form-create__message--error"><?php echo($errors['website']); ?><span
                    class="flash-box__btn">X</span>
            </p>
        <?php endif; ?>
        <div class="form-create__example-box">
            <p class="form-create__example-box__text">Vous devez insérer l'url du site officiel de la maison d'édition. Quelque chose comme ceci:&nbsp;<bold>&nbsp;&laquo;https://www.nomDuSite.be&nbsp;&raquo;.</bold></p>
        </div>

        <label for="logo">Couverture du livre 200/200px (.png)<strong
                class="form-create--obligatoire">*</strong></label>
        <input class="form-create__simple-imput" type="file" name="logo" id="logo"
               title="Chargez le couverture de votre livre"/>
        <?php if (isset($errors['logo'])): ?>
            <p class="form-create__message--error">
                <?php foreach ($errors['logo'] as $error): ?>
                    <?php echo($error); ?>
                <?php endforeach; ?>
                <span class="flash-box__btn">X</span></p>
        <?php endif; ?>
        <div class="form-create__example-box">
            <p class="form-create__example-box__text">Vous devez insérer une image au format (.png) et qui fait 200 pixel de large et 200 pixel de haut.</p>
        </div>
        <label for="bio_text">&Agrave; propos<strong
                class="form-create--obligatoire">*</strong></label>
        <textarea class="form-create__long-text" name="bio_text" id="bio_text" cols="30"
                  rows="10"><?php echo(isset($errors['bio_text']) || $_GET ? '' : $sent->bio_text); ?></textarea>
        <?php if (isset($errors['bio_text'])): ?>
            <p class="form-create__message--error"><?php echo($errors['bio_text']); ?><span
                    class="flash-box__btn">X</span></p>
        <?php endif; ?>
        <input type="submit" value="<?php echo(isset($data['data']['step'])?'Passer à l’étape suivante':'Ajouter un éditeur'); ?>" class="btnVert"/>
    </form>
</main>