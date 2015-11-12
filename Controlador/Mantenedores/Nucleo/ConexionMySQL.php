<?php

include_once ("Configuracion.php");

class ConexionMySQL {
    private $host;
    private $db;
    private $user;
    private $password;
    private $puerto;
    private $conexion;
    private $configuracion;

    function __construct() {
        $this->configuracion = new Configuracion();
        $this->user = $this->configuracion->user;
        $this->password = $this->configuracion->password;
        $this->host = $this->configuracion->host;
        $this->db = $this->configuracion->db;
        $this->puerto = $this->configuracion->puerto;
    }

    public function conectar() {
        if ($this->puerto != "") {
            $this->conexion = mysql_connect($this->host.":".$this->puerto, $this->user, $this->password)
                    or die('No se pudo conectar: ' . mysql_error());
        }else{
            $this->conexion = mysql_connect($this->host, $this->user, $this->password)
                    or die('No se pudo conectar: ' . mysql_error());
        }
        mysql_select_db($this->db) or die('No se pudo seleccionar la base de datos');
    }

    public function desconectar() {
        mysql_close($this->conexion)or die('Consulta fallida : '.  mysql_error());
    }

    public function ejecutar($strComando) {
        try {
             $result = mysql_query($strComando);
            return $result;
        } catch (PDOException $ex) {
            throw $ex;
        }
    }
}
?>