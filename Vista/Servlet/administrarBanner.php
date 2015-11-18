<?php

include_once '../../Controlador/Sistema.php';

$control = Sistema::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $banners = $control->getAllBanners();
        $json = json_encode($banners);
        echo $json;
    } else if ($accion == "AGREGAR") {
        include_once("../../util/UpdateImagen.php");
        
        $tamanio = htmlspecialchars($_REQUEST['tamañoDetalle'])."";

        $banner = new BannerDTO();
        $banner->setNombre($_FILES['imagen']['name']);
        $banner->setRuta("Files/img/banner/" . $_FILES['imagen']['name']);
        $banner->setTamanio($tamanio."");
        $banner->setDetalle("");

        $subir = new UpdateImagen($banner->getNombre(), $_FILES['imagen'], 2000000, "../../Files/img/banner/", 1400, 600, true);
        $result = $subir->update();
        if ($result == true) {
            $result = $control->addBanner($banner); //Registramos la imagen en la BD

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Imagen subida correctamente"));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => $result));
        }
        /* if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png") {//Validamos que sea una imagen
          if ($_FILES['imagen']['size'] <= 2000000) {//Validar que no supere los 2 mb
          //$tamaño = htmlspecialchars($_REQUEST['tamaño']);
          $nombreImagen = $_FILES['imagen']['name']; //Nombre imagen con extension

          $banner = new BannerDTO();
          $banner->setNombre($nombreImagen);
          $banner->setRuta("Files/img/banner/" . $nombreImagen);
          $banner->setDetalle("");
          $banner->setTamaño($_FILES['imagen']['size']);

          $patch = "../../Files/img/banner/";
          if (copy($_FILES['imagen']['tmp_name'], $patch . $nombreImagen) == 1) {//Subimos la imagen al servidor y validamos que sea correcto
          $result = $control->addBanner($banner);//Registramos la imagen en la BD

          if ($result) {
          echo json_encode(array(
          'success' => true,
          'mensaje' => "Imagen subida correctamente"
          ));
          } else {
          echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
          }
          } else {
          echo json_encode(array('errorMsg' => 'No se pudo subir la imagen al servidor.'));
          }
          } else {
          echo json_encode(array('errorMsg' => 'La imagen supera los 2 mb'));
          }
          } else {
          echo json_encode(array('errorMsg' => 'La imagen debe ser .jpg, .jpge, .png'));
          } */
    } else if ($accion == "BORRAR") {
        $idImagen = htmlspecialchars($_REQUEST['idImagen']);
        
        $imagen = $control->getBannerByID($idImagen);
        
        $result = $control->removeBanner($idImagen);                
        if ($result) {
            unlink("../../".$imagen->getRuta());
            echo json_encode(array('success' => true, 'mensaje' => "Imagen borrada correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $banners = $control->getBannerLikeAtrr($cadena);
        $json = json_encode($banners);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idImagen = htmlspecialchars($_REQUEST['idImagen']);

        $banner = $control->getBannerByID($idImagen);
        $json = json_encode($banner);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idImagen = htmlspecialchars($_REQUEST['idImagen']);
        $nombre = htmlspecialchars($_REQUEST['nombre']);
        $ruta = htmlspecialchars($_REQUEST['ruta']);
        $detalle = htmlspecialchars($_REQUEST['detalle']);

        $banner = new BannerDTO();
        $banner->setIdImagen($idImagen);
        $banner->setNombre($nombre);
        $banner->setRuta($ruta);
        $banner->setDetalle($detalle);

        $result = $control->updateBanner($banner);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Banner actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
