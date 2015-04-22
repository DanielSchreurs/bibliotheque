<main class="container">
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <?php Components\Session::flash(); ?>
    <h1 class="header-block-one"><?php echo($data['title']); ?></h1>
    <?php
    isset($data['data']['errors']) ? $errors = $data['data']['errors'] : '';
    isset($data['data']['sent']) ? $sent = $data['data']['sent'] : '';
    $_GET = $_SERVER['REQUEST_METHOD'] == 'GET';
    ?>
    <form class="form-create form-create--large"
          action="<?php echo($html->createLink('page','user_createAnswer',['id'=>$data['data']['question']->question_id])); ?>" method="post" >
        <p class="form-create__infos"> Les champs précédés d’un <strong
                class="form-create--obligatoire">(*)</strong> sont obligatoires!</p>
        <input name="user_id" type="hidden" value="<?php echo(isset($_SESSION['userId'])? $_SESSION['userId']:$_COOKIE['userId']); ?>"/>
        <input name="create_at" type="hidden" value="<?php setlocale(LC_TIME, 'fra_fra'); echo strftime('%Y-%m-%d-%H-%M'); ?>"/>

        <label for="answer">Votre réponse&nbsp;:<strong
                class="form-create--obligatoire">*</strong></label>
       <textarea class="form-create__long-text" id="answer" name="answer" cols="30" rows="10">
           <?php echo(isset($errors['answer']) || $_GET ? '' : $sent->answer); ?>
       </textarea>
        <div class="form-create__example-box">
            <p class="form-create__example-box__text">Ici vous pouvez répondre à la question.
                <q cite="http://evene.lefigaro.fr/citations/mot.php?mot=politesse">
                    &ldquo;&nbsp;La politesse n'est en elle-même qu'une ingénieuse contrefaçon de la bonté.&nbsp;&rdquo;
                    <cite>Alexandre Vinet</cite>
                </q>
            </p>

        </div>
        <?php if (isset($errors['answer'])): ?>
            <p class="form-create__message--error"><?php echo($errors['answer']); ?><span class="flash-box__btn">X</span>
            </p>
        <?php endif; ?>
        <input type="submit" value="Envoyer la réponse" class="btnVert"/>
    </form>
</main>