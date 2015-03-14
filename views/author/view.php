<?php $author = $data['data']; //var_dump($author)?>

<main>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <article class="single_author">
        <h2>
            <a href="<?php echo($html->createLink('book', 'view', ['id' => $author->id])); ?>"
               title="Renvois vers une page avec uniquement le livre Anthologie de <?php echo($author->first_name . ' ' . $author->first_name); ?>"><?php echo($author->first_name . ' ' . $author->first_name); ?></a>
        </h2>
        <a class="float_left" href="<?php echo($html->createLink('book', 'view', ['id' => $author->id])); ?>"><img
                src="./img/authors_photos/<?php echo($author->photo); ?>.jpg"
                alt="photo de  <?php echo($author->first_name . ' ' . $author->first_name); ?>" width="180"
                height="270"></a>

        <p class=""><?php echo($author->bio_text); ?> </p>

    </article>
</main>

