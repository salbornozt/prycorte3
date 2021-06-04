<?php

/**
 * Import classes
 */
/**require_once ("/home/u999386215/public_html/proyectoLibreria/Persistencia/ArticleDAO.php");
    require_once ("/home/u999386215/public_html/proyectoLibreria/Persistencia/Util/Conexion.php");*/
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/persistencia/UsuarioDAO.php';


class ManejoUsuario
{

    /**
     * Atribute for the connection to  the database
     */
    private static $conexionBD;

    function __construct()
    {
    }

    public static function consultarUsuario($cod_usuario)
    {

        $usuarioDAO = UsuarioDAO::getUsuarioDAO(self::$conexionBD);
        $usuario = $usuarioDAO->consult($cod_usuario);
        return $usuario;
    }

    /**
     * Create an users
     * @param Usuario users to create
     * @return void
     */
    public static function createUser($user)
    {
        $usuarioDAO = UsuarioDAO::getUsuarioDAO(self::$conexionBD);
        $usuarioDAO->create($user);
    }

    /**
     * Modify an user
     * @param Usuario User to modify
     * @return void
     */
    public static function modifyUser($user)
    {
        $usuarioDAO = UsuarioDAO::getUsuarioDAO(self::$conexionBD);
        $usuarioDAO->modify($user);
    }
    /**
     * Delete an user
     * @param Usuario User to modify
     * @return void
     */
    public static function deleteUser($user)
    {
        $usuarioDAO = UsuarioDAO::getUsuarioDAO(self::$conexionBD);
        $usuarioDAO->delete($user);
    }

    /**
     * List of Usuario
     * @return Usuario[] List of all the articles in the Data Base
     */
    public  static function getList()
    {
        $usuarioDAO = UsuarioDAO::getUsuarioDAO(self::$conexionBD);
        $usuario = $usuarioDAO->getList();
        return $usuario;
    }

    /**
     * Change the conexion
     */
    public static function setConexionBD($conexionBD)
    {
        self::$conexionBD = $conexionBD;
    }
}
