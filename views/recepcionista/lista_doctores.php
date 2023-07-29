<?php

?>
<div id="content" class='content overflow-auto col-lg-10 mx-auto' style='margin:20px'>
  <h4>Listado de Doctores</h4>
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


        foreach ($respuesta_doctores as $a) {
          if ($a['perfil'] == 'Doctor') {

        ?>

            <tr class="table-primary" style="height:10%;">

              <td class='size'><?php echo $a['id']; ?></td>
              <td class='size' id='id_model'><?php echo $a['name']; ?></td>
              <td class='size'><?php echo $a['lastname']; ?></td>
              <td class='ajust'><?php echo $a['email']; ?></td>
              <td class='ajust'><button class='btn btn-outline-primary' onclick='fn_cargar(<?php echo json_encode($a) ?>)'> Ver detalles</button></td>
              
 
            </tr>
        <?php
          }
        } ?>
      </tbody>
    </table>
  </div>
</div>
