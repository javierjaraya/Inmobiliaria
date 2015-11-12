<?php
class PlanoDTO {
    public $idPlano;
    public $idCasa;
    public $nombreImagen;
    public $rutaImagen;

    public function PlanoDTO(){
    }

    function getIdPlano() {
        return $this->idPlano;
    }

    function setIdPlano($idPlano) {
        return $this->idPlano = $idPlano;
    }

    function getIdCasa() {
        return $this->idCasa;
    }

    function setIdCasa($idCasa) {
        return $this->idCasa = $idCasa;
    }

    function getNombreImagen() {
        return $this->nombreImagen;
    }

    function setNombreImagen($nombreImagen) {
        return $this->nombreImagen = $nombreImagen;
    }

    function getRutaImagen() {
        return $this->rutaImagen;
    }

    function setRutaImagen($rutaImagen) {
        return $this->rutaImagen = $rutaImagen;
    }

}