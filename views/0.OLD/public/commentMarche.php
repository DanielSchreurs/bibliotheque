<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description"
          content="Innovent dans sa manière de présenter l’information, les services que vous propose le nouveau site, la joie de livre, vous laissera sans mots. Vous pourrez aisément rechercher un livre depuis plusieurs bibliothèques. ">
    <meta name="keywords"
          content="la joie de livre,LA JOIE DE LIVRE,bibliothèques,Bibliothèques,Bibliothèque, livres,Livres, nationnal, belge, Belgique">
    <meta name="author" content="Daniel schreurs">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="57x57" href="./img/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="./img/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="./img/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./img/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./img/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="./img/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="./img/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="./img/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./img/favicons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="./img/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="./img/favicons/favicon-194x194.png" sizes="194x194">
    <link rel="icon" type="image/png" href="./img/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="./img/favicons/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="./img/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="./img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png">
    <link rel="stylesheet" href="../../css/style.css" type="text/css">
    <title>La joie de livre | Nos Bibliothèques</title>
</head>
<body>
<header>
    <h1><a href="#">La joie de Livre</a></h1>
    <nav class="header-main__nav">
        <ul>
            <li><a href="#" title="Renvois vers la page d'accueil">accueil</a></li>
            <li><a href="./vues/public/bibliotheques.php" title="Renvois vers la page Nos blibliothèques">Nos
                    blibliothèques</a></li>
            <li><a href="./vues/public/commentMarche.php" title="Renvois vers la page Comment ça marche">Comment ça
                    marche</a></li>
            <li><span>Mon compte</span>

                <form action="index.php" method="post" id="connexion" class="header-main__form-connexion__userLog">
                    <fieldset>
                        <label for="login">Identifiant&nbsp;</label>
                        <input type="text" name="login" id="login" required placeholder="Votre login">
                        <label for="pwd">Mot de passe&nbsp;</label>
                        <input type="password" name="pwd" id="pwd" required placeholder="Votre mot de passe">
                        <input type="submit" value="Se connecter"><a href="index.php?a=creer&amp;amp;c=account"
                                                                     class="bGris">S'incrire</a>
                    </fieldset>
                </form>
            </li>
        </ul>
    </nav>
</header>
<main>
    <form name="global" class="form_recherche">
        <input type="search" list="tous" required placeholder="Un livre, un auteur" name="recherche" id="recherche">
        <datalist id="tous">
            <option value="LA HESTRE(Manage)">LA HESTRE(Manage)</option>
            <option value="LA HULPE">LA HULPE</option>
            <option value="LA LOUVIERE">LA LOUVIERE</option>
            <option value="La Louvière">La Louvière</option>
            <option value="LA LOUVIERE (Boussoit)">LA LOUVIERE (Boussoit)</option>
            <option value="LA LOUVIERE (Haine-Saint-Pierre)">LA LOUVIERE (Haine-Saint-Pierre)</option>
            <option value="LA LOUVIERE (Houdeng-Goegnies)">LA LOUVIERE (Houdeng-Goegnies)</option>
            <option value="LA LOUVIERE (Strépy-Bracquegnies)">LA LOUVIERE (Strépy-Bracquegnies)</option>
            <option value="LA LOUVIERE Strépy-Bracquegnies">LA LOUVIERE Strépy-Bracquegnies</option>
            <option value="LA REID (Theux)">LA REID (Theux)</option>
            <option value="LAEKEN (Bruxelles)">LAEKEN (Bruxelles)</option>
            <option value="LIEGE">LIEGE</option>
        </datalist>
        <input type="submit" value="Rechercher !">
    </form>
    <nav class="main_nav_Bibli_Small">
        <ul>
            <li><a href="#" title="affiche tous les auteurs">tous les auteurs</a></li>
            <li><a href="#" title="affiche tous les editeurs">tous les editeurs</a></li>
            <li><a href="#" title="affiche tous les genres">tous les genres</a></li>
            <li><a href="#" title="affiche tous les annees">tous les annees</a></li>
        </ul>
    </nav>
    <h2>Comment ça marche&nbsp;?</h2>
    <ul class="liste_Questions">
        <li>
            <h3><a href="#" title="">Comment faire une recherche ?</a></h3>
            <blockquote>
                <p>Il suffit d’introduire dans la bare de recherche principale le livre que vous recherchez.</p>
            </blockquote>
        </li>
        <li>
            <h3><a href="#" title="">Pourquoi mon livre n’apprait-il pas ?</a></h3>
            <blockquote>
                <p>Nous ne référencions que les livres qui sont repris dans l’inventaire des bibliothèques qui meublent
                    ce site. Si le livre n’apparait pas, c’est qu’aucune bibliothèque ne semble l’avoir.</p>
            </blockquote>
        </li>
        <li>
            <h3><a href="#" title="">Pourquoi me demande-t-on d’indiquer ma région ?</a></h3>
            <blockquote>
                <p>De cette façon, nous pouvons organiser la liste des bibliothèques qui disposent d’un livre recherché
                    en fonction de votre région. Pas de Big brother, juste un soucis d’économies de temps, de carburant
                    et de bonne humeur !</p>
            </blockquote>
        </li>
    </ul>
</main>
<footer>
    <p class="copy">Designed by &copy; <a href="daniel.schreurs.com">Daniel Schreurs
            <time>2015</time>
        </a></p>
    <ul>
        <li><a href="./vues/admin/admin.php">Se connecter</a></li>
        <li><a href="#" title="Renvois vers la pageDéconecter">Déconecter</a></li>
        <li><a href="#" title="Renvois vers la pageEspace privé">Espace privé</a></li>
    </ul>
</footer>
</body>
</html>