<main class="container">
    <?php $editors=$data['data'];
     ?>
    <?php Components\Session::flash(); ?>
    <div class="functions">
        <a class="create-book_btn float_left" href="<?php echo($html->createLink('editor', 'admin_create_editor')); ?>"
           title="Ajouter un livre">Ajouter un éditeur</a>

        <h1 class="header-block-one"><?php echo($data['title']); ?></h1>
    </div>
    <?php include(VIEW_DIR . '/parts/main_nav_admin.php'); ?>
    <table class="table-book">
        <thead class="table-book__header">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Site web</th>
            <th>&agrave; propos</th>
            <th>Supprimer</th>
            <th>Modifier</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($editors as $editor): ?>
            <tr>
                <td><?php echo($editor->id); ?></td>
                <td><?php echo($editor->editor_name); ?></td>
                <td><a class="btnVert" href="<?php echo($editor->website); ?>">Page de l'éditeur</a></td>
                <td><?php echo($html->cutText($editor->bio_text,100)); ?></td>
                <td><a href="<?php echo($html->createLink('editor', 'admin_show_editor', ['id' => $editor->id])); ?>"
                       class="svg-btn--absolute" title="Supprimer ce livre">
                        <!-- Generator: Adobe Illustrator 18.0.0, SVG Export Plug-In  -->
                        <svg version="1.1"
                             x="0px" y="0px" width="50px" height="50px" viewBox="0 0 141.7 135.3"
                             enable-background="new 0 0 141.7 135.3"
                             xml:space="preserve">
<defs>
</defs>
                            <path fill="#C0392B" d="M135.3,0H6.4C2.6,0,0,2.6,0,6.4v12.9c0,3.9,2.6,6.4,6.4,6.4h1.3l14.8,88.9c2.6,12.9,11,20.6,21.9,20.6h52.2
	c11,0,20-8.4,21.9-21.3L134,25.8h1.3c3.9,0,6.4-2.6,6.4-6.4V6.4C141.7,2.6,139.2,0,135.3,0z M103.7,29l-3.2-3.2h5.8L103.7,29z
	 M61.2,122.4l-3.2-3.9l12.9-12.9l12.9,12.9l-3.9,3.9H61.2z M34.8,25.8h5.8L37.4,29L34.8,25.8z M99.2,33.5l-11,11L75.4,31.6l5.8-5.8
	h11L99.2,33.5z M49.6,25.8h11l5.8,5.8L53.5,44.5l-11-11L49.6,25.8z M70.9,27.1l-1.3-1.3h2.6L70.9,27.1z M70.9,36.1L83.7,49
	L70.9,61.8L58,49L70.9,36.1z M65.7,66.4L52.8,79.2L39.9,66.4l12.9-12.9L65.7,66.4z M70.9,70.9l12.9,12.9L70.9,96.6L58,83.7
	L70.9,70.9z M75.4,66.4l12.9-12.9l12.9,12.9L88.3,79.2L75.4,66.4z M48.3,49L35.4,61.8L25.1,51.5v-1.3L37.4,38L48.3,49z M27.1,62.5
	l3.9,3.9l-3.2,3.2L27.1,62.5z M32.2,93.4l-2.6-16.1l6.4-6.4L49,83.7L36.1,96.6L32.2,93.4z M52.8,88.3l12.9,12.9L52.8,114l-12.9-12.9
	L52.8,88.3z M75.4,101.1l12.9-12.9l12.9,12.9L88.3,114L75.4,101.1z M92.8,83.7l12.9-12.9l6.4,6.4l-2.6,15.5l-3.9,3.9L92.8,83.7z
	 M110.2,66.4l4.5-4.5l-1.3,8.4L110.2,66.4z M105.7,61.8L92.8,49l11-11l12.9,12.9L105.7,61.8z M25.1,25.8l7.7,7.7l-9,9l-3.2-16.7
	H25.1z M35.4,112.1l-0.6-5.2l1.3-1.3L49,118.5l-3.9,3.9l0,0C38,122.4,36.1,114,35.4,112.1z M106.3,112.1c0,1.9-2.6,10.3-9.7,10.3H96
	l-3.9-3.9l12.9-12.9l1.9,1.9L106.3,112.1z M117.9,43.2l-9.7-9.7l7.7-7.7h5.2L117.9,43.2z"/>
</svg>

                    </a></td>
                <td><a href="<?php echo($html->createLink('editor', 'admin_edit_editor', ['id' => $editor->id])); ?>"
                       class="svg-btn--absolute" title="Editer ce livre">
                        <!-- Generator: Adobe Illustrator 18.0.0, SVG Export Plug-In  -->
                        <svg version="1.1"
                             x="0px" y="0px" width="50px" height="50px" viewBox="0 0 141.7 135.3"
                             enable-background="new 0 0 141.7 135.3"
                             xml:space="preserve">
<defs>
</defs>
                            <path fill="#2980B9" d="M135.6,54.8l-7.9,7.8l-21.9-21.9l7.9-7.9c2.4-2.4,6.2-2.8,8.3-0.6l14.3,14.4C138.3,48.5,138,52.2,135.6,54.8
	z M102,44.3l22.1,22.1l-52.5,52.5c-0.2,0.2-1,1-1.8,1.1c-0.2,0-0.2,0.2-0.3,0.2L42,128.9c-0.8,0.3-1.5,0.2-2.1-0.5
	c-0.5-0.5-0.6-1.3-0.5-2.1l8.8-27.4c0-0.2,0-0.2,0.2-0.3c0.2-1,1-1.6,1.1-1.8l9.9-9.9H26.1c-1.3,0-2.4-1.1-2.4-2.4
	c0-1.3,1.1-2.4,2.4-2.4h38.1L102,44.3z M64.7,117.1l-13.6-13.6l-3.6,11.4l5.8,5.8L64.7,117.1z M101.2,53c-0.8-0.8-2.1-0.8-2.8,0
	l-41,40.9c-0.8,0.8-0.8,2.1,0,2.8c0.8,0.8,2.1,0.8,2.8,0l41-40.7C101.8,55.1,101.8,53.8,101.2,53z M98.6,130.9
	c0,1.5-1.1,2.6-2.6,2.6H47.7l-4.4,1.5c-0.8,0.3-1.8,0.5-2.8,0.5c-1.9,0-3.7-0.6-5.2-1.8H10.5c-1.5,0-2.6-1.1-2.6-2.6V19.5
	c0-1.5,1.1-2.6,2.6-2.6h9.9v4.2c0,1.5,1.1,2.6,2.6,2.6s2.6-1.1,2.6-2.6v-4.2h15.2v4.2c0,1.5,1.1,2.6,2.6,2.6s2.6-1.1,2.6-2.6v-4.2
	h13.3v4.2c0,1.5,1.1,2.6,2.6,2.6c1.5,0,2.6-1.1,2.6-2.6v-4.2h14.6v4.2c0,1.5,1.1,2.6,2.6,2.6c1.5,0,2.6-1.1,2.6-2.6v-4.2h11.4
	c1.5,0,2.6,1.1,2.6,2.6v18.3L101,35l5.2-5.2V19.5c0-5.8-4.7-10.5-10.5-10.5H84.3V2.6c0-1.5-1.1-2.6-2.6-2.6s-2.6,1.1-2.6,2.6v6.5
	H64.5V2.6c0-1.5-1.1-2.6-2.6-2.6c-1.5,0-2.4,1-2.4,2.6v6.5H46.2V2.6c0-1.5-1.1-2.6-2.6-2.6S41,1,41,2.6v6.5H25.8V2.6
	c0-1.5-1.1-2.6-2.6-2.6s-2.8,1-2.8,2.6v6.5h-9.9C4.7,9.1,0,13.8,0,19.6V131c0,5.8,4.7,10.5,10.5,10.5H96c5.8,0,10.5-4.7,10.5-10.5
	V92.3l-7.9,7.9V130.9L98.6,130.9z M78,40.7H26.1c-1.3,0-2.4,1.1-2.4,2.4s1.1,2.4,2.4,2.4H78c1.3,0,2.4-1.1,2.4-2.4
	S79.3,40.7,78,40.7z M78,60.3H26.1c-1.3,0-2.4,1.1-2.4,2.4s1.1,2.4,2.4,2.4H78c1.3,0,2.4-1.1,2.4-2.4S79.3,60.3,78,60.3z"/>
</svg>

                    </a></td>

            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot class="table-book__header">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Site web</th>
            <th>&agrave; propos</th>
            <th>Supprimer</th>
            <th>Modifier</th>
        </tr>
        </tfoot>
    </table>
</main>