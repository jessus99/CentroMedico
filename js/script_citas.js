$(document).ready(function () {
	$("#form_registro_citas").submit(registrarCita);
});

function fn_cerrar() {
	$("#mensajes_error_citas").css("display", "none");
	$("#mensajes_ok_citas").css("display", "none");
}

function registrarCita(evento) {
	evento.preventDefault();
	alert("Registrando cita");
	var datos = new FormData($("#form_registro_citas")[0]);

	$.ajax({
		url: "controllers/citasController.php",
		type: "POST",
		data: datos,
		contentType: false,
		processData: false,
		success: function (response) {
			alert(response);
			if (response == true) {
				$("#mensajes_ok_citas").css("display", "block");
				$("#txt_mensaje_cita").text("Cita registrada con éxito");
				window.setTimeout(function () {
					window.location.href = "./?pagina=registrar_cita";
				}, 1000);
			} else {
				$("#mensajes_error_citas").css("display", "block");
				$("#txt_mensaje_cita_error").text(
					"Error al ingresar datos, verifique todos los espacios"
				);
			}
		},
	});
}
function fn_eliminar(data) {
	$.ajax({
		url: "controllers/citasController.php",
		type: "POST",
		datatype: "html",
		data: data,
		success: function (response) {
			alert(response);
			if (response == true) {
				$("#mensajes_ok_citas").css("display", "block");
				$("#txt_mensaje_cita").text("Cita registrada con éxito");
				window.setTimeout(function () {
					window.location.href = "./?pagina=registrar_cita";
				}, 1000);
			} else {
				$("#mensajes_error_citas").css("display", "block");
				$("#txt_mensaje_cita_error").text(
					"Error al ingresar datos, verifique todos los espacios"
				);
			}
		},
	});
}
