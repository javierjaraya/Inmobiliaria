<?php

include_once '../../Controlador/Sistema.php';

$control = Sistema::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $planos = $control->getAllPlanos();
        $json = json_encode($planos);
        echo $json;
    } else if ($accion == "AGREGAR") {
        include_once("../../util/SubirImagen.php");

        $idCasa = htmlspecialchars($_REQUEST['idCasa']);
        if (validarTamaños($_FILES["nueva-imagen"], 2000000) == true) {//Validar tamaño
            $subirImagen = new SubirImagen("../../Files/img/planos/");
            $subirImagen->setMaximoSize(2000000); //2mb     

            $diferenciador = date("Y") . date("m") . date("d") . date("H") . date("i") . date("s");

            $nombreImagen = $subirImagen->asignaNombre($_FILES["nueva-imagen"]["type"], "plano" . $idCasa . "" . $diferenciador);
            $subirImagen->setName("plano" . $idCasa . "" . $diferenciador);
            
            $valor = ($_FILES["nueva-imagen"]["size"] / 1024) / 1024;
            $tamaño = round ($valor, 2 , PHP_ROUND_HALF_UP);
            
            $plano = new PlanoDTO();
            $plano->setIdCasa($idCasa);
            $plano->setNombreImagen($nombreImagen);
            $plano->setRutaImagen("Files/img/planos/" . $nombreImagen);
            $plano->setTamaño($tamaño." Mb");

            $result = $control->addPlano($plano);

            if ($result) {
                $r = $subirImagen->subirImagen($_FILES["nueva-imagen"]);
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Plano ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'La imagen supera los 2 Mb.'));
        }
    } else if ($accion == "BORRAR") {
        $idPlano = htmlspecialchars($_REQUEST['idPlano']);
        $idCasa = htmlspecialchars($_REQUEST['idCasa']);

        $planos = $control->getPlanoByIDCasa($idCasa);
        //Validar que quede almenos 1 plano
        if (count($planos) > 1) {
            $plano = $control->getPlanoByID($idPlano);
            $result = $control->removePlano($idPlano);

            if ($result) {
                //Si se elimino borrar la imagen del servidor
                unlink("../../" . $plano->getRutaImagen());
                echo json_encode(array('success' => true, 'mensaje' => "Plano borrado correctamente"));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'No se puede eliminar el plano, debe agregar otro plano antes de eliminar el actual.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $planos = $control->getPlanoLikeAtrr($cadena);
        $json = json_encode($planos);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idPlano = htmlspecialchars($_REQUEST['idPlano']);

        $plano = $control->getPlanoByID($idPlano);
        $json = json_encode($plano);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID_CASA") {
        $idCasa = htmlspecialchars($_REQUEST['idCasa']);

        $planos = $control->getPlanoByIDCasa($idCasa);
        $json = json_encode($planos);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idPlano = htmlspecialchars($_REQUEST['idPlano']);
        $idCasa = htmlspecialchars($_REQUEST['idCasa']);
        $nombreImagen = htmlspecialchars($_REQUEST['nombreImagen']);
        $rutaImagen = htmlspecialchars($_REQUEST['rutaImagen']);

        $plano = new PlanoDTO();
        $plano->setIdPlano($idPlano);
        $plano->setIdCasa($idCasa);
        $plano->setNombreImagen($nombreImagen);
        $plano->setRutaImagen($rutaImagen);

        $result = $control->updatePlano($plano);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Plano actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}

function validarTamaños($imagenes, $tamañoMaximo) {
    $validar = true;
    if ($imagenes["name"][0]) {
        for ($i = 0; $i < count($imagenes["name"]); $i++) {
            if ($imagenes["size"][$i] <= $tamañoMaximo) {
                
            } else {
                $validar = false;
            }
        }
    } else {
        $validar = false;
    }
    return $validar;
}
