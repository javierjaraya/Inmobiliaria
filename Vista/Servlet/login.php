<?php

include_once '../../Controlador/Sistema.php';
$control = Sistema::getInstancia();

$run = $_POST['InputRun'];
$clave = $_POST['InputPassword1'];

$success = true;
$mensajes;
$pagina = "";
if (($run != null || $run != "") && ($clave != null || $clave != "")) {

    $usuario = $control->getUsuarioByID($run);
    if ($usuario->getRun() == $run) {
        if ($usuario->getClave() == $clave) {
            
            session_start();
            $_SESSION["autentificado"] = "SI";
            $_SESSION["idPerfil"] = $usuario->getIdPerfil();
            $_SESSION["run"] = $usuario->getRun();

            if ($usuario->getIdPerfil() == 1) {//administrador
                $pagina = "Vista/Layout/administrarHome.php";
            } else if ($usuario->getIdPerfil() == 2) {//Persona
                $pagina = "Vista/Layout/administrarHome.php";
            }

            $success = true;
            $mensajes = "Iniciando...";
        } else {
            $success = false;
            $mensajes = "La clave ingresada es incorrecta.";
        }
    } else {
        $success = false;
        $mensajes = "Usuario no existe.";
    }
} else {
    $success = false;
    $mensajes = "Ninguna casilla puede estar vacia.";
}
echo json_encode(array(
    'success' => $success,
    'mensaje' => $mensajes,
    'pagina' => $pagina
));
?>