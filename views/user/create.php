<main>
    <?php Components\Flash::flash(); ?>
    <h2><?php echo(isset($data['data']['message'])?$data['data']['message']:'Faites partie de la communauté en quelques clics !'); ?></h2>
    <?php
    isset($data['data']['sent']) ? $sent = $data['data']['sent'] : '';
    isset($data['data']['errors']) ? $error = $data['data']['errors'] : '';
    ?>
    <?php if (!isset($data['data']['message'])): ?>
    <form class="form-create-user" action="<?php $html->createLink('user', 'create'); ?>" method="post">
        <p> Les champs précédés d’un <strong class="form-create-user__obligatoire">(*)</strong> sont obligatoires!</p>
        <fieldset>
            <legend>Qui êtes vous ?</legend>
            <label for="first_name">Votre prénom <strong class="form-create-user__obligatoire">*</strong></label>
            <input <?php echo(isset($error['first_name']) ? 'class="error"' : ''); ?> type="text" name="first_name"
                                                                                      id="first_name"
                                                                                      value="<?php echo(isset($sent->first_name) ? $sent->first_name : ''); ?> "
                                                                                      placeholder="Jane"
                                                                                      title="Introduisez votre prénom"/>
            <label for="last_name">Votre nom de famille <strong class="form-create-user__obligatoire">*</strong></label>
            <input <?php echo(isset($error['last_name']) ? 'class="error"' : ''); ?> type="text" name="last_name"
                                                                                     id="last_name"
                                                                                     value="<?php echo(isset($sent->last_name) ? $sent->last_name : ''); ?>"
                                                                                     placeholder="Doe"
                                                                                     title="Introduisez votre nom de famillie"/>

            <!-- <div class="form-create-user--error">
                 <p>Votre champ nom, prenom doivent être remplis.</p>
             </div>-->
        </fieldset>
        <fieldset>
            <legend>Votre compte</legend>
            <label for="username">Votre nom d'utilisateur <strong
                    class="form-create-user__obligatoire">*</strong></label>
            <input <?php echo(isset($error['username']) ? 'class="error"' : ''); ?> type="text" name="username"
                                                                                    id="username"
                                                                                    value="<?php echo(isset($sent->username) ? $sent->username : ''); ?>"
                                                                                    title="Introduisez votre nom d’utilisateur"
                                                                                    placeholder="Janette"/>
            <label for="email">Votre adresse mail <strong class="form-create-user__obligatoire">*</strong></label>
            <input <?php echo(isset($error['email']) ? 'class="error"' : ''); ?> type="email" name="email" id="email"
                                                                                 value="<?php echo(isset($sent->email) ? $sent->email : ''); ?>"
                                                                                 title="Introduisez votre adressse mail"
                                                                                 placeholder="jane.doe@outlook.com"/>
            <span id="linkShowPassword" title="Afficher les mots de pass" class="smallInfo icon ouvrir">Montrer le mot de pass</span>
            <label for="password">Votre Mot de passes <strong class="form-create-user__obligatoire">*</strong></label>
            <input <?php echo(isset($error['password']) ? 'class="error showedpassword"' : 'class="showedpassword"'); ?>
                type="password" name="password" id="password"
                value="<?php echo(isset($sent->password) ? $sent->password : ''); ?>"
                title="Introduisez votre mot de pass"
                class="showedpassword"/>
            <!-- <div class="form-create-user--error">
                 <p>Votre champ nom, prenom doivent être remplis.</p>

             </div>-->
        </fieldset>
        <fieldset>
            <legend>Sécurité</legend>
            <label for="question">Question de sécurité</label>
            <input type="text" name="question" id="question"
                   value="<?php echo(isset($sent->question) ? $sent->question : ''); ?>"
                   title="Introduisez une question de sécurité"
                   placeholder="Quel est le nom de mon premier copain"/>
            <label for="answer">réponse à cette question</label>
            <input type="text" name="answer" id="answer"
                   value="<?php echo(isset($sent->answer) ? $sent->answer : ''); ?>"
                   title="Introduisez la réponse à la question"
                   placeholder="Mystère"/>
            <!-- <div class="form-create-user--error">
                 <p>Votre champ nom, prenom doivent être remplis.</p>
             </div>-->
        </fieldset>
        <input type="submit" value="Soumettre l'inscription" class="btnVert"/>
    </form>

    <?php else: ?>
        <a class="btnVert" href="<?php echo($html->createLink('book','index')); ?>"> Retour à l'accueil</a>
    <?php endif; ?>
</main>