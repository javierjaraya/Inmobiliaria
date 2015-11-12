<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/ConsultaDTO.php';

class ConsultaDAO{
    private $conexion;

    public function ConsultaDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idConsulta) {
        $this->conexion->conectar();
        $query = "DELETE FROM consulta WHERE  idConsulta =  ".$idConsulta." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM consulta";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $consultas = array();
        while ($fila = mysql_fetch_assoc($result)) {
            $consulta = new ConsultaDTO();
            $consulta->setIdConsulta($fila['idConsulta']);
            $consulta->setNombre($fila['nombre']);
            $consulta->setFono($fila['fono']);
            $consulta->setEmail($fila['email']);
            $consulta->setConsulta($fila['consulta']);
            $consulta->setFecha($fila['fecha']);
            $consulta->setVisto($fila['visto']);
            $consulta->setIdCasa($fila['idCasa']);
            $consultas[$i] = $consulta;
            $i++;
        }
        $this->conexion->desconectar();
        return $consultas;
    }

    public function findByID($idConsulta) {
        $this->conexion->conectar();
        $query = "SELECT * FROM consulta WHERE  idConsulta =  ".$idConsulta." ";
        $result = $this->conexion->ejecutar($query);
        $consulta = new ConsultaDTO();
        while ($fila = mysql_fetch_assoc($result)) {
            $consulta->setIdConsulta($fila['idConsulta']);
            $consulta->setNombre($fila['nombre']);
            $consulta->setFono($fila['fono']);
            $consulta->setEmail($fila['email']);
            $consulta->setConsulta($fila['consulta']);
            $consulta->setFecha($fila['fecha']);
            $consulta->setVisto($fila['visto']);
            $consulta->setIdCasa($fila['idCasa']);
        }
        $this->conexion->desconectar();
        return $consulta;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM consulta WHERE  upper(idConsulta) LIKE upper(".$cadena.")  OR  upper(nombre) LIKE upper('".$cadena."')  OR  upper(fono) LIKE upper(".$cadena.")  OR  upper(email) LIKE upper('".$cadena."')  OR  upper(consulta) LIKE upper('".$cadena."')  OR  upper(fecha) LIKE upper('".$cadena."')  OR  upper(visto) LIKE upper(".$cadena.")  OR  upper(idCasa) LIKE upper(".$cadena.") ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $consultas = array();
        while ($fila = mysql_fetch_assoc($result)) {
            $consulta = new ConsultaDTO();
            $consulta->setIdConsulta($fila['idConsulta']);
            $consulta->setNombre($fila['nombre']);
            $consulta->setFono($fila['fono']);
            $consulta->setEmail($fila['email']);
            $consulta->setConsulta($fila['consulta']);
            $consulta->setFecha($fila['fecha']);
            $consulta->setVisto($fila['visto']);
            $consulta->setIdCasa($fila['idCasa']);
            $consultas[$i] = $consulta;
            $i++;
        }
        $this->conexion->desconectar();
        return $consultas;
    }

    public function save($consulta) {
        $this->conexion->conectar();
        $query = "INSERT INTO consulta (idConsulta,nombre,fono,email,consulta,fecha,visto,idCasa)"
                . " VALUES ( ".$consulta->getIdConsulta()." , '".$consulta->getNombre()."' ,  ".$consulta->getFono()." , '".$consulta->getEmail()."' , '".$consulta->getConsulta()."' , '".$consulta->getFecha()."' ,  ".$consulta->getVisto()." ,  ".$consulta->getIdCasa()." )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($consulta) {
        $this->conexion->conectar();
        $query = "UPDATE consulta SET "
                . "  nombre = '".$consulta->getNombre()."' ,"
                . "  fono =  ".$consulta->getFono()." ,"
                . "  email = '".$consulta->getEmail()."' ,"
                . "  consulta = '".$consulta->getConsulta()."' ,"
                . "  fecha = '".$consulta->getFecha()."' ,"
                . "  visto =  ".$consulta->getVisto()." ,"
                . "  idCasa =  ".$consulta->getIdCasa()." "
                . " WHERE  idConsulta =  ".$consulta->getIdConsulta()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}