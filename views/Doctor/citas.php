<?php
?>
<div class="card bg-light mb-3 mx-auto" style="width:50%">
        <div class="card-header">Registrar Cita</div>
        <div class="card-body">
                <form id="form_registro_citas" action="" method="POST">
                        <input type="hidden" name="action" value="insertar">
                        <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
                        <div class="modal-body">

                        <div class="form-group">
                                     <label for="nombre_cita">Nombre Cita: </label>
                                        <input type="text" id="nombre_cita" class="form-control" name="nombre_cita" required="required" pattern="[A-Za-z ]+"  placeholder="Nombre de la cita">
                                </div>
                                <div class="form-group">
                                     <label for="nombre_doctor">Nombre Doctor: </label>
                                        <input type="text" id="nombre_doctor" class="form-control" name="nombre_doctor" required="required" pattern="[A-Za-z ]+"  placeholder="Nombre del Doctor">
                                </div>
             
                                <div class="form-group">
                                        <label for="horario">Horario:</label>
                                                <input type="text" class="form-control" id="horario" name="horario" required="required" placeholder="Horario de estudio">
                                
                                </div>

                                <div class="form-group">
                                        <label for="tipo">Tipo:</label>
                                                <input type="text" class="form-control" id="tipo" name="tipo" required="required" placeholder="Tipo de jornada">
                                
                                </div>

                        


                                <div id="mensajes_ok_comidas" style="display:none">
                                        <div class="alert alert-dismissible alert-success">
                                                <button type="button" class="" id="msj_cerrar" data-bs-dismiss="alert" onclick="fn_cerrar()">X</button>
                                                <p id="txt_mensaje_comida"></p> 
                                        </div>
                                </div>
                                <div id="mensajes_error_comidas" style="display:none">
                                        <div class="alert alert-dismissible alert-danger">
                                                <button type="button" class="" id="msj_cerrar" data-bs-dismiss="alert" onclick="fn_cerrar()">X</button>
                                                <p id="txt_mensaje_comida_error"></p>
                                        </div>
                                </div>


                        </div>
                        <div class="">

                                <input type="submit" id="btn_regist" value="Registrar" class="btn btn-outline-success">
                        </div>
                </form>
        </div>
</div>
<div class="container">

</div>