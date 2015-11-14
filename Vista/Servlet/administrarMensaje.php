<?php

include_once '../../Controlador/Sistema.php';

$control = Sistema::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $mensajes = $control->getAllMensajes();
        $json = json_encode($mensajes);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $nombre = htmlspecialchars($_REQUEST['nombre']);
        $email = htmlspecialchars($_REQUEST['email']);
        $fono = htmlspecialchars($_REQUEST['telefono']);
        $asunto = htmlspecialchars($_REQUEST['asunto']);
        $detalle = htmlspecialchars($_REQUEST['detalle']);

        $mensaje = new MensajeDTO();
        $mensaje->setNombre($nombre);
        $mensaje->setEmail($email);
        $mensaje->setFono($fono);
        $mensaje->setAsunto($asunto);
        $mensaje->setMensaje($detalle);
        $mensaje->setVisto(0);

        $result = $control->addMensaje($mensaje);

        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Mensaje enviado correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BORRAR") {
        $idMensaje = htmlspecialchars($_REQUEST['idMensaje']);

        $result = $control->removeMensaje($idMensaje);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Mensaje borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $mensajes = $control->getMensajeLikeAtrr($cadena);
        $json = json_encode($mensajes);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idMensaje = htmlspecialchars($_REQUEST['idMensaje']);

        $mensaje = $control->getMensajeByID($idMensaje);
        $json = json_encode($mensaje);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idMensaje = htmlspecialchars($_REQUEST['idMensaje']);
        $nombre = htmlspecialchars($_REQUEST['nombre']);
        $email = htmlspecialchars($_REQUEST['email']);
        $fono = htmlspecialchars($_REQUEST['fono']);
        $asunto = htmlspecialchars($_REQUEST['asunto']);
        $mensaje = htmlspecialchars($_REQUEST['mensaje']);
        $visto = htmlspecialchars($_REQUEST['visto']);

        $mensaje = new MensajeDTO();
        $mensaje->setIdMensaje($idMensaje);
        $mensaje->setNombre($nombre);
        $mensaje->setEmail($email);
        $mensaje->setFono($fono);
        $mensaje->setAsunto($asunto);
        $mensaje->setMensaje($mensaje);
        $mensaje->setVisto($visto);

        $result = $control->updateMensaje($mensaje);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Mensaje actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "MARCAR_VISTO") {
        $idMensaje = htmlspecialchars($_REQUEST['idMensaje']);

        $mensaje = $control->getMensajeByID($idMensaje);
        $mensaje->setVisto(1);

        $result = $control->updateMensaje($mensaje);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Mensaje actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "N_NUEVOS_MENSAJES") { {
            $cantidad = $control->getCantidadNuevosMensajes();
            echo json_encode(array(
                'success' => true,
                'cantidad' => $cantidad
            ));
        }
    }
}
    