$(document).ready(function(){

$('#form_registro_mensajes').submit(registrarCita);
 

});

  
function fn_cerrar(){
    
//   $('#mensajes_error_citas').css("display","none");
//   $('#mensajes_ok_citas').css("display","none");
}

function registrarCita(evento) {
        evento.preventDefault();
    
        var datos = new FormData($('#form_registro_mensajes')[0]);
      
        $.ajax({
            url: "controllers/mensajesController.php",
            type: "POST",
            data: datos,
            contentType: false,
            processData: false,
            success: function (response) {
             alert(response);
                if (response==true) {
                     alert("Mensaje enviado con exito");
//                    $('#mensajes_ok_citas').css("display","block");
//                    $('#txt_mensaje_cita').text("Cita registrada con éxito");
                  window.setTimeout(function () {
                      
                            window.location.href = "./?pagina=mensajes"
                        }, 1000);
                } else {
                    alert("Ha ocurrido un error");
//                    $('#mensajes_error_citas').css("display","block");
//                    $('#txt_mensaje_cita_error').text("Error al ingresar datos, verifique todos los espacios");
                }
            }



        });
    }
function fn_ver(data){
    var param={
        "id":data,
        "action":"listar"
    }
    $.ajax({
            url: "controllers/mensajesController.php",
            type: "POST",
            datatype: "html",
            data: param,
            success: function (response) {
             
                var conversacion=document.getElementById('conversacion');
                
                conversacion.innerHTML=response;
            }



        });
}
function cerrar_conver(){
    
    var conversacion=document.getElementById('conversacion');
                
                conversacion.innerHTML=" ";
}
