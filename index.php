<?php include 'header.php'; ?>
<?php
include_once 'Controlador/Mantenedores/Nucleo/ConexionMySQL.php';
include_once 'Modelo/BannerDTO.php';

$conexion = new ConexionMySQL();
$conexion->conectar();
$result = $conexion->ejecutar("SELECT * FROM banner");
$contenido = "";
while ($fila = mysql_fetch_assoc($result)) {
    $contenido = $contenido . "<li> <img src='" . $fila['ruta'] . "' width='100%' height=''/></li>";
}
$conexion->desconectar();
?>
<div id="contenido-carrucel" >    
    <div class="container carrucel">                
        <ul class="bxslider">                
            <?php echo $contenido; ?>
        </ul>
    </div>    
</div>
<?php include 'footer.php'; ?>
