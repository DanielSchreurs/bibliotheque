<main>
  <h2>Faites partie de la communauté en quelques clics !</h2>
  <form class="ceateUser" action="<?php $html->createLink('user','create'); ?>" method="post">
    <p> Les champs précédés d’un <strong>(*)</strong> sont obligatoires!</p>
    <fieldset>
      <legend>Qui êtes vous ?</legend>
      <label for="first_name">Votre prénom</label>
      <input type="text" name="first_name" id="first_name" value="" placeholder="Jane" title="Introduisez votre prénom"/>
      <label for="last_name">Votre nom de famille</label>
      <input type="text" name="last_name" id="last_name" value="" placeholder="Doe" title="Introduisez votre nom de famillie"/>
    </fieldset>
    <fieldset>
      <legend>Votre compte</legend>
      <label for="username">Votre nom d'utilisateur</label>
      <input type="text" name="username" id="username" value="" title="Introduisez votre nom d’utilisateur" placeholder="Janette"/>
      <label for="email">Votre adresse mail</label>
      <input type="email" name="email" id="email" value="" title="Introduisez votre adressse mail" placeholder="jane.doe@outlook.com"/><a id="linkShowPassword" href="#" title="Afficher les mots de pass" class="smallInfo icon ouvrir">Montrer les mots de pass</a>
      <label for="password">Votre Mot de passes</label>
      <input type="password" name="password" id="password" value="" title="Introduisez votre mot de pass" class="showedpassword"/>
      <label for="password1">Votre Mot de passes</label>
      <input type="password" name="password1" id="password1" value="" title="Introduisez une seconde fois votre mot de passe" class="showedpassword"/>
    </fieldset>
    <fieldset>
      <legend>Sécurité</legend>
      <label for="question">Question de sécurité</label>
      <input type="text" name="question" id="question" value="" title="Introduisez une question de sécurité" placeholder="Quel est le nom de mon premier copain"/>
      <label for="reponse">réponse à cette question</label>
      <input type="text" name="reponse" id="reponse" value="" title="Introduisez une question de sécurité" placeholder="Mystère"/>
    </fieldset>
    <input type="submit" value="Soumettre l'inscription" class="btnVert"/>
  </form>
</main>