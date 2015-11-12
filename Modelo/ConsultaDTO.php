<?php
class ConsultaDTO {
    public $idConsulta;
    public $nombre;
    public $fono;
    public $email;
    public $consulta;
    public $fecha;
    public $visto;
    public $idCasa;

    public function ConsultaDTO(){
    }

    function getIdConsulta() {
        return $this->idConsulta;
    }

    function setIdConsulta($idConsulta) {
        return $this->idConsulta = $idConsulta;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setNombre($nombre) {
        return $this->nombre = $nombre;
    }

    function getFono() {
        return $this->fono;
    }

    function setFono($fono) {
        return $this->fono = $fono;
    }

    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        return $this->email = $email;
    }

    function getConsulta() {
        return $this->consulta;
    }

    function setConsulta($consulta) {
        return $this->consulta = $consulta;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setFecha($fecha) {
        return $this->fecha = $fecha;
    }

    function getVisto() {
        return $this->visto;
    }

    function setVisto($visto) {
        return $this->visto = $visto;
    }

    function getIdCasa() {
        return $this->idCasa;
    }

    function setIdCasa($idCasa) {
        return $this->idCasa = $idCasa;
    }

}