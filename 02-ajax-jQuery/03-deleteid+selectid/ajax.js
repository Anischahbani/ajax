$(document).ready(function(){

    $('#submit').click(function(event){

        event.preventDefault();
        ajax();

     });

     function ajax(){

        var id = $('#personne').find(":selected").val();
        
        
        //$.post("fichier destination","parametres",function("reponse"){}, "format")

        $.post("ajax.php","id="+id,function(donnees){

            if(donnees.validation == 'ok'){
                $('#employes').html(donnees.resultat);
              
            }
            else{
                alert("probleme insertion");
            }
        },"json");
    
    }
}); // fin du document ready