<main class="container">
    <?php Components\Session::flash(); ?>
    <h1 class="header-block-one">Faites partie de la communauté en quelques clics&nbsp;!</h1>
    <?php
    isset($data['data']['sent']) ? $sent = $data['data']['sent'] : '';
    isset($data['data']['errors']) ? $error = $data['data']['errors'] : '';
    ?>
        <form class="form-create" action="<?php $html->createLink('user', 'create'); ?>" method="post">
            <p class="form-create__infos"> Les champs précédés d’un <strong class="form-create-user__obligatoire">(*)</strong> sont obligatoires!
            </p>
            <fieldset>
                <legend>Qui êtes vous ?</legend>
                <label for="first_name">Votre prénom <strong class="form-create-user__obligatoire">*</strong></label>
                <input class="form-create__simple-imput <?php echo(isset($error['first_name']) ? 'error' : ''); ?>"
                       type="text" name="first_name"
                       id="first_name"
                       value="<?php echo(isset($sent->first_name) ? $sent->first_name : ''); ?>"
                       placeholder="Jane"
                       title="Introduisez votre prénom"/>
                <?php if(isset($error['first_name'])): ?>
                    <p class="form-create__message--error"><?php echo($error['first_name']); ?><span class="flash-box__btn">X</span></p>
                <?php endif; ?>
                <label for="last_name">Votre nom de famille <strong
                        class="form-create-user__obligatoire">*</strong></label>
                <input class="form-create__simple-imput <?php echo(isset($error['last_name']) ? 'error' : ''); ?>"
                       type="text" name="last_name"
                       id="last_name"
                       value="<?php echo(isset($sent->last_name) ? $sent->last_name : ''); ?>"
                       placeholder="Doe"
                       title="Introduisez votre nom de famillie"/>
                <?php if(isset($error['last_name'])): ?>
                    <p class="form-create__message--error"><?php echo($error['last_name']); ?><span class="flash-box__btn">X</span></p>
                <?php endif; ?>

                <!-- <div class="form-create-user--error">
                     <p>Votre champ nom, prenom doivent être remplis.</p>
                 </div>-->
            </fieldset>
            <fieldset>
                <legend>Votre compte</legend>
                <label for="username">Votre nom d'utilisateur <strong
                        class="form-create-user__obligatoire">*</strong></label>
                <input class="form-create__simple-imput <?php echo(isset($error['username']) ? 'error' : ''); ?>"
                       type="text" name="username"
                       id="username"
                       value="<?php echo(isset($sent->username) ? $sent->username : ''); ?>"
                       title="Introduisez votre nom d’utilisateur"
                       placeholder="Janette"/>
                <?php if(isset($error['username'])): ?>
                    <p class="form-create__message--error"><?php echo($error['username']); ?><span class="flash-box__btn">X</span></p>
                <?php endif; ?>
                <label for="email">Votre adresse mail <strong class="form-create-user__obligatoire">*</strong></label>
                <input class="form-create__simple-imput <?php echo(isset($error['email']) ? 'error' : ''); ?>"
                       type="email" name="email" id="email"
                       value="<?php echo(isset($sent->email) ? $sent->email : ''); ?>"
                       title="Introduisez votre adressse mail"
                       placeholder="jane.doe@outlook.com"/>
                <?php if(isset($error['email'])): ?>
                    <p class="form-create__message--error"><?php echo($error['email']); ?><span class="flash-box__btn">X</span></p>
                <?php endif; ?>
                <span id="linkShowPassword" title="Afficher les mots de pass" class="smallInfo icon ouvrir">Montrer le mot de pass</span>
                <label for="password">Votre Mot de passes <strong
                        class="form-create-user__obligatoire">*</strong></label>
                <input
                    class="form-create__simple-imput showedpassword <?php echo(isset($error['password'])? 'error' : ''); ?>"
                    type="password" name="password" id="password"
                    value="<?php echo(isset($sent->password) ? $sent->password : ''); ?>"
                    title="Introduisez votre mot de pass"
                    class="showedpassword"/>
                <?php if(isset($error['password'])): ?>
                <p class="form-create__message--error"><?php echo($error['password']); ?><span class="flash-box__btn">X</span></p>
                <?php endif; ?>
            </fieldset>
            <fieldset>
                <legend>Sécurité</legend>
                <label for="question">Question de sécurité</label>
                <input
                    class="form-create__simple-imput"
                    type="text" name="question" id="question"
                    value="<?php echo(isset($sent->question) ? $sent->question : ''); ?>"
                    title="Introduisez une question de sécurité"
                    placeholder="Quel est le nom de mon premier copain"/>
                <label for="answer">réponse à cette question</label>
                <input
                    class="form-create__simple-imput"
                    type="text" name="answer" id="answer"
                    value="<?php echo(isset($sent->answer) ? $sent->answer : ''); ?>"
                    title="Introduisez la réponse à la question"
                    placeholder="Mystère"/>

            </fieldset>
            <input type="submit" value="Soumettre l'inscription" class="btnVert"/>
        </form>
</main>