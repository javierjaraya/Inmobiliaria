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
        $idCasa = htmlspecialchars($_REQUEST['idCasa']);
        $nombreModelo = htmlspecialchars($_REQUEST['nombreModelo']);
        $precio = htmlspecialchars($_REQUEST['precio']);
        $m2 = htmlspecialchars($_REQUEST['m2']);
        $dormitorio = htmlspecialchars($_REQUEST['dormitorio']);
        $banio = htmlspecialchars($_REQUEST['banio']);
        $precioKit = htmlspecialchars($_REQUEST['precioKit']);
        $precioKitPisoMadera = htmlspecialchars($_REQUEST['precioKitPisoMadera']);
        $precioKitPisoMaderaInstalado = htmlspecialchars($_REQUEST['precioKitPisoMaderaInstalado']);
        $precioKitPisoRadierInstalado = htmlspecialchars($_REQUEST['precioKitPisoRadierInstalado']);

        $object = $control->getCasaByID($idCasa);
        if (($object->getIdCasa() == null || $object->getIdCasa() == "")) {
            $casa = new CasaDTO();
            $casa->setIdCasa($idCasa);
            $casa->setNombreModelo($nombreModelo);
            $casa->setPrecio($precio);
            $casa->setM2($m2);
            $casa->setDormitorio($dormitorio);
            $casa->setBanio($banio);
            $casa->setPrecioKit($precioKit);
            $casa->setPrecioKitPisoMadera($precioKitPisoMadera);
            $casa->setPrecioKitPisoMaderaInstalado($precioKitPisoMaderaInstalado);
            $casa->setPrecioKitPisoRadierInstalado($precioKitPisoRadierInstalado);

            $result = $control->addCasa($casa);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Casa ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la casa ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $idCasa = htmlspecialchars($_REQUEST['idCasa']);

        $result = $control->removeCasa($idCasa);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Casa borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $casas = $control->getCasaLikeAtrr($cadena);
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
        $precio = htmlspecialchars($_REQUEST['precio']);
        $m2 = htmlspecialchars($_REQUEST['m2']);
        $dormitorio = htmlspecialchars($_REQUEST['dormitorio']);
        $banio = htmlspecialchars($_REQUEST['banio']);
        $precioKit = htmlspecialchars($_REQUEST['precioKit']);
        $precioKitPisoMadera = htmlspecialchars($_REQUEST['precioKitPisoMadera']);
        $precioKitPisoMaderaInstalado = htmlspecialchars($_REQUEST['precioKitPisoMaderaInstalado']);
        $precioKitPisoRadierInstalado = htmlspecialchars($_REQUEST['precioKitPisoRadierInstalado']);

            $casa = new CasaDTO();
            $casa->setIdCasa($idCasa);
            $casa->setNombreModelo($nombreModelo);
            $casa->setPrecio($precio);
            $casa->setM2($m2);
            $casa->setDormitorio($dormitorio);
            $casa->setBanio($banio);
            $casa->setPrecioKit($precioKit);
            $casa->setPrecioKitPisoMadera($precioKitPisoMadera);
            $casa->setPrecioKitPisoMaderaInstalado($precioKitPisoMaderaInstalado);
            $casa->setPrecioKitPisoRadierInstalado($precioKitPisoRadierInstalado);

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
