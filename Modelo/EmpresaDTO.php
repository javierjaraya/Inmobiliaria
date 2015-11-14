<?php
class EmpresaDTO {
    public $idEmpresa;
    public $direccion;
    public $telefono;
    public $quienesSomos;
    public $rutaImagen;
    public $nombreImagen;
    public $descripcionUbicacion;
    public $latitud;
    public $longitud;
    public $zoom;

    public function EmpresaDTO(){
    }

    function getIdEmpresa() {
        return $this->idEmpresa;
    }

    function setIdEmpresa($idEmpresa) {
        return $this->idEmpresa = $idEmpresa;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function setDireccion($direccion) {
        return $this->direccion = $direccion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function setTelefono($telefono) {
        return $this->telefono = $telefono;
    }

    function getQuienesSomos() {
        return $this->quienesSomos;
    }

    function setQuienesSomos($quienesSomos) {
        return $this->quienesSomos = $quienesSomos;
    }

    function getRutaImagen() {
        return $this->rutaImagen;
    }

    function setRutaImagen($rutaImagen) {
        return $this->rutaImagen = $rutaImagen;
    }

    function getNombreImagen() {
        return $this->nombreImagen;
    }

    function setNombreImagen($nombreImagen) {
        return $this->nombreImagen = $nombreImagen;
    }

    function getDescripcionUbicacion() {
        return $this->descripcionUbicacion;
    }

    function setDescripcionUbicacion($descripcionUbicacion) {
        return $this->descripcionUbicacion = $descripcionUbicacion;
    }

    function getLatitud() {
        return $this->latitud;
    }

    function setLatitud($latitud) {
        return $this->latitud = $latitud;
    }

    function getLongitud() {
        return $this->longitud;
    }

    function setLongitud($longitud) {
        return $this->longitud = $longitud;
    }

    function getZoom() {
        return $this->zoom;
    }

    function setZoom($zoom) {
        return $this->zoom = $zoom;
    }

}