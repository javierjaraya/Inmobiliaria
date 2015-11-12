<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/UsuarioDTO.php';

class UsuarioDAO{
    private $conexion;

    public function UsuarioDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($run) {
        $this->conexion->conectar();
        $query = "DELETE FROM usuario WHERE  run = '".$run."' ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM usuario";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $usuarios = array();
        while ($fila = mysql_fetch_assoc($result)) {
            $usuario = new UsuarioDTO();
            $usuario->setRun($fila['run']);
            $usuario->setClave($fila['clave']);
            $usuario->setIdPerfil($fila['idPerfil']);
            $usuarios[$i] = $usuario;
            $i++;
        }
        $this->conexion->desconectar();
        return $usuarios;
    }

    public function findByID($run) {
        $this->conexion->conectar();
        $query = "SELECT * FROM usuario WHERE  run = '".$run."' ";
        $result = $this->conexion->ejecutar($query);
        $usuario = new UsuarioDTO();
        while ($fila = mysql_fetch_assoc($result)) {
            $usuario->setRun($fila['run']);
            $usuario->setClave($fila['clave']);
            $usuario->setIdPerfil($fila['idPerfil']);
        }
        $this->conexion->desconectar();
        return $usuario;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM usuario WHERE  upper(run) LIKE upper('".$cadena."')  OR  upper(clave) LIKE upper('".$cadena."')  OR  upper(idPerfil) LIKE upper(".$cadena.") ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $usuarios = array();
        while ($fila = mysql_fetch_assoc($result)) {
            $usuario = new UsuarioDTO();
            $usuario->setRun($fila['run']);
            $usuario->setClave($fila['clave']);
            $usuario->setIdPerfil($fila['idPerfil']);
            $usuarios[$i] = $usuario;
            $i++;
        }
        $this->conexion->desconectar();
        return $usuarios;
    }

    public function save($usuario) {
        $this->conexion->conectar();
        $query = "INSERT INTO usuario (run,clave,idPerfil)"
                . " VALUES ('".$usuario->getRun()."' , '".$usuario->getClave()."' ,  ".$usuario->getIdPerfil()." )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($usuario) {
        $this->conexion->conectar();
        $query = "UPDATE usuario SET "
                . "  clave = '".$usuario->getClave()."' ,"
                . "  idPerfil =  ".$usuario->getIdPerfil()." "
                . " WHERE  run = '".$usuario->getRun()."' ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}