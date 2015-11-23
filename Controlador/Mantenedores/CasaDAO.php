<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/CasaDTO.php';
include_once '../../Modelo/ImagenDTO.php';

class CasaDAO {

    private $conexion;

    public function CasaDAO() {
        $this->conexion = new ConexionMySQL();
    }
    
    public function getID() {
        $this->conexion->conectar();
        $query = "select (max(idCasa)+1) as id from casa";
        $result = $this->conexion->ejecutar($query);
        $id = 0;
        while ($fila = mysql_fetch_assoc($result)) {
            $id = $fila['id'];
        }
        if($id == null)
            return 1;
        return $id;
    }
    
    public function getMaxPrecio() {
        $this->conexion->conectar();
        $query = "select max(precioKit) as maximo from casa";
        $result = $this->conexion->ejecutar($query);
        $maximo = 0;
        while ($fila = mysql_fetch_assoc($result)) {
            $maximo = $fila['maximo'];
        }
        return $maximo;
    }
    
    public function getMaxM2() {
        $this->conexion->conectar();
        $query = "select max(m2) as maximo from casa";
        $result = $this->conexion->ejecutar($query);
        $maximo = 0;
        while ($fila = mysql_fetch_assoc($result)) {
            $maximo = $fila['maximo'];
        }
        return $maximo;
    }
    
    public function delete($idCasa) {
        $this->conexion->conectar();
        $query = "DELETE FROM casa WHERE  idCasa =  " . $idCasa . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "select * from casa C JOIN imagen I ON C.idCasa = I.idCasa WHERE I.imagenPrincipal = 1";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $casas = array();
        while ($fila = mysql_fetch_assoc($result)) {
            $casa = new CasaDTO();
            $casa->setIdCasa($fila['idCasa']);
            $casa->setNombreModelo($fila['nombreModelo']);
            $casa->setM2($fila['m2']);
            $casa->setDormitorio($fila['dormitorio']);
            $casa->setBanio($fila['banio']);
            $casa->setPrecioKit($fila['precioKit']);
            $casa->setPrecioKitPisoMadera($fila['precioKitPisoMadera']);
            $casa->setPrecioKitPisoMaderaInstalado($fila['precioKitPisoMaderaInstalado']);
            $casa->setPrecioKitPisoRadierInstalado($fila['precioKitPisoRadierInstalado']);
            $casa->setEspecificacion($fila['especificacion']);

            $imagen = new ImagenDTO();
            $imagen->setIdImagen($fila['idImagen']);
            $imagen->setIdCasa($fila['idCasa']);
            $imagen->setImagenPrincipal($fila['imagenPrincipal']);
            $imagen->setNombreImagen($fila['nombreImagen']);
            $imagen->setRutaImagen($fila['rutaImagen']);

            $casa->setImagen($imagen);

            $casas[$i] = $casa;
            $i++;
        }
        $this->conexion->desconectar();
        return $casas;
    }

    public function findByID($idCasa) {
        $this->conexion->conectar();
        $query = "SELECT * FROM casa WHERE idCasa =  " . $idCasa . " ";
        $result = $this->conexion->ejecutar($query);
        $casa = new CasaDTO();
        while ($fila = mysql_fetch_assoc($result)) {
            $casa->setIdCasa($fila['idCasa']);
            $casa->setNombreModelo($fila['nombreModelo']);
            $casa->setM2($fila['m2']);
            $casa->setDormitorio($fila['dormitorio']);
            $casa->setBanio($fila['banio']);
            $casa->setPrecioKit($fila['precioKit']);
            $casa->setPrecioKitPisoMadera($fila['precioKitPisoMadera']);
            $casa->setPrecioKitPisoMaderaInstalado($fila['precioKitPisoMaderaInstalado']);
            $casa->setPrecioKitPisoRadierInstalado($fila['precioKitPisoRadierInstalado']);
            $casa->setEspecificacion($fila['especificacion']);
        }
        $this->conexion->desconectar();
        return $casa;
    }

    public function findLikeAtrr($precioDesde,$precioHasta,$superficieDesde,$superficieHasta,$dormDesde,$banosDesde) {
        $this->conexion->conectar();
        $query = "SELECT * FROM casa C JOIN imagen I ON C.idCasa = I.idCasa WHERE I.imagenPrincipal = 1 AND C.precioKit >= ".$precioDesde." AND C.precioKit <= ".$precioHasta." AND C.m2 >= ".$superficieDesde." AND C.m2 <= ".$superficieHasta." AND C.dormitorio >= ".$dormDesde." AND C.banio >= ".$banosDesde;
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $casas = array();
        while ($fila = mysql_fetch_assoc($result)) {
            $casa = new CasaDTO();
            $casa->setIdCasa($fila['idCasa']);
            $casa->setNombreModelo($fila['nombreModelo']);
            $casa->setM2($fila['m2']);
            $casa->setDormitorio($fila['dormitorio']);
            $casa->setBanio($fila['banio']);
            $casa->setPrecioKit($fila['precioKit']);
            $casa->setPrecioKitPisoMadera($fila['precioKitPisoMadera']);
            $casa->setPrecioKitPisoMaderaInstalado($fila['precioKitPisoMaderaInstalado']);
            $casa->setPrecioKitPisoRadierInstalado($fila['precioKitPisoRadierInstalado']);
            $casa->setEspecificacion($fila['especificacion']);
            
            $imagen = new ImagenDTO();
            $imagen->setIdImagen($fila['idImagen']);
            $imagen->setIdCasa($fila['idCasa']);
            $imagen->setImagenPrincipal($fila['imagenPrincipal']);
            $imagen->setNombreImagen($fila['nombreImagen']);
            $imagen->setRutaImagen($fila['rutaImagen']);

            $casa->setImagen($imagen);
            
            $casas[$i] = $casa;
            $i++;
        }
        $this->conexion->desconectar();
        return $casas;
    }

    public function save($casa) {
        $this->conexion->conectar();
        $query = "INSERT INTO casa (idCasa,nombreModelo,m2,dormitorio,banio,precioKit,precioKitPisoMadera,precioKitPisoMaderaInstalado,precioKitPisoRadierInstalado,especificacion)"
                . " VALUES ( " . $casa->getIdCasa() . " , '" . $casa->getNombreModelo() . "' ,  " . $casa->getM2() . " ,  " . $casa->getDormitorio() . " ,  " . $casa->getBanio() . " ,  " . $casa->getPrecioKit() . " ,  " . $casa->getPrecioKitPisoMadera() . " ,  " . $casa->getPrecioKitPisoMaderaInstalado() . " ,  " . $casa->getPrecioKitPisoRadierInstalado() . " , '" . $casa->getEspecificacion() . "' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($casa) {
        $this->conexion->conectar();
        $query = "UPDATE casa SET "
                . "  nombreModelo = '" . $casa->getNombreModelo() . "' ,"
                . "  m2 =  " . $casa->getM2() . " ,"
                . "  dormitorio =  " . $casa->getDormitorio() . " ,"
                . "  banio =  " . $casa->getBanio() . " ,"
                . "  precioKit =  " . $casa->getPrecioKit() . " ,"
                . "  precioKitPisoMadera =  " . $casa->getPrecioKitPisoMadera() . " ,"
                . "  precioKitPisoMaderaInstalado =  " . $casa->getPrecioKitPisoMaderaInstalado() . " ,"
                . "  precioKitPisoRadierInstalado =  " . $casa->getPrecioKitPisoRadierInstalado() . " ,"
                . "  especificacion =  '" . $casa->getEspecificacion() . "' "
                . " WHERE  idCasa =  " . $casa->getIdCasa() . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

}
