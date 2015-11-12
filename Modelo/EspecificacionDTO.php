<?php
class EspecificacionDTO {
    public $idEspecificacion;
    public $titulo;
    public $descripcion;
    public $idCasa;

    public function EspecificacionDTO(){
    }

    function getIdEspecificacion() {
        return $this->idEspecificacion;
    }

    function setIdEspecificacion($idEspecificacion) {
        return $this->idEspecificacion = $idEspecificacion;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function setTitulo($titulo) {
        return $this->titulo = $titulo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setDescripcion($descripcion) {
        return $this->descripcion = $descripcion;
    }

    function getIdCasa() {
        return $this->idCasa;
    }

    function setIdCasa($idCasa) {
        return $this->idCasa = $idCasa;
    }

}