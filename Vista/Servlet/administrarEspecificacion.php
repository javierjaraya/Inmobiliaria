<?php

include_once '../../Controlador/Sistema.php';

$control = Sistema::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $especificacions = $control->getAllEspecificacions();
        $json = json_encode($especificacions);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $idEspecificacion = htmlspecialchars($_REQUEST['idEspecificacion']);
        $titulo = htmlspecialchars($_REQUEST['titulo']);
        $descripcion = htmlspecialchars($_REQUEST['descripcion']);
        $idCasa = htmlspecialchars($_REQUEST['idCasa']);

        $object = $control->getEspecificacionByID($idEspecificacion);
        if (($object->getIdEspecificacion() == null || $object->getIdEspecificacion() == "")) {
            $especificacion = new EspecificacionDTO();
            $especificacion->setIdEspecificacion($idEspecificacion);
            $especificacion->setTitulo($titulo);
            $especificacion->setDescripcion($descripcion);
            $especificacion->setIdCasa($idCasa);

            $result = $control->addEspecificacion($especificacion);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Especificacion ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la especificacion ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $idEspecificacion = htmlspecialchars($_REQUEST['idEspecificacion']);

        $result = $control->removeEspecificacion($idEspecificacion);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Especificacion borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $especificacions = $control->getEspecificacionLikeAtrr($cadena);
        $json = json_encode($especificacions);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idEspecificacion = htmlspecialchars($_REQUEST['idEspecificacion']);

        $especificacion = $control->getEspecificacionByID($idEspecificacion);
        $json = json_encode($especificacion);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idEspecificacion = htmlspecialchars($_REQUEST['idEspecificacion']);
        $titulo = htmlspecialchars($_REQUEST['titulo']);
        $descripcion = htmlspecialchars($_REQUEST['descripcion']);
        $idCasa = htmlspecialchars($_REQUEST['idCasa']);

            $especificacion = new EspecificacionDTO();
            $especificacion->setIdEspecificacion($idEspecificacion);
            $especificacion->setTitulo($titulo);
            $especificacion->setDescripcion($descripcion);
            $especificacion->setIdCasa($idCasa);

        $result = $control->updateEspecificacion($especificacion);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Especificacion actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
