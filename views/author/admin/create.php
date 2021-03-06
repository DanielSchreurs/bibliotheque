<main class="container">
    <?php
    isset($data['data']['errors']) ? $errors = $data['data']['errors'] : '';
    isset($data['data']['sent']) ? $sent = $data['data']['sent'] : '';
    $_GET = $_SERVER['REQUEST_METHOD'] == 'GET';
    ?>
    <?php include('./views/parts/main_nav_admin.php'); ?>
    <?php Components\Session::flash(); ?>
    <?php if (isset($data['data']['step'])): ?>
        <?php include('./views/parts/admin_nav_steps.php'); ?>
    <?php endif; ?>
    <h1 class="header-block-one"><?php echo($data['title']); ?></h1>

    <form class="form-create form-create--large"
          action="
                <?php if (isset($data['data']['step'])): ?>
                    <?php echo($html->createLink('author', 'admin_create_author',
              ['step' => $data['data']['step']])); ?>
                <?php else: ?>
                    <?php echo($html->createLink('author', 'admin_create_author')); ?>
                <?php endif; ?>
        " method="post"
          enctype="multipart/form-data">
        <p class="form-create__infos"> Les champs précédés d’un <strong
                class="form-create--obligatoire">(*)</strong> sont obligatoires!</p>
        <input name="create_at" value="<?php echo(date("Y-m-d")); ?>" type="hidden"/>
        <label for="last_name">Nom de fammille<strong
                class="form-create--obligatoire">*</strong></label>
        <input type="text"
               class="form-create__simple-imput"
               name="last_name"
               id="last_name"
               value="<?php echo(isset($errors['last_name']) || $_GET ? '' : $sent->last_name); ?>"
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
               value="<?php echo(isset($errors['first_name']) || $_GET ? '' : $sent->first_name); ?>"
               placeholder="Madelaine"
               title="Introduisez le titre de votre livre"/>
        <?php if (isset($errors['first_name'])): ?>
            <?php foreach ($errors['first_name'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <label for="photo">Portrait 300/450px (.jpg)<strong
                class="form-create--obligatoire">*</strong></label>
        <input class="form-create__simple-imput" type="file" name="photo" id="photo"
               title="Chargez le portrait de l'auteur"/>

        <div class="form-create__example-box">
            <p class="form-create__example-box__text">Vous devez insérer une image au format (.jpg) et qui fait 300
                pixel de large et 450 pixel de haut.</p>
        </div>
        <?php if (isset($errors['photo'])): ?>
            <?php foreach ($errors['photo'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <label for="logo">Petit portrait 200/200px(.png)<strong
                class="form-create--obligatoire">*</strong></label>
        <input class="form-create__simple-imput" type="file" name="logo"
               id="logo"
               title="Chargez le couverture de votre livre"/>

        <div class="form-create__example-box">
            <p class="form-create__example-box__text">Vous devez insérer une image au format (.png) et qui fait 200
                pixel de large et 200 pixel de haut.</p>
        </div>
        <?php if (isset($errors['logo'])): ?>
            <?php foreach ($errors['logo'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <label for="bio_text">Petite biographie<strong
                class="form-create--obligatoire">*</strong></label>
        <textarea class="form-create__long-text" name="bio_text" id="bio_text" cols="30"
                  rows="10"><?php echo(isset($errors['bio_text']) || $_GET ? '' : $sent->bio_text); ?></textarea>
        <?php if (isset($errors['bio_text'])): ?>
            <?php foreach ($errors['bio_text'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>

        <label for="datebirth">Date de naissance (aaaa-mm-jj)<strong
                class="form-create--obligatoire">*</strong></label>
        <input class="form-create__simple-imput" type="text" name="datebirth" min="2" id="datebirth"
               title="Introduisez la date de publication" placeholder="1900-02-02"
               value="<?php echo(isset($errors['datebirth']) || $_GET ? '' : $sent->datebirth); ?>"/>

        <div class="form-create__example-box">
            <p class="form-create__example-box__text">Attention la date doit être dans le passé. ex&nbsp;:
                1900-02-02</p>
        </div>
        <?php if (isset($errors['datebirth'])): ?>
            <?php foreach ($errors['datebirth'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <label for="datedeath">Date de mort (aaaa/mm/jj)</label>
        <input class="form-create__simple-imput" type="text" name="datedeath" min="2" id="datedeath"
               title="Introduisez la date de publication" placeholder="1970-02-02"
               value="<?php echo(isset($errors['datedeath']) || $_GET ? '' : $sent->datedeath); ?>"/>

        <div class="form-create__example-box">
            <p class="form-create__example-box__text">Ce champs est facultatif mais s'il est définit il doit également
                être dans la passé.ex&nbsp;: 1900-02-02</p>
        </div>
        <?php if (isset($errors['datedeath'])): ?>
            <?php foreach ($errors['datedeath'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <label for="vedette">Mettre en vedette(un seul possible)</label>
        <input type="checkbox" name="vedette" id="vedette" value="1"/>
        <input type="submit"
               value="<?php echo(isset($data['data']['step']) ? 'Passer à l’étape suivante' : 'Ajouter un auteur'); ?>"
               class="btnVert"/>
    </form>
</main>