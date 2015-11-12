<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/PerfilDTO.php';

class PerfilDAO{
    private $conexion;

    public function PerfilDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idPerfil) {
        $this->conexion->conectar();
        $query = "DELETE FROM perfil WHERE  idPerfil =  ".$idPerfil." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM perfil";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $perfils = array();
        while ($fila = mysql_fetch_assoc($result)) {
            $perfil = new PerfilDTO();
            $perfil->setIdPerfil($fila['idPerfil']);
            $perfil->setNombre($fila['nombre']);
            $perfils[$i] = $perfil;
            $i++;
        }
        $this->conexion->desconectar();
        return $perfils;
    }

    public function findByID($idPerfil) {
        $this->conexion->conectar();
        $query = "SELECT * FROM perfil WHERE  idPerfil =  ".$idPerfil." ";
        $result = $this->conexion->ejecutar($query);
        $perfil = new PerfilDTO();
        while ($fila = mysql_fetch_assoc($result)) {
            $perfil->setIdPerfil($fila['idPerfil']);
            $perfil->setNombre($fila['nombre']);
        }
        $this->conexion->desconectar();
        return $perfil;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM perfil WHERE  upper(idPerfil) LIKE upper(".$cadena.")  OR  upper(nombre) LIKE upper('".$cadena."') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $perfils = array();
        while ($fila = mysql_fetch_assoc($result)) {
            $perfil = new PerfilDTO();
            $perfil->setIdPerfil($fila['idPerfil']);
            $perfil->setNombre($fila['nombre']);
            $perfils[$i] = $perfil;
            $i++;
        }
        $this->conexion->desconectar();
        return $perfils;
    }

    public function save($perfil) {
        $this->conexion->conectar();
        $query = "INSERT INTO perfil (idPerfil,nombre)"
                . " VALUES ( ".$perfil->getIdPerfil()." , '".$perfil->getNombre()."' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($perfil) {
        $this->conexion->conectar();
        $query = "UPDATE perfil SET "
                . "  nombre = '".$perfil->getNombre()."' "
                . " WHERE  idPerfil =  ".$perfil->getIdPerfil()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}