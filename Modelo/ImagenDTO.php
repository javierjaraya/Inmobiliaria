<?php
class ImagenDTO {
    public $idImagen;
    public $idCasa;
    public $imagenPrincipal;
    public $nombreImagen;
    public $rutaImagen;
    public $tamaño;

    public function ImagenDTO(){
    }

    function getIdImagen() {
        return $this->idImagen;
    }

    function setIdImagen($idImagen) {
        return $this->idImagen = $idImagen;
    }

    function getIdCasa() {
        return $this->idCasa;
    }

    function setIdCasa($idCasa) {
        return $this->idCasa = $idCasa;
    }

    function getImagenPrincipal() {
        return $this->imagenPrincipal;
    }

    function setImagenPrincipal($imagenPrincipal) {
        return $this->imagenPrincipal = $imagenPrincipal;
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
    
    function getTamaño() {
        return $this->tamaño;
    }

    function setTamaño($tamaño) {
        $this->tamaño = $tamaño;
    }

}