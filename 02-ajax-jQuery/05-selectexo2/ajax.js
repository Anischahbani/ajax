$(document).ready(function(){


    ajax();

    $("#personne").on("change",function(event){
     ajax();

    });

     function ajax(){

        
        var personne = $('#personne').find(":selected").val();
        
        
        //$.post("fichier destination","parametres",function("reponse"){}, "format")

        $.post("ajax.php","personne="+personne,function(donnees){

            if(donnees.validation == 'ok'){
                $('#resultat').html(donnees.resultat);
              
            }
            else{
                alert("probleme insertion");
            }
        },"json");
    
    }
}); // fin du document ready
