<header>
    <a class="box_logo" href="<?php echo($_SERVER['PHP_SELF']) ?>"><?php echo(TITLE); ?></a>
    <div class="header_nav">
        <a class="nav_items" href="<?php echo($_SERVER['PHP_SELF']); ?>"
           title="Renvois vers la page d'accueil">accueil</a>
        <a class="nav_items" href="<?php echo($html->createLink('library','index')); ?>"
           title="Renvois vers la page Nos blibliothèques">Nos
            blibliothèques</a>
        <a class="nav_items" href="<?php echo($html->createLink('page','help')); ?>" title="Renvois vers la page Comment ça marche">Comment
            ça
            marche</a>

        <div class="show_form_connexion">
            <span class="nav_items">Mon compte</span>

            <div class="userLog">
                <?php if (!$userConnec && $controller->view != 'create.php'): ?>
                    <form action="<?php echo($_SERVER['PHP_SELF']); ?>?m=user&a=login" method="post"
                          id="connexion"
                        >
                        <fieldset>
                            <label for="username">Identifiant&nbsp;</label>
                            <input type="text" name="username" id="username" required placeholder="Votre login">
                            <label for="password" class="inline">Mot de passe&nbsp;</label>
                            <a id="linkShowPassword" class="smallInfo" href="#" title="Afficher le mot de pass">
                                Montrer le mot de passe</a>
                            <input type="password" name="password" id="password" required
                                   placeholder="Votre mot de passe" class="showedpassword">

                            <div>
                                <label class="smallInfo" for="remember">Se souvenir de moi</label>
                                <input type="checkbox" name="remember" value="remember" id="remember"/>
                            </div>
                            <a href="<?php echo($html->createLink('user', 'create')); ?>" class="btnVert">S'incrire</a>
                            <input class="btnVert" type="submit" value="Se connecter">
                        </fieldset>
                    </form>
                <?php endif; ?>
                <?php if ($userConnec): ?>
                    <p>Bonjour <?php echo($_COOKIE['first_name']); ?></p>
                    <a href="<?php echo($html->createLink('user', 'logout')); ?>" class="btnVert">Se
                        déconnecter</a>
                <?php endif; ?>
                <?php if ($controller->view == 'create.php'): ?>
                    <a href="<?php echo($_SERVER['PHP_SELF']); ?>" class="btnVert">Retour à l'acceuil</a>
                <?php endif; ?>
            </div>
        </div>

    </div>
</header>