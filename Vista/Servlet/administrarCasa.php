<?php

include_once '../../Controlador/Sistema.php';

$control = Sistema::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $casas = $control->getAllCasas();
        $json = json_encode($casas);
        echo $json;
    } else if ($accion == "AGREGAR") {
        include_once("../../util/SubirImagen.php");
        $nombreModelo = htmlspecialchars($_REQUEST['nombreModelo']);
        $m2 = htmlspecialchars($_REQUEST['m2']);
        $dormitorio = htmlspecialchars($_REQUEST['dormitorio']);
        $banio = htmlspecialchars($_REQUEST['banio']);
        $precioKit = htmlspecialchars($_REQUEST['precioKit']);
        $precioKitPisoMadera = htmlspecialchars($_REQUEST['precioKitPisoMadera']);
        $precioKitPisoMaderaInstalado = htmlspecialchars($_REQUEST['precioKitPisoMaderaInstalado']);
        $precioKitPisoRadierInstalado = htmlspecialchars($_REQUEST['precioKitPisoRadierInstalado']);
        $especificacion = htmlspecialchars($_REQUEST['especificacion']);

        $idCasa = $control->getIDCasa();

        $casa = new CasaDTO();
        $casa->setIdCasa($idCasa);
        $casa->setNombreModelo($nombreModelo);
        $casa->setM2($m2);
        $casa->setDormitorio($dormitorio);
        $casa->setBanio($banio);
        $casa->setPrecioKit($precioKit);
        $casa->setPrecioKitPisoMadera($precioKitPisoMadera);
        $casa->setPrecioKitPisoMaderaInstalado($precioKitPisoMaderaInstalado);
        $casa->setPrecioKitPisoRadierInstalado($precioKitPisoRadierInstalado);
        $casa->setEspecificacion($especificacion);

        if (validarTamaños($_FILES["planos"], 2000000) == true) {
            if (validarTamaños($_FILES["imagen"], 2000000) == true) {
                $result = $control->addCasa($casa);
                if ($result) {
                    //REGISTRO IMAGENES MODELO
                    for ($i = 0; $i < count($_FILES["imagen"]["name"]); $i++) {
                        $subirImagen = new SubirImagen("../../Files/img/modelos/");
                        $subirImagen->setMaximoSize(2000000); //2mb            
                        //$subirImagen->set(300, 200);

                        $subirImagen->setName("modelo" . $idCasa . "" . $i);
                        $nombreImagen = $subirImagen->asignaNombre($_FILES['imagen']['type'][$i], "modelo" . $idCasa . "" . $i);
                        $respuesta = $subirImagen->subirImagenEspecifica($_FILES["imagen"], $i);

                        if ($respuesta == true) {
                            $imagen = new ImagenDTO();
                            $imagen->setIdCasa($idCasa);
                            if ($i == 0) {
                                $imagen->setImagenPrincipal(1);
                            } else {
                                $imagen->setImagenPrincipal(0);
                            }

                            $valor = ($_FILES["imagen"]["size"][$i] / 1024) / 1024;
                            $tamaño = round($valor, 2, PHP_ROUND_HALF_UP);

                            $imagen->setNombreImagen($nombreImagen);
                            $imagen->setRutaImagen("Files/img/modelos/" . $nombreImagen);
                            $imagen->setTamaño($tamaño . " Mb");

                            $result = $control->addImagen($imagen); //Registramos la imagen en la BD
                        }
                    }//FIN registro imagenes
                    //REGISTRO PLANOS
                    for ($i = 0; $i < count($_FILES["planos"]["name"]); $i++) {
                        $subirPlano = new SubirImagen("../../Files/img/planos/");
                        $subirPlano->setMaximoSize(2000000); //2mb            
                        //$subirPlano->set(300, 200);

                        $subirPlano->setName("plano" . $idCasa . "" . $i);
                        $nombreImagen = $subirPlano->asignaNombre($_FILES['planos']['type'][$i], "plano" . $idCasa . "" . $i);
                        $respuesta = $subirPlano->subirImagenEspecifica($_FILES["planos"], $i);

                        if ($respuesta == true) {
                            $plano = new PlanoDTO();
                            $plano->setIdCasa($idCasa);
                            
                            $valor = ($_FILES["planos"]["size"][$i] / 1024) / 1024;
                            $tamaño = round($valor, 2, PHP_ROUND_HALF_UP);
                            
                            $plano->setNombreImagen($nombreImagen);
                            $plano->setRutaImagen("Files/img/planos/" . $nombreImagen);
                            $plano->setTamaño($tamaño . " Mb");

                            $result = $control->addPlano($plano); //Registramos el plano en la BD
                        }
                    }//FIN registro planos
                }
                if ($result) {
                    echo json_encode(array(
                        'success' => true,
                        'mensaje' => "Casa ingresada correctamente"
                    ));
                } else {
                    echo json_encode(array('success' => false, 'errorMsg' => 'Ha ocurrido un error.'));
                }
            } else {
                echo json_encode(array('success' => false, 'errorMsg' => 'Algunas imagenes exceden el tamaño maximo permitido.'));
            }
        } else {
            echo json_encode(array('success' => false, 'errorMsg' => 'Algunos planos exceden el tamaño maximo permitido.'));
        }
    } else if ($accion == "BORRAR") {
        $idCasa = htmlspecialchars($_REQUEST['idCasa']);

        $imagenes = $control->getImagenByIDCasa($idCasa);
        $planos = $control->getPlanoByIDCasa($idCasa);
        $result = $control->removeCasa($idCasa);

        if ($result) {
            for ($i = 0; $i < count($imagenes); $i++) {
                unlink("../../" . $imagenes[$i]->getRutaImagen());
            }
            for ($i = 0; $i < count($planos); $i++) {
                unlink("../../" . $planos[$i]->getRutaImagen());
            }
        }

        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Casa borrado correctamente."));
        } else {
            echo json_encode(array('errorMsg' => "Ha ocurrido un error."));
        }
    } else if ($accion == "BUSCAR") {
        $precioDesde = htmlspecialchars($_REQUEST['precioDesde']);
        $precioHasta = htmlspecialchars($_REQUEST['precioHasta']);
        $superficieDesde = htmlspecialchars($_REQUEST['superficieDesde']);
        $superficieHasta = htmlspecialchars($_REQUEST['superficieHasta']);
        $dormDesde = htmlspecialchars($_REQUEST['dormDesde']);
        $banosDesde = htmlspecialchars($_REQUEST['banosDesde']);
        
        if($precioDesde == "") $precioDesde = 0;
        if($precioHasta == ""){
            $precioHasta = $control->getMaxPrecioCasa();
        }
        if($superficieDesde == "") $superficieDesde = 0;
        if($superficieHasta == ""){
            $superficieHasta = $control->getMaxM2Casa();
        }
        if($dormDesde == "") $dormDesde = 0;
        if($banosDesde == "") $banosDesde = 0;
        
        $casas = $control->getCasaLikeAtrr($precioDesde,$precioHasta,$superficieDesde,$superficieHasta,$dormDesde,$banosDesde);
        $json = json_encode($casas);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idCasa = htmlspecialchars($_REQUEST['idCasa']);

        $casa = $control->getCasaByID($idCasa);
        $json = json_encode($casa);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idCasa = htmlspecialchars($_REQUEST['idCasa']);
        $nombreModelo = htmlspecialchars($_REQUEST['nombreModelo']);
        $m2 = htmlspecialchars($_REQUEST['m2']);
        $dormitorio = htmlspecialchars($_REQUEST['dormitorio']);
        $banio = htmlspecialchars($_REQUEST['banio']);
        $precioKit = htmlspecialchars($_REQUEST['precioKit']);
        $precioKitPisoMadera = htmlspecialchars($_REQUEST['precioKitPisoMadera']);
        $precioKitPisoMaderaInstalado = htmlspecialchars($_REQUEST['precioKitPisoMaderaInstalado']);
        $precioKitPisoRadierInstalado = htmlspecialchars($_REQUEST['precioKitPisoRadierInstalado']);
        $especificacion = htmlspecialchars($_REQUEST['especificacion']);

        $casa = new CasaDTO();
        $casa->setIdCasa($idCasa);
        $casa->setNombreModelo($nombreModelo);
        $casa->setM2($m2);
        $casa->setDormitorio($dormitorio);
        $casa->setBanio($banio);
        $casa->setPrecioKit($precioKit);
        $casa->setPrecioKitPisoMadera($precioKitPisoMadera);
        $casa->setPrecioKitPisoMaderaInstalado($precioKitPisoMaderaInstalado);
        $casa->setPrecioKitPisoRadierInstalado($precioKitPisoRadierInstalado);
        $casa->setEspecificacion($especificacion);

        $result = $control->updateCasa($casa);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Casa actualizada correctamente"
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
