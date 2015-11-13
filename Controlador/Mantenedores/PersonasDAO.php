<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/PersonasDTO.php';

class PersonasDAO{
    private $conexion;

    public function PersonasDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($run) {
        $this->conexion->conectar();
        $query = "DELETE FROM personas WHERE  run = '".$run."' ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM personas P JOIN usuario U ON P.run = U.run JOIN perfil PE ON U.idPerfil = PE.idPerfil";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $personass = array();
        while ($fila = mysql_fetch_assoc($result)) {
            $personas = new PersonasDTO();
            $personas->setRun($fila['run']);
            $personas->setNombres($fila['nombres']);
            $personas->setApellidos($fila['apellidos']);
            $personas->setSexo($fila['sexo']);
            $personas->setTelefono($fila['telefono']);
            $personas->setFechaNac($fila['fechaNac']);
            $personas->setDireccion($fila['direccion']);
            $personas->setEmail($fila['email']);
            $personas->setClave($fila['clave']);
            $personas->setIdPerfil($fila['idPerfil']);
            $personas->setNombrePerfil($fila['nombre']);
            $personass[$i] = $personas;
            $i++;
        }
        $this->conexion->desconectar();
        return $personass;
    }

    public function findByID($run) {
        $this->conexion->conectar();
        $query = "SELECT * FROM personas P JOIN usuario U ON P.run = U.run JOIN perfil PE ON U.idPerfil = PE.idPerfil WHERE  P.run = '".$run."' ";
        $result = $this->conexion->ejecutar($query);
        $personas = new PersonasDTO();
        while ($fila = mysql_fetch_assoc($result)) {
            $personas->setRun($fila['run']);
            $personas->setNombres($fila['nombres']);
            $personas->setApellidos($fila['apellidos']);
            $personas->setSexo($fila['sexo']);
            $personas->setTelefono($fila['telefono']);
            $personas->setFechaNac($fila['fechaNac']);
            $personas->setDireccion($fila['direccion']);
            $personas->setEmail($fila['email']);
            $personas->setClave($fila['clave']);
            $personas->setIdPerfil($fila['idPerfil']);
            $personas->setNombrePerfil($fila['nombre']);
        }
        $this->conexion->desconectar();
        return $personas;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM personas P JOIN usuario U ON P.run = U.run JOIN perfil PE ON U.idPerfil = PE.idPerfil WHERE  upper(P.run) LIKE upper('".$cadena."')  OR  upper(P.nombres) LIKE upper('".$cadena."')  OR  upper(P.apellidos) LIKE upper('".$cadena."')  OR  upper(P.sexo) LIKE upper('".$cadena."')  OR  upper(P.telefono) LIKE upper(".$cadena.")  OR  upper(P.fechaNac) LIKE upper('".$cadena."')  OR  upper(P.direccion) LIKE upper('".$cadena."') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $personass = array();
        while ($fila = mysql_fetch_assoc($result)) {
            $personas = new PersonasDTO();
            $personas->setRun($fila['run']);
            $personas->setNombres($fila['nombres']);
            $personas->setApellidos($fila['apellidos']);
            $personas->setSexo($fila['sexo']);
            $personas->setTelefono($fila['telefono']);
            $personas->setFechaNac($fila['fechaNac']);
            $personas->setDireccion($fila['direccion']);
            $personas->setEmail($fila['email']);
            $personas->setClave($fila['clave']);
            $personas->setIdPerfil($fila['idPerfil']);
            $personas->setNombrePerfil($fila['nombre']);
            $personass[$i] = $personas;
            $i++;
        }
        $this->conexion->desconectar();
        return $personass;
    }

    public function save($personas) {
        $this->conexion->conectar();
        $query = "INSERT INTO personas (run,nombres,apellidos,sexo,telefono,fechaNac,direccion,email)"
                . " VALUES ('".$personas->getRun()."' , '".$personas->getNombres()."' , '".$personas->getApellidos()."' , '".$personas->getSexo()."' ,  ".$personas->getTelefono()." , '".$personas->getFechaNac()."' , '".$personas->getDireccion()."', '".$personas->getEmail()."' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($personas) {
        $this->conexion->conectar();
        $query = "UPDATE personas SET "
                . "  nombres = '".$personas->getNombres()."' ,"
                . "  apellidos = '".$personas->getApellidos()."' ,"
                . "  sexo = '".$personas->getSexo()."' ,"
                . "  telefono =  ".$personas->getTelefono()." ,"
                . "  fechaNac = '".$personas->getFechaNac()."' ,"
                . "  direccion = '".$personas->getDireccion()."' ,"
                . "  email = '".$personas->getEmail()."' "
                . " WHERE  run = '".$personas->getRun()."' ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}