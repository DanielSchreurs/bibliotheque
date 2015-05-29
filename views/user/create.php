<main class="container">
    <?php Components\Session::flash(); ?>
    <h1 class="header-block-one">Faites partie de la communauté en quelques clics&nbsp;!</h1>
    <?php
    isset($data['data']['sent']) ? $sent = $data['data']['sent'] : '';
    isset($data['data']['errors']) ? $errors = $data['data']['errors'] : '';

    ?>
    <form class="form-create" action="<?php $html->createLink('user', 'create'); ?>" method="post">
        <p class="form-create__infos"> Les champs précédés d’un <strong class="form-create--obligatoire">(*)</strong>
            sont obligatoires!
        </p>
        <input name="create_at" value="<?php echo(date("Y-m-d")); ?>" type="hidden"/>
        <fieldset>
            <legend>Qui êtes vous ?</legend>
            <label for="first_name">Votre prénom <strong class="form-create--obligatoire">*</strong></label>
            <input class="form-create__simple-imput <?php echo(isset($error['first_name']) ? 'error' : ''); ?>"
                   type="text" name="first_name"
                   id="first_name"
                   value="<?php echo(isset($sent->first_name) ? $sent->first_name : ''); ?>"
                   placeholder="Jane"
                   title="Introduisez votre prénom"/>
            <?php if (isset($errors['first_name'])): ?>
                <?php foreach ($errors['first_name'] as $error): ?>
                    <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span>
                    </p>
                <?php endforeach; ?>
            <?php endif; ?>
            <label for="last_name">Votre nom de famille <strong
                    class="form-create--obligatoire">*</strong></label>
            <input class="form-create__simple-imput <?php echo(isset($error['last_name']) ? 'error' : ''); ?>"
                   type="text" name="last_name"
                   id="last_name"
                   value="<?php echo(isset($sent->last_name) ? $sent->last_name : ''); ?>"
                   placeholder="Doe"
                   title="Introduisez votre nom de famillie"/>
            <?php if (isset($errors['last_name'])): ?>
                <?php foreach ($errors['last_name'] as $error): ?>
                    <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span>
                    </p>
                <?php endforeach; ?>
            <?php endif; ?>
        </fieldset>
        <fieldset>
            <legend>Votre compte</legend>
            <label for="username">Votre nom d'utilisateur <strong
                    class="form-create--obligatoire">*</strong></label>
            <input class="form-create__simple-imput <?php echo(isset($error['username']) ? 'error' : ''); ?>"
                   type="text" name="username"
                   id="username"
                   value="<?php echo(isset($sent->username) ? $sent->username : ''); ?>"
                   title="Introduisez votre nom d’utilisateur"
                   placeholder="Janette"/>

            <div class="form-create__example-box">
                <p class="form-create__example-box__text">Pour des raisons de sécurités, celui-ci doit-être unique et
                    peut donc générer une erreur s'il existe déjà.</p>
            </div>
            <?php if (isset($errors['username'])): ?>
                <?php foreach ($errors['username'] as $error): ?>
                    <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span>
                    </p>
                <?php endforeach; ?>
            <?php endif; ?>
            <label for="email">Votre adresse mail <strong class="form-create--obligatoire">*</strong></label>
            <input class="form-create__simple-imput <?php echo(isset($error['email']) ? 'error' : ''); ?>"
                   type="text" name="email" id="email"
                   value="<?php echo(isset($sent->email) ? $sent->email : ''); ?>"
                   title="Introduisez votre adressse mail"
                   placeholder="jane.doe@outlook.com"/>

            <div class="form-create__example-box">
                <p class="form-create__example-box__text">Ici vous devez insérer votre adresse mail dans un format
                    valide. Quelque chose comme ceci, <i>nom@domaine.com</i></p>
            </div>
            <?php if (isset($errors['email'])): ?>
                <?php foreach ($errors['email'] as $error): ?>
                    <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span>
                    </p>
                <?php endforeach; ?>
            <?php endif; ?>
            <span id="linkShowPassword" title="Afficher les mots de pass" class="smallInfo icon ouvrir">Montrer le mot de pass</span>
            <label for="password">Votre mot de passe<strong
                    class="form-create--obligatoire">*</strong></label>
            <input
                class="form-create__simple-imput showedpassword <?php echo(isset($error['password']) ? 'error' : ''); ?>"
                type="password" name="password" id="password"
                value="<?php echo(isset($sent->password) ? $sent->password : ''); ?>"
                title="Introduisez votre mot de pass"
                class="showedpassword"/>

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
            <?php if (isset($errors['password'])): ?>
                <?php foreach ($errors['password'] as $error): ?>
                    <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span>
                    </p>
                <?php endforeach; ?>
            <?php endif; ?>
        </fieldset>
        <fieldset>
            <legend>Sécurité
                <bold class="form-create--obligatoire">(fortement recommendé)</bold>
            </legend>
            <label for="question">Question de sécurité</label>
            <input
                class="form-create__simple-imput"
                type="text" name="question" id="question"
                value="<?php echo(isset($sent->question) ? $sent->question : ''); ?>"
                title="Introduisez une question de sécurité"
                placeholder="Question"/>

            <div class="form-create__example-box">
                <p class="form-create__example-box__text">Ensérez une question à laquelle vous aurez toujours réponse.</p>
            </div>
            <?php if (isset($errors['question'])): ?>
                <?php foreach ($errors['question'] as $error): ?>
                    <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span>
                    </p>
                <?php endforeach; ?>
            <?php endif; ?>
            <label for="answer">réponse à cette question</label>
            <input
                class="form-create__simple-imput"
                type="text" name="answer" id="answer"
                value="<?php echo(isset($sent->answer) ? $sent->answer : ''); ?>"
                title="Introduisez la réponse à la question"
                placeholder="Réponse"/>
            <?php if (isset($errors['answer'])): ?>
                <?php foreach ($errors['answer'] as $error): ?>
                    <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span>
                    </p>
                <?php endforeach; ?>
            <?php endif; ?>
        </fieldset>
        <input type="submit" value="Soumettre l'inscription" class="btnVert"/>
    </form>
</main>