
document.addEventListener("DOMContentLoaded",function(event){

document.getElementById("submit").addEventListener('click',function(event){
  
    event.preventDefault(); // annule le comportement par défaut du submit (qui recharge habituellement la page )
    ajax();
})

function ajax(){
if ( window.XMLHttpRequest ) r = new XMLHttpRequest() ; // pour la plupart des navigateurs
else r = new ActiveXObject ("Microsoft.XMLHTTP"); // pour IE

var p = document.getElementById("personne");
var personne = p.value;

var parameters = "personne="+personne ;
r.open("POST","ajax.php",true);
r.setRequestHeader("content-type","application/x-www-form-urlencoded");
r.send(parameters);

document.getElementById('resultat').innerHTML="<div class=\"divresul\">Employé "+personne+" ajouté!</div>";
document.getElementById('personne').value="";


}

});