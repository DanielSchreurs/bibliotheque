<main class="container">
    <?php include('./views/parts/main_nav_admin.php'); ?>
    <?php Components\Session::flash(); ?>
    <h1 class="header-block-one"><?php echo($data['title']); ?></h1>
    <?php
    $genre = $data['data']['genre'];
    isset($data['data']['errors']) ? $errors = $data['data']['errors'] : '';
    isset($data['data']['sent']) ? $sent = $data['data']['sent'] : '';
    $_GET = $_SERVER['REQUEST_METHOD'] == 'GET';
    ?>
    <form class="form-create form-create--large"
          action="<?php echo($html->createLink('genre', 'admin_edit_genre', ['id' => $genre->id])); ?>" method="post">
        <p class="form-create__infos"> Les champs précédés d’un <strong
                class="form-create--obligatoire">(*)</strong> sont obligatoires!</p>
        <input name="update_at" value="<?php echo(date("Y-m-d")); ?>" type="hidden"/>
        <label for="name">Genre<strong
                class="form-create--obligatoire">*</strong></label>
        <input type="text"
               class="form-create__simple-imput"
               name="name"
               id="name"
               value="<?php echo(isset($errors['name']) || $_GET ? $genre->name : $sent->name); ?>"
               placeholder="Madelaine"
               title="Introduisez le genre"/>
        <?php if (isset($errors['name'])): ?>
            <?php foreach ($errors['name'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <input type="submit" value="Modifier le genre" class="btnVert"/>
    </form>
</main>