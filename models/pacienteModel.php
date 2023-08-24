<?php
if (isset($_GET['action']) || isset($_POST['action'])) {
    require_once '../config/conexion.php';
}
class pacienteModel
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

    public function getDb()
    {
        return $this->db;
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

    public function setDb($db): void
    {
        $this->db = $db;
    }


    public static function createUsuario($usuario)
    {
        try {

            $db = conexion::getConnect(); //inicia la conexion
            $db->beginTransaction(); //inicia la transaccion
            $consulta = $db->prepare("insert into tbl_usuariospacientes (nombre,apellidos,fecha_nacimiento,genero,direccion,numero_telefono,correo_electronico,nombre_contacto_emergencia,telefono_contacto_emergencia)"
                . " values (:nombre,:apellidos,:fecha_nacimiento,:genero,:direccion,:numero_telefono,:correo_electronico,:nombre_contacto_emergencia,:telefono_contacto_emergencia)");
            $consulta->bindValue(':nombre', $usuario->getNombre());
            $consulta->bindValue(':apellidos', $usuario->getApellidos());
            $consulta->bindValue(':fecha_nacimiento', $usuario->getFecha_nacimiento());
            $consulta->bindValue(':genero', $usuario->getGenero());
            $consulta->bindValue(':direccion', $usuario->getDireccion());
            $consulta->bindValue(':numero_telefono', $usuario->getNumero_telefono());
            $consulta->bindValue(':correo_electronico', $usuario->getCorreo_electronico());
            $consulta->bindValue(':nombre_contacto_emergencia', $usuario->getNombre_contacto_emergencia());
            $consulta->bindValue(':telefono_contacto_emergencia', $usuario->getTelefono_contacto_emergencia());

            $consulta->execute(); //ejecuta la consulta 
            $db->commit(); //verifica la ejecucion
            return true;
        } catch (Exception $e) { //captura en caso de error de proceso db
            echo "se ha presentado un error " . $e->getMessage();
            $db->rollBack();
            throw $e;
        }
    }

    public static function readOnceUser($user)
    {

        $correo_electronico = $user->getCorreo_electronico();

        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT * from tbl_usuariospacientes where correo_electronico = :correo_electronico");
            $consulta->bindValue(':correo_electronico', $correo_electronico);
            $consulta->execute();
            $ingreso = $consulta->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        return $ingreso;
    }

    
    public static function readOnceUserPerId($id)
    {



        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT * from tbl_usuariospacientes where id = :id");
            $consulta->bindValue(':id', $id);
            $consulta->execute();
            $result = $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        return $result;
    }

    public static function updateUsuarioPaciente($usuario)
    {

        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("UPDATE tbl_usuariospacientes SET nombre = :nombre, apellidos = :apellidos, fecha_nacimiento = :fecha_nacimiento, " . "
                    genero = :genero, direccion = :direccion, numero_telefono = :numero_telefono,correo_electronico= :correo_electronico, nombre_contacto_emergencia = :nombre_contacto_emergencia, telefono_contacto_emergencia = :telefono_contacto_emergencia, id_perfil= :id_perfil" . "
                    WHERE id =:id");
            $consulta->bindValue(':id', $usuario->getId());       
            $consulta->bindValue(':nombre', $usuario->getNombre());
            $consulta->bindValue(':apellidos', $usuario->getApellidos());
            $consulta->bindValue(':fecha_nacimiento', $usuario->getFecha_nacimiento());
            $consulta->bindValue(':genero', $usuario->getGenero());
            $consulta->bindValue(':direccion', $usuario->getDireccion());
            $consulta->bindValue(':numero_telefono', $usuario->getNumero_telefono());
            $consulta->bindValue(':correo_electronico', $usuario->getCorreo_electronico());
            $consulta->bindValue(':nombre_contacto_emergencia', $usuario->getNombre_contacto_emergencia());
            $consulta->bindValue(':telefono_contacto_emergencia', $usuario->getTelefono_contacto_emergencia());
            $consulta->bindValue(':id_perfil', $usuario->getPerfil());

            $consulta->execute();
            return true;
        } catch (PDOException $e) { //captura en caso de error de proceso db
            echo "se ha presentado un error " . $e->getMessage(); //muestra el mensaje de error.
            $db->rollBack(); //en caso de error, elimina las transacciones que se han realizado
            throw $e;
        }
    }


    public static function readAllUsuarios()
    {
        $usuarios; //arreglo 
        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT u.id, u.nombre, u.apellidos,u.fecha_nacimiento,u.genero,u.direccion,u.numero_telefono,u.correo_electronico,u.nombre_contacto_emergencia,u.telefono_contacto_emergencia, p.nombre AS perfil FROM tbl_usuariospacientes u INNER JOIN tbl_perfiles p ON u.id_perfil = p.id ");
            $consulta->execute();
            foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $usuario) {
                $usuarios[] = $usuario;
            }
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        return $usuarios;
    }

    

    public static function deleteUser($usuario)
    {
        try {

            $db = conexion::getConnect();
            $consulta = $db->prepare("DELETE FROM tbl_usuariospacientes WHERE id =:id");
            $consulta->bindValue(':id', $usuario->getId());
            $resultado = $consulta->execute();
            if ($resultado) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) { //captura en caso de error de proceso db
            echo "se ha presentado un error " . $e->getMessage(); //muestra el mensaje de error.
            $db->rollBack(); //en caso de error, elimina las transacciones que se han realizado
            throw $e;
        }
    }
}
