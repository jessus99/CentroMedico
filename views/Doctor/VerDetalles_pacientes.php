<?php

?>

<div id="content" class='content overflow-auto' style='margin:50px 50px;'>
<input type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalregistro" value="Agregar">
  <h4>Lista de Pacientes</h4>
  <div class="overflow-auto">
    <table id='tbl_product' class="table table-hover table-bordered table-responsive-md">
      <thead style='background-color: #38b6ff; color:white; font-weight: 500'>
        <tr>

          <th class='size' scope="col">Id</th>
          <th class='size' scope="col">Nombre</th>
          <th class='size' scope="col">Apellidos</th>
          <th class='ajust' scope="col">Email</th>
          <th class='ajust' scope="col">Acciones</th>

        </tr>
      </thead>
      <tbody>
        <?php


        foreach ($respuesta_pacientes as $a) {
          if ($a['perfil'] == 'Paciente') {

        ?>

            <tr class="table-primary" style="height:10%;">

              <td class='size'><?php echo $a['id']; ?></td>
              <td class='size' id='id_model'><?php echo $a['nombre']; ?></td>
              <td class='size'><?php echo $a['apellidos']; ?></td>
              <td class='ajust'><?php echo $a['correo_electronico']; ?></td>
              <td class='ajust'>
                <button class='btn btn-outline-primary' onclick='fn_cargar(<?php echo json_encode($a) ?>)'> Ver detalles</button>
                <input type="button" class="btn btn-outline-danger" onclick="fn_eliminar_usuariopaciente(<?= $a['id'] ?>)" value="Eliminar">
                <button class="btn btn-outline-success" onclick='fn_edit_user(<?php echo json_encode($a) ?>)' data-toggle="modal" data-target="#modalmodificar">Modificar</button>
              </td>
              
              </td>
              
 
            </tr>
        <?php
          }
        } ?>
      </tbody>
    </table>
  </div>
  <div id="msj"></div>
</div>