<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/CasaDTO.php';

class CasaDAO{
    private $conexion;

    public function CasaDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idCasa) {
        $this->conexion->conectar();
        $query = "DELETE FROM casa WHERE  idCasa =  ".$idCasa." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM casa";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $casas = array();
        while ($fila = mysql_fetch_assoc($result)) {
            $casa = new CasaDTO();
            $casa->setIdCasa($fila['idCasa']);
            $casa->setNombreModelo($fila['nombreModelo']);
            $casa->setPrecio($fila['precio']);
            $casa->setM2($fila['m2']);
            $casa->setDormitorio($fila['dormitorio']);
            $casa->setBanio($fila['banio']);
            $casa->setPrecioKit($fila['precioKit']);
            $casa->setPrecioKitPisoMadera($fila['precioKitPisoMadera']);
            $casa->setPrecioKitPisoMaderaInstalado($fila['precioKitPisoMaderaInstalado']);
            $casa->setPrecioKitPisoRadierInstalado($fila['precioKitPisoRadierInstalado']);
            $casas[$i] = $casa;
            $i++;
        }
        $this->conexion->desconectar();
        return $casas;
    }

    public function findByID($idCasa) {
        $this->conexion->conectar();
        $query = "SELECT * FROM casa WHERE  idCasa =  ".$idCasa." ";
        $result = $this->conexion->ejecutar($query);
        $casa = new CasaDTO();
        while ($fila = mysql_fetch_assoc($result)) {
            $casa->setIdCasa($fila['idCasa']);
            $casa->setNombreModelo($fila['nombreModelo']);
            $casa->setPrecio($fila['precio']);
            $casa->setM2($fila['m2']);
            $casa->setDormitorio($fila['dormitorio']);
            $casa->setBanio($fila['banio']);
            $casa->setPrecioKit($fila['precioKit']);
            $casa->setPrecioKitPisoMadera($fila['precioKitPisoMadera']);
            $casa->setPrecioKitPisoMaderaInstalado($fila['precioKitPisoMaderaInstalado']);
            $casa->setPrecioKitPisoRadierInstalado($fila['precioKitPisoRadierInstalado']);
        }
        $this->conexion->desconectar();
        return $casa;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM casa WHERE  upper(idCasa) LIKE upper(".$cadena.")  OR  upper(nombreModelo) LIKE upper('".$cadena."')  OR  upper(precio) LIKE upper(".$cadena.")  OR  upper(m2) LIKE upper(".$cadena.")  OR  upper(dormitorio) LIKE upper(".$cadena.")  OR  upper(banio) LIKE upper(".$cadena.")  OR  upper(precioKit) LIKE upper(".$cadena.")  OR  upper(precioKitPisoMadera) LIKE upper(".$cadena.")  OR  upper(precioKitPisoMaderaInstalado) LIKE upper(".$cadena.")  OR  upper(precioKitPisoRadierInstalado) LIKE upper(".$cadena.") ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $casas = array();
        while ($fila = mysql_fetch_assoc($result)) {
            $casa = new CasaDTO();
            $casa->setIdCasa($fila['idCasa']);
            $casa->setNombreModelo($fila['nombreModelo']);
            $casa->setPrecio($fila['precio']);
            $casa->setM2($fila['m2']);
            $casa->setDormitorio($fila['dormitorio']);
            $casa->setBanio($fila['banio']);
            $casa->setPrecioKit($fila['precioKit']);
            $casa->setPrecioKitPisoMadera($fila['precioKitPisoMadera']);
            $casa->setPrecioKitPisoMaderaInstalado($fila['precioKitPisoMaderaInstalado']);
            $casa->setPrecioKitPisoRadierInstalado($fila['precioKitPisoRadierInstalado']);
            $casas[$i] = $casa;
            $i++;
        }
        $this->conexion->desconectar();
        return $casas;
    }

    public function save($casa) {
        $this->conexion->conectar();
        $query = "INSERT INTO casa (idCasa,nombreModelo,precio,m2,dormitorio,banio,precioKit,precioKitPisoMadera,precioKitPisoMaderaInstalado,precioKitPisoRadierInstalado)"
                . " VALUES ( ".$casa->getIdCasa()." , '".$casa->getNombreModelo()."' ,  ".$casa->getPrecio()." ,  ".$casa->getM2()." ,  ".$casa->getDormitorio()." ,  ".$casa->getBanio()." ,  ".$casa->getPrecioKit()." ,  ".$casa->getPrecioKitPisoMadera()." ,  ".$casa->getPrecioKitPisoMaderaInstalado()." ,  ".$casa->getPrecioKitPisoRadierInstalado()." )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($casa) {
        $this->conexion->conectar();
        $query = "UPDATE casa SET "
                . "  nombreModelo = '".$casa->getNombreModelo()."' ,"
                . "  precio =  ".$casa->getPrecio()." ,"
                . "  m2 =  ".$casa->getM2()." ,"
                . "  dormitorio =  ".$casa->getDormitorio()." ,"
                . "  banio =  ".$casa->getBanio()." ,"
                . "  precioKit =  ".$casa->getPrecioKit()." ,"
                . "  precioKitPisoMadera =  ".$casa->getPrecioKitPisoMadera()." ,"
                . "  precioKitPisoMaderaInstalado =  ".$casa->getPrecioKitPisoMaderaInstalado()." ,"
                . "  precioKitPisoRadierInstalado =  ".$casa->getPrecioKitPisoRadierInstalado()." "
                . " WHERE  idCasa =  ".$casa->getIdCasa()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}