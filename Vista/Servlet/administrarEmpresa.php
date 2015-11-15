<?php

include_once '../../Controlador/Sistema.php';

$control = Sistema::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $empresas = $control->getAllEmpresas();
        $json = json_encode($empresas);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $idEmpresa = htmlspecialchars($_REQUEST['idEmpresa']);
        $direccion = htmlspecialchars($_REQUEST['direccion']);
        $telefono = htmlspecialchars($_REQUEST['telefono']);
        $quienesSomos = htmlspecialchars($_REQUEST['quienesSomos']);
        $rutaImagen = htmlspecialchars($_REQUEST['rutaImagen']);
        $nombreImagen = htmlspecialchars($_REQUEST['nombreImagen']);
        $descripcionUbicacion = htmlspecialchars($_REQUEST['descripcionUbicacion']);
        $latitud = htmlspecialchars($_REQUEST['latitud']);
        $longitud = htmlspecialchars($_REQUEST['longitud']);
        $zoom = htmlspecialchars($_REQUEST['zoom']);

        $object = $control->getEmpresaByID($idEmpresa);
        if (($object->getIdEmpresa() == null || $object->getIdEmpresa() == "")) {
            $empresa = new EmpresaDTO();
            $empresa->setIdEmpresa($idEmpresa);
            $empresa->setDireccion($direccion);
            $empresa->setTelefono($telefono);
            $empresa->setQuienesSomos($quienesSomos);
            $empresa->setRutaImagen($rutaImagen);
            $empresa->setNombreImagen($nombreImagen);
            $empresa->setDescripcionUbicacion($descripcionUbicacion);
            $empresa->setLatitud($latitud);
            $empresa->setLongitud($longitud);
            $empresa->setZoom($zoom);

            $result = $control->addEmpresa($empresa);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Empresa ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la empresa ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $idEmpresa = htmlspecialchars($_REQUEST['idEmpresa']);

        $result = $control->removeEmpresa($idEmpresa);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Empresa borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $empresas = $control->getEmpresaLikeAtrr($cadena);
        $json = json_encode($empresas);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idEmpresa = htmlspecialchars($_REQUEST['idEmpresa']);

        $empresa = $control->getEmpresaByID($idEmpresa);
        $json = json_encode($empresa);
        echo $json;
    } else if ($accion == "ACTUALIZAR_CONTACTO") {
        $idEmpresa = htmlspecialchars($_REQUEST['idEmpresa']);
        $direccion = htmlspecialchars($_REQUEST['direccion']);
        $telefono = htmlspecialchars($_REQUEST['telefono']);
        $descripcionUbicacion = htmlspecialchars($_REQUEST['descripcionUbicacion']);
        $latitud = htmlspecialchars($_REQUEST['latitud']);
        $longitud = htmlspecialchars($_REQUEST['longitud']);
        $zoom = htmlspecialchars($_REQUEST['zoom']);

        $empresa = $control->getEmpresaByID($idEmpresa);
        $empresa->setDireccion($direccion);
        $empresa->setTelefono($telefono);
        $empresa->setDescripcionUbicacion($descripcionUbicacion);
        $empresa->setLatitud($latitud);
        $empresa->setLongitud($longitud);
        $empresa->setZoom($zoom);

        $result = $control->updateEmpresa($empresa);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Contacto actualizado correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "ACTUALIZAR_EMPRESA") {
        $quienesSomos = $_REQUEST['contenido'];

        $empresa = $control->getEmpresaByID(1);
        
        $empresa->setQuienesSomos($quienesSomos);

        $result = $control->updateEmpresa($empresa);
        
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Empresa actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
