<main>
    <?php Components\Flash::flash(); ?>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <h2>Comment ça marche&nbsp;?</h2>
    <?php foreach ($data['data'] as $article): ?>
        <article class="question">
            <h3 class="article__title"><?php echo($article->question); ?></h3>
            <blockquote class="big__blockquote">
                <p class="answer"><?php echo($article->answer); ?></p>
            </blockquote>
        </article>
    <?php endforeach; ?>
</main>