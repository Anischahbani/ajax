$(document).ready(function(){

setInterval(ajax,2000);



function ajax(){

    $.post("ajax.php","",function(donnees){

        if(donnees.validation == 'ok'){
            $('#resultat').html(donnees.resultat);
          
        }
        else{
            alert("probleme affichage employés");
        }
    },"json");


};
}); 