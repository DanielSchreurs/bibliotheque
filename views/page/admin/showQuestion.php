<?php
$article = $data['data'];
?>
<main class="single_book container">
    <?php Components\Session::flash(); ?>
    <?php include('./views/parts/main_nav_admin.php');
    ?>
    <div class="functions">
        <a class="delete-book_btn"
           href="<?php echo($html->createLink('page', 'admin_deleteQuestion', ['id' => $article->question_id])); ?>"
           title="Ajouter un livre">Supprimer la question et sa réponse</a>
        <a class="edit-book_btn"
           href="<?php echo($html->createLink('page', 'admin_editQuestion', ['id' => $article->question_id])); ?>"
           title="Ajouter un livre">Modifier la question et sa réponse</a>
        <a class="back-btn" href="<?php echo($html->createLink('page', 'admin_indexHelp')); ?>"
           title="Ajouter un livre">Retour à l'administartion</a>
    </div>
    <h1 class="header-block-one "><?php echo($data['title']); ?></h1>
    <article class="question">
        <h2 class="article__title"><?php echo($article->question); ?></h2>
        <?php if ($article->answer === null): ?>
            <a href="<?php echo($html->createLink('page', 'user_createAnswer', ['id' => $article->question_id])); ?>"
               class="btnVert">Répondre à cette question</a>
        <?php else: ?>
            <blockquote class="big__blockquote">
                <p class="answer"><?php echo($article->answer); ?></p>
                <footer>
                    <p class="big__blockquote__meta">Par
                        <cite><?php echo($article->role . '&nbsp: ' . $article->user_first_name . ' ' . $article->user_last_name); ?>
                            ,</cite>
                        <time><?php echo($html->dateToSTring($article->answers_update_at)) ?></time>
                    </p>
                </footer>

            </blockquote>

        <?php endif ?>
    </article>
</main>