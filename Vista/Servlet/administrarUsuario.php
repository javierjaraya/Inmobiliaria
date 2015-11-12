<?php

include_once '../../Controlador/Sistema.php';

$control = Sistema::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $usuarios = $control->getAllUsuarios();
        $json = json_encode($usuarios);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $run = htmlspecialchars($_REQUEST['run']);
        $clave = htmlspecialchars($_REQUEST['clave']);
        $idPerfil = htmlspecialchars($_REQUEST['idPerfil']);

        $object = $control->getUsuarioByID($run);
        if (($object->getRun() == null || $object->getRun() == "")) {
            $usuario = new UsuarioDTO();
            $usuario->setRun($run);
            $usuario->setClave($clave);
            $usuario->setIdPerfil($idPerfil);

            $result = $control->addUsuario($usuario);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Usuario ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la usuario ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $run = htmlspecialchars($_REQUEST['run']);

        $result = $control->removeUsuario($run);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Usuario borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $usuarios = $control->getUsuarioLikeAtrr($cadena);
        $json = json_encode($usuarios);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $run = htmlspecialchars($_REQUEST['run']);

        $usuario = $control->getUsuarioByID($run);
        $json = json_encode($usuario);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $run = htmlspecialchars($_REQUEST['run']);
        $clave = htmlspecialchars($_REQUEST['clave']);
        $idPerfil = htmlspecialchars($_REQUEST['idPerfil']);

            $usuario = new UsuarioDTO();
            $usuario->setRun($run);
            $usuario->setClave($clave);
            $usuario->setIdPerfil($idPerfil);

        $result = $control->updateUsuario($usuario);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Usuario actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
