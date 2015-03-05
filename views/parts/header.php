<header>
    <h1><a href="#"><?php echo(TITLE); ?></a></h1>
    <nav class="header_nav">
        <ul>
            <li><a href="#" title="Renvois vers la page d'accueil">accueil</a></li>
            <li><a href="./vues/public/bibliotheques.php" title="Renvois vers la page Nos blibliothèques">Nos
                    blibliothèques</a></li>
            <li><a href="./vues/public/commentMarche.php" title="Renvois vers la page Comment ça marche">Comment ça
                    marche</a></li>
            <li><span>Mon compte</span>

                <div class="userLog">
                    <?php if (!$userConnec): ?>
                        <form action="<?php echo($_SERVER['PHP_SELF']); ?>?m=user&a=login" method="post" id="connexion"
                            >
                            <fieldset>
                                <label for="username">Identifiant&nbsp;</label>
                                <input type="text" name="username" id="username" required placeholder="Votre login">
                                <label for="password" class="inline">Mot de passe&nbsp;</label><a id="showPassword"
                                                                                                  class="smallInfo"
                                                                                                  href="#"
                                                                                                  title="Afficher le mot de pass">
                                    Montrer le mot de passe</a>
                                <input type="password" name="password" id="password" required
                                       placeholder="Votre mot de passe">

                                <div>
                                    <label class="smallInfo" for="remember">Se souvenir de moi</label>
                                    <input type="checkbox" name="remember" value="remember" id="remember"/>
                                </div>
                                <a href="<?php echo($_SERVER['PHP_SELF']); ?>?m=user&a=create"
                                   class="btnVert">S'incrire</a><input
                                    class="btnVert" type="submit" value="Se connecter">
                            </fieldset>
                        </form>
                    <?php endif; ?>
                    <?php if ($userConnec): ?>
                        <a href="<?php echo($_SERVER['PHP_SELF']); ?>?m=user&a=logout" class="btnVert">Se
                            déconnecter</a>
                    <?php endif; ?>
                </div>
            </li>
        </ul>
    </nav>
</header>