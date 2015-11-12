<?php

include_once '../../Controlador/Sistema.php';

$control = Sistema::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $consultas = $control->getAllConsultas();
        $json = json_encode($consultas);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $idConsulta = htmlspecialchars($_REQUEST['idConsulta']);
        $nombre = htmlspecialchars($_REQUEST['nombre']);
        $fono = htmlspecialchars($_REQUEST['fono']);
        $email = htmlspecialchars($_REQUEST['email']);
        $consulta = htmlspecialchars($_REQUEST['consulta']);
        $fecha = htmlspecialchars($_REQUEST['fecha']);
        $visto = htmlspecialchars($_REQUEST['visto']);
        $idCasa = htmlspecialchars($_REQUEST['idCasa']);

        $object = $control->getConsultaByID($idConsulta);
        if (($object->getIdConsulta() == null || $object->getIdConsulta() == "")) {
            $consulta = new ConsultaDTO();
            $consulta->setIdConsulta($idConsulta);
            $consulta->setNombre($nombre);
            $consulta->setFono($fono);
            $consulta->setEmail($email);
            $consulta->setConsulta($consulta);
            $consulta->setFecha($fecha);
            $consulta->setVisto($visto);
            $consulta->setIdCasa($idCasa);

            $result = $control->addConsulta($consulta);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Consulta ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la consulta ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $idConsulta = htmlspecialchars($_REQUEST['idConsulta']);

        $result = $control->removeConsulta($idConsulta);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Consulta borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $consultas = $control->getConsultaLikeAtrr($cadena);
        $json = json_encode($consultas);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idConsulta = htmlspecialchars($_REQUEST['idConsulta']);

        $consulta = $control->getConsultaByID($idConsulta);
        $json = json_encode($consulta);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idConsulta = htmlspecialchars($_REQUEST['idConsulta']);
        $nombre = htmlspecialchars($_REQUEST['nombre']);
        $fono = htmlspecialchars($_REQUEST['fono']);
        $email = htmlspecialchars($_REQUEST['email']);
        $consulta = htmlspecialchars($_REQUEST['consulta']);
        $fecha = htmlspecialchars($_REQUEST['fecha']);
        $visto = htmlspecialchars($_REQUEST['visto']);
        $idCasa = htmlspecialchars($_REQUEST['idCasa']);

            $consulta = new ConsultaDTO();
            $consulta->setIdConsulta($idConsulta);
            $consulta->setNombre($nombre);
            $consulta->setFono($fono);
            $consulta->setEmail($email);
            $consulta->setConsulta($consulta);
            $consulta->setFecha($fecha);
            $consulta->setVisto($visto);
            $consulta->setIdCasa($idCasa);

        $result = $control->updateConsulta($consulta);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Consulta actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
