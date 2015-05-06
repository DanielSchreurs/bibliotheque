<main class="container">
    <?php include('./views/parts/main_nav_admin.php'); ?>
    <?php Components\Session::flash(); ?>
    <?php include('./views/parts/user_nav_steps.php'); ?>
    <h1 class="header-block-one"><?php echo($data['title']); ?></h1>
    <?php
    isset($data['data']['errors']) ? $errors = $data['data']['errors'] : '';
    isset($data['data']['sent']) ? $sent = $data['data']['sent'] : '';
    $_GET = $_SERVER['REQUEST_METHOD'] == 'GET';
    $step = $data['data']['step'];
    ?>
    <form class="form-create form-create--large"
          action="<?php echo($html->createLink('user', 'forgot')); ?>"
          method="post">
        <p class="form-create__infos"> Les champs précédés d’un <strong
                class="form-create--obligatoire">(*)</strong> sont obligatoires!</p>
        <label
            for="<?php switch ($step): case 1: ?>username<?php break; ?><?php case 2: ?>answer<?php break; ?><?php case 3: ?>password<?php break; ?>
                <?php endswitch; ?>">
            <?php switch ($step): case 1: ?>Votre identifiant<?php break; ?>
            <?php case 2: ?>Répondre à&nbsp;: <?php echo($data['data']['question']); ?><?php break; ?>
            <?php case 3: ?>Nouveau mot de passe<?php break; ?>
            <?php endswitch; ?>
            <strong
                class="form-create--obligatoire">*</strong></label>
        <input type="text"
               class="form-create__simple-imput"
               name="<?php switch ($step): case 1: ?>username<?php break; ?>
                <?php case 2: ?>answer<?php break; ?>
                <?php case 3: ?>password<?php break; ?>
                <?php endswitch; ?>"
               id="<?php switch ($step): case 1: ?>username<?php break; ?>
                <?php case 2: ?>answer<?php break; ?>
                <?php case 3: ?>password<?php break; ?>
                <?php endswitch; ?>"
               value=""
               placeholder="<?php switch ($step): case 1: ?>monIdentifiant<?php break; ?>
                <?php case 2: ?>Votre réponse<?php break; ?>
                <?php case 3: ?>Votre mot de passe<?php break; ?>
                <?php endswitch; ?>"
               title="Introduisez le genre"/>
        <?php if ($step == 3): ?>
            <div class="form-create__example-box">
                <div class="form-create__example-box__text">
                    <p>Ici vous devez insérer votre mot de passe. Avec&nbsp;:</p>
                    <ol class="form-create__example-box__order-liste">
                        <li class="form-create__example-box__order-liste__item">Une lettre non accentuée majuscule</li>
                        <li class="form-create__example-box__order-liste__item">Une lettre non accentuée minuscule</li>
                        <li class="form-create__example-box__order-liste__item">Un chiffre minimum</li>
                        <li class="form-create__example-box__order-liste__item">Et doit-être compris entre 8 et 20
                            caractère.
                        </li>
                    </ol>
                </div>
            </div>
        <?php endif; ?>
        <?php if (isset($errors['username'])): ?>
            <?php foreach ($errors['username'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if (isset($errors['answer'])): ?>
            <?php foreach ($errors['answer'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if (isset($errors['password'])): ?>
            <?php foreach ($errors['password'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <input type="submit" value="<?php switch ($step): case 1: ?>Soumettre votre identifiant<?php break; ?>
                <?php case 2: ?>Soumettre votre réponse<?php break; ?>
                <?php case 3: ?>Réinitialiser votre mot de passe<?php break; ?>
                <?php endswitch; ?>" class="btnVert"/>
    </form>
</main>