<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/BannerDTO.php';

class BannerDAO{
    private $conexion;

    public function BannerDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idImagen) {
        $this->conexion->conectar();
        $query = "DELETE FROM banner WHERE  idImagen =  ".$idImagen." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM banner";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $banners = array();
        while ($fila = mysql_fetch_assoc($result)) {
            $banner = new BannerDTO();
            $banner->setIdImagen($fila['idImagen']);
            $banner->setNombre($fila['nombre']);
            $banner->setRuta($fila['ruta']);
            $banner->setDetalle($fila['detalle']);
            $banners[$i] = $banner;
            $i++;
        }
        $this->conexion->desconectar();
        return $banners;
    }

    public function findByID($idImagen) {
        $this->conexion->conectar();
        $query = "SELECT * FROM banner WHERE  idImagen =  ".$idImagen." ";
        $result = $this->conexion->ejecutar($query);
        $banner = new BannerDTO();
        while ($fila = mysql_fetch_assoc($result)) {
            $banner->setIdImagen($fila['idImagen']);
            $banner->setNombre($fila['nombre']);
            $banner->setRuta($fila['ruta']);
            $banner->setDetalle($fila['detalle']);
        }
        $this->conexion->desconectar();
        return $banner;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM banner WHERE  upper(idImagen) LIKE upper(".$cadena.")  OR  upper(nombre) LIKE upper('".$cadena."')  OR  upper(ruta) LIKE upper('".$cadena."')  OR  upper(detalle) LIKE upper('".$cadena."') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $banners = array();
        while ($fila = mysql_fetch_assoc($result)) {
            $banner = new BannerDTO();
            $banner->setIdImagen($fila['idImagen']);
            $banner->setNombre($fila['nombre']);
            $banner->setRuta($fila['ruta']);
            $banner->setDetalle($fila['detalle']);
            $banners[$i] = $banner;
            $i++;
        }
        $this->conexion->desconectar();
        return $banners;
    }

    public function save($banner) {
        $this->conexion->conectar();
        $query = "INSERT INTO banner (nombre,ruta,detalle)"
                . " VALUES ('".$banner->getNombre()."' , '".$banner->getRuta()."' , '".$banner->getDetalle()."' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($banner) {
        $this->conexion->conectar();
        $query = "UPDATE banner SET "
                . "  nombre = '".$banner->getNombre()."' ,"
                . "  ruta = '".$banner->getRuta()."' ,"
                . "  detalle = '".$banner->getDetalle()."' "
                . " WHERE  idImagen =  ".$banner->getIdImagen()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}