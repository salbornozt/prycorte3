<?php

/**require_once ("/home/u999386215/public_html/proyectoLibreria/Negocio/Article.php");
require_once ("/home/u999386215/public_html/proyectoLibreria/Persistencia/Util/Conexion.php");
require_once ("/home/u999386215/public_html/proyectoLibreria/Persistencia/DAO.php");*/

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/PlanPago.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/DAO.php';

/**
 *Represents the DAO of the PlanPago entity
 */
class PlanPagoDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an PlanPagoDAO object
     * @var planPagoDAO
     */
    private static $planPagoDAO;

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
     * @param int $cod_planPago
     * @return PlanPago
     */
    public function consult($cod_planPago)
    {

        $sql = "SELECT * FROM PLAN_PAGO WHERE cod_planPago = " . $cod_planPago;

        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);

        $planPago = new PlanPago();

        $planPago->setCod_planPago($row[0]);
        $planPago->setNom_planPago($row[1]);
        $planPago->setValor_planPago($row[2]);



        return $planPago;
    }


    public function consultarCod($nom_planPago)
    {

        $sql = "SELECT * FROM PLAN_PAGO WHERE nom_planpago = '".$nom_planPago."'";

        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);

        $planPago = new PlanPago();

        $planPago->setCod_planPago($row[0]);
        $planPago->setNom_planPago($row[1]);
        $planPago->setValor_planPago($row[2]);



        return $planPago;
    }

    /**
     * Method to create a new planPago
     *
     * @param PlanPago $planPago
     * @return void
     */
    public function create($planPago)
    {

        $sql = "insert into USUARIO values (" . $planPago->getCod_planPago() . ",
                                            '" . $planPago->getNom_planPago() . "',
                                            " . $planPago->getValor_planPago() . "
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an planPago entered by parameter
     *
     * @param PlanPago $planPago
     * @return void
     */
    public function modify($planPago)
    {

        $sql = "UPDATE PLAN_PAGO SET cod_planPago = " . $planPago->getCod_planPago() . ",
                                   nom_planPago = '" . $planPago->getNom_planPago() . "',
                                   valor_planPago = " . $planPago->getValor_planPago() . "           
                                   where cod_planPago = " . $planPago->getCod_planPago() . "
                                ;";
        pg_query($this->conexion, $sql);
    }



    /**
     * Method to delete a new planPago
     *
     * @param PLanPago $planPago
     * @return void
     */

    public function delete($cod_planPago)
    {
        $sql = "DELETE FROM PLAN_PAGO WHERE cod_planPago = " . $cod_planPago;

        pg_query($this->conexion, $sql);
    }
    /**
     * Method to get an PlanPagoDAO object
     *
     * @param Object $conexion
     * @return PlanPagoDAO
     */
    public function getList()
    {

        $sql = "SELECT * FROM PLAN_PAGO";

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $planPagos = array();

        while ($row = pg_fetch_array($resultado)) {
            $planPago = new PlanPago();
            $planPago->setCod_planPago($row[0]);
            $planPago->setNom_planPago($row[1]);
            $planPago->setValor_planPago($row[2]);

            array_push($planPagos, $planPago);
        }
        return $planPagos;
    }



    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return PLanPagoDAO
     */
    public static function getPlanPagoDAO($conexion)
    {
        if (self::$planPagoDAO == null) {
            self::$planPagoDAO = new PlanPagoDAO($conexion);
        }

        return self::$planPagoDAO;
    }
}
