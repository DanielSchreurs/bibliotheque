<main class="container">
    <?php
    $author = $data['data']['authors'];
    isset($data['data']['errors']) ? $errors = $data['data']['errors'] : '';
    isset($data['data']['sent']) ? $sent = $data['data']['sent'] : '';
    $_GET = $_SERVER['REQUEST_METHOD'] == 'GET';
    ?>
    <?php include('./views/parts/main_nav_admin.php'); ?>
    <?php Components\Session::flash(); ?>
    <h1 class="header-block-one"><?php echo($data['title'] . ' &laquo;&nbsp;' . $author->first_name . '-' . $author->last_name . '&nbsp;&raquo;'); ?></h1>

    <form class="form-create form-create--large"
          action="<?php echo($html->createLink('author', 'admin_edit_author', ['id' => $author->author_id])); ?>"
          method="post"
          enctype="multipart/form-data">
        <p class="form-create__infos"> Les champs précédés d’un <strong
                class="form-create--obligatoire">(*)</strong> sont obligatoires!</p>
        <input name="update_at" value="<?php echo(date("Y-m-d")); ?>" type="hidden"/>
        <label for="last_name">Nom de fammille<strong
                class="form-create--obligatoire">*</strong></label>
        <input type="text"
               class="form-create__simple-imput"
               name="last_name"
               id="last_name"
               value="<?php echo(isset($errors['last_name']) || $_GET ? $author->last_name : $sent->last_name); ?>"
               placeholder="Madelaine"
               title="Introduisez le titre de votre livre"/>
        <?php if (isset($errors['last_name'])): ?>
            <?php foreach ($errors['last_name'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <label for="first_name">Le prénom<strong
                class="form-create--obligatoire">*</strong></label>
        <input type="text"
               class="form-create__simple-imput"
               name="first_name"
               id="first_name"
               value="<?php echo(isset($errors['first_name']) || $_GET ? $author->first_name : $sent->first_name); ?>"
               placeholder="Madelaine"
               title="Introduisez le titre de votre livre"/>
        <?php if (isset($errors['first_name'])): ?>
            <?php foreach ($errors['first_name'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <label for="photo_edit">Portrait 300/450px (.jpg)<strong
                class="form-create--obligatoire">*</strong></label>
        <input class="form-create__simple-imput" type="file" name="photo_edit" id="photo_edit"
               title="Chargez le portrait de l'auteur"/>
        <?php if (isset($errors['photo_edit'])): ?>
            <?php foreach ($errors['photo_edit'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="form-create__example-box">
            <p class="form-create__example-box__text">Vous pouvez insérer une image au format (.jpg) et qui fait 300
                pixel de large et 450 pixel de haut.</p>
        </div>
        <label for="logo_edit">Petite portrait 200/200px (.png)<strong
                class="form-create--obligatoire">*</strong></label>
        <input class="form-create__simple-imput" type="file" name="logo_edit"
               id="logo_edit"
               title="Chargez le couverture de votre livre"/>
        <?php if (isset($errors['logo_edit'])): ?>
            <?php foreach ($errors['logo_edit'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="form-create__example-box">
            <p class="form-create__example-box__text">Vous pouvez insérer une image au format (.png) et qui fait 200
                pixel de large et 200 pixel de haut.</p>
        </div>
        <label for="bio_text">Petite biographie<strong
                class="form-create--obligatoire">*</strong></label>
        <textarea class="form-create__long-text" name="bio_text" id="bio_text" cols="30"
                  rows="10"><?php echo(isset($errors['bio_text']) || $_GET ? $author->bio_text : $sent->bio_text); ?></textarea>
        <?php if (isset($errors['bio_text'])): ?>
            <?php foreach ($errors['bio_text'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>

        <label for="datebirth">Date de naissance (aaaa-mm-jj)<strong
                class="form-create--obligatoire">*</strong></label>
        <input class="form-create__simple-imput" type="text" name="datebirth" min="2" id="datebirth"
               title="Introduisez la date de publication" placeholder="1900-02-02"
               value="<?php echo(isset($errors['datebirth']) || $_GET ? $author->datebirth : $sent->datebirth); ?>"/>

        <div class="form-create__example-box">
            <p class="form-create__example-box__text">Attention la date doit être dans le passé.</p>
        </div>
        <?php if (isset($errors['datebirth'])): ?>
            <?php foreach ($errors['datebirth'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <label for="datedeath">Date de mort (aaaa-mm-jj)</label>
        <input class="form-create__simple-imput" type="text" name="datedeath" min="2" id="datedeath"
               title="Introduisez la date de publication" placeholder="1970-02-02"
               value="<?php echo(isset($errors['datedeath']) || $_GET ? $author->datedeath : $sent->datedeath); ?>"/>

        <div class="form-create__example-box">
            <p class="form-create__example-box__text">Ce champs est facultatif mais s'il est définit il doit également
                être dans la passé.</p>
        </div>
        <?php if (isset($errors['datedeath'])): ?>
            <?php foreach ($errors['datedeath'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <label for="vedette">Mettre en vedette(un seul possible)</label>
        <input <?php echo($author->vedette == 1 ? 'checked' : ''); ?> type="checkbox" name="vedette" id="vedette"
                                                                      value="1"/>
        <input type="submit" value="Modifier l'auteur" class="btnVert"/>
    </form>
</main>