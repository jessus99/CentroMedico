<?php

if (isset($_GET['cargar'])) {
  $resultado = json_decode($_POST['json']);


  $object =  json_decode(json_encode($resultado), true);
  $respuesta_citas = $object;
}
?>
<div id="content" class='content overflow-auto' style='margin:50px 50px;'>
  <h4>Lista de Citas</h4>
  <div class="overflow-auto">
    <table id='tbl_product' class="table table-hover table-bordered table-responsive-md">
      <thead style='background-color: #38b6ff; color:white; font-weight: 500'>
        <tr>
          <th class='ajust' scope="col">Nombre Paciente</th>
          <th class='ajust' scope="col">Nombre Cita</th>
          <th class='ajust' scope="col">Nombre Doctor</th>
          <th class='size' scope="col">Horario</th>
          <th class='ajust' scope="col">Tipo</th>
          <th class='ajust' scope="col">Fecha de cita programada</th>
          <th class='ajust' scope="col">Acciones</th>

        </tr>
      </thead>
      <tbody id="tbody">
        <?php
        $position = 0;
        if (isset($respuesta_citas)) {
          foreach ($respuesta_citas as $a) {


        ?>

            <tr class="table-primary" style="height:10%;">
              <td class='size'><?php echo $a['nombre_paciente']; ?></td>
              <td class='size'><?php echo $a['nombre_cita']; ?></td>
              <td class='size'><?php echo $a['nombre_doctor']; ?></td>
              <td class='size'><?php echo $a['horario']; ?></td>
              <td class='ajust'><?php echo $a['tipo']; ?></td>
              <td class='ajust'><?php echo $a['fecha']; ?></td>
              <td class='ajust'><input type="button" onclick="fn_eliminar({'id':'<?= $a['id'] ?>','action':'eliminar'})" value="Eliminar"></td>
            </tr>
        <?php $position++;
          }
        } ?>
      </tbody>
    </table>
  </div>
</div>