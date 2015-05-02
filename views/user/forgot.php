<main class="container">
    <?php include('./views/parts/main_nav_admin.php'); ?>
    <?php Components\Session::flash(); ?>
    <?php include('./views/parts/user_nav_steps.php'); ?>
    <h1 class="header-block-one"><?php echo($data['title']); ?></h1>
    <?php
    isset($data['data']['errors']) ? $errors = $data['data']['errors'] : '';
    isset($data['data']['sent']) ? $sent = $data['data']['sent'] : '';
    $_GET = $_SERVER['REQUEST_METHOD'] == 'GET';
    ?>
    <form class="form-create form-create--large"
          action=" <?php echo($html->createLink('user', 'forgot', ['step' => 1])); ?>"
          method="post">
        <p class="form-create__infos"> Les champs précédés d’un <strong
                class="form-create--obligatoire">(*)</strong> sont obligatoires!</p>
        <label for="username">Votre identifiant<strong
                class="form-create--obligatoire">*</strong></label>
        <input type="text"
               class="form-create__simple-imput"
               name="username"
               id="username"
               value="<?php echo(isset($errors['username']) || $_GET ? '' : $sent->username); ?>"
               placeholder="megaCoolIdentifiant1976"
               title="Introduisez le genre"/>
        <?php if (isset($errors['username'])): ?>
            <?php foreach ($errors['username'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <input type="submit" value="Soumettre votre identifiant" class="btnVert"/>
    </form>
</main>