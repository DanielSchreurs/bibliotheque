<main class="container">
    <?php Components\Session::flash(); ?>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <h1 class="header-block-one">Comment ça marche&nbsp;?</h1>
    <?php foreach ($data['data'] as $article): ?>
        <article class="question">
            <h2 class="article__title"><?php echo($article->question); ?></h2>
            <blockquote class="big__blockquote">
                <p class="answer"><?php echo($article->answer); ?></p>
            </blockquote>
        </article>
    <?php endforeach; ?>
</main>