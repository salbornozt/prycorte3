<?php

/*require_once ("/home/u999386215/public_html/proyectoLibreria/Negocio/Article.php");
require_once ("/home/u999386215/public_html/proyectoLibreria/Persistencia/Util/Conexion.php");
require_once ("/home/u999386215/public_html/proyectoLibreria/Persistencia/DAO.php");*/

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Distribuidor.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/DAO.php';

/**
 *Represents the DAO of the Paquete entity
 */
class DistribuidorDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an PlanPagoDAO object
     * @var DistribuidorDAO
     */
    private static $DistribuidorDAO;

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
     * @param int $cod_distribuidor
     * @return Distribuidor
     */
    public function consult($cod_distribuidor)
    {

        $sql = "SELECT * FROM DISTRIBUIDOR WHERE cod_distribuidor = " . $cod_distribuidor;

        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);

        $Distribuidor = new Distribuidor();

        $Distribuidor->setCod_distribuidor($row[0]);
        $Distribuidor->setnom_distribuidor($row[1]);
        $Distribuidor->setCorreo_distribuidor($row[2]);
        $Distribuidor->setCod_categoria_distribuidor($row[3]);
        $Distribuidor->setEstado_distribuidor($row[4]);

        return $Distribuidor;
    }

    /**
     * Method to create a new comision
     *
     * @param Distribuidor $Distribuidor
     * @return void
     */
    public function create($Distribuidor)
    {

        $sql = "insert into DISTRIBUIDOR values (" . $Distribuidor->getCod_distribuidor() . ",
                                            '" . $Distribuidor->getNom_distribuidor() . "',
                                            '" . $Distribuidor->getCorreo_distribuidor() . "',
                                            " . $Distribuidor->getCod_categoria_distribuidor() . "
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an Distribuidor entered by parameter
     *
     * @param Distribuidor $Distribuidor
     * @return void
     */
    public function modify($Distribuidor)
    {

        $sql = "UPDATE DISTRIBUIDOR SET cod_distribuidor= " . $Distribuidor->getCod_distribuidor() . ",
                                    nom_distribuidor = '" . $Distribuidor->getNom_distribuidor() . "',
                                    correo_distribuidor = '" . $Distribuidor->getCorreo_distribuidor() . "',
                                    cod_categoria_distribuidor = " . $Distribuidor->getCod_categoria_distribuidor() . "
                                ;";
        mysqli_query($this->conexion, $sql);
    }

    /**
     * Method to delete a new Distribuidor
     *
     * @param Distribuidor $Distribuidor
     * @return void
     */

    public function delete($cod_distribuidor)
    {
        $sql = "DELETE FROM DISTRIBUIDOR WHERE cod_distribuidor = " . $cod_distribuidor;

        pg_query($this->conexion, $sql);
    }


    public function consultarCod($nom_distribuidor)
    {

        $sql = "SELECT * FROM distribuidor WHERE nom_distribuidor = '".$nom_distribuidor."'";

        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);

        $Distribuidor = new Distribuidor();

        $Distribuidor->setCod_distribuidor($row[0]);
        $Distribuidor->setnom_distribuidor($row[1]);
        $Distribuidor->setCorreo_distribuidor($row[2]);
        $Distribuidor->setCod_categoria_distribuidor($row[3]);

        return $Distribuidor;
    }


    /**
     * Method to get an DistribuidorDAO object
     *
     * @param Object $conexion
     * @return DistribuidorDAO
     */
    public function getList()
    {

        $sql = "SELECT cod_distribuidor, nom_distribuidor, correo_distribuidor, nom_categoria,cod_estado
        FROM distribuidor, categoria_distribuidor
        WHERE distribuidor.cod_categoria_distribuidor = categoria_distribuidor.cod_categoria_distribuidor
        ORDER BY nom_distribuidor";
        $list = array();
        if (!$resultado = pg_query($this->conexion, $sql)) die();
        while ($row = pg_fetch_array($resultado)) {
            $item = new Distribuidor();
            $item->setCod_distribuidor($row[0]);
            $item->setNom_distribuidor($row[1]);
            $item->setCorreo_distribuidor($row[2]);
            $item->setNom_categoria_distribuidor($row[3]);
            $item->setEstado_distribuidor($row[4]);
            array_push($list, $item);

        }
        return $list;
/*
        $sql = "SELECT * FROM TICKET";
        $tickets = array();
        if (!$resultado = pg_query($this->conexion, $sql)) die();
        while ($row = pg_fetch_array($resultado)) {
            $ticket = new Ticket();
            $ticket->setCod_ticket($row[0]);
            $ticket->setNom_ticket($row[1]);
            $ticket->setDescripción_ticket($row[2]);
            $ticket->setEstado_del_ticket($row[3]);
            $ticket->setFecha_creacion($row[4]);
            $ticket->setCod_cliente($row[5]);
            $ticket->setCod_empleado($row[6]);

            array_push($tickets, $ticket);
        }
        return $tickets;
        */
    }

    public function getActiveList()
    {

        $sql = "SELECT cod_distribuidor, nom_distribuidor, correo_distribuidor, nom_categoria,cod_estado
        FROM distribuidor, categoria_distribuidor
        WHERE distribuidor.cod_categoria_distribuidor = categoria_distribuidor.cod_categoria_distribuidor AND
        distribuidor.cod_estado = 1
        ORDER BY nom_distribuidor";
        $list = array();
        if (!$resultado = pg_query($this->conexion, $sql)) die();
        while ($row = pg_fetch_array($resultado)) {
            $item = new Distribuidor();
            $item->setCod_distribuidor($row[0]);
            $item->setNom_distribuidor($row[1]);
            $item->setCorreo_distribuidor($row[2]);
            $item->setNom_categoria_distribuidor($row[3]);
            $item->setEstado_distribuidor($row[4]);
            array_push($list, $item);

        }
        return $list;
/*
        $sql = "SELECT * FROM TICKET";
        $tickets = array();
        if (!$resultado = pg_query($this->conexion, $sql)) die();
        while ($row = pg_fetch_array($resultado)) {
            $ticket = new Ticket();
            $ticket->setCod_ticket($row[0]);
            $ticket->setNom_ticket($row[1]);
            $ticket->setDescripción_ticket($row[2]);
            $ticket->setEstado_del_ticket($row[3]);
            $ticket->setFecha_creacion($row[4]);
            $ticket->setCod_cliente($row[5]);
            $ticket->setCod_empleado($row[6]);

            array_push($tickets, $ticket);
        }
        return $tickets;
        */
    }



    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return PaqueteDAO
     */
    public static function getDistribuidorDAO($conexion)
    {
        if (self::$DistribuidorDAO == null) {
            self::$DistribuidorDAO = new DistribuidorDAO($conexion);
        }

        return self::$DistribuidorDAO;
    }

    /**
     * Method to delete a new Distribuidor
     *
     * @param Distribuidor $Distribuidor
     * @return void
     * 2 INACTIVO
     * 1 ACTIVO
     */

    public function cambiarEstadoDesactivado($cod_distribuidor)
  
    {
        $sql = "UPDATE  DISTRIBUIDOR SET COD_ESTADO=2 WHERE cod_distribuidor = " . $cod_distribuidor;

        pg_query($this->conexion, $sql);
    }
    /**
     * Method to delete a new Distribuidor
     *
     * @param Distribuidor $Distribuidor
     * @return void
     * 2 INACTIVO
     * 1 ACTIVO
     */

    public function cambiarEstadoActivado($cod_distribuidor)
  
    {
        $sql = "UPDATE  DISTRIBUIDOR SET COD_ESTADO=1 WHERE cod_distribuidor = " . $cod_distribuidor;

        pg_query($this->conexion, $sql);
    }

    public function creaDistribuidorxAdmin($distribuidor)
    {
        $sql = "insert into DISTRIBUIDOR (nom_distribuidor, correo_distribuidor, cod_categoria_distribuidor,cod_estado)
        values (
        
        '" . $distribuidor->getNom_distribuidor() . "',
        '" . $distribuidor->getCorreo_distribuidor() . "',
        " . $distribuidor->getCod_categoria_distribuidor() . ",
        " . $distribuidor->getEstado_distribuidor() . "
    );";

        pg_query($this->conexion, $sql);
    }

     /**
     * Method to get an DistribuidorDAO object
     *
     * @param Object $conexion
     * @return DistribuidorDAO
     */
    public function getListActivar()
    {

        $sql = "SELECT cod_distribuidor
        FROM distribuidor
        WHERE distribuidor.cod_estado = 2
        ";
        $list = array();
        if (!$resultado = pg_query($this->conexion, $sql)) die();
        while ($row = pg_fetch_array($resultado)) {
            $item = new Distribuidor();
            $item->setCod_distribuidor($row[0]);
           
            array_push($list, $item);

        }
        return $list;

    }
     /**
     * Method to get an DistribuidorDAO object
     *
     * @param Object $conexion
     * @return DistribuidorDAO
     */
    public function getListDesactivar()
    {

        $sql = "SELECT cod_distribuidor
        FROM distribuidor
        WHERE distribuidor.cod_estado = 1
        ";
        $list = array();
        if (!$resultado = pg_query($this->conexion, $sql)) die();
        while ($row = pg_fetch_array($resultado)) {
            $item = new Distribuidor();
            $item->setCod_distribuidor($row[0]);
           
            array_push($list, $item);

        }
        return $list;

    }
}
