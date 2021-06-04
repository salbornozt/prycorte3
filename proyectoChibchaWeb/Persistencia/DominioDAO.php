<?php

/**require_once ("/home/u999386215/public_html/proyectoLibreria/Negocio/Article.php");
require_once ("/home/u999386215/public_html/proyectoLibreria/Persistencia/Util/Conexion.php");
require_once ("/home/u999386215/public_html/proyectoLibreria/Persistencia/DAO.php");*/

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Dominio.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/DAO.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Usuarioxdominio.php';

/**
 *Represents the DAO of the Paquete entity
 */
class DominioDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an PlanPagoDAO object
     * @var dominioDAO
     */
    private static $dominioDAO;

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
     * Method to query an user by his code type
     *
     * @param int $cod_dominio
     * @return Dominio
     */
    public function consult($cod_dominio)
    {

        $sql = "SELECT * FROM DOMINIO WHERE cod_dominio= " . $cod_dominio;

        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);

        $dominio = new Dominio();

        $dominio->setCod_dominio($row[0]);
        $dominio->setCod_sitio_web($row[1]);
        $dominio->setCod_paquete($row[2]);
        $dominio->setCod_planPago($row[3]);
        $dominio->setUrl($row[4]);
        $dominio->setFecha_creacion($row[5]);
        $dominio->setCod_distribuidor($row[6]);

        return $dominio;
    }


    /**
     * Method to query an user by his code type
     *
     * @param int $cod_dominio
     * @return Dominio
     */
    public function consultDominioXSitioWeb($cod_sitio_web)
    {

        $sql = "SELECT * FROM DOMINIO WHERE cod_sitio_web= " . $cod_sitio_web;

        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);

        $dominio = new Dominio();

        $dominio->setCod_dominio($row[0]);
        $dominio->setCod_sitio_web($row[1]);
        $dominio->setCod_paquete($row[2]);
        $dominio->setCod_planPago($row[3]);
        $dominio->setUrl($row[4]);
        $dominio->setFecha_creacion($row[5]);
        $dominio->setCod_distribuidor($row[6]);

        return $dominio;
    }

    /**
     * Method to query an user by his code type
     *
     * @param int $cod_dominio
     * @return Dominio
     */
    public function consultarDominioPorUrl($url)
    {

        $sql = "SELECT * FROM DOMINIO WHERE DOMINIO.url = '$url'";

        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);

        $dominio = new Dominio();

        $dominio->setCod_dominio($row[0]);
        $dominio->setCod_sitio_web($row[1]);
        $dominio->setCod_paquete($row[2]);
        $dominio->setCod_planPago($row[3]);
        $dominio->setUrl($row[4]);
        $dominio->setFecha_creacion($row[5]);
        $dominio->setCod_distribuidor($row[6]);

        return $dominio;
    }

    public function usuarioDominio($cod_cliente)
    {
        $sql = "select cod_dominio,nom_cliente, url, nom_paquete, nom_distribuidor, nom_planpago
        from cliente, sitio_web, dominio, paquete, distribuidor, plan_pago where 
        cliente.cod_cliente = sitio_web.cod_cliente and
        sitio_web.cod_sitio_web = dominio.cod_sitio_web and
        dominio.cod_paquete = paquete.cod_paquete and
        dominio.cod_distribuidor = distribuidor.cod_distribuidor and
        dominio.cod_planpago = plan_pago.cod_planpago and
		cliente.cod_cliente = $cod_cliente
        ORDER BY cod_dominio DESC LIMIT 1";

        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);
        $usuario = new Usuarioxdominio();
        $usuario->setCod_dominio($row[0]);
        $usuario->setNom_cliente($row[1]);
        $usuario->setUrl($row[2]);
        $usuario->setNom_paquete($row[3]);
        $usuario->setNom_distribuidor($row[4]);
        $usuario->setNom_planpago($row[5]);

        return $usuario;
    }

    /**
     * Method to create a new dominio
     *
     * @param Dominio $dominio
     * @return void
     */
    public function create($dominio)
    {

        $sql = "insert into DOMINIO (cod_sitio_web,cod_paquete,cod_planPago,url,fecha_creacion,cod_distribuidor) values (
                                            " . $dominio->getCod_sitio_web() . ",
                                            " . $dominio->getCod_paquete() . ",
                                            " . $dominio->getCod_planPago() . ",
                                            '" . $dominio->geturl() . "',
                                            '" . $dominio->getFecha_creacion() . "',
                                            " . $dominio->getCod_distribuidor() . "
                                        )";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an domain entered by parameter
     *
     * @param Dominio $dominio
     * @return void
     */
    public function modify($dominio)
    {

        $sql = "UPDATE DOMINIO SET cod_dominio = " . $dominio->getCod_dominio() . ",
                                   cod_sitio_web = " . $dominio->getCod_sitio_web() . ",
                                   cod_paquete = " . $dominio->getCod_paquete() . ",
                                   cod_planPago = " . $dominio->getCod_planPago() . ",
                                   url = '" . $dominio->getUrl() . "',
                                   fecha_creacion = " . $dominio->getFecha_creacion() . ",
                                   cod_distribuidor = " . $dominio->getCod_distribuidor() . "  
                                   where cod_dominio = " . $dominio->getCod_dominio() . "
                                ;";
        pg_query($this->conexion, $sql);
    }


    public function modificarPlanPago($dominio, $planPago)
    {

        $sql = "UPDATE DOMINIO SET cod_planpago = " . $planPago . " 
                                   where cod_dominio = " . $dominio . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    public function modificarCodPago($dominio, $planPago)
    {

        $sql = "UPDATE DOMINIO SET cod_planpago = " . $planPago . " 
                                   where cod_dominio = " . $dominio . "
                                ;";
        pg_query($this->conexion, $sql);
    }


    public function modificarDistribuidor($dominio, $distribuidor)
    {

        $sql = "UPDATE DOMINIO SET cod_distribuidor = " . $distribuidor . " 
                                   where cod_dominio = " . $dominio . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    public function modificarPaquete($dominio, $paquete)
    {

        $sql = "UPDATE DOMINIO SET cod_paquete = " . $paquete . " 
                                   where cod_dominio = " . $dominio . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method to delete a new dominio
     *
     * @param Dominio $dominio
     * @return void
     */

    public function delete($cod_dominio)
    {
        $sql = "DELETE FROM DOMINIO WHERE cod_dominio = " . $cod_dominio;

        pg_query($this->conexion, $sql);
    }
    /**
     * Method to get an DominioDAO object
     *
     * @param Object $conexion
     * @return DominioDAO
     */
    public function getList()
    {

        $sql = "SELECT * FROM DOMINIO";

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $dominios = array();

        while ($row = pg_fetch_array($resultado)) {
            $dominio = new Dominio();
            $dominio->setCod_dominio($row[0]);
            $dominio->setCod_sitio_web($row[1]);
            $dominio->setCod_paquete($row[2]);
            $dominio->setCod_planPago($row[3]);
            $dominio->setUrl($row[4]);
            $dominio->setFecha_creacion($row[5]);
            $dominio->setCod_distribuidor($row[6]);

            array_push($dominios, $dominio);
        }
        return $dominios;
    }



    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return PaqueteDAO
     */
    public static function getDominioDAO($conexion)
    {
        if (self::$dominioDAO == null) {
            self::$dominioDAO = new DominioDAO($conexion);
        }

        return self::$dominioDAO;
    }
}
