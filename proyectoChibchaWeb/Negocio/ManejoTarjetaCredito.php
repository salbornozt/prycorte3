<?php

/**
 * Import classes
 */


require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/TarjetaCreditoDAO.php';


class ManejoTarjetaCredito
{

    /**
     * Atribute for the connection to  the database
     */
    private static $conexionBD;

    function __construct()
    {
    }

    public static function consultarTarjetaCredito($cod_tarjeta_credito)
    {

        $tarjetaCreditoDAO = TarjetaCreditoDAO::getTarjetaCreditoDAO(self::$conexionBD);
        $tarjetaCredito = $tarjetaCreditoDAO->consult($cod_tarjeta_credito);
        return $tarjetaCredito;
    }

    public static function consultarTarjetaCreditoPorCliente($cod_cliente)
    {

        $tarjetaCreditoDAO = TarjetaCreditoDAO::getTarjetaCreditoDAO(self::$conexionBD);
        $tarjetaCredito = $tarjetaCreditoDAO->consultPorCliente($cod_cliente);
        return $tarjetaCredito;
    }

    /**
     * Create an tarjetaCredito
     * @param TarjetaCredito tarjetaCredito to create
     * @return void
     */
    public static function createTarjetaCredito($tarjetaCredito)
    {
        $tarjetaCreditoDAO = TarjetaCreditoDAO::getTarjetaCreditoDAO(self::$conexionBD);
        $tarjetaCreditoDAO->create($tarjetaCredito);
    }

    /**
     * Create an tarjetaCredito
     * @param TarjetaCredito tarjetaCredito to create
     * @return void
     */
    public static function createTarjetaCreditoxCliente($tarjetaCredito)
    {
        $tarjetaCreditoDAO = TarjetaCreditoDAO::getTarjetaCreditoDAO(self::$conexionBD);
        $tarjetaCreditoDAO->createPorCliente($tarjetaCredito);
    }

    /**
     * Modify an tarjetaCredito
     * @param TarjetaCredito PlanPago to modify
     * @return void
     */
    public static function modifyTarjetaCredito($tarjetaCredito)
    {
        $tarjetaCreditoDAO = TarjetaCreditoDAO::getTarjetaCreditoDAO(self::$conexionBD);
        $tarjetaCreditoDAO->modify($tarjetaCredito);
    }
    /**
     * Delete an planPago
     * @param PlanPago PlanPago to modify
     * @return void
     */
    public static function deleteTarjetaCredito($tarjetaCredito)
    {
        $tarjetaCreditoDAO = TarjetaCreditoDAO::getTarjetaCreditoDAO(self::$conexionBD);
        $tarjetaCreditoDAO->delete($tarjetaCredito);
    }

    /**
     * List of Article
     * @return TarjetaCredito[] List of all the articles in the Data Base
     */
    public  static function getList()
    {
        $tarjetaCreditoDAO = TarjetaCreditoDAO::getTarjetaCreditoDAO(self::$conexionBD);
        $tarjetaCredito = $tarjetaCreditoDAO->getList();
        return $tarjetaCredito;
    }

    /**
     * Change the conexion
     */
    public static function setConexionBD($conexionBD)
    {
        self::$conexionBD = $conexionBD;
    }
}
