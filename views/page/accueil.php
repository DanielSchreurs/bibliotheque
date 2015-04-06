<main class="home">
    <h1 class="hidden"><i>Bookme,</i> la plus grande commauté de livres</h1>
    <asside class="welcome-bloc">
        <h2 class="bounceOutRight"><a href="<?php echo($html->createLink('user', 'create')); ?>"
                                      class="welcome-bloc__header">Rejoins, la plus grande communauté de
                livres&nbsp;!</a></h2>

        <p class="welcome-bloc__sub-heading">Ici tu peux échanger, partager et emprunter tous les livres que tu
            aimes.</p>
        <a class="welcome-bloc__link" href="<?php echo($html->createLink('user', 'create')); ?>">Je veux m’inscrire&nbsp;!</a>
    </asside>
    <?php Components\Session::flash(); ?>
    <?php include('./views/parts/form_recherche.php'); ?>
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <?php var_dump($data); die('ohh'); ?>
    <section class="container clearBoth">
        <h2 class="header-block-one">Les livres du mois</h2>
        <article class="book-presentation">
            <a href="#"><img class="book-presentation__picture" width="270" height="200" src="./img/books_covers/presentation/andre_breton_anthologie_de_lhumour_noir.jpg"
                             alt="andre_breton_anthologie_de_lhumour_noir"/></a>
            <!--<a class="book-presentation__inline-link" href="">Réserver</a>-->

            <h3><a class="book-presentation__header" href="#">Anthologie de la mort</a></h3>

            <p class="book-presentation__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aperiam delectus dicta distinctio earum
                enim, esse est.</p>
            <a class="book-presentation__btn-link" href="">Voir la fiche du livre</a>
        </article><article class="book-presentation">
            <a href="#"><img class="book-presentation__picture" width="270" height="200" src="./img/books_covers/presentation/andre_breton_anthologie_de_lhumour_noir.jpg"
                             alt="andre_breton_anthologie_de_lhumour_noir"/></a>
            <!--<a class="book-presentation__inline-link" href="">Réserver</a>-->

            <h3><a class="book-presentation__header" href="#">Anthologie de la mort</a></h3>

            <p class="book-presentation__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aperiam delectus dicta distinctio earum
                enim, esse est.</p>
            <a class="book-presentation__btn-link" href="">Voir la fiche du livre</a>
        </article><article class="book-presentation">
            <a href="#"><img class="book-presentation__picture" width="270" height="200" src="./img/books_covers/presentation/andre_breton_anthologie_de_lhumour_noir.jpg"
                             alt="andre_breton_anthologie_de_lhumour_noir"/></a>
            <!--<a class="book-presentation__inline-link" href="">Réserver</a>-->

            <h3><a class="book-presentation__header" href="#">Anthologie de la mort</a></h3>

            <p class="book-presentation__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aperiam delectus dicta distinctio earum
                enim, esse est.</p>
            <a class="book-presentation__btn-link" href="">Voir la fiche du livre</a>
        </article>
    </section>
   <article class="single-author container clearBoth">
       <h2 class="header-block-one"><a href="#">Auteur du mois</a></h2>
       <figure class="single-author__figure">
       <a class="single-author__figure__picture" href="#"><img src="./img/authors_photo/andre_breton_big.jpg" alt=""/></a>
       <figcatiion>
          <h3 class="single-author__figure__header"><a href="#">André Breton</a></h3>
       </figcatiion>
       </figure>
       <p class="single-author__text">
           Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad at consectetur cumque deserunt doloribus dolorum eius eos, ex incidunt, ipsam iste non odit, placeat provident quam quidem sint veniam voluptates!
           Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur enim et, eum hic id ipsum itaque libero nemo, obcaecati odio recusandae tenetur? Consequatur eaque numquam quidem, rem sit sunt!
           Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab at culpa doloremque ducimus facere harum iusto modi molestiae obcaecati quia quos reprehenderit, tempore voluptates! Dicta dignissimos laudantium quasi veniam veritatis?
       </p>
       <a class="btnVert" href="/bibliotheque/index.php?m=author&amp;a=view&amp;id=1">Voir la
           fiche de l'auteur</a>
   </article>
</main>