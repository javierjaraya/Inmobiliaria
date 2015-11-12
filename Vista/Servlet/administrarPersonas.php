<?php

include_once '../../Controlador/Sistema.php';

$control = Sistema::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $personass = $control->getAllPersonass();
        $json = json_encode($personass);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $run = htmlspecialchars($_REQUEST['run']);
        $nombres = htmlspecialchars($_REQUEST['nombres']);
        $apellidos = htmlspecialchars($_REQUEST['apellidos']);
        $sexo = htmlspecialchars($_REQUEST['sexo']);
        $telefono = htmlspecialchars($_REQUEST['telefono']);
        $fechaNac = htmlspecialchars($_REQUEST['fechaNac']);
        $direccion = htmlspecialchars($_REQUEST['direccion']);

        $object = $control->getPersonasByID($run);
        if (($object->getRun() == null || $object->getRun() == "")) {
            $personas = new PersonasDTO();
            $personas->setRun($run);
            $personas->setNombres($nombres);
            $personas->setApellidos($apellidos);
            $personas->setSexo($sexo);
            $personas->setTelefono($telefono);
            $personas->setFechaNac($fechaNac);
            $personas->setDireccion($direccion);

            $result = $control->addPersonas($personas);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Personas ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la personas ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $run = htmlspecialchars($_REQUEST['run']);

        $result = $control->removePersonas($run);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Personas borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $personass = $control->getPersonasLikeAtrr($cadena);
        $json = json_encode($personass);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $run = htmlspecialchars($_REQUEST['run']);

        $personas = $control->getPersonasByID($run);
        $json = json_encode($personas);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $run = htmlspecialchars($_REQUEST['run']);
        $nombres = htmlspecialchars($_REQUEST['nombres']);
        $apellidos = htmlspecialchars($_REQUEST['apellidos']);
        $sexo = htmlspecialchars($_REQUEST['sexo']);
        $telefono = htmlspecialchars($_REQUEST['telefono']);
        $fechaNac = htmlspecialchars($_REQUEST['fechaNac']);
        $direccion = htmlspecialchars($_REQUEST['direccion']);

            $personas = new PersonasDTO();
            $personas->setRun($run);
            $personas->setNombres($nombres);
            $personas->setApellidos($apellidos);
            $personas->setSexo($sexo);
            $personas->setTelefono($telefono);
            $personas->setFechaNac($fechaNac);
            $personas->setDireccion($direccion);

        $result = $control->updatePersonas($personas);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Personas actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
