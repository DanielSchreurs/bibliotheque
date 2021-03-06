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
                        <?php echo($html->createLink('genre', 'admin_create_genre',
              ['step' => $data['data']['step']])); ?>
                    <?php else: ?>
                        <?php echo($html->createLink('genre', 'admin_create_genre')); ?>
                    <?php endif; ?>
          " method="post">
        <p class="form-create__infos"> Les champs précédés d’un <strong
                class="form-create--obligatoire">(*)</strong> sont obligatoires!</p>
        <input name="create_at" value="<?php echo(date("Y-m-d")); ?>" type="hidden"/>
        <label for="name">Genre<strong
                class="form-create--obligatoire">*</strong></label>
        <input type="text"
               class="form-create__simple-imput"
               name="name"
               id="name"
               value="<?php echo(isset($errors['name']) || $_GET ? '' : $sent->name); ?>"
               placeholder="Policier"
               title="Introduisez le genre"/>
        <div class="form-create__example-box">
            <p class="form-create__example-box__text">Assurez-vous qu'il n'existe pas déjà <a class="inline-link" href="<?php echo($html->createLink('genre', 'index')); ?>">ici</a></p>
        </div>
        <?php if (isset($errors['name'])): ?>
            <?php foreach ($errors['name'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <input type="submit"
               value="<?php echo(isset($data['data']['step']) ? 'Passer à l’étape suivante' : 'Ajouter un genre'); ?>"
               class="btnVert"/>
    </form>
</main>