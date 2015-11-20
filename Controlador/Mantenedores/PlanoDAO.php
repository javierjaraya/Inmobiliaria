<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/PlanoDTO.php';

class PlanoDAO{
    private $conexion;

    public function PlanoDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idPlano) {
        $this->conexion->conectar();
        $query = "DELETE FROM plano WHERE  idPlano =  ".$idPlano." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM plano";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $planos = array();
        while ($fila = mysql_fetch_assoc($result)) {
            $plano = new PlanoDTO();
            $plano->setIdPlano($fila['idPlano']);
            $plano->setIdCasa($fila['idCasa']);
            $plano->setNombreImagen($fila['nombreImagen']);
            $plano->setRutaImagen($fila['rutaImagen']);
            $planos[$i] = $plano;
            $i++;
        }
        $this->conexion->desconectar();
        return $planos;
    }

    public function findByID($idPlano) {
        $this->conexion->conectar();
        $query = "SELECT * FROM plano WHERE  idPlano =  ".$idPlano." ";
        $result = $this->conexion->ejecutar($query);
        $plano = new PlanoDTO();
        while ($fila = mysql_fetch_assoc($result)) {
            $plano->setIdPlano($fila['idPlano']);
            $plano->setIdCasa($fila['idCasa']);
            $plano->setNombreImagen($fila['nombreImagen']);
            $plano->setRutaImagen($fila['rutaImagen']);
        }
        $this->conexion->desconectar();
        return $plano;
    }
    
    public function findByIDCasa($idCasa) {
        $this->conexion->conectar();
        $query = "SELECT * FROM plano WHERE idCasa =  ".$idCasa." ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $planos = array();
        while ($fila = mysql_fetch_assoc($result)) {
            $plano = new PlanoDTO();
            $plano->setIdPlano($fila['idPlano']);
            $plano->setIdCasa($fila['idCasa']);
            $plano->setNombreImagen($fila['nombreImagen']);
            $plano->setRutaImagen($fila['rutaImagen']);
            $planos[$i] = $plano;
            $i++;
        }
        $this->conexion->desconectar();
        return $planos;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM plano WHERE  upper(idPlano) LIKE upper(".$cadena.")  OR  upper(idCasa) LIKE upper(".$cadena.")  OR  upper(nombreImagen) LIKE upper('".$cadena."')  OR  upper(rutaImagen) LIKE upper('".$cadena."') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $planos = array();
        while ($fila = mysql_fetch_assoc($result)) {
            $plano = new PlanoDTO();
            $plano->setIdPlano($fila['idPlano']);
            $plano->setIdCasa($fila['idCasa']);
            $plano->setNombreImagen($fila['nombreImagen']);
            $plano->setRutaImagen($fila['rutaImagen']);
            $planos[$i] = $plano;
            $i++;
        }
        $this->conexion->desconectar();
        return $planos;
    }

    public function save($plano) {
        $this->conexion->conectar();
        $query = "INSERT INTO plano (idCasa,nombreImagen,rutaImagen)"
                . " VALUES (".$plano->getIdCasa()." , '".$plano->getNombreImagen()."' , '".$plano->getRutaImagen()."' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($plano) {
        $this->conexion->conectar();
        $query = "UPDATE plano SET "
                . "  idCasa =  ".$plano->getIdCasa()." ,"
                . "  nombreImagen = '".$plano->getNombreImagen()."' ,"
                . "  rutaImagen = '".$plano->getRutaImagen()."' "
                . " WHERE  idPlano =  ".$plano->getIdPlano()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}