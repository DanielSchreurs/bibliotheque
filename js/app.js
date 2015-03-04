/****************************************************************************************************

 Name:                               app.js
 Purpose:                            montrer le mot de passe en clar dans le formulaire de connexion
 lib:

 MODULE HISTORY:
 Date:                      Author:              reason:

 4/03/2015                 Daniel               création
 ****************************************************************************************************/

var inputpassword = document.getElementById('password');
document.getElementById('showPassword').addEventListener('click', function () {
    show(inputpassword);
}, false);
function show(element) {
    event.target.childNodes[0].nodeValue = (element.type == 'password' ? 'Cahcher ' : 'Montrer ') + 'le mot de passe';
    element.type == 'password' ? element.type = 'text' : element.type = 'password';
}