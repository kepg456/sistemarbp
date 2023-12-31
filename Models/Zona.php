<?php
include_once 'Conexion.php';
class Zona
{
    private $acceso;

    var $objetos;
    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }
    function read_all_zonas()
    {
        $sql = "SELECT * 
                FROM zona
                WHERE estado='A'";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
    function crear($nombre, $tipo, $responsable)
    {
        $sql = "INSERT INTO zona(nombre,tipo,responsable)
                VALUES(:nombre,:tipo,:responsable)";
        $query = $this->acceso->prepare($sql);
        $variables = array(
            ':nombre' => $nombre,
            ':tipo' => $tipo,
            ':responsable' => $responsable
        );
        $query->execute($variables);
    }
    function obtener_zona($id)
    {
        $sql = "SELECT * 
                FROM zona
                WHERE zona.id=:id AND estado='A'";
        $query = $this->acceso->prepare($sql);
        $variables = array(
            ':id' => $id,
        );
        $query->execute($variables);
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
    function editar($id_zona, $nombre, $tipo, $responsable)
    {
        if ($nombre != '' || $tipo != '' || $responsable != '') {
            $sql = "UPDATE zona SET nombre=:nombre, tipo=:tipo, responsable=:responsable WHERE id=:id_zona";
            $query = $this->acceso->prepare($sql);
            $variables = array(
                ':nombre' => $nombre,
                ':tipo' => $tipo,
                ':responsable' => $responsable,
                ':id_zona' => $id_zona
            );
            $query->execute($variables);
        }
    }
    function eliminar_zona($id_zona)
    {
        $sql = "UPDATE zona SET estado=:estado WHERE id=:id_zona";
        $query = $this->acceso->prepare($sql);
        $variables = array(
            ':id_zona' => $id_zona,
            ':estado'=>'I'
        );
        $query->execute($variables);
    }
    function llenar_zonas()
    {
        $sql = "SELECT * 
                FROM zona";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
    function llenar_zonas_mod()
    {
        $sql = "SELECT * 
                FROM zona";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
}
