<?php
if (isset($_POST['action'])) {
    require_once '../config/conexion.php';
}

class citasModel
{

    private $nombre_cita;
    private $nombre_profesor;
    private $horario;
    private $tipo;
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario): void
    {
        $this->idUsuario = $idUsuario;
    }

    public function getNombreCita()
    {
        return $this->nombre_cita;
    }

    public function getNombreProfesor()
    {
        return $this->nombre_profesor;
    }

    public function getHorario()
    {
        return $this->horario;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setNombreCita($nombre_cita): void
    {
        $this->nombre_cita = $nombre_cita;
    }

    public function setNombreProfesor($nombre_profesor): void
    {
        $this->nombre_profesor = $nombre_profesor;
    }

    public function setHorario($horario): void
    {
        $this->horario = $horario;
    }

    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }
    public static function insertar($cita)
    {
        try {
            $db = conexion::getConnect(); //inicia la conexion
            $db->beginTransaction(); //inicia la transaccion
            $consulta = $db->prepare("insert into tbl_citas (nombre_cita,nombre_profesor,horario,tipo,id_usuario)"
                . " values (:nombre_cita,:nombre_profesor,:horario,:tipo,:id_usuario)");
            $consulta->bindValue(':nombre_cita', $cita->getNombreCita());
            $consulta->bindValue(':nombre_profesor', $cita->getnombreProfesor());
            $consulta->bindValue(':horario', $cita->getHorario());
            $consulta->bindValue(':tipo', $cita->getTipo());
            $consulta->bindValue(':id_usuario', $cita->getIdUsuario());
            $consulta->execute(); //ejecuta la consulta
            $db->commit(); //verifica la ejecucion
            return true;
        } catch (Exception $e) {     //captura en caso de error de proceso db
            echo "se ha presentado un error " . $e->getMessage();
            $db->rollBack();
            throw $e;
        }
    }
    public static function cargarCitas($id)
    {
        $citas = []; //arreglo 
        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT a.id, a.nombre_cita, a.nombre_profesor, a.horario, t.nombre as tipo, a.fecha FROM tbl_citas a INNER JOIN tbl_tipos t ON a.tipo = t.id where a.id_usuario =$id");
            $consulta->execute();
            foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $cita) {
                $citas[] = $cita;
            }
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }

        return $citas;
    }
    public static function cargarTodasCitas($id)
    {

        $citas = []; //arreglo 
        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT a.id, a.nombre_cita, a.nombre_profesor, a.horario, t.nombre as tipo, a.fecha FROM tbl_citas a INNER JOIN tbl_tipos t ON a.tipo = t.id where a.id_usuario =$id");
            $consulta->execute();
            foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $cita) {
                $citas[] = $cita;
            }
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
            $citas = false;
        }

        return $citas;
    }
    public static function listarCitasPorIdUsuario($id)
    {

        $citas = []; //arreglo 
        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT a.id, a.nombre_cita, a.nombre_profesor, a.horario, t.nombre as tipo, a.fecha FROM tbl_citas a INNER JOIN tbl_tipos t ON a.tipo = t.id where a.id_usuario =$id");
            $consulta->execute();
            foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $cita) {
                $citas[] = $cita;
            }
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
            $citas = false;
        }

        if (isset($citas)) {
            return true;
        } else {
            return false;
        }
    }
    public static function eliminarCitas($id)
    {
        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("DELETE FROM tbl_citas WHERE id =:id");
            $consulta->bindValue(':id', $id);
            $result = $consulta->execute();

            if ($result) {
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
    public static function eliminarPorIdUsuario($id)
    {
        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("DELETE FROM tbl_citas WHERE id_usuario =:id");
            $consulta->bindValue(':id', $id);
            $result = $consulta->execute();

            if ($result) {
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
