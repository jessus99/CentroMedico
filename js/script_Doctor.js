$(document).ready(function(){

$('#form_registro').submit(registrar);
$('#form_modificar').submit(modificar);


});
function fn_eliminar_usuariopaciente(data){
    
  
    var param={
        "id":data,
        "action":"delete"
    }
    $.ajax({
            url: "controllers/pacienteController.php",
            type: "POST",
            datatype: "html",
            data: param,
            success: function (response) {
            
             if(response==true  ){
                var msj=document.getElementById('msj');
                msj.style.color="green";
                msj.innerHTML="Usuario eliminado con éxito";
                window.setTimeout(function () {
                      
                            window.location.href = "."
                        }, 1000);
                    } else {
                        msj.style.color="red";
                msj.innerHTML="Error eliminando usuario, intente nuevamente";
                    }
            }



        });
}











function fn_eliminar_usuario(data){
    
  
    var param={
        "id":data,
        "action":"delete"
    }
    $.ajax({
            url: "controllers/userController.php",
            type: "POST",
            datatype: "html",
            data: param,
            success: function (response) {
            
             if(response==true  ){
                var msj=$( "#msj");           
                msj.style.color="green";
                msj.innerHTML="Usuario eliminado con éxito";
                window.setTimeout(function () {
                      
                            window.location.href = "."
                        }, 1000);
                    } else {
                        msj.style.color="red";
                msj.innerHTML="Error eliminando usuario, intente nuevamente";
                    }
            }



        });
}

function registrar(evento) {
        evento.preventDefault();
     
        var datos = new FormData($('#form_registro')[0]);
        
      
        $.ajax({
            url: "controllers/pacienteController.php",
            type: "POST",
            data: datos,
            contentType: false,
            processData: false,
            success: function (response) {
             
                if (response==true) {
                    $('#mensajesokregistro').css("display","block");
                    $('#txt_mensaje_registro').text("Datos registrados con éxito");
                  window.setTimeout(function () {
                      
                            window.location.href = "./"
                        }, 2000);
                } else {
                    $('#mensajeserrorregistro').css("display","block");
                    $('#txt_mensaje_registro_error').text("Error al ingresar datos, verifique todos los espacios");
                }
            }



        });
    }
    function modificar(evento) {
        evento.preventDefault();
     
        var datos = new FormData($('#form_modificar')[0]);
      
        $.ajax({
            url: "controllers/pacienteController.php",
            type: "POST",
            data: datos,
            contentType: false,
            processData: false,
            success: function (response) {
             
                if (response==true) {
                    msj.style.color="green";
                msj.innerHTML="Usuario modificado con éxito";
                    $('#modalmodificar').modal('hide');
                    
                      
                  window.setTimeout(function () {
                      
                            window.location.href = "./"
                        }, 2000);
                } else {
                      msj.style.color="red";
                msj.innerHTML="Error al modificar usuario";
                }
            }



        });
    }
    
    
  function fn_ver(data){
  

    console.log(data)
    var valornombre = document.getElementById("vernombre")
    var valorapellido = document.getElementById("verapellidos")
    var valorfechanacimiento = document.getElementById("verfecha_nacimiento")
    var valorgenero = document.getElementById("vergenero")
    var valordireccion = document.getElementById("verdireccion")
    var valornumerotelefono = document.getElementById("vernumero_telefono")
    var valorcorreo = document.getElementById("vercorreo_electronico_reg")
    var valornombreEmergencia = document.getElementById("vernombre_contacto_emergencia")
    var valornumeroEmergencia = document.getElementById("vertelefono_contacto_emergencia")

    valornombre.value= data.nombre
    valorapellido.value= data.apellidos
    valorfechanacimiento.value= data.fecha_nacimiento
    valorgenero.value= data.genero
    valordireccion.value= data.direccion
    valornumerotelefono.value= data.numero_telefono
    valorcorreo.value= data.correo_electronico
    valornombreEmergencia.value= data.nombre_contacto_emergencia
    valornumeroEmergencia.value= data.telefono_contacto_emergencia




    console.log(nombre)
  }