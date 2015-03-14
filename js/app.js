/****************************************************************************************************

 Name:                               app.js
 Purpose:                            montrer le mot de passe en clar dans le formulaire de connexion
 lib:

 MODULE HISTORY:
 Date:                      Author:              reason:

 4/03/2015                 Daniel               création
 ****************************************************************************************************/

var i, linkShowPassword = document.getElementById('linkShowPassword');
var showedpassword = document.getElementsByClassName('showedpassword');

linkShowPassword.addEventListener('click', function () {
    show(showedpassword, linkShowPassword);
}, false);
function show(elements, link) {
    for (i = 0; i < elements.length; i++) {
        elements[i].type == 'password' ? elements[i].type = 'text' : elements[i].type = 'password';
    }
    link.childNodes[0].nodeValue = (elements[0].type == 'password' ? 'Montrer ' : 'Cahcher ') + 'le mot de passe';
    link.className = (elements[0].type == 'password' ? 'ouvrir ' : 'fermer ') + 'icon smallInfo';

}

/*
 * donner une margin au body qui esr égale à la hauteur du footer, une alternative est prévu en css
 * */
document.getElementsByTagName('body')[0].style.marginBottom = (document.getElementsByTagName('footer')[0].offsetHeight * 1.6) + 'px';