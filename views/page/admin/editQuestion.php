<main class="container">
    <?php include('./views/parts/main_nav_bibli.php'); ?>
    <?php Components\Session::flash(); ?>
    <h1 class="header-block-one"><?php echo($data['title']); ?></h1>
    <?php
    isset($data['data']['errors']) ? $errors = $data['data']['errors'] : '';
    isset($data['data']['sent']) ? $sent = $data['data']['sent'] : '';
    $_GET = $_SERVER['REQUEST_METHOD'] == 'GET';
    $data = $data['data']['data'];
    ?>
    <form class="form-create form-create--large"
          action="<?php echo($html->createLink('page', 'admin_editQuestion',['id'=>$data->question_id])); ?>" method="post">
        <p class="form-create__infos">Les champs précédés d’un <strong
                class="form-create--obligatoire">(*)</strong> sont obligatoires!</p>
        <input name="user_id" type="hidden"
               value="<?php echo(isset($_SESSION['userId']) ? $_SESSION['userId'] : $_COOKIE['userId']); ?>"/>
        <input name="create_at" value="<?php echo(date("Y-m-d")); ?>" type="hidden"/>
        <input name="question_id" type="hidden" value="<?php echo($data->question_id); ?>"/>
        <label for="question">La question&nbsp;:<strong
                class="form-create--obligatoire">*</strong></label>
       <textarea class="form-create__long-text" id="question" name="question" cols="30" rows="10">
           <?php echo(isset($errors['question']) || $_GET ? $data->question : $sent->question); ?>
       </textarea>
        <div class="form-create__example-box">
            <p class="form-create__example-box__text">Ici vous pouvez modifier la question.</p>
        </div>
        <?php if (isset($errors['question'])): ?>
            <?php foreach ($errors['question'] as $error): ?>
                <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if ($data->answer !== null): ?>
            <label for="answer">La réponse&nbsp;:<strong
                    class="form-create--obligatoire">*</strong></label>
            <textarea class="form-create__long-text" id="answer" name="answer" cols="30" rows="10">
           <?php echo(isset($errors['answer']) || $_GET ? $data->answer : $sent->answer); ?>
       </textarea>
            <div class="form-create__example-box">
                <p class="form-create__example-box__text">Ici vous pouvez modifier la réponse.</p>
            </div>
            <?php if (isset($errors['answer'])): ?>
                <?php foreach ($errors['answer'] as $error): ?>
                    <p class="form-create__message--error"><?php echo($error); ?><span class="flash-box__btn">X</span></p>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>
        <input type="submit" value="Modifier" class="btnVert"/>
    </form>
</main>