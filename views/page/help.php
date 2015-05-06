<main class="container">
    <?php Components\Session::flash(); ?>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <div class="clearBoth">
        <a class="btnVert float_left" href="<?php echo($html->createLink('page', 'user_createQuestion')) ?>">Poser une
            question</a>

        <h1 class="header-block-one">Comment ça marche&nbsp;?</h1>
    </div>
    <?php foreach ($data['data'] as $article): ?>
        <article class="question">
            <h2 class="article__title"><?php echo($article->question); ?></h2>
            <?php if ($article->answer === null): ?>
                <a href="<?php echo($html->createLink('page', 'user_createAnswer',
                    ['id' => $article->question_id])); ?>" class="btnVert">Répondre à cette question</a>
            <?php else: ?>
                <blockquote class="big__blockquote">
                    <p class="answer"><?php echo($article->answer); ?></p>
                    <footer>
                        <p class="big__blockquote__meta">Par
                            <cite><?php echo($article->role . '&nbsp: ' . $article->user_first_name . ' ' . $article->user_last_name); ?>
                                ,</cite>
                            <time>le <?php echo($html->dateToSTring($article->answers_update_at)) ?></time>
                        </p>
                    </footer>
                </blockquote>

            <?php endif ?>
        </article>
    <?php endforeach; ?>
</main>