<main class="container">
    <?php Components\Session::flash();
    $reserve = $data['data']['data']; ?>
    <h1 class="header-block-one"><?php echo($data['title']); ?></h1>

    <?php
    isset($data['data']['sent']) ? $sent = $data['data']['sent'] : '';
    isset($data['data']['errors']) ? $error = $data['data']['errors'] : '';
    ?>
    <form class="form-create"
          action="<?php echo($html->createLink('book', 'user_UpdateReserve', ['id' => $reserve->reserved_id])); ?>"
          method="post">
        <p class="form-create__infos"> Les champs précédés d’un <strong
                class="form-create-user__obligatoire">(*)</strong> sont obligatoires!
        </p>
        <input name="reserved_id" type="hidden" value="<?php echo($reserve->reserved_id); ?>"/>
        <input name="book_id" type="hidden" value="<?php echo($reserve->book_id); ?>"/>
        <input name="user_id" type="hidden"
               value="<?php echo(isset($_SESSION['userId']) ? $_SESSION['userId'] : $_COOKIE['userId']); ?>"/>
        <label for="from">Date du début<strong
                class="form-create-user__obligatoire">*</strong></label>
        <input class="form-create__simple-imput <?php echo(isset($error['from']) ? 'error' : ''); ?>"
               type="text" name="from"
               id="from"
               value="<?php echo(isset($sent->from) ? $sent->from : $reserve->reserved_from); ?>"
               title="Introduisez votre nom d’utilisateur"
               placeholder="aaaa-mm-jj"/>

        <div class="form-create__example-box">
            <p class="form-create__example-box__text">Vous devez insérer la date de début de votre réservation. Commncer
                par l'anné, suivi du mois et du jour quelque chose comme ceci: aaaa-mm-jj</p>
        </div>
        <?php if (isset($error['from'])): ?>
            <p class="form-create__message--error"><?php echo($error['from']); ?><span class="flash-box__btn">X</span>
            </p>
        <?php endif; ?>
        <label for="to">Date de fin (aaaa-mm-jj)&nbsp;( max 1 mois)<strong class="form-create-user__obligatoire">*</strong></label>
        <input class="form-create__simple-imput <?php echo(isset($error['to']) ? 'error' : ''); ?>"
               type="text" name="to" id="to"
               value="<?php echo(isset($sent->to) ? $sent->to : $reserve->reserved_to); ?>"
               title="Introduisez votre adressse mail"
               placeholder="aaaa-mm-jj"/>

        <div class="form-create__example-box">
            <p class="form-create__example-box__text">Ici vou devez insérer la date de fin. Vous pouvez réserver le
                livre maximum pour un mois</p>
        </div>
        <?php if (isset($error['to'])): ?>
            <p class="form-create__message--error"><?php echo($error['to']); ?><span class="flash-box__btn">X</span></p>
        <?php endif; ?>
        <input type="submit" value="Réserver ce livre" class="btnVert"/>
    </form>
</main>