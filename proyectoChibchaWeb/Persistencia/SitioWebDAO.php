<?php

/**require_once ("/home/u999386215/public_html/proyectoLibreria/Negocio/Article.php");
require_once ("/home/u999386215/public_html/proyectoLibreria/Persistencia/Util/Conexion.php");
require_once ("/home/u999386215/public_html/proyectoLibreria/Persistencia/DAO.php");*/

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/SitioWeb.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/DAO.php';

/**
 *Represents the DAO of the article entity
 */
class SitioWebDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an sitioWebDAO object
     * @var sitioWebDAO
     */
    private static $sitioWebDAO;

    //------------------------------------------
    // Builder
    //------------------------------------------

    /**
     * Builder of the class
     *
     * @param Object $conexion
     */
    private function __construct($conexion)
    {
        #mysqli_set_charset($this->conexion, "utf8");
        $this->conexion = $conexion;
    }

    /**
     * Method to query an website by his code type
     *
     * @param int $cod_sitio_web
     * @return SitioWeb
     */
    public function consult($cod_sitio_web)
    {

        $sql = "SELECT * FROM SITIO_WEB WHERE cod_sitio_web = " . $cod_sitio_web;

        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);

        $sitioWeb = new SitioWeb();

        $sitioWeb->setCod_sitio_web($row[0]);
        $sitioWeb->setNombre_pagina_web($row[1]);
        $sitioWeb->setDescripcion($row[2]);

        $sitioWeb->setCod_cliente($row[3]);

        return $sitioWeb;
    }

    /**
     * Method to query an website by his code type
     *
     * @param int $cod_sitio_web
     * @return SitioWeb
     */
    public function consultPorCodCliente($cod_cliente)
    {

        $sql = "SELECT * FROM SITIO_WEB WHERE cod_cliente = " . $cod_cliente;

        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);

        $sitioWeb = new SitioWeb();

        $sitioWeb->setCod_sitio_web($row[0]);
        $sitioWeb->setNombre_pagina_web($row[1]);
        $sitioWeb->setDescripcion($row[2]);
        $sitioWeb->setCod_cliente($row[3]);

        return $sitioWeb;
    }

    /**
     * Method to create a new website 
     *
     * @param SitioWeb $sitioWeb
     * @return Int index inserted
     */
    public function create($sitioWeb)
    {

        $sql = "insert into SITIO_WEB values (" . $sitioWeb->getCod_sitio_web() . ",
                                            '" . $sitioWeb->getNombre_pagina_web() . "',
                                            '" . $sitioWeb->getDescripcion() . "',
                                            " . $sitioWeb->getCod_cliente() . "
                                        );";

        $result = pg_query($this->conexion, $sql);
        $insert_row = pg_fetch_row($result);
        return $insert_row[0];
    }

    /**
     * Method to create a new website 
     *
     * @param SitioWeb $sitioWeb
     * @return Int index inserted
     */
    public function createPorCliente($sitioWeb)
    {

        $sql = "insert into SITIO_WEB (nombre_pagina_web,descripcion,cod_cliente) values ('" . $sitioWeb->getNombre_pagina_web() . "',
                                            '" . $sitioWeb->getDescripcion() . "',
                                            " . $sitioWeb->getCod_cliente() . "

                                        );";

        $result = pg_query($this->conexion, $sql);
        $insert_row = pg_fetch_row($result);
        return $insert_row[0];
    }

    /**
     * Method that modifies an website entered by parameter
     *
     * @param SitioWeb $sitioWeb
     * @return void
     */
    public function modify($sitioWeb)
    {

        $sql = "UPDATE SITIO_WEB SET cod_sitio_web = " . $sitioWeb->getCod_sitio_web() . ",
                                   nombre_pagina_web = '" . $sitioWeb->getNombre_pagina_web() . "',
                                   descripcion = " . $sitioWeb->getDescripcion() . ",
                                   cod_cliente = '" . $sitioWeb->getCod_cliente() . "' 
                                   where cod_sitio_web = " . $sitioWeb->getCod_sitio_web() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an website entered by parameter
     *
     * @param SitioWeb $sitioWeb
     * @return void
     */
    public function modifyPorCliente($sitioWeb)
    {

        $sql = "UPDATE SITIO_WEB SET nombre_pagina_web = '" . $sitioWeb->getNombre_pagina_web() . "',
                                   descripcion = '" . $sitioWeb->getDescripcion() . "'
                                   where cod_cliente = " . $sitioWeb->getCod_cliente() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method to delete a new website status
     *
     * @param SitioWeb $cod_sitio_web
     * @return void
     */

    public function delete($cod_sitio_web)
    {
        $sql = "DELETE FROM SITIO_WEB WHERE cod_sitio_web = " . $cod_sitio_web;

        pg_query($this->conexion, $sql);
    }
    /**
     * Method to get an SitioWebDAO object
     *
     * @param Object $conexion
     * @return SitioWebDAO
     */
    public function getList()
    {

        $sql = "SELECT * FROM SITIO_WEB";

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $sitioWebs = array();

        while ($row = pg_fetch_array($resultado)) {
            $sitioWeb = new SitioWeb();
            $sitioWeb->setCod_sitio_web($row[0]);
            $sitioWeb->setNombre_pagina_web($row[1]);
            $sitioWeb->setDescripcion($row[2]);
            $sitioWeb->setCod_cliente($row[3]);

            array_push($sitioWebs, $sitioWeb);
            $sitioWebs[] = $sitioWeb;
        }
        return $sitioWebs;
    }



    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return SitioWebDAO
     */
    public static function getSitioWebDAO($conexion)
    {
        if (self::$sitioWebDAO == null) {
            self::$sitioWebDAO = new SitioWebDAO($conexion);
        }

        return self::$sitioWebDAO;
    }
}
