<?php
class MensajeDTO {
    public $idMensaje;
    public $nombre;
    public $email;
    public $fono;
    public $asunto;
    public $mensaje;
    public $visto;

    public function MensajeDTO(){
    }

    function getIdMensaje() {
        return $this->idMensaje;
    }

    function setIdMensaje($idMensaje) {
        return $this->idMensaje = $idMensaje;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setNombre($nombre) {
        return $this->nombre = $nombre;
    }

    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        return $this->email = $email;
    }

    function getFono() {
        return $this->fono;
    }

    function setFono($fono) {
        return $this->fono = $fono;
    }

    function getAsunto() {
        return $this->asunto;
    }

    function setAsunto($asunto) {
        return $this->asunto = $asunto;
    }

    function getMensaje() {
        return $this->mensaje;
    }

    function setMensaje($mensaje) {
        return $this->mensaje = $mensaje;
    }

    function getVisto() {
        return $this->visto;
    }

    function setVisto($visto) {
        return $this->visto = $visto;
    }

}