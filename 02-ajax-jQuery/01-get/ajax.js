$(document).ready(function(){

    $('#action').click(function(event){

        $.ajax(
            {
                url:"fichier.txt",
                dataType: "text",
                success: function(data){
                    $('#demo').html(data);
                }
            }
        );
    });
}); // fin du document ready