<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/EmpresaDTO.php';

class EmpresaDAO{
    private $conexion;

    public function EmpresaDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idEmpresa) {
        $this->conexion->conectar();
        $query = "DELETE FROM empresa WHERE  idEmpresa =  ".$idEmpresa." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM empresa";
        $result = $this->conexion->ejecutar($query);
        
        $empresa = new EmpresaDTO();
        while ($fila = mysql_fetch_assoc($result)) {
            $empresa->setIdEmpresa($fila['idEmpresa']);
            $empresa->setDireccion($fila['direccion']);
            $empresa->setTelefono($fila['telefono']);
            $empresa->setQuienesSomos($fila['quienesSomos']);
            $empresa->setRutaImagen($fila['rutaImagen']);
            $empresa->setNombreImagen($fila['nombreImagen']);
            $empresa->setDescripcionUbicacion($fila['descripcionUbicacion']);
            $empresa->setLatitud($fila['latitud']);
            $empresa->setLongitud($fila['longitud']);
            $empresa->setZoom($fila['zoom']);
        }
        $this->conexion->desconectar();
        return $empresa;
    }

    public function findByID($idEmpresa) {
        $this->conexion->conectar();
        $query = "SELECT * FROM empresa WHERE  idEmpresa =  ".$idEmpresa." ";
        $result = $this->conexion->ejecutar($query);
        $empresa = new EmpresaDTO();
        while ($fila = mysql_fetch_assoc($result)) {
            $empresa->setIdEmpresa($fila['idEmpresa']);
            $empresa->setDireccion($fila['direccion']);
            $empresa->setTelefono($fila['telefono']);
            $empresa->setQuienesSomos($fila['quienesSomos']);
            $empresa->setRutaImagen($fila['rutaImagen']);
            $empresa->setNombreImagen($fila['nombreImagen']);
            $empresa->setDescripcionUbicacion($fila['descripcionUbicacion']);
            $empresa->setLatitud($fila['latitud']);
            $empresa->setLongitud($fila['longitud']);
            $empresa->setZoom($fila['zoom']);
        }
        $this->conexion->desconectar();
        return $empresa;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM empresa WHERE  upper(idEmpresa) LIKE upper(".$cadena.")  OR  upper(direccion) LIKE upper('".$cadena."')  OR  upper(telefono) LIKE upper(".$cadena.")  OR  upper(quienesSomos) LIKE upper('".$cadena."')  OR  upper(rutaImagen) LIKE upper('".$cadena."')  OR  upper(nombreImagen) LIKE upper('".$cadena."')  OR  upper(descripcionUbicacion) LIKE upper('".$cadena."')  OR  upper(latitud) LIKE upper(".$cadena.")  OR  upper(longitud) LIKE upper(".$cadena.")  OR  upper(zoom) LIKE upper(".$cadena.") ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $empresas = array();
        while ($fila = mysql_fetch_assoc($result)) {
            $empresa = new EmpresaDTO();
            $empresa->setIdEmpresa($fila['idEmpresa']);
            $empresa->setDireccion($fila['direccion']);
            $empresa->setTelefono($fila['telefono']);
            $empresa->setQuienesSomos($fila['quienesSomos']);
            $empresa->setRutaImagen($fila['rutaImagen']);
            $empresa->setNombreImagen($fila['nombreImagen']);
            $empresa->setDescripcionUbicacion($fila['descripcionUbicacion']);
            $empresa->setLatitud($fila['latitud']);
            $empresa->setLongitud($fila['longitud']);
            $empresa->setZoom($fila['zoom']);
            $empresas[$i] = $empresa;
            $i++;
        }
        $this->conexion->desconectar();
        return $empresas;
    }

    public function save($empresa) {
        $this->conexion->conectar();
        $query = "INSERT INTO empresa (idEmpresa,direccion,telefono,quienesSomos,rutaImagen,nombreImagen,descripcionUbicacion,latitud,longitud,zoom)"
                . " VALUES ( ".$empresa->getIdEmpresa()." , '".$empresa->getDireccion()."' ,  ".$empresa->getTelefono()." , '".$empresa->getQuienesSomos()."' , '".$empresa->getRutaImagen()."' , '".$empresa->getNombreImagen()."' , '".$empresa->getDescripcionUbicacion()."' , ".$empresa->getLatitud()." , ".$empresa->getLongitud()." ,  ".$empresa->getZoom()." )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($empresa) {
        $this->conexion->conectar();
        $query = "UPDATE empresa SET "
                . "  direccion = '".$empresa->getDireccion()."' ,"
                . "  telefono =  ".$empresa->getTelefono()." ,"
                . "  quienesSomos = '".$empresa->getQuienesSomos()."' ,"
                . "  rutaImagen = '".$empresa->getRutaImagen()."' ,"
                . "  nombreImagen = '".$empresa->getNombreImagen()."' ,"
                . "  descripcionUbicacion = '".$empresa->getDescripcionUbicacion()."' ,"
                . "  latitud = ".$empresa->getLatitud()." ,"
                . "  longitud = ".$empresa->getLongitud()." ,"
                . "  zoom =  ".$empresa->getZoom()." "
                . " WHERE  idEmpresa =  ".$empresa->getIdEmpresa()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}