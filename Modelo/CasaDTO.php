<?php
class CasaDTO {
    public $idCasa;
    public $nombreModelo;
    public $precio;
    public $m2;
    public $dormitorio;
    public $banio;
    public $precioKit;
    public $precioKitPisoMadera;
    public $precioKitPisoMaderaInstalado;
    public $precioKitPisoRadierInstalado;

    public function CasaDTO(){
    }

    function getIdCasa() {
        return $this->idCasa;
    }

    function setIdCasa($idCasa) {
        return $this->idCasa = $idCasa;
    }

    function getNombreModelo() {
        return $this->nombreModelo;
    }

    function setNombreModelo($nombreModelo) {
        return $this->nombreModelo = $nombreModelo;
    }

    function getPrecio() {
        return $this->precio;
    }

    function setPrecio($precio) {
        return $this->precio = $precio;
    }

    function getM2() {
        return $this->m2;
    }

    function setM2($m2) {
        return $this->m2 = $m2;
    }

    function getDormitorio() {
        return $this->dormitorio;
    }

    function setDormitorio($dormitorio) {
        return $this->dormitorio = $dormitorio;
    }

    function getBanio() {
        return $this->banio;
    }

    function setBanio($banio) {
        return $this->banio = $banio;
    }

    function getPrecioKit() {
        return $this->precioKit;
    }

    function setPrecioKit($precioKit) {
        return $this->precioKit = $precioKit;
    }

    function getPrecioKitPisoMadera() {
        return $this->precioKitPisoMadera;
    }

    function setPrecioKitPisoMadera($precioKitPisoMadera) {
        return $this->precioKitPisoMadera = $precioKitPisoMadera;
    }

    function getPrecioKitPisoMaderaInstalado() {
        return $this->precioKitPisoMaderaInstalado;
    }

    function setPrecioKitPisoMaderaInstalado($precioKitPisoMaderaInstalado) {
        return $this->precioKitPisoMaderaInstalado = $precioKitPisoMaderaInstalado;
    }

    function getPrecioKitPisoRadierInstalado() {
        return $this->precioKitPisoRadierInstalado;
    }

    function setPrecioKitPisoRadierInstalado($precioKitPisoRadierInstalado) {
        return $this->precioKitPisoRadierInstalado = $precioKitPisoRadierInstalado;
    }

}