<?php

session_start();
if (isset($_SESSION['perfil'])) {
    $perfil = $_SESSION['perfil'];
    if ($perfil == 4) {
        $perfil = 2;
    }
    switch ($perfil) {
        case 1:
            if (isset($_GET['pagina'])) {
                $pagina = $_GET['pagina'];
            } else {
                $pagina = "principal";
            }

            require_once './views/pacientes/navbar.php';
            switch ($pagina) {
                case 'principal':
                    require_once './config/conexion.php';
                    require_once './views/pacientes/inicio.php';
                    break;
                case 'mensajes':
                    require_once './config/conexion.php';
                    require_once './models/mensajesModel.php';
                    require_once './models/userModel.php';
                    require_once './models/conversacionesModel.php';
                    require_once './controllers/userController.php';
                    require_once './controllers/mensajesController.php';
                    $usuarios = new userController();
                    $respuestaUsuarios = $usuarios->readAllUser();
                    $mensajes = new mensajesController();
                    $respuesta_mensajes = $mensajes->cargarMensajes($_SESSION['id']);
                    echo "<div class='row'>";
                    require_once './views/mensajes/mensajes.php';

                    if ($respuesta_mensajes) {
                        require_once './views/mensajes/lista_mensajes.php';
                    } else {
                        echo "<h4>No hay mensajes</h4>";
                    }
                    echo "<script src='./js/script_mensajes4.js'></script>";
                    echo '</div>';
                    break;

                default:
                    require_once './views/pacientes/inicio.php';
                    break;
            }




            break;
        case 2:
            if (isset($_GET['pagina'])) {
                $pagina = $_GET['pagina'];
            } else {
                $pagina = "principal_recepcionista";
            }
            switch ($pagina) {
                case "principal_recepcionista":
                    require_once './config/conexion.php';
                    require_once './views/recepcionista/navbar.php';
                    require_once './models/userModel.php';
                    require_once './controllers/userController.php';
                    $pacientes = new userController();
                    $respuesta_pacientes = $pacientes->readAllUser();
                    require_once './views/recepcionista/lista_pacientes.php';
                    $doctores = new userController();
                    $respuesta_doctores = $doctores->readAllUser();
                    require_once './views/recepcionista/lista_doctores.php';
                    echo "<script src='./js/script_pacientes6.js'></script>";
                    echo "<script src='./js/script_pacientes_mensajes.js'></script>";
                    break;
                case "cargas":
                    require_once '../config/conexion.php';
                    require_once '../controllers/userController.php';
                    require_once '../models/userModel.php';
                    $usuarios = new userController();
                    $respuestaUsuarios = $usuarios->readAllUser();
                    require_once '../controllers/mensajesController.php';
                    require_once '../models/mensajesModel.php';
                    require_once '../models/conversacionesModel.php';
                    $mensaje = new mensajesController();
                    $respuesta_mensajes = $mensaje->cargarMensajes($_SESSION['id']);
                    require_once '../views/mensajes/mensajes_pacientes.php';
                    require_once '../views/mensajes/lista_mensajes.php';
                    break;
                    case 'registrar_cita':
                        require_once './views/Recepcionista/navbar.php';
                        require_once './config/conexion.php';
                        require_once './models/citasModel.php';
                        require_once './controllers/citasController.php';
                        require_once './models/userModel.php';
                        require_once './controllers/userController.php';
                        $usuarios = new userController();
                        $respuestaUsuarios = $usuarios->readAllUser();
                        echo "<div class='row'>";
    
                        $citas = new citasController();
    
                        $respuesta_citas = $citas->cargarCitas($_SESSION['id']);
    
                        require_once './views/Doctor/registrar_cita.php';
                        require_once './views/citas/lista_citas.php';
                        echo "<script src='./js/script_citas.js'></script>";
                        break;
            }

            break;
        case 3:
            if (isset($_GET['pagina'])) {
                $pagina = $_GET['pagina'];
            } else {
                $pagina = "Doctor";
            }
            switch ($pagina) {
                case "Doctor":
                    require_once './views/Doctor/navbar.php';
                    require_once './config/conexion.php';
                    require_once './models/userModel.php';
                    require_once './models/pacienteModel.php';
                    require_once './controllers/userController.php';
                    require_once './controllers/pacienteController.php';
                    $pacientes= new pacienteController();
                    $respuesta_pacientes = $pacientes->readAllUser();
                    
                    require_once './views/Doctor/registro.php';
                    require_once './views/Doctor/modificar.php';
                    require_once './views/Doctor/lista_pacientes.php';
                    require_once './views/Doctor/medicamentos.php';
                    require_once './views/Doctor/mostrar.php';
                    
                   
                    
                    echo "<script src='./js/script_Doctor.js'></script>";
                    
                    break;
                case 'mensajes':
                    require_once './views/Doctor/navbar.php';
                    require_once './config/conexion.php';
                    require_once './models/mensajesModel.php';
                    require_once './models/userModel.php';
                    require_once './models/pacienteModel.php';
                    require_once './models/conversacionesModel.php';
                    require_once './controllers/userController.php';
                    require_once './controllers/mensajesController.php';
                    $usuarios = new userController();
                    $respuestaUsuarios = $usuarios->readAllUser();
                    $mensajes = new mensajesController();
                    $respuesta_mensajes = $mensajes->cargarMensajes($_SESSION['id']);
                    echo "<div class='row'>";
                    require_once './views/mensajes/mensajes.php';

                    if ($respuesta_mensajes) {
                        require_once './views/mensajes/lista_mensajes.php';
                    } else {
                        echo "<h4>No hay mensajes</h4>";
                    }
                    echo "<script src='./js/script_mensajes4.js'></script>";
                    echo '</div>';
                    break;
                case 'registrar_cita':
                    require_once './views/Doctor/navbar.php';
                    require_once './config/conexion.php';
                    require_once './models/citasModel.php';
                    require_once './controllers/citasController.php';
                    require_once './models/userModel.php';
                    require_once './controllers/userController.php';
                    $usuarios = new userController();
                    $respuestaUsuarios = $usuarios->readAllUser();
                    echo "<div class='row'>";

                    $citas = new citasController();

                    $respuesta_citas = $citas->cargarCitas($_SESSION['id']);

                    require_once './views/Doctor/registrar_cita.php';
                    require_once './views/citas/lista_citas.php';
                    echo "<script src='./js/script_citas.js'></script>";
                    break;
            }

            break;


        default:
            break;
    }
} else {

    require_once './views/login.php';
    require_once './views/registrarInicio.php';
}
