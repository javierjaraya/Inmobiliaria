<?php

include_once '../../Controlador/Sistema.php';

$control = Sistema::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $imagens = $control->getAllImagens();
        $json = json_encode($imagens);
        echo $json;
    } else if ($accion == "AGREGAR") {
        include_once("../../util/SubirImagen.php");

        $idCasa = htmlspecialchars($_REQUEST['idCasa']);
        //$imagenPrincipal = htmlspecialchars($_REQUEST['imagenPrincipal']);        

        if (validarTamaños($_FILES["nueva-imagen"], 2000000) == true) {//Validar tamaño
            $subirImagen = new SubirImagen("../../Files/img/modelos/");
            $subirImagen->setMaximoSize(2000000); //2mb     

            $diferenciador = date("Y") . date("m") . date("d") . date("H") . date("i") . date("s");

            $nombreImagen = $subirImagen->asignaNombre($_FILES["nueva-imagen"]["type"], "modelo" . $idCasa . "" . $diferenciador);
            $subirImagen->setName("modelo" . $idCasa . "" . $diferenciador);

            $valor = ($_FILES["nueva-imagen"]["size"] / 1024) / 1024;
            $tamaño = round($valor, 2, PHP_ROUND_HALF_UP);

            $imagen = new ImagenDTO();
            $imagen->setIdCasa($idCasa);
            $imagen->setImagenPrincipal(0);
            $imagen->setNombreImagen($nombreImagen);
            $imagen->setRutaImagen("Files/img/modelos/" . $nombreImagen);
            $imagen->setTamaño($tamaño . " Mb");

            $result = $control->addImagen($imagen);

            if ($result) {
                $r = $subirImagen->subirImagen($_FILES["nueva-imagen"]);
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Imagen ingresada correctamente "
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'La imagen supera los 2 Mb.'));
        }
    } else if ($accion == "BORRAR") {
        $idImagen = htmlspecialchars($_REQUEST['idImagen']);
        $idCasa = htmlspecialchars($_REQUEST['idCasa']);

        $imagenes = $control->getImagenByIDCasa($idCasa);
        //Validar que qede almenos 1 imagen
        if (count($imagenes) > 1) {

            $imagen = $control->getImagenByID($idImagen);

            if ($imagen->getImagenPrincipal() == 1) {//Si es imagen principal, asignar a otra imagen como principal
                $idPrincipal = getIdImagenDisponibleAPrincipal($imagenes);
                $nuevaPrincipal = $control->getImagenByID($idPrincipal);
                $nuevaPrincipal->setImagenPrincipal(1); //Actualizar a 1 = principal 
                $control->updateImagen($nuevaPrincipal); //Actualizar nueva principal  
            }
            
            $result = $control->removeImagen($idImagen); //Eliminar
   
            if ($result) {
                //Si se elimino borrar la imagen del servidor
                unlink("../../" . $imagen->getRutaImagen());
                echo json_encode(array('success' => true, 'mensaje' => "Imagen borrado correctamente"));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'No se puede eliminar la imagen, debe agregar otro imagen antes de eliminar la actual.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $imagens = $control->getImagenLikeAtrr($cadena);
        $json = json_encode($imagens);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idImagen = htmlspecialchars($_REQUEST['idImagen']);

        $imagen = $control->getImagenByID($idImagen);
        $json = json_encode($imagen);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID_CASA") {
        $idCasa = htmlspecialchars($_REQUEST['idCasa']);

        $imagenes = $control->getImagenByIDCasa($idCasa);
        $json = json_encode($imagenes);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idImagen = htmlspecialchars($_REQUEST['idImagen']);
        $idCasa = htmlspecialchars($_REQUEST['idCasa']);
        $imagenPrincipal = htmlspecialchars($_REQUEST['imagenPrincipal']);
        $nombreImagen = htmlspecialchars($_REQUEST['nombreImagen']);
        $rutaImagen = htmlspecialchars($_REQUEST['rutaImagen']);

        $imagen = new ImagenDTO();
        $imagen->setIdImagen($idImagen);
        $imagen->setIdCasa($idCasa);
        $imagen->setImagenPrincipal($imagenPrincipal);
        $imagen->setNombreImagen($nombreImagen);
        $imagen->setRutaImagen($rutaImagen);

        $result = $control->updateImagen($imagen);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Imagen actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}

function getIdImagenDisponibleAPrincipal($imagenes) {
    for ($i = 0; $i < count($imagenes); $i++) {
        if ($imagenes[$i]->getImagenPrincipal() == 0) {
            return $imagenes[$i]->getIdImagen();
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
