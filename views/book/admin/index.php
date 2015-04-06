<main class="container">
    <?php Components\Session::flash(); ?>
<h1 class="header-block-one"><?php echo($data['title']); ?></h1>
<?php include( VIEW_DIR.'/parts/main_nav_admin.php'); ?>
    <table>
        <tr>
            <th>Numéros</th>
            <th>Titres</th>
            <th>Auteurs</th>
            <th>&Eacute;diteurs</th>
            <th>Genres</th>
            <th>Années</th>
            <th>Descriptions</th>
            <th>Supprimer</th>
            <th>Modifier</th>
        </tr>
        <tr>
            <td>0.</td>
            <td>Titre du livres</td>
            <td>Vincent Hein</td>
            <td>editeurs</td>
            <td>roman</td>
            <td>2013</td>
            <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus illum consectetur, in aliquid
                minima doloribus! Vitae.
            </td>
            <td><a href="formulaireModifications.php" class="supp">Supprimer</a></td>
            <td><a href="formulaireModifications.php" class="edit">Modifier</a></td>
        </tr>
        <tr>
            <td>1.</td>
            <td>Titre du livres</td>
            <td>Joël Egloff</td>
            <td>editeurs</td>
            <td>roman</td>
            <td>2013</td>
            <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus illum consectetur, in aliquid
                minima doloribus! Vitae.
            </td>
            <td><a href="formulaireModifications.php" class="supp">Supprimer</a></td>
            <td><a href="formulaireModifications.php" class="edit">Modifier</a></td>
        </tr>
    </table>
</main>