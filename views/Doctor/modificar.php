  <div class="modal fade secondary" id="modalmodificarPaciente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="">Modificar Datos del Paciente:</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form_modificarPaciente" action="" method="POST">
          <input type="hidden" name="action" value="update">
          <input type="hidden" name="id" value="" id="idu">
          <div class="modal-body">

          <div class="form-group">
              <label for="nombre">Nombre: </label>
              <input type="text" id="nombre" class="form-control" name="nombre" required="required" pattern="[A-Za-z ]+" placeholder="Ingrese su nombre">
            </div>
            <div class="form-group">
              <label for="apellidos">Apellidos: </label>
              <input type="text" id="apellidos" class="form-control" name="apellidos" required="required" pattern="[A-Za-z ]+" placeholder="Ingrese sus apellidos">
            </div>
            <div class="form-group">
              <label for="fecha_nacimiento">Fecha de Nacimiento: </label>
              <input type="text" id="fecha_nacimiento" class="form-control" name="fecha_nacimiento" required="required" placeholder="Ingrese su fecha de nacimiento">
            </div>
            <div class="form-group">
              <label for="genero">Género: </label>
              <input type="text" id="genero" class="form-control" name="genero" required="required" pattern="[A-Za-z ]+" placeholder="Ingrese su genero">
            </div>
            <div class="form-group">
              <label for="direccion">Dirección: </label>
              <input type="text" id="direccion" class="form-control" name="direccion" required="required" placeholder="Ingrese su direccion">
            </div>
            <div class="form-group">
              <label for="numero_telefono">Número de télefono: </label>
              <input type="int" id="numero_telefono" class="form-control" name="numero_telefono" required="required" placeholder="Ingrese su numero de teléfono">
            </div>
            <div class="form-group">
              <label for="correo_electronico">Correo Electrónico: </label>
              <input type="correo_electronico" class="form-control" id="correo_electronico_reg" name="correo_electronico" required="required" placeholder="Ingrese su correo electrónico">
            <div class="form-group">
              <label for="nombre_contacto_emergencia">Nombre del contacto de Emergencia: </label>
              <input type="text" id="nombre_contacto_emergencia" class="form-control" name="nombre_contacto_emergencia" required="required" pattern="[A-Za-z ]+" placeholder="Ingrese el nombre del contacto de emergencia">
            </div>
            <div class="form-group">
              <label for="telefono_contacto_emergencia">Número del contacto de Emergencia: </label>
              <input type="int" id="telefono_contacto_emergencia" class="form-control" name="telefono_contacto_emergencia" required="required" placeholder="Ingrese el numero del contacto de emergencia">
            </div>
            </div>
            <div class="form-group">

              <label for="exampleSelect2">Seleccione</label>

              <select class="form-select" name="perfil" id="exampleSelect2">

                <option value="1">Paciente</option>

                <?php if (isset($_SESSION['perfil']) && $_SESSION['perfil'] == 1) { ?>

                  <option value="1">Paciente</option>

                <?php } ?>

              </select>

            </div>

            <div id="mensajesokregistro" style="display:none">
              <div class="alert alert-dismissible alert-success">
                <button type="button" class="" id="btnmensaje" data-bs-dismiss="alert">X</button>
                <p id="txt_mensaje_registro"></p>
              </div>
            </div>
            <div id="mensajeserrorregistro" style="display:none">
              <div class="alert alert-dismissible alert-danger">
                <button type="button" class="" id="btnmensaje" data-bs-dismiss="alert">X</button>
                <p id="txt_mensaje_registro_error"></p>
              </div>
            </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <input type="submit" id="btn_regist" value="Registrar" class="btn btn-secondary">
          </div>
        </form>
      </div>
    </div>
  </div>