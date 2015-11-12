<?php
class PerfilDTO {
    public $idPerfil;
    public $nombre;

    public function PerfilDTO(){
    }

    function getIdPerfil() {
        return $this->idPerfil;
    }

    function setIdPerfil($idPerfil) {
        return $this->idPerfil = $idPerfil;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setNombre($nombre) {
        return $this->nombre = $nombre;
    }

}