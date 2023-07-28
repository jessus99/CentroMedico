<?php
?>
<div class="card bg-light mb-3 mx-auto" style="width:50%">
        <div class="card-header">Registrar Citas Medicas</div>
        <div class="card-body">
                <form id="form_registro_citas" action="" method="POST">
                        <input type="hidden" name="action" value="insertar">
                        <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
                        <div class="modal-body">

                                <div class="form-group">
                                        <label for="exampleSelect2">nombre_cita</label>
                                        <select class="form-select" name="nombre_cita" id="exampleSelect1">
                                                <option value="Dentista">Dentista</option>
                                                <option value="Laboratorio ">Laboratorio</option>
                                                <option value="Inyectables">Inyectables</option>
                                                <option value="Cirugias">Cirugias</option>
                                                <option value="Placas">Placas</option>
                                                <option value="Rayos X">Rayos X</option>
                                        </select><br>
                                        <label for="exampleSelect2">nombre_Doctor</label>
                                        <select class="form-select" name="nombre_Doctor" id="exampleSelect2">
                                                <option value="Jesus Hernandez">Jesus Hernandez</option>
                                                <option value="Carlos Valverde">Carlos Valverde</option>
                                                <option value="Carlos Valverde">Jose Campbell</option>
                                        </select>
                                        </select><br>
                                        <label for="exampleSelect2">Horario</label>
                                        <select class="form-select" name="horario" id="exampleSelect3">
                                                <option value="8:00 am">8:00 am</option>
                                                <option value="8:00 am">9:00 am</option>
                                                <option value="11:00 am">10:00 am</option>
                                                <option value="11:00 am">11:00 am</option>
                                                <option value="13:00 pm">13:00 pm</option>
                                                <option value="14:00 pm">18:00 pm</option>
                                                <option value="15:00 pm">13:00 pm</option>
                                                <option value="16:00 pm">18:00 pm</option>
                                                <option value="17:00 pm">13:00 pm</option>
                                                <option value="18:00 pm">18:00 pm</option>
                                                <option value="19:00 pm">13:00 pm</option>
                                                <option value="20:00 pm">18:00 pm</option>
                                        </select>
                                        </select><br>
                                        <label for="exampleSelect2">Tipo</label>
                                        <select class="form-select" name="tipo" id="exampleSelect4">
                                                <option value="1">Virtual</option>
                                                <option value="2">Presencial</option>
                                        </select>
                                </div>





                                <div id="mensajes_ok_citas" style="display:none">
                                        <div class="alert alert-dismissible alert-success">
                                                <button type="button" class="" id="msj_cerrar" data-bs-dismiss="alert" onclick="fn_cerrar()">X</button>
                                                <p id="txt_mensaje_cita"></p>
                                        </div>
                                </div>
                                <div id="mensajes_error_citas" style="display:none">
                                        <div class="alert alert-dismissible alert-danger">
                                                <button type="button" class="" id="msj_cerrar" data-bs-dismiss="alert" onclick="fn_cerrar()">X</button>
                                                <p id="txt_mensaje_cita_error"></p>
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