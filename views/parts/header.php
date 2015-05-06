<?php use Components\Session; ?>
<header class="header-main">
    <a class="header-main__box-logo" href="<?php echo($_SERVER['PHP_SELF']) ?>" title="<?php echo(TITLE); ?>">
        <svg version="1.1"
             xmlns="http://www.w3.org/2000/svg"
             x="0px" y="0px" width="132.9px" height="27.6px" viewBox="0 0 44.3 9.2" enable-background="new 0 0 44.3 9.2"
             xml:space="preserve"
            >
<defs>
</defs>
            <path fill="#333333" d="M5.6,4C5.4,3.8,5.1,3.5,4.8,3.4C4.5,3.2,4.1,3.1,3.7,3.1c-0.4,0-0.7,0.1-1.1,0.2C2.3,3.4,2,3.6,1.8,3.9h0V0
	H0v9.1h1.7V8.3h0C1.8,8.4,1.8,8.5,2,8.6c0.1,0.1,0.3,0.2,0.4,0.3C2.5,9,2.7,9.1,2.9,9.1c0.2,0.1,0.4,0.1,0.6,0.1
	c0.4,0,0.8-0.1,1.2-0.2C5,8.8,5.3,8.6,5.5,8.4c0.3-0.3,0.4-0.6,0.6-1C6.3,7,6.3,6.6,6.3,6.2c0-0.4-0.1-0.8-0.2-1.2S5.8,4.3,5.6,4z
	 M4.2,7.2C3.9,7.5,3.6,7.6,3.1,7.6S2.3,7.5,2,7.2S1.7,6.6,1.7,6.2S1.8,5.4,2,5.1s0.6-0.4,1.1-0.4s0.8,0.1,1.1,0.4s0.4,0.6,0.4,1.1
	S4.4,7,4.2,7.2z M12.7,3.9c-0.3-0.3-0.6-0.5-1-0.6c-0.4-0.1-0.8-0.2-1.3-0.2c-0.4,0-0.9,0.1-1.3,0.2c-0.4,0.1-0.7,0.3-1,0.6
	s-0.5,0.6-0.7,1S7.2,5.7,7.2,6.2S7.3,7,7.4,7.4s0.4,0.7,0.7,1s0.6,0.5,1,0.6c0.4,0.1,0.8,0.2,1.3,0.2c0.4,0,0.9-0.1,1.3-0.2
	c0.4-0.1,0.7-0.4,1-0.6s0.5-0.6,0.7-1s0.3-0.8,0.3-1.3s-0.1-0.9-0.3-1.3S13,4.2,12.7,3.9z M11.5,7.2c-0.3,0.3-0.6,0.4-1.1,0.4
	S9.6,7.5,9.4,7.2S9,6.6,9,6.2s0.1-0.8,0.4-1.1s0.6-0.4,1.1-0.4s0.8,0.1,1.1,0.4s0.4,0.6,0.4,1.1S11.7,7,11.5,7.2z M20,3.9
	c-0.3-0.3-0.6-0.5-1-0.6c-0.4-0.1-0.8-0.2-1.3-0.2s-0.9,0.1-1.3,0.2c-0.4,0.1-0.7,0.3-1,0.6s-0.5,0.6-0.7,1s-0.3,0.8-0.3,1.3
	s0.1,0.9,0.3,1.3s0.4,0.7,0.7,1s0.6,0.5,1,0.6c0.4,0.1,0.8,0.2,1.3,0.2S18.6,9.1,19,9c0.4-0.1,0.7-0.4,1-0.6s0.5-0.6,0.7-1
	S21,6.6,21,6.2s-0.1-0.9-0.3-1.3S20.3,4.2,20,3.9z M18.8,7.2c-0.3,0.3-0.6,0.4-1.1,0.4s-0.8-0.1-1.1-0.4s-0.4-0.6-0.4-1.1
	s0.1-0.8,0.4-1.1s0.6-0.4,1.1-0.4s0.8,0.1,1.1,0.4s0.4,0.6,0.4,1.1S19,7,18.8,7.2z M25.7,5.9l2.4,3.2h-2.3l-2-3h0v3H22V0h1.8v5.5
	l2-2.3H28L25.7,5.9z M37.2,4.9c0.1,0.3,0.1,0.6,0.1,0.9v3.3h-0.7V5.8c0-0.2,0-0.4-0.1-0.7s-0.1-0.4-0.2-0.6
	c-0.1-0.2-0.2-0.3-0.4-0.4C35.7,4.1,35.5,4,35.2,4c-0.3,0-0.6,0.1-0.8,0.2S34,4.5,33.9,4.7c-0.1,0.2-0.2,0.4-0.3,0.6
	S33.5,5.8,33.5,6v3.1h-0.7V5.7c0-0.5-0.1-0.9-0.3-1.2C32.3,4.2,32.1,4,31.7,4c-0.3,0-0.5,0-0.8,0.1c-0.2,0.1-0.4,0.2-0.6,0.4
	C30.1,4.8,30,5,29.9,5.3c-0.1,0.3-0.2,0.6-0.2,1v2.8H29v-4c0-0.1,0-0.2,0-0.4c0-0.1,0-0.3,0-0.5s0-0.3,0-0.4c0-0.1,0-0.2,0-0.3h0.7
	c0,0.2,0,0.4,0,0.6c0,0.2,0,0.3,0,0.4h0c0.1-0.3,0.4-0.6,0.7-0.8s0.7-0.3,1.2-0.3c0.4,0,0.7,0.1,1,0.3c0.3,0.2,0.5,0.5,0.7,0.9
	c0.2-0.4,0.4-0.7,0.8-0.9c0.3-0.2,0.7-0.3,1.1-0.3c0.4,0,0.8,0.1,1.1,0.2c0.3,0.1,0.5,0.3,0.6,0.5C37.1,4.3,37.2,4.6,37.2,4.9z
	 M44.3,6c0-0.3-0.1-0.6-0.2-0.9c-0.1-0.3-0.3-0.6-0.5-0.8c-0.2-0.2-0.5-0.4-0.8-0.6s-0.7-0.2-1.1-0.2c-0.4,0-0.8,0.1-1.1,0.2
	S40,4,39.7,4.2c-0.2,0.3-0.4,0.6-0.6,0.9c-0.1,0.4-0.2,0.7-0.2,1.2c0,0.4,0.1,0.8,0.2,1.2s0.3,0.7,0.6,0.9C40,8.7,40.3,8.9,40.6,9
	c0.3,0.1,0.7,0.2,1.2,0.2c0.5,0,1-0.1,1.4-0.3c0.4-0.2,0.8-0.5,1-0.9l-0.5-0.4c-0.2,0.3-0.4,0.5-0.8,0.7c-0.3,0.2-0.7,0.3-1.1,0.3
	c-0.4,0-0.8-0.1-1-0.2c-0.3-0.2-0.5-0.4-0.6-0.6s-0.3-0.5-0.3-0.7c-0.1-0.2-0.1-0.4-0.1-0.6h4.7V6z M39.7,5.8c0-0.1,0-0.2,0.1-0.4
	c0.1-0.2,0.2-0.4,0.3-0.6c0.2-0.2,0.4-0.4,0.6-0.6C41,4.1,41.3,4,41.7,4c0.3,0,0.5,0,0.8,0.1s0.4,0.2,0.6,0.4s0.3,0.4,0.4,0.6
	c0.1,0.2,0.1,0.4,0.1,0.7H39.7z"/>
</svg>
    </a>

    <div class="header-main__nav" role="navigation">
        <a class="header-main__nav__nav_items" href="<?php echo($_SERVER['PHP_SELF']); ?>"
           title="Renvois vers la page d'accueil">Accueil</a>
        <a class="header-main__nav__nav_items" href="<?php echo($html->createLink('page', 'about')); ?>"
           title="Renvois vers la page Comment ça marche">&Agrave; propos</a>
        <a class="header-main__nav__nav_items" href="<?php echo($html->createLink('page', 'help')); ?>"
           title="Renvois vers la page Comment ça marche">Comment
            ça
            marche</a>

        <div class="header-main__form-connexion">
            <span class="header-main__nav__nav_items" id="showFrom">Mon compte</span>

            <div class="header-main__form-connexion__userLog">
                <?php if (!Session::isUserLogged() && $controller->view != 'user/create.php' && $controller->view != 'user/forgot.php'): ?>
                    <form action="<?php echo($html->createLink('user', 'login')); ?>" method="post"
                          id="connexion"
                        >
                        <fieldset>
                            <label for="username">Nom d'utilisateur&nbsp;</label>
                            <input type="text" name="username" id="username" required placeholder="Votre login">
                            <label for="password" class="inline">Mot de passe&nbsp;</label>
                            <span id="linkShowPassword" class="smallInfo" title="Afficher le mot de pass">
                                Montrer le mot de passe</span>
                            <input type="password" name="password" id="password" required
                                   placeholder="Votre mot de passe" class="showedpassword">

                            <div>
                                <label class="smallInfo" for="remember">Rester connceter</label>
                                <input type="checkbox" name="remember" value="remember" id="remember"/>
                                <a href="<?php echo($html->createLink('user', 'forgot')) ?>" class="smallInfo">Oublié le
                                    mot de passe ?</a>
                            </div>
                            <a href="<?php echo($html->createLink('user', 'create')); ?>" class="btnVert">S’inscrire</a>
                            <input class="btnVert" type="submit" value="Se connecter">
                        </fieldset>
                    </form>
                <?php endif; ?>
                <?php if (Session::isUserLogged()): ?>
                    <a href="<?php echo($html->createLink('user', 'logout')); ?>" class="btnVert">Se
                        déconnecter</a>
                    <?php if (Session::isAdmin()): ?>
                        <a href="<?php echo($html->createLink('book', 'admin_index')); ?>"
                           class="btnVert">Administration</a>
                    <?php else: ?>
                        <a href="<?php echo($html->createLink('user', 'user_userIndex',
                            ['id' => isset($_SESSION['userId']) ? $_SESSION['userId'] : $_COOKIE['userId']])); ?>"
                           class="btnVert">Mes livres</a>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($controller->view == 'user/create.php'): ?>
                    <a href="<?php echo($_SERVER['PHP_SELF']); ?>" class="btnVert">Retour à l'acceuil</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>
