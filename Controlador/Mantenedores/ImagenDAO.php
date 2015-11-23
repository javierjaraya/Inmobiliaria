<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/ImagenDTO.php';

class ImagenDAO{
    private $conexion;

    public function ImagenDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idImagen) {
        $this->conexion->conectar();
        $query = "DELETE FROM imagen WHERE  idImagen =  ".$idImagen." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM imagen";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $imagens = array();
        while ($fila = mysql_fetch_assoc($result)) {
            $imagen = new ImagenDTO();
            $imagen->setIdImagen($fila['idImagen']);
            $imagen->setIdCasa($fila['idCasa']);
            $imagen->setImagenPrincipal($fila['imagenPrincipal']);
            $imagen->setNombreImagen($fila['nombreImagen']);
            $imagen->setRutaImagen($fila['rutaImagen']);
            $imagen->setTamaño($fila['tamanio']);
            $imagens[$i] = $imagen;
            $i++;
        }
        $this->conexion->desconectar();
        return $imagens;
    }

    public function findByID($idImagen) {
        $this->conexion->conectar();
        $query = "SELECT * FROM imagen WHERE  idImagen =  ".$idImagen." ";
        $result = $this->conexion->ejecutar($query);
        $imagen = new ImagenDTO();
        while ($fila = mysql_fetch_assoc($result)) {
            $imagen->setIdImagen($fila['idImagen']);
            $imagen->setIdCasa($fila['idCasa']);
            $imagen->setImagenPrincipal($fila['imagenPrincipal']);
            $imagen->setNombreImagen($fila['nombreImagen']);
            $imagen->setRutaImagen($fila['rutaImagen']);
            $imagen->setTamaño($fila['tamanio']);
        }
        $this->conexion->desconectar();
        return $imagen;
    }

    public function findByIDCasa($idCasa) {
        $this->conexion->conectar();
        $query = "SELECT * FROM imagen WHERE  idCasa =  ".$idCasa." ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $imagens = array();        
        while ($fila = mysql_fetch_assoc($result)) {
            $imagen = new ImagenDTO();
            $imagen->setIdImagen($fila['idImagen']);
            $imagen->setIdCasa($fila['idCasa']);
            $imagen->setImagenPrincipal($fila['imagenPrincipal']);
            $imagen->setNombreImagen($fila['nombreImagen']);
            $imagen->setRutaImagen($fila['rutaImagen']);
            $imagen->setTamaño($fila['tamanio']);
            $imagens[$i] = $imagen;
            $i++;
        }
        $this->conexion->desconectar();
        return $imagens;
    }
    
    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM imagen WHERE  upper(idImagen) LIKE upper(".$cadena.")  OR  upper(idCasa) LIKE upper(".$cadena.")  OR  upper(imagenPrincipal) LIKE upper(".$cadena.")  OR  upper(nombreImagen) LIKE upper('".$cadena."')  OR  upper(rutaImagen) LIKE upper('".$cadena."') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $imagens = array();
        while ($fila = mysql_fetch_assoc($result)) {
            $imagen = new ImagenDTO();
            $imagen->setIdImagen($fila['idImagen']);
            $imagen->setIdCasa($fila['idCasa']);
            $imagen->setImagenPrincipal($fila['imagenPrincipal']);
            $imagen->setNombreImagen($fila['nombreImagen']);
            $imagen->setRutaImagen($fila['rutaImagen']);
            $imagen->setTamaño($fila['tamanio']);
            $imagens[$i] = $imagen;
            $i++;
        }
        $this->conexion->desconectar();
        return $imagens;
    }

    public function save($imagen) {
        $this->conexion->conectar();
        $query = "INSERT INTO imagen (idCasa,imagenPrincipal,nombreImagen,rutaImagen,tamanio)"
                . " VALUES (".$imagen->getIdCasa()." ,  ".$imagen->getImagenPrincipal()." , '".$imagen->getNombreImagen()."' , '".$imagen->getRutaImagen()."' , '".$imagen->getTamaño()."' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($imagen) {
        $this->conexion->conectar();
        $query = "UPDATE imagen SET "
                . "  idCasa =  ".$imagen->getIdCasa()." ,"
                . "  imagenPrincipal =  ".$imagen->getImagenPrincipal()." ,"
                . "  nombreImagen = '".$imagen->getNombreImagen()."' ,"
                . "  rutaImagen = '".$imagen->getRutaImagen()."' ,"
                . "  tamanio = '".$imagen->getTamaño()."' "
                . " WHERE  idImagen =  ".$imagen->getIdImagen()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}