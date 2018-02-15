$(document).ready(function(){

    $('#tirage').on('click',function(){
        tirageausort();
    });

    function tirageausort(){
    
        $.post('ajax.php','',function(retour){

            $('#resultat').html(retour.resultat);

        },'json');

    }


});