
<main>
  <h1>Créer un nouveau compte</h1>
  <h2>Faites partie de la communauté en quelques clics !</h2>
  <form class="form-create-user" action="<?php $html->createLink('user','create'); ?>" method="post">
    <p> Les champs précédés d’un <strong class="form-create-user__obligatoire">(*)</strong> sont obligatoires!</p>
    <fieldset>
      <legend>Qui êtes vous ?</legend>
      <label for="first_name">Votre prénom <strong class="form-create-user__obligatoire">*</strong></label>
      <input type="text" name="first_name" id="first_name" value="" placeholder="Jane" title="Introduisez votre prénom"/>
      <label for="last_name">Votre nom de famille <strong class="form-create-user__obligatoire">*</strong></label>
      <input type="text" name="last_name" id="last_name" value="" placeholder="Doe" title="Introduisez votre nom de famillie"/>

       <!-- <div class="form-create-user--error">
            <p>Votre champ nom, prenom doivent être remplis.</p>
        </div>-->
    </fieldset>
    <fieldset>
      <legend>Votre compte</legend>
      <label for="username">Votre nom d'utilisateur <strong class="form-create-user__obligatoire">*</strong></label>
      <input type="text" name="username" id="username" value="" title="Introduisez votre nom d’utilisateur" placeholder="Janette"/>
      <label for="email">Votre adresse mail <strong class="form-create-user__obligatoire">*</strong></label>
      <input type="email" name="email" id="email" value="" title="Introduisez votre adressse mail" placeholder="jane.doe@outlook.com"/>
        <span id="linkShowPassword" title="Afficher les mots de pass" class="smallInfo icon ouvrir">Montrer le mot de pass</span>
      <label for="password">Votre Mot de passes <strong class="form-create-user__obligatoire">*</strong></label>
      <input type="password" name="password" id="password" value="" title="Introduisez votre mot de pass" class="showedpassword"/>
       <!-- <div class="form-create-user--error">
            <p>Votre champ nom, prenom doivent être remplis.</p>

        </div>-->
    </fieldset>
    <fieldset>
      <legend>Sécurité</legend>
      <label for="question">Question de sécurité</label>
      <input type="text" name="question" id="question" value="" title="Introduisez une question de sécurité" placeholder="Quel est le nom de mon premier copain"/>
      <label for="reponse">réponse à cette question</label>
      <input type="text" name="reponse" id="reponse" value="" title="Introduisez une question de sécurité" placeholder="Mystère"/>
       <!-- <div class="form-create-user--error">
            <p>Votre champ nom, prenom doivent être remplis.</p>
        </div>-->
    </fieldset>
    <input type="submit" value="Soumettre l'inscription" class="btnVert"/>
  </form>
</main>