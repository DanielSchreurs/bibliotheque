<main class="container">
    <?php Components\Session::flash(); ?>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <h1 class="hidden"><?php echo($data['title']); ?></h1>
    <?php $about = $data['data']; ?>
    <article class="about-bloc">
        <h2 class="big-logo">book<span class="big-logo__me">me</span></h2>

        <h3 class="big-slogant"><?php echo($about->slogan); ?></h3>

        <p class="about-bloc__paragraphe"><?php echo($about->about); ?></p>

        <p>Vous pouvre nous contacter par <a class="text_link" href="mailto:<?php echo($about->email); ?>">email</a> ou
            par téléphone au <?php echo($about->phone); ?></p>
    </article>
</main>