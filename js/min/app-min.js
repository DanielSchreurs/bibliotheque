function show(e, s) {
    for (i = 0; i < e.length; i++)e[i].type = "password" == e[i].type ? "text" : "password";
    s.childNodes[0].nodeValue = ("password" == e[0].type ? "Montrer " : "Cacher ") + "le mot de passe", s.className = ("password" == e[0].type ? "ouvrir " : "fermer ") + "icon smallInfo"
}
var i, linkShowPassword = document.getElementById("linkShowPassword"), showedpassword = document.getElementsByClassName("showedpassword");
linkShowPassword.addEventListener("click", function () {
    show(showedpassword, linkShowPassword)
}, !1), document.getElementsByTagName("body")[0].style.marginBottom = 1.6 * document.getElementsByTagName("footer")[0].offsetHeight + "px";