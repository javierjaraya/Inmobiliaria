<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/MensajeDTO.php';

class MensajeDAO{
    private $conexion;

    public function MensajeDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idMensaje) {
        $this->conexion->conectar();
        $query = "DELETE FROM mensaje WHERE  idMensaje =  ".$idMensaje." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM mensaje";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $mensajes = array();
        while ($fila = mysql_fetch_assoc($result)) {
            $mensaje = new MensajeDTO();
            $mensaje->setIdMensaje($fila['idMensaje']);
            $mensaje->setNombre($fila['nombre']);
            $mensaje->setEmail($fila['email']);
            $mensaje->setFono($fila['fono']);
            $mensaje->setAsunto($fila['asunto']);
            $mensaje->setMensaje($fila['mensaje']);
            $mensaje->setVisto($fila['visto']);
            $mensajes[$i] = $mensaje;
            $i++;
        }
        $this->conexion->desconectar();
        return $mensajes;
    }

    public function findByID($idMensaje) {
        $this->conexion->conectar();
        $query = "SELECT * FROM mensaje WHERE  idMensaje =  ".$idMensaje." ";
        $result = $this->conexion->ejecutar($query);
        $mensaje = new MensajeDTO();
        while ($fila = mysql_fetch_assoc($result)) {
            $mensaje->setIdMensaje($fila['idMensaje']);
            $mensaje->setNombre($fila['nombre']);
            $mensaje->setEmail($fila['email']);
            $mensaje->setFono($fila['fono']);
            $mensaje->setAsunto($fila['asunto']);
            $mensaje->setMensaje($fila['mensaje']);
            $mensaje->setVisto($fila['visto']);
        }
        $this->conexion->desconectar();
        return $mensaje;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM mensaje WHERE  upper(idMensaje) LIKE upper(".$cadena.")  OR  upper(nombre) LIKE upper('".$cadena."')  OR  upper(email) LIKE upper('".$cadena."')  OR  upper(fono) LIKE upper(".$cadena.")  OR  upper(asunto) LIKE upper('".$cadena."')  OR  upper(mensaje) LIKE upper('".$cadena."')  OR  upper(visto) LIKE upper(".$cadena.") ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $mensajes = array();
        while ($fila = mysql_fetch_assoc($result)) {
            $mensaje = new MensajeDTO();
            $mensaje->setIdMensaje($fila['idMensaje']);
            $mensaje->setNombre($fila['nombre']);
            $mensaje->setEmail($fila['email']);
            $mensaje->setFono($fila['fono']);
            $mensaje->setAsunto($fila['asunto']);
            $mensaje->setMensaje($fila['mensaje']);
            $mensaje->setVisto($fila['visto']);
            $mensajes[$i] = $mensaje;
            $i++;
        }
        $this->conexion->desconectar();
        return $mensajes;
    }

    public function save($mensaje) {
        $this->conexion->conectar();
        $query = "INSERT INTO mensaje (idMensaje,nombre,email,fono,asunto,mensaje,visto)"
                . " VALUES ( ".$mensaje->getIdMensaje()." , '".$mensaje->getNombre()."' , '".$mensaje->getEmail()."' ,  ".$mensaje->getFono()." , '".$mensaje->getAsunto()."' , '".$mensaje->getMensaje()."' ,  ".$mensaje->getVisto()." )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($mensaje) {
        $this->conexion->conectar();
        $query = "UPDATE mensaje SET "
                . "  nombre = '".$mensaje->getNombre()."' ,"
                . "  email = '".$mensaje->getEmail()."' ,"
                . "  fono =  ".$mensaje->getFono()." ,"
                . "  asunto = '".$mensaje->getAsunto()."' ,"
                . "  mensaje = '".$mensaje->getMensaje()."' ,"
                . "  visto =  ".$mensaje->getVisto()." "
                . " WHERE  idMensaje =  ".$mensaje->getIdMensaje()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}