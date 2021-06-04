<?php

/**
 * Import classes
 */
/**require_once ("/home/u999386215/public_html/proyectoLibreria/Persistencia/ArticleDAO.php");
    require_once ("/home/u999386215/public_html/proyectoLibreria/Persistencia/Util/Conexion.php");*/
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/persistencia/SitioWebDAO.php';


class ManejoSitioWeb
{

    /**
     * Atribute for the connection to  the database
     */
    private static $conexionBD;

    function __construct()
    {
    }

    public static function consultarSitioWeb($cod_sitio_web)
    {

        $sitioWebDAO = SitioWebDAO::getSitioWebDAO(self::$conexionBD);
        $sitioWeb = $sitioWebDAO->consult($cod_sitio_web);
        return $sitioWeb;
    }

    public static function consultarSitioWebPorCliente($cod_cliente)
    {

        $sitioWebDAO = SitioWebDAO::getSitioWebDAO(self::$conexionBD);
        $sitioWeb = $sitioWebDAO->consultPorCodCliente($cod_cliente);
        return $sitioWeb;
    }


    /**
     * Create an website page
     * @param SitioWeb status of users to create
     * @return void
     */
    public static function createWebSite($sitioWeb)
    {
        $sitioWebDAO = SitioWebDAO::getSitioWebDAO(self::$conexionBD);
        $sitioWebDAO->create($sitioWeb);
    }

    /**
     * Create an website page
     * @param SitioWeb status of users to create
     * @return void
     */
    public static function createWebSitexCliente($sitioWeb)
    {
        $sitioWebDAO = SitioWebDAO::getSitioWebDAO(self::$conexionBD);
        $sitioWebDAO->createPorCliente($sitioWeb);
    }

    /**
     * Modify an web site
     * @param SitioWeb Website page to modify
     * @return void
     */
    public static function modifyWebsite($sitioWeb)
    {
        $sitioWebDAO = SitioWebDAO::getSitioWebDAO(self::$conexionBD);
        $sitioWebDAO->modify($sitioWeb);
    }
    /**
     * Modify an web site
     * @param SitioWeb Website page to modify
     * @return void
     */
    public static function modifyWebsitexCliente($sitioWeb)
    {
        $sitioWebDAO = SitioWebDAO::getSitioWebDAO(self::$conexionBD);
        $sitioWebDAO->modifyPorCliente($sitioWeb);
    }

    /**
     * Delete an website
     * @param SitioWeb website page to delete
     * @return void
     */
    public static function deleteWebsite($sitioWeb)
    {
        $sitioWebDAO = sitioWebDAO::getSitioWebDAO(self::$conexionBD);
        $sitioWebDAO->delete($sitioWeb);
    }

    /**
     * List of SitioWeb
     * @return SitioWeb[] List of all the articles in the Data Base
     */
    public  static function getList()
    {
        $sitioWebDAO = sitioWebDAO::getSitioWebDAO(self::$conexionBD);
        $sitioWeb = $sitioWebDAO->getList();
        return $sitioWeb;
    }

    /**
     * Change the conexion
     */
    public static function setConexionBD($conexionBD)
    {
        self::$conexionBD = $conexionBD;
    }
}
