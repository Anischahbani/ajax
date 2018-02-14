$(document).ready(function(){

setInterval(ajax,2000);

$('#submit').click(function(event){

    event.preventDefault();
    ajaxEnvoiForm();

 });


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

function ajaxEnvoiForm(){

            var personne = $('#personne').val();
            //$.post("fichier destination","parametres",function("reponse"){}, "format")

            $.post("ajax.php","personne="+personne+"&mode=envoi",function(donnees){

                if(donnees.validation == 'ok'){
                    ajax();
                    $('#personne').val("");
                }
            },"json");
}

}); 