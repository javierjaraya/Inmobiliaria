<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/EspecificacionDTO.php';

class EspecificacionDAO{
    private $conexion;

    public function EspecificacionDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idEspecificacion) {
        $this->conexion->conectar();
        $query = "DELETE FROM especificacion WHERE  idEspecificacion =  ".$idEspecificacion." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM especificacion";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $especificacions = array();
        while ($fila = mysql_fetch_assoc($result)) {
            $especificacion = new EspecificacionDTO();
            $especificacion->setIdEspecificacion($fila['idEspecificacion']);
            $especificacion->setTitulo($fila['titulo']);
            $especificacion->setDescripcion($fila['descripcion']);
            $especificacion->setIdCasa($fila['idCasa']);
            $especificacions[$i] = $especificacion;
            $i++;
        }
        $this->conexion->desconectar();
        return $especificacions;
    }

    public function findByID($idEspecificacion) {
        $this->conexion->conectar();
        $query = "SELECT * FROM especificacion WHERE  idEspecificacion =  ".$idEspecificacion." ";
        $result = $this->conexion->ejecutar($query);
        $especificacion = new EspecificacionDTO();
        while ($fila = mysql_fetch_assoc($result)) {
            $especificacion->setIdEspecificacion($fila['idEspecificacion']);
            $especificacion->setTitulo($fila['titulo']);
            $especificacion->setDescripcion($fila['descripcion']);
            $especificacion->setIdCasa($fila['idCasa']);
        }
        $this->conexion->desconectar();
        return $especificacion;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM especificacion WHERE  upper(idEspecificacion) LIKE upper(".$cadena.")  OR  upper(titulo) LIKE upper('".$cadena."')  OR  upper(descripcion) LIKE upper('".$cadena."')  OR  upper(idCasa) LIKE upper(".$cadena.") ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $especificacions = array();
        while ($fila = mysql_fetch_assoc($result)) {
            $especificacion = new EspecificacionDTO();
            $especificacion->setIdEspecificacion($fila['idEspecificacion']);
            $especificacion->setTitulo($fila['titulo']);
            $especificacion->setDescripcion($fila['descripcion']);
            $especificacion->setIdCasa($fila['idCasa']);
            $especificacions[$i] = $especificacion;
            $i++;
        }
        $this->conexion->desconectar();
        return $especificacions;
    }

    public function save($especificacion) {
        $this->conexion->conectar();
        $query = "INSERT INTO especificacion (idEspecificacion,titulo,descripcion,idCasa)"
                . " VALUES ( ".$especificacion->getIdEspecificacion()." , '".$especificacion->getTitulo()."' , '".$especificacion->getDescripcion()."' ,  ".$especificacion->getIdCasa()." )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($especificacion) {
        $this->conexion->conectar();
        $query = "UPDATE especificacion SET "
                . "  titulo = '".$especificacion->getTitulo()."' ,"
                . "  descripcion = '".$especificacion->getDescripcion()."' ,"
                . "  idCasa =  ".$especificacion->getIdCasa()." "
                . " WHERE  idEspecificacion =  ".$especificacion->getIdEspecificacion()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}