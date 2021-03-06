<?php

include_once 'Mantenedores/BannerDAO.php';
include_once 'Mantenedores/CasaDAO.php';
include_once 'Mantenedores/ConsultaDAO.php';
include_once 'Mantenedores/EmpresaDAO.php';
include_once 'Mantenedores/EspecificacionDAO.php';
include_once 'Mantenedores/ImagenDAO.php';
include_once 'Mantenedores/MensajeDAO.php';
include_once 'Mantenedores/PerfilDAO.php';
include_once 'Mantenedores/PersonasDAO.php';
include_once 'Mantenedores/PlanoDAO.php';
include_once 'Mantenedores/UsuarioDAO.php';

class Sistema {

    private static $instancia = NULL;
    private $bannerDAO;
    private $casaDAO;
    private $consultaDAO;
    private $empresaDAO;
    private $especificacionDAO;
    private $imagenDAO;
    private $mensajeDAO;
    private $perfilDAO;
    private $personasDAO;
    private $planoDAO;
    private $usuarioDAO;

    public function Sistema() {
        $this->bannerDAO = new BannerDAO();
        $this->casaDAO = new CasaDAO();
        $this->consultaDAO = new ConsultaDAO();
        $this->empresaDAO = new EmpresaDAO();
        $this->especificacionDAO = new EspecificacionDAO();
        $this->imagenDAO = new ImagenDAO();
        $this->mensajeDAO = new MensajeDAO();
        $this->perfilDAO = new PerfilDAO();
        $this->personasDAO = new PersonasDAO();
        $this->planoDAO = new PlanoDAO();
        $this->usuarioDAO = new UsuarioDAO();
    }

    public static function getInstancia() {
        if (self::$instancia == NULL) {
            self::$instancia = new Sistema();
        }
        return self::$instancia;
    }
    
    public function getAllBanners() {
        return $this->bannerDAO->findAll();
    }

    public function addBanner($banner) {
        return $this->bannerDAO->save($banner);
    }

    public function removeBanner($idImagen) {
        return $this->bannerDAO->delete($idImagen);
    }

    public function updateBanner($banner) {
        return $this->bannerDAO->update($banner);
    }

    public function getBannerByID($idImagen) {
        return $this->bannerDAO->findByID($idImagen);
    }

    public function getBannerLikeAtrr($cadena) {
        return $this->bannerDAO->findLikeAtrr($cadena);
    }
    
    public function getIDCasa() {
        return $this->casaDAO->getID();
    }

    public function getMaxPrecioCasa(){
        return $this->casaDAO->getMaxPrecio();
    }
    
    public function getMaxM2Casa(){
        return $this->casaDAO->getMaxM2();
    }

    public function getAllCasas() {
        return $this->casaDAO->findAll();
    }

    public function addCasa($casa) {
        return $this->casaDAO->save($casa);
    }

    public function removeCasa($idCasa) {
        return $this->casaDAO->delete($idCasa);
    }

    public function updateCasa($casa) {
        return $this->casaDAO->update($casa);
    }

    public function getCasaByID($idCasa) {
        return $this->casaDAO->findByID($idCasa);
    }

    public function getCasaLikeAtrr($precioDesde,$precioHasta,$superficieDesde,$superficieHasta,$dormDesde,$banosDesde) {
        return $this->casaDAO->findLikeAtrr($precioDesde,$precioHasta,$superficieDesde,$superficieHasta,$dormDesde,$banosDesde);
    }

    public function getAllConsultas() {
        return $this->consultaDAO->findAll();
    }

    public function addConsulta($consulta) {
        return $this->consultaDAO->save($consulta);
    }

    public function removeConsulta($idConsulta) {
        return $this->consultaDAO->delete($idConsulta);
    }

    public function updateConsulta($consulta) {
        return $this->consultaDAO->update($consulta);
    }

    public function getConsultaByID($idConsulta) {
        return $this->consultaDAO->findByID($idConsulta);
    }

    public function getConsultaLikeAtrr($cadena) {
        return $this->consultaDAO->findLikeAtrr($cadena);
    }
    
    public function getAllEmpresas() {
        return $this->empresaDAO->findAll();
    }

    public function addEmpresa($empresa) {
        return $this->empresaDAO->save($empresa);
    }

    public function removeEmpresa($idEmpresa) {
        return $this->empresaDAO->delete($idEmpresa);
    }

    public function updateEmpresa($empresa) {
        return $this->empresaDAO->update($empresa);
    }

    public function getEmpresaByID($idEmpresa) {
        return $this->empresaDAO->findByID($idEmpresa);
    }

    public function getEmpresaLikeAtrr($cadena) {
        return $this->empresaDAO->findLikeAtrr($cadena);
    }

    public function getAllEspecificacions() {
        return $this->especificacionDAO->findAll();
    }

    public function addEspecificacion($especificacion) {
        return $this->especificacionDAO->save($especificacion);
    }

    public function removeEspecificacion($idEspecificacion) {
        return $this->especificacionDAO->delete($idEspecificacion);
    }

    public function updateEspecificacion($especificacion) {
        return $this->especificacionDAO->update($especificacion);
    }

    public function getEspecificacionByID($idEspecificacion) {
        return $this->especificacionDAO->findByID($idEspecificacion);
    }

    public function getEspecificacionLikeAtrr($cadena) {
        return $this->especificacionDAO->findLikeAtrr($cadena);
    }

    public function getAllImagens() {
        return $this->imagenDAO->findAll();
    }

    public function addImagen($imagen) {
        return $this->imagenDAO->save($imagen);
    }

    public function removeImagen($idImagen) {
        return $this->imagenDAO->delete($idImagen);
    }

    public function updateImagen($imagen) {
        return $this->imagenDAO->update($imagen);
    }

    public function getImagenByID($idImagen) {
        return $this->imagenDAO->findByID($idImagen);
    }
    
    public function getImagenByIDCasa($idCasa){
        return $this->imagenDAO->findByIDCasa($idCasa);
    }

    public function getImagenLikeAtrr($cadena) {
        return $this->imagenDAO->findLikeAtrr($cadena);
    }

    public function getAllMensajes() {
        return $this->mensajeDAO->findAll();
    }

    public function addMensaje($mensaje) {
        return $this->mensajeDAO->save($mensaje);
    }

    public function removeMensaje($idMensaje) {
        return $this->mensajeDAO->delete($idMensaje);
    }

    public function updateMensaje($mensaje) {
        return $this->mensajeDAO->update($mensaje);
    }

    public function getMensajeByID($idMensaje) {
        return $this->mensajeDAO->findByID($idMensaje);
    }

    public function getMensajeLikeAtrr($cadena) {
        return $this->mensajeDAO->findLikeAtrr($cadena);
    }

    public function getCantidadNuevosMensajes() {
        return $this->mensajeDAO->cantidadMensajesNuevos();
    }

    public function getAllPerfils() {
        return $this->perfilDAO->findAll();
    }

    public function addPerfil($perfil) {
        return $this->perfilDAO->save($perfil);
    }

    public function removePerfil($idPerfil) {
        return $this->perfilDAO->delete($idPerfil);
    }

    public function updatePerfil($perfil) {
        return $this->perfilDAO->update($perfil);
    }

    public function getPerfilByID($idPerfil) {
        return $this->perfilDAO->findByID($idPerfil);
    }

    public function getPerfilLikeAtrr($cadena) {
        return $this->perfilDAO->findLikeAtrr($cadena);
    }

    public function getAllPersonass() {
        return $this->personasDAO->findAll();
    }

    public function addPersonas($personas) {
        return $this->personasDAO->save($personas);
    }

    public function removePersonas($run) {
        return $this->personasDAO->delete($run);
    }

    public function updatePersonas($personas) {
        return $this->personasDAO->update($personas);
    }

    public function getPersonasByID($run) {
        return $this->personasDAO->findByID($run);
    }

    public function getPersonasLikeAtrr($cadena) {
        return $this->personasDAO->findLikeAtrr($cadena);
    }

    public function getAllPlanos() {
        return $this->planoDAO->findAll();
    }

    public function addPlano($plano) {
        return $this->planoDAO->save($plano);
    }

    public function removePlano($idPlano) {
        return $this->planoDAO->delete($idPlano);
    }

    public function updatePlano($plano) {
        return $this->planoDAO->update($plano);
    }

    public function getPlanoByID($idPlano) {
        return $this->planoDAO->findByID($idPlano);
    }
    
    public function getPlanoByIDCasa($idCasa){
        return $this->planoDAO->findByIDCasa($idCasa);
    }
    
    public function getPlanoLikeAtrr($cadena) {
        return $this->planoDAO->findLikeAtrr($cadena);
    }

    public function getAllUsuarios() {
        return $this->usuarioDAO->findAll();
    }

    public function addUsuario($usuario) {
        return $this->usuarioDAO->save($usuario);
    }

    public function removeUsuario($run) {
        return $this->usuarioDAO->delete($run);
    }

    public function updateUsuario($usuario) {
        return $this->usuarioDAO->update($usuario);
    }

    public function getUsuarioByID($run) {
        return $this->usuarioDAO->findByID($run);
    }

    public function getUsuarioLikeAtrr($cadena) {
        return $this->usuarioDAO->findLikeAtrr($cadena);
    }

}

?>