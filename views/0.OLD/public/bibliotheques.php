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
        <input type="search" list="tous" required placeholder="Un livre, un auteur" name="recherche" value="Liège"
               id="recherche">
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
    <nav class="main-nav">
        <ul>
            <li><a href="#" title="affiche tous les auteurs">tous les auteurs</a></li>
            <li><a href="#" title="affiche tous les editeurs">tous les editeurs</a></li>
            <li><a href="#" title="affiche tous les genres">tous les genres</a></li>
            <li><a href="#" title="affiche tous les annees">tous les annees</a></li>
        </ul>
    </nav>
    <h2>Toutes les bibliothèques de Liège</h2>
    <ul class="liste_Bibliotheques">
        <li>
            <h3><a href="#" title="Affiche tous les livres de cette bibliothèque">Bibliothèque publique filiale Sainte
                    Walburge</a></h3>
            <dl class="info_Bibli">
                <dt>Téléphone&nbsp;:</dt>
                <dd>087/88.87.47</dd>
                <dt>fax&nbsp;:</dt>
                <dd>089/78.57.47</dd>
                <dt>Adresse&nbsp;:</dt>
                <dd>Rue d'Amercoeur 24</dd>
                <dt>Lieu&nbsp;:</dt>
                <dd>4020 LIEGE</dd>
                <dt>Responsable&nbsp;:</dt>
                <dd>Monsieur Dulivre</dd>
            </dl>
            <table class="heures_ouvertures">
                <caption>Les heures d’ouverture</caption>
                <tr>
                    <th>lundi</th>
                    <td>8H à 12h</td>
                </tr>
                <tr>
                    <th>mardi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>mercredi</th>
                    <td>9h à 15h</td>
                </tr>
                <tr>
                    <th>jeudi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>vendredi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>Samedi</th>
                    <td>9h à 12h</td>
                </tr>
                <tr>
                    <th>dimanche</th>
                    <th>fermé</th>
                </tr>
            </table>
        </li>
        <li>
            <h3><a href="#" title="Affiche tous les livres de cette bibliothèque">Bibliothèque spéciale &quot;La Lumière&quot;</a>
            </h3>
            <dl class="info_Bibli">
                <dt>Téléphone&nbsp;:</dt>
                <dd>087/88.87.47</dd>
                <dt>fax&nbsp;:</dt>
                <dd>089/78.57.47</dd>
                <dt>Adresse&nbsp;:</dt>
                <dd>Rue d'Amercoeur 24</dd>
                <dt>Lieu&nbsp;:</dt>
                <dd>4020 LIEGE</dd>
                <dt>Responsable&nbsp;:</dt>
                <dd>Monsieur Dulivre</dd>
            </dl>
            <table class="heures_ouvertures">
                <caption>Les heures d’ouverture</caption>
                <tr>
                    <th>lundi</th>
                    <td>8H à 12h</td>
                </tr>
                <tr>
                    <th>mardi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>mercredi</th>
                    <td>9h à 15h</td>
                </tr>
                <tr>
                    <th>jeudi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>vendredi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>Samedi</th>
                    <td>9h à 12h</td>
                </tr>
                <tr>
                    <th>dimanche</th>
                    <th>fermé</th>
                </tr>
            </table>
        </li>
        <li>
            <h3><a href="#" title="Affiche tous les livres de cette bibliothèque">Bibliothèque communale-filiale du Nord
                    (Saint-Léonard)</a></h3>
            <dl class="info_Bibli">
                <dt>Téléphone&nbsp;:</dt>
                <dd>087/88.87.47</dd>
                <dt>fax&nbsp;:</dt>
                <dd>089/78.57.47</dd>
                <dt>Adresse&nbsp;:</dt>
                <dd>Rue d'Amercoeur 24</dd>
                <dt>Lieu&nbsp;:</dt>
                <dd>4020 LIEGE</dd>
                <dt>Responsable&nbsp;:</dt>
                <dd>Monsieur Dulivre</dd>
            </dl>
            <table class="heures_ouvertures">
                <caption>Les heures d’ouverture</caption>
                <tr>
                    <th>lundi</th>
                    <td>8H à 12h</td>
                </tr>
                <tr>
                    <th>mardi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>mercredi</th>
                    <td>9h à 15h</td>
                </tr>
                <tr>
                    <th>jeudi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>vendredi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>Samedi</th>
                    <td>9h à 12h</td>
                </tr>
                <tr>
                    <th>dimanche</th>
                    <th>fermé</th>
                </tr>
            </table>
        </li>
        <li>
            <h3><a href="#" title="Affiche tous les livres de cette bibliothèque">Bibliothèque locale de la Province de
                    Liège</a></h3>
            <dl class="info_Bibli">
                <dt>Téléphone&nbsp;:</dt>
                <dd>087/88.87.47</dd>
                <dt>fax&nbsp;:</dt>
                <dd>089/78.57.47</dd>
                <dt>Adresse&nbsp;:</dt>
                <dd>Rue d'Amercoeur 24</dd>
                <dt>Lieu&nbsp;:</dt>
                <dd>4020 LIEGE</dd>
                <dt>Responsable&nbsp;:</dt>
                <dd>Monsieur Dulivre</dd>
            </dl>
            <table class="heures_ouvertures">
                <caption>Les heures d’ouverture</caption>
                <tr>
                    <th>lundi</th>
                    <td>8H à 12h</td>
                </tr>
                <tr>
                    <th>mardi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>mercredi</th>
                    <td>9h à 15h</td>
                </tr>
                <tr>
                    <th>jeudi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>vendredi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>Samedi</th>
                    <td>9h à 12h</td>
                </tr>
                <tr>
                    <th>dimanche</th>
                    <th>fermé</th>
                </tr>
            </table>
        </li>
        <li>
            <h3><a href="#" title="Affiche tous les livres de cette bibliothèque">Bibliothèque filiale spécialisée du
                    Grand Séminaire</a></h3>
            <dl class="info_Bibli">
                <dt>Téléphone&nbsp;:</dt>
                <dd>087/88.87.47</dd>
                <dt>fax&nbsp;:</dt>
                <dd>089/78.57.47</dd>
                <dt>Adresse&nbsp;:</dt>
                <dd>Rue d'Amercoeur 24</dd>
                <dt>Lieu&nbsp;:</dt>
                <dd>4020 LIEGE</dd>
                <dt>Responsable&nbsp;:</dt>
                <dd>Monsieur Dulivre</dd>
            </dl>
            <table class="heures_ouvertures">
                <caption>Les heures d’ouverture</caption>
                <tr>
                    <th>lundi</th>
                    <td>8H à 12h</td>
                </tr>
                <tr>
                    <th>mardi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>mercredi</th>
                    <td>9h à 15h</td>
                </tr>
                <tr>
                    <th>jeudi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>vendredi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>Samedi</th>
                    <td>9h à 12h</td>
                </tr>
                <tr>
                    <th>dimanche</th>
                    <th>fermé</th>
                </tr>
            </table>
        </li>
        <li>
            <h3><a href="#" title="Affiche tous les livres de cette bibliothèque">Bibliothèque communale-filiale des
                    Rivageois (Fragnée)</a></h3>
            <dl class="info_Bibli">
                <dt>Téléphone&nbsp;:</dt>
                <dd>087/88.87.47</dd>
                <dt>fax&nbsp;:</dt>
                <dd>089/78.57.47</dd>
                <dt>Adresse&nbsp;:</dt>
                <dd>Rue d'Amercoeur 24</dd>
                <dt>Lieu&nbsp;:</dt>
                <dd>4020 LIEGE</dd>
                <dt>Responsable&nbsp;:</dt>
                <dd>Monsieur Dulivre</dd>
            </dl>
            <table class="heures_ouvertures">
                <caption>Les heures d’ouverture</caption>
                <tr>
                    <th>lundi</th>
                    <td>8H à 12h</td>
                </tr>
                <tr>
                    <th>mardi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>mercredi</th>
                    <td>9h à 15h</td>
                </tr>
                <tr>
                    <th>jeudi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>vendredi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>Samedi</th>
                    <td>9h à 12h</td>
                </tr>
                <tr>
                    <th>dimanche</th>
                    <th>fermé</th>
                </tr>
            </table>
        </li>
        <li>
            <h3><a href="#" title="Affiche tous les livres de cette bibliothèque">Bibliothèque principale de la Province
                    de Liège</a></h3>
            <dl class="info_Bibli">
                <dt>Téléphone&nbsp;:</dt>
                <dd>087/88.87.47</dd>
                <dt>fax&nbsp;:</dt>
                <dd>089/78.57.47</dd>
                <dt>Adresse&nbsp;:</dt>
                <dd>Rue d'Amercoeur 24</dd>
                <dt>Lieu&nbsp;:</dt>
                <dd>4020 LIEGE</dd>
                <dt>Responsable&nbsp;:</dt>
                <dd>Monsieur Dulivre</dd>
            </dl>
            <table class="heures_ouvertures">
                <caption>Les heures d’ouverture</caption>
                <tr>
                    <th>lundi</th>
                    <td>8H à 12h</td>
                </tr>
                <tr>
                    <th>mardi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>mercredi</th>
                    <td>9h à 15h</td>
                </tr>
                <tr>
                    <th>jeudi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>vendredi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>Samedi</th>
                    <td>9h à 12h</td>
                </tr>
                <tr>
                    <th>dimanche</th>
                    <th>fermé</th>
                </tr>
            </table>
        </li>
        <li>
            <h3><a href="#" title="Affiche tous les livres de cette bibliothèque">Bibliothèque publique filiale Sainte
                    Julienne</a></h3>
            <dl class="info_Bibli">
                <dt>Téléphone&nbsp;:</dt>
                <dd>087/88.87.47</dd>
                <dt>fax&nbsp;:</dt>
                <dd>089/78.57.47</dd>
                <dt>Adresse&nbsp;:</dt>
                <dd>Rue d'Amercoeur 24</dd>
                <dt>Lieu&nbsp;:</dt>
                <dd>4020 LIEGE</dd>
                <dt>Responsable&nbsp;:</dt>
                <dd>Monsieur Dulivre</dd>
            </dl>
            <table class="heures_ouvertures">
                <caption>Les heures d’ouverture</caption>
                <tr>
                    <th>lundi</th>
                    <td>8H à 12h</td>
                </tr>
                <tr>
                    <th>mardi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>mercredi</th>
                    <td>9h à 15h</td>
                </tr>
                <tr>
                    <th>jeudi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>vendredi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>Samedi</th>
                    <td>9h à 12h</td>
                </tr>
                <tr>
                    <th>dimanche</th>
                    <th>fermé</th>
                </tr>
            </table>
        </li>
        <li>
            <h3><a href="#" title="Affiche tous les livres de cette bibliothèque">Bibliothèque communale-filiale du
                    Thier-à-Liège</a></h3>
            <dl class="info_Bibli">
                <dt>Téléphone&nbsp;:</dt>
                <dd>087/88.87.47</dd>
                <dt>fax&nbsp;:</dt>
                <dd>089/78.57.47</dd>
                <dt>Adresse&nbsp;:</dt>
                <dd>Rue d'Amercoeur 24</dd>
                <dt>Lieu&nbsp;:</dt>
                <dd>4020 LIEGE</dd>
                <dt>Responsable&nbsp;:</dt>
                <dd>Monsieur Dulivre</dd>
            </dl>
            <table class="heures_ouvertures">
                <caption>Les heures d’ouverture</caption>
                <tr>
                    <th>lundi</th>
                    <td>8H à 12h</td>
                </tr>
                <tr>
                    <th>mardi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>mercredi</th>
                    <td>9h à 15h</td>
                </tr>
                <tr>
                    <th>jeudi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>vendredi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>Samedi</th>
                    <td>9h à 12h</td>
                </tr>
                <tr>
                    <th>dimanche</th>
                    <th>fermé</th>
                </tr>
            </table>
        </li>
        <li>
            <h3><a href="#" title="Affiche tous les livres de cette bibliothèque">Bibliothèque publique filiale
                    Saint-Barthelemy</a></h3>
            <dl class="info_Bibli">
                <dt>Téléphone&nbsp;:</dt>
                <dd>087/88.87.47</dd>
                <dt>fax&nbsp;:</dt>
                <dd>089/78.57.47</dd>
                <dt>Adresse&nbsp;:</dt>
                <dd>Rue d'Amercoeur 24</dd>
                <dt>Lieu&nbsp;:</dt>
                <dd>4020 LIEGE</dd>
                <dt>Responsable&nbsp;:</dt>
                <dd>Monsieur Dulivre</dd>
            </dl>
            <table class="heures_ouvertures">
                <caption>Les heures d’ouverture</caption>
                <tr>
                    <th>lundi</th>
                    <td>8H à 12h</td>
                </tr>
                <tr>
                    <th>mardi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>mercredi</th>
                    <td>9h à 15h</td>
                </tr>
                <tr>
                    <th>jeudi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>vendredi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>Samedi</th>
                    <td>9h à 12h</td>
                </tr>
                <tr>
                    <th>dimanche</th>
                    <th>fermé</th>
                </tr>
            </table>
        </li>
        <li>
            <h3><a href="#" title="Affiche tous les livres de cette bibliothèque">&quot;Centre Multimédia Don Bosco de
                    Liège&quot; ASBL</a></h3>
            <dl class="info_Bibli">
                <dt>Téléphone&nbsp;:</dt>
                <dd>087/88.87.47</dd>
                <dt>fax&nbsp;:</dt>
                <dd>089/78.57.47</dd>
                <dt>Adresse&nbsp;:</dt>
                <dd>Rue d'Amercoeur 24</dd>
                <dt>Lieu&nbsp;:</dt>
                <dd>4020 LIEGE</dd>
                <dt>Responsable&nbsp;:</dt>
                <dd>Monsieur Dulivre</dd>
            </dl>
            <table class="heures_ouvertures">
                <caption>Les heures d’ouverture</caption>
                <tr>
                    <th>lundi</th>
                    <td>8H à 12h</td>
                </tr>
                <tr>
                    <th>mardi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>mercredi</th>
                    <td>9h à 15h</td>
                </tr>
                <tr>
                    <th>jeudi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>vendredi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>Samedi</th>
                    <td>9h à 12h</td>
                </tr>
                <tr>
                    <th>dimanche</th>
                    <th>fermé</th>
                </tr>
            </table>
        </li>
        <li>
            <h3><a href="#" title="Affiche tous les livres de cette bibliothèque">Bibliothèque communale-filiale de
                    Sclessin-Cointe</a></h3>
            <dl class="info_Bibli">
                <dt>Téléphone&nbsp;:</dt>
                <dd>087/88.87.47</dd>
                <dt>fax&nbsp;:</dt>
                <dd>089/78.57.47</dd>
                <dt>Adresse&nbsp;:</dt>
                <dd>Rue d'Amercoeur 24</dd>
                <dt>Lieu&nbsp;:</dt>
                <dd>4020 LIEGE</dd>
                <dt>Responsable&nbsp;:</dt>
                <dd>Monsieur Dulivre</dd>
            </dl>
            <table class="heures_ouvertures">
                <caption>Les heures d’ouverture</caption>
                <tr>
                    <th>lundi</th>
                    <td>8H à 12h</td>
                </tr>
                <tr>
                    <th>mardi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>mercredi</th>
                    <td>9h à 15h</td>
                </tr>
                <tr>
                    <th>jeudi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>vendredi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>Samedi</th>
                    <td>9h à 12h</td>
                </tr>
                <tr>
                    <th>dimanche</th>
                    <th>fermé</th>
                </tr>
            </table>
        </li>
        <li>
            <h3><a href="#" title="Affiche tous les livres de cette bibliothèque">Bibliothèque communale-filiale de
                    Saint-Gilles</a></h3>
            <dl class="info_Bibli">
                <dt>Téléphone&nbsp;:</dt>
                <dd>087/88.87.47</dd>
                <dt>fax&nbsp;:</dt>
                <dd>089/78.57.47</dd>
                <dt>Adresse&nbsp;:</dt>
                <dd>Rue d'Amercoeur 24</dd>
                <dt>Lieu&nbsp;:</dt>
                <dd>4020 LIEGE</dd>
                <dt>Responsable&nbsp;:</dt>
                <dd>Monsieur Dulivre</dd>
            </dl>
            <table class="heures_ouvertures">
                <caption>Les heures d’ouverture</caption>
                <tr>
                    <th>lundi</th>
                    <td>8H à 12h</td>
                </tr>
                <tr>
                    <th>mardi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>mercredi</th>
                    <td>9h à 15h</td>
                </tr>
                <tr>
                    <th>jeudi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>vendredi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>Samedi</th>
                    <td>9h à 12h</td>
                </tr>
                <tr>
                    <th>dimanche</th>
                    <th>fermé</th>
                </tr>
            </table>
        </li>
        <li>
            <h3><a href="#" title="Affiche tous les livres de cette bibliothèque">Bibliothèque locale - ville de
                    Liège</a></h3>
            <dl class="info_Bibli">
                <dt>Téléphone&nbsp;:</dt>
                <dd>087/88.87.47</dd>
                <dt>fax&nbsp;:</dt>
                <dd>089/78.57.47</dd>
                <dt>Adresse&nbsp;:</dt>
                <dd>Rue d'Amercoeur 24</dd>
                <dt>Lieu&nbsp;:</dt>
                <dd>4020 LIEGE</dd>
                <dt>Responsable&nbsp;:</dt>
                <dd>Monsieur Dulivre</dd>
            </dl>
            <table class="heures_ouvertures">
                <caption>Les heures d’ouverture</caption>
                <tr>
                    <th>lundi</th>
                    <td>8H à 12h</td>
                </tr>
                <tr>
                    <th>mardi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>mercredi</th>
                    <td>9h à 15h</td>
                </tr>
                <tr>
                    <th>jeudi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>vendredi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>Samedi</th>
                    <td>9h à 12h</td>
                </tr>
                <tr>
                    <th>dimanche</th>
                    <th>fermé</th>
                </tr>
            </table>
        </li>
        <li>
            <h3><a href="#" title="Affiche tous les livres de cette bibliothèque">Bibliothèque Centrale de la Province
                    de Liège</a></h3>
            <dl class="info_Bibli">
                <dt>Téléphone&nbsp;:</dt>
                <dd>087/88.87.47</dd>
                <dt>fax&nbsp;:</dt>
                <dd>089/78.57.47</dd>
                <dt>Adresse&nbsp;:</dt>
                <dd>Rue d'Amercoeur 24</dd>
                <dt>Lieu&nbsp;:</dt>
                <dd>4020 LIEGE</dd>
                <dt>Responsable&nbsp;:</dt>
                <dd>Monsieur Dulivre</dd>
            </dl>
            <table class="heures_ouvertures">
                <caption>Les heures d’ouverture</caption>
                <tr>
                    <th>lundi</th>
                    <td>8H à 12h</td>
                </tr>
                <tr>
                    <th>mardi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>mercredi</th>
                    <td>9h à 15h</td>
                </tr>
                <tr>
                    <th>jeudi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>vendredi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>Samedi</th>
                    <td>9h à 12h</td>
                </tr>
                <tr>
                    <th>dimanche</th>
                    <th>fermé</th>
                </tr>
            </table>
        </li>
        <li>
            <h3><a href="#" title="Affiche tous les livres de cette bibliothèque">Bibliothèque communale-filiale de
                    Fétinne</a></h3>
            <dl class="info_Bibli">
                <dt>Téléphone&nbsp;:</dt>
                <dd>087/88.87.47</dd>
                <dt>fax&nbsp;:</dt>
                <dd>089/78.57.47</dd>
                <dt>Adresse&nbsp;:</dt>
                <dd>Rue d'Amercoeur 24</dd>
                <dt>Lieu&nbsp;:</dt>
                <dd>4020 LIEGE</dd>
                <dt>Responsable&nbsp;:</dt>
                <dd>Monsieur Dulivre</dd>
            </dl>
            <table class="heures_ouvertures">
                <caption>Les heures d’ouverture</caption>
                <tr>
                    <th>lundi</th>
                    <td>8H à 12h</td>
                </tr>
                <tr>
                    <th>mardi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>mercredi</th>
                    <td>9h à 15h</td>
                </tr>
                <tr>
                    <th>jeudi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>vendredi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>Samedi</th>
                    <td>9h à 12h</td>
                </tr>
                <tr>
                    <th>dimanche</th>
                    <th>fermé</th>
                </tr>
            </table>
        </li>
        <li>
            <h3><a href="#" title="Affiche tous les livres de cette bibliothèque">Bibliothèque communale-filiale de
                    Droixhe-Bressoux</a></h3>
            <dl class="info_Bibli">
                <dt>Téléphone&nbsp;:</dt>
                <dd>087/88.87.47</dd>
                <dt>fax&nbsp;:</dt>
                <dd>089/78.57.47</dd>
                <dt>Adresse&nbsp;:</dt>
                <dd>Rue d'Amercoeur 24</dd>
                <dt>Lieu&nbsp;:</dt>
                <dd>4020 LIEGE</dd>
                <dt>Responsable&nbsp;:</dt>
                <dd>Monsieur Dulivre</dd>
            </dl>
            <table class="heures_ouvertures">
                <caption>Les heures d’ouverture</caption>
                <tr>
                    <th>lundi</th>
                    <td>8H à 12h</td>
                </tr>
                <tr>
                    <th>mardi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>mercredi</th>
                    <td>9h à 15h</td>
                </tr>
                <tr>
                    <th>jeudi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>vendredi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>Samedi</th>
                    <td>9h à 12h</td>
                </tr>
                <tr>
                    <th>dimanche</th>
                    <th>fermé</th>
                </tr>
            </table>
        </li>
        <li>
            <h3><a href="#" title="Affiche tous les livres de cette bibliothèque">Bibliothèque publique filiale
                    Saint-Remacle</a></h3>
            <dl class="info_Bibli">
                <dt>Téléphone&nbsp;:</dt>
                <dd>087/88.87.47</dd>
                <dt>fax&nbsp;:</dt>
                <dd>089/78.57.47</dd>
                <dt>Adresse&nbsp;:</dt>
                <dd>Rue d'Amercoeur 24</dd>
                <dt>Lieu&nbsp;:</dt>
                <dd>4020 LIEGE</dd>
                <dt>Responsable&nbsp;:</dt>
                <dd>Monsieur Dulivre</dd>
            </dl>
            <table class="heures_ouvertures">
                <caption>Les heures d’ouverture</caption>
                <tr>
                    <th>lundi</th>
                    <td>8H à 12h</td>
                </tr>
                <tr>
                    <th>mardi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>mercredi</th>
                    <td>9h à 15h</td>
                </tr>
                <tr>
                    <th>jeudi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>vendredi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>Samedi</th>
                    <td>9h à 12h</td>
                </tr>
                <tr>
                    <th>dimanche</th>
                    <th>fermé</th>
                </tr>
            </table>
        </li>
        <li>
            <h3><a href="#" title="Affiche tous les livres de cette bibliothèque">Bibliothèque communale-filiale
                    d’Outremeuse</a></h3>
            <dl class="info_Bibli">
                <dt>Téléphone&nbsp;:</dt>
                <dd>087/88.87.47</dd>
                <dt>fax&nbsp;:</dt>
                <dd>089/78.57.47</dd>
                <dt>Adresse&nbsp;:</dt>
                <dd>Rue d'Amercoeur 24</dd>
                <dt>Lieu&nbsp;:</dt>
                <dd>4020 LIEGE</dd>
                <dt>Responsable&nbsp;:</dt>
                <dd>Monsieur Dulivre</dd>
            </dl>
            <table class="heures_ouvertures">
                <caption>Les heures d’ouverture</caption>
                <tr>
                    <th>lundi</th>
                    <td>8H à 12h</td>
                </tr>
                <tr>
                    <th>mardi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>mercredi</th>
                    <td>9h à 15h</td>
                </tr>
                <tr>
                    <th>jeudi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>vendredi</th>
                    <td>9h à 17h</td>
                </tr>
                <tr>
                    <th>Samedi</th>
                    <td>9h à 12h</td>
                </tr>
                <tr>
                    <th>dimanche</th>
                    <th>fermé</th>
                </tr>
            </table>
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