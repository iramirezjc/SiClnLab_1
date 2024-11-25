// Estrutura basica para enviar datos mendiante jQuery PARA ESO UTILIZAMOS UN SNIPER. EL PRIMER PARAMETRO
// QUE RECIBE es el submit y el identificador de nuestro formulario en este caso
// es submit y formLg
jQuery(document).on('submit','#formLg',function(event){
            event.preventDefault();//con esta line evitamos el envio de los datos
            //para que utilicemos el metodo ajax para eviarlos datos
            jQuery.ajax({
                url:'main_app/login.php',
                type:'POST',//typo de envios de datos
                dataType:'json',//tipo de datos que deseamos recibir
                data:$(this).serialize(),//los datos que deseamos enviar a nuestro archivo php
                //
                beforeSend:function(){

                }
              })
              .done(function(respuesta){
                console.log(respuesta);
                //esta funcion nos dice si inicio con exito
              })
              .fail(function(resp){
                console.log(resp.responseText);
                //esta funcion nos dice si fracaso el inicio
              })
              .always(function(){
                console.log("complete");
            });
      });
