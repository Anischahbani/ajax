$(document).ready(function(){

    $('#submit').click(function(event){

        event.preventDefault();
        ajax();

     });

     function ajax(){

        personne = $('#personne').val();
        
        //$.post("fichier destination","parametres",function("reponse"){}, "format")

        $.post("ajax.php","personne="+personne,function(donnees){

            if(donnees.validation == 'ok'){
                $('#resultat').append("<div class=\"divresul\">Employé "+personne+" ajouté!</div>");
                $('#personne').val("");
            }
            else{
                alert("probleme insertion")
            }
        },"json");
    
    }
}); // fin du document ready