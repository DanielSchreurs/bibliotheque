<main class="container">
    <?php Components\Session::flash(); ?>
    <h1 class="header-block-one"><?php echo($data['title']); ?></h1>
    <?php
    $genre = $data['data']['genre'];
    isset($data['data']['errors']) ? $errors = $data['data']['errors'] : '';
    isset($data['data']['sent']) ? $sent = $data['data']['sent'] : '';
    $_GET = $_SERVER['REQUEST_METHOD'] == 'GET';
    ?>
    <form class="form-create large"
          action="<?php echo($html->createLink('genre', 'admin_edit_genre', ['id' => $genre->id])); ?>" method="post" >
        <p class="form-create__infos"> Les champs précédés d’un <strong
                class="form-create--obligatoire">(*)</strong> sont obligatoires!</p>

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
            <p class="form-create__message--info"><?php echo($errors['name']); ?><span class="flash-box__btn">X</span>
            </p>
        <?php endif; ?>

        <input type="submit" value="Modifier le genre" class="btnVert"/>
    </form>
</main>