/****************************************************************************************************

 Name:                               app.js
 Purpose:                            montrer le mot de passe en clar dans le formulaire de connexion
 lib:

 MODULE HISTORY:
 Date:                      Author:              reason:

 4/03/2015                 Daniel               création
 ****************************************************************************************************/

var i, c, linkShowPassword = document.getElementById('linkShowPassword');
var showedpassword = document.getElementsByClassName('showedpassword');
var flash = document.getElementsByClassName('flash-box__btn');
var showFromElement = document.getElementById('showFrom');

if (linkShowPassword != null) {
    linkShowPassword.addEventListener('click', function () {
        show(showedpassword, linkShowPassword);
    }, false);
}
if (flash != null) {
    for (i = 0, c = flash.length; i < c; i++) {
        flash[i].addEventListener('click', removeParent, false);
    }
}
function show(elements, link) {
    for (i = 0; i < elements.length; i++) {
        elements[i].type == 'password' ? elements[i].type = 'text' : elements[i].type = 'password';
    }
    link.childNodes[0].nodeValue = (elements[0].type == 'password' ? 'Montrer ' : 'Cacher ') + 'le mot de passe';
    link.className = (elements[0].type == 'password' ? 'ouvrir ' : 'fermer ') + 'icon smallInfo';

}
function removeParent() {
    event.target.parentElement.remove();
}
function op(evt) {
    var scroll = window.pageYOffset;
    var element = document.querySelector("header");
    element.className = scroll > 100 ? "header-main scroll" : "header-main";
}

function addClass(newClass) {
    var oldClass = event.target.className;
    event.target.className = oldClass != 0 ? oldClass + " " + newClass : newClass;
}
function removeClass(newClass) {
    var oldClass = event.target.className;
    event.target.className = (~oldClass.indexOf(newClass)) ? oldClass.substring(0, oldClass.indexOf(newClass)) : oldClass;

}
if (showFromElement) {
    showFromElement.addEventListener("click", function () {
        if (~showFromElement.className.indexOf("hover")) {
            removeClass("hover");
        }
        else {
            addClass("hover");
            // window.addEventListener("click",function(){ alert("ok")},false);

        }
    }, false);
}

document.getElementsByTagName('body')[0].style.marginBottom = (document.getElementsByClassName('main-footer')[0].offsetHeight * 1.6) + 'px';
window.addEventListener("scroll", op, false);

