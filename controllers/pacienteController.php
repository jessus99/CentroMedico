<?php
if (isset($_GET['action']) || isset($_POST['action'])) {

    require_once '../models/pacienteModel.php';
}
if (!isset($_SESSION['perfil'])) {
    session_start();
}
class pacienteController
{

    private $id;
    private $nombre;
    private $apellidos;
    private $fecha_nacimiento;
    private $genero;
    private $direccion;
    private $numero_telefono;
    private $correo_electronico;
    private $nombre_contacto_emergencia;
    private $telefono_contacto_emergencia;
    private $perfil;
    private $db;

    


    public function getDb()
    {
        return $this->db;
    }

    public function setDb($db): void
    {
        $this->db = $db;
    }

    function _construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }
    public function getFecha_nacimiento()
    {
        return $this->fecha_nacimiento;
    }
    public function getGenero()
    {
        return $this->genero;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function getNumero_telefono()
    {
        return $this->numero_telefono;
    }
    public function getCorreo_electronico()
    {
        return $this->correo_electronico;
    }
    public function getNombre_contacto_emergencia()
    {
        return $this->nombre_contacto_emergencia;
    }
    public function getTelefono_contacto_emergencia()
    {
        return $this->telefono_contacto_emergencia;
    }

    public function getPerfil()
    {
        return $this->perfil;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos): void
    {
        $this->apellidos = $apellidos;
    }
    public function setFecha_nacimiento($fecha_nacimiento): void
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }
    public function setGenero($genero): void
    {
        $this->genero = $genero;
    }
    public function setDireccion($direccion): void
    {
        $this->direccion = $direccion;
    }
    public function setNumero_telefono($numero_telefono): void
    {
        $this->numero_telefono = $numero_telefono;
    }
    public function setCorreo_electronico($correo_electronico): void
    {
        $this->correo_electronico = $correo_electronico;
    }
    public function setNombre_contacto_emergencia($nombre_contacto_emergencia): void
    {
        $this->nombre_contacto_emergencia = $nombre_contacto_emergencia;
    }
    public function setTelefono_contacto_emergencia($telefono_contacto_emergencia): void
    {
        $this->telefono_contacto_emergencia = $telefono_contacto_emergencia;
    }

    public function setPerfil($perfil): void
    {
        $this->perfil = $perfil;
    }

    public function readAllUser()
    {

        $response = pacienteModel::readAllUsuarios();
        return $response;
    }
    public function readAllClientUser()
    {
    }

    public function insertUser()
    {
        $query;

        $nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : false;
        $apellidos = !empty($_POST['apellidos']) ? $_POST['apellidos'] : false;
        $fecha_nacimiento = !empty($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : false;
        $genero = !empty($_POST['genero']) ? $_POST['genero'] : false;
        $direccion= !empty($_POST['direccion']) ? $_POST['direccion'] : false;
        $numero_telefono = !empty($_POST['numero_telefono']) ? $_POST['numero_telefono'] : false;
        $correo_electronico = !empty($_POST['correo_electronico']) ? $_POST['correo_electronico'] : false;
        $nombre_contacto_emergencia = !empty($_POST['nombre_contacto_emergencia']) ? $_POST['nombre_contacto_emergencia'] : false;
        $telefono_contacto_emergencia = !empty($_POST['telefono_contacto_emergencia']) ? $_POST['telefono_contacto_emergencia'] : false;
        $perfil = !empty($_POST['perfil']) ? $_POST['perfil'] : false;



        if ($nombre && $apellidos && $fecha_nacimiento && $genero && $direccion && $numero_telefono && $correo_electronico && $nombre_contacto_emergencia
        && $telefono_contacto_emergencia && $perfil) {


            $response = new pacienteModel();
            $response->setNombre($nombre);
            $response->setApellidos($apellidos);
            $response->setFecha_nacimiento($fecha_nacimiento);
            $response->setGenero($genero);
            $response->setDireccion($direccion);
            $response->setNumero_telefono($numero_telefono);
            $response->setCorreo_electronico($correo_electronico);
            $response->setNombre_contacto_emergencia($nombre_contacto_emergencia);
            $response->setTelefono_contacto_emergencia($telefono_contacto_emergencia);
            $response->setPerfil($perfil);
            $query = pacienteModel::createUsuario($response);
        }
        if ($query && !isset($_SESSION['perfil'])) {
            $response = pacienteModel::readOnceUser($response);
            $_SESSION['id'] = $response->id;
            $_SESSION['nombre'] = $response->nombre;
            $_SESSION['apellidos'] = $response->apellidos;
            $_SESSION['fecha_nacimiento'] = $response->fecha_nacimiento;
            $_SESSION['genero'] = $response->genero;
            $_SESSION['direccion'] = $response->direccion;
            $_SESSION['numero_telefono'] = $response->numero_telefono;
            $_SESSION['correo_electronico'] = $response->correo_electronico;
            $_SESSION['nombre_contacto_emergencia'] = $response->nombre_contacto_emergencia;
            $_SESSION['telefono_contacto_emergencia'] = $response->telefono_contacto_emergencia;
            $_SESSION['perfil'] = $response->id_perfil;
        }
        return $query;
    }
    public function deleteuser()
    {
        require_once '../models/conversacionesModel.php';
        require_once '../models/mensajesModel.php';
        require_once '../models/citasModel.php';
        $id = $_POST['id'];
        $validacion;
        //validar si existen mensajes, registro de citas, conversaciones y eliminarlas
        $validacion = mensajesModel::listarMensajesPorId($id);
        if ($validacion == true) {
            $validacion = mensajesModel::eliminarPorId($id);
        }
        $validacion = conversacionesModel::consultarTodasId($id);
        if ($validacion == true) {
            $validacion = conversacionesModel::eliminarPorId($id);
        }
        $validacion = citasModel::listarcitasPorIdUsuario($id);
        if ($validacion == true) {
            $validacion = citasModel::eliminarPorIdUsuario($id);
        }
        $response = new pacienteModel();
        $response->setId($id);
        $query = pacienteModel::deleteUser($response);
        return $query;
    }
    public function updateuserPaciente()
    {
        $id = !empty($_POST['id']) ? $_POST['id'] : false;
        $nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : false;
        $apellidos = !empty($_POST['apellidos']) ? $_POST['apellidos'] : false;
        $fecha_nacimiento = !empty($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : false;
        $genero = !empty($_POST['genero']) ? $_POST['genero'] : false;
        $direccion= !empty($_POST['direccion']) ? $_POST['direccion'] : false;
        $numero_telefono = !empty($_POST['numero_telefono']) ? $_POST['numero_telefono'] : false;
        $correo_electronico = !empty($_POST['correo_electronico']) ? $_POST['correo_electronico'] : false;
        $nombre_contacto_emergencia = !empty($_POST['nombre_contacto_emergencia']) ? $_POST['nombre_contacto_emergencia'] : false;
        $telefono_contacto_emergencia = !empty($_POST['telefono_contacto_emergencia']) ? $_POST['telefono_contacto_emergencia'] : false;
        $perfil = !empty($_POST['perfil']) ? $_POST['perfil'] : false;

        if ($nombre && $apellidos && $fecha_nacimiento && $genero && $direccion && $numero_telefono && $correo_electronico && $nombre_contacto_emergencia && $telefono_contacto_emergencia && $perfil && $id){

            $response = new pacienteModel();
            $response->setId($id);
            $response->setNombre($nombre);
            $response->setApellidos($apellidos);
            $response->setFecha_nacimiento($fecha_nacimiento);
            $response->setGenero($genero);
            $response->setDireccion($direccion);
            $response->setNumero_telefono($numero_telefono);
            $response->setCorreo_electronico($correo_electronico);
            $response->setNombre_contacto_emergencia($nombre_contacto_emergencia);
            $response->setTelefono_contacto_emergencia($telefono_contacto_emergencia);
            $response->setPerfil($perfil);
            $query = pacienteModel::updateUsuarioPaciente($response);
        }
        
        return $query;
    }
}

if (isset($_POST['action'])) {

    $action = $_POST['action'] . "user";
    $user = new pacienteController();
    $response = $user->$action();
    echo $response;
    die();
}
if (isset($_GET['action'])) {

    $action = $_GET['action'] . "user";

    $user = new pacienteController();
    $response = $user->$action();

    die();
}
