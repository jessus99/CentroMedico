<?php

if (isset($_POST['action'])) {
    require_once '../models/citasModel.php';
}
class citasController
{
    private $nombre_cita;
    private $nombre_doctor;
    private $horario;
    private $tipo;

    public function getNombreCita()
    {
        return $this->nombre_cita;
    }

    public function getNombreDoctor()
    {
        return $this->nombre_doctor;
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

    public function setNombreDoctor($nombre_doctor): void
    {
        $this->nombre_doctor = $nombre_doctor;
    }

    public function setHorario($horario): void
    {
        $this->horario = $horario;
    }

    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }
    public function insertarCitas()
    {

        $cita = new citasModel();
        $cita->setNombreCita($_POST['nombre_cita']);
        $cita->setNombreDoctor($_POST['nombre_doctor']);
        $cita->setHorario($_POST['horario']);
        $cita->setTipo($_POST['tipo']);
        $cita->setIdUsuario($_POST['id']);
        $query = citasModel::insertar($cita);
        return $query;
    }
    public function cargarTodasCitas()
    {


        if (is_numeric($_POST['idUsuario'])) {
            $query = citasModel::cargarTodasCitas($_POST['idUsuario']);
            echo json_encode($query);
        } else {
            return false;
        }
    }
    public function cargarCitas($idUsuario)
    {

        $query = citasModel::cargarCitas($idUsuario);
        return $query;
    }
    public function eliminarCitas()
    {

        $query = citasModel::eliminarCitas($_POST['id']);
        return $query;
    }
}
if (isset($_POST['action'])) {

    $action = $_POST['action'] . "Citas";
    $citas = new citasController();
    $response = $citas->$action();
    echo $response;
    die();
}
