$(document).ready(function(){

$('#form_registro').submit(registrar);
$('#form_modificarPaciente').submit(modificarPaciente);


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
    function modificarPaciente(evento) {
        evento.preventDefault();
     
        var datos = new FormData($('#form_modificarPaciente')[0]);
      
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

  function fn_medicamentos(data){
  


    var valorId_medicamento = document.getElementById("verId_medicamento")
    var valornombre_medicamento = document.getElementById("vernombre_medicamento")
    var valordosis_medicamento = document.getElementById("verdosis_medicamento")
    var valorfrecuencia_administración = document.getElementById("frecuencia_administración")
    var valorduracion_tratamiento = document.getElementById("duracion_tratamiento")


    valorId_medicamento.value= data.Id_medicamento
    valornombre_medicamento.value= data.nombre_medicamento
    valordosis_medicamento.value= data.dosis_medicamento
    valorfrecuencia_administración.value= data.frecuencia_administración
    valorduracion_tratamiento.value= data.duracion_tratamiento

  }
  function fn_mensajes(){
    let div=document.getElementById('loads');
    div.style.color="white";
    let data={
    "hidden":"item"
    }
   
    $.ajax({
            url: "controllers/accesos.php?pagina=cargas",
            type: "POST",
            datatype: "html",
            data: data,
                        success: function (response) {
             
              
                if (response) {
                   div.innerHTML=response;
                } else {
                   
                }
            }



        });
}
function fn_cargardoctor(datos){
  
    $("#nombre_titledoctor").text(datos['name']);
    $("#id_titledoctor").text(datos['id']);
    $("#card_principalDoctor").css("height","auto");
    
  }
function fn_mensajesDoctor(){
    let div=document.getElementById('loadss');
    div.style.color="white";
    let data={
    "hidden":"item"
    }
   
    $.ajax({
            url: "controllers/accesos.php?pagina=cargas",
            type: "POST",
            datatype: "html",
            data: data,
                        success: function (response) {
             
              
                if (response) {
                   div.innerHTML=response;
                } else {
                   
                }
            }



        });
}
function fn_cerrar_box(){
    let element =document.getElementById('box_mensajesDoctor');
    let elemento =document.getElementById('content');
    elemento.remove();
    element.remove();
}
function fn_cerrar_mensaje(){
    let element =document.getElementById('box_mensajesDoctor');
    let elemento =document.getElementById('content');
    elemento.remove();
    element.remove();
}
