<?php

/**
 * Import classes
 */
/**require_once ("/home/u999386215/public_html/proyectoLibreria/Persistencia/ArticleDAO.php");
    require_once ("/home/u999386215/public_html/proyectoLibreria/Persistencia/Util/Conexion.php");*/
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/persistencia/EstadoUsuarioDAO.php';


class ManejoEstadoUsuario
{

    /**
     * Atribute for the connection to  the database
     */
    private static $conexionBD;

    function __construct()
    {
    }

    public static function consultarEstadoUsuario($cod_peticion)
    {

        $est_usuarioDAO = EstadoUsuarioDAO::getEstadoUsuarioDAO(self::$conexionBD);
        $est_usuario = $est_usuarioDAO->consult($cod_peticion);
        return $est_usuario;
    }

    /**
     * Create an status users
     * @param EstadoUsuario status of users to create
     * @return void
     */
    public static function createStatusUser($est_usuario)
    {
        $est_usuarioDAO = EstadoUsuarioDAO::getEstadoUsuarioDAO(self::$conexionBD);
        $est_usuarioDAO->create($est_usuario);
    }

    /**
     * Modify an status of users
     * @param EstadoUsuario Status users to modify
     * @return void
     */
    public static function modifyStatusUser($est_usuario)
    {
        $est_usuarioDAO = EstadoUsuarioDAO::getEstadoUsuarioDAO(self::$conexionBD);
        $est_usuarioDAO->modify($est_usuario);
    }
    /**
     * Delete an status user
     * @param EstadoUsuario Status user to modify
     * @return void
     */
    public static function deleteStatusUser($est_usuario)
    {
        $est_usuarioDAO = EstadoUsuarioDAO::getEstadoUsuarioDAO(self::$conexionBD);
        $est_usuarioDAO->delete($est_usuario);
    }

    /**
     * List of EstadoUsuario
     * @return EstadoUsuario[] List of all the articles in the Data Base
     */
    public  static function getList()
    {
        $est_usuarioDAO = EstadoUsuarioDAO::getEstadoUsuarioDAO(self::$conexionBD);
        $est_usuario = $est_usuarioDAO->getList();
        return $est_usuario;
    }

    /**
     * Change the conexion
     */
    public static function setConexionBD($conexionBD)
    {
        self::$conexionBD = $conexionBD;
    }
}
