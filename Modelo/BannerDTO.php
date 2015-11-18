<?php
class BannerDTO {
    public $idImagen;
    public $nombre;
    public $ruta;
    public $detalle;
    public $tamanio;

    public function BannerDTO(){
    }

    function getIdImagen() {
        return $this->idImagen;
    }

    function setIdImagen($idImagen) {
        return $this->idImagen = $idImagen;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setNombre($nombre) {
        return $this->nombre = $nombre;
    }

    function getRuta() {
        return $this->ruta;
    }

    function setRuta($ruta) {
        return $this->ruta = $ruta;
    }

    function getDetalle() {
        return $this->detalle;
    }

    function setDetalle($detalle) {
        return $this->detalle = $detalle;
    }
    
    function getTamanio() {
        return $this->tamanio;
    }

    function setTamanio($tamanio) {
        $this->tamanio = $tamanio;
    }
}