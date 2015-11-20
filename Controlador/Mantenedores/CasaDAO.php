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

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM casa WHERE upper(nombreModelo) LIKE upper('" . $cadena . "') OR  upper(m2) LIKE upper(" . $cadena . ")  OR  upper(dormitorio) LIKE upper(" . $cadena . ")  OR  upper(banio) LIKE upper(" . $cadena . ")  OR  upper(precioKit) LIKE upper(" . $cadena . ")  OR  upper(precioKitPisoMadera) LIKE upper(" . $cadena . ")  OR  upper(precioKitPisoMaderaInstalado) LIKE upper(" . $cadena . ")  OR  upper(precioKitPisoRadierInstalado) LIKE upper(" . $cadena . ") ";
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
