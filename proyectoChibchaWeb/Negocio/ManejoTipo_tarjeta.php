<?php

/**
 * Import classes
 */


require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/TipoTarjetaDAO.php';


class ManejoTipo_tarjeta
{

    /**
     * Atribute for the connection to  the database
     */
    private static $conexionBD;

    function __construct()
    {
    }

    public static function consultarTipo_tarjeta($cod_tipo_tarjeta)
    {

        $tipoTarjetaDAO = TipoTarjetaDAO::getTipoTarjetaDAO(self::$conexionBD);
        $tipoTarjeta = $tipoTarjetaDAO->consult($cod_tipo_tarjeta);
        return $tipoTarjeta;
    }

    /**
     * Create an tarjetaCredito
     * @param Tipo_tarjeta tarjetaCredito to create
     * @return void
     */
    public static function createTipoTarjeta($tipoTarjeta)
    {
        $tipoTarjetaDAO = TipoTarjetaDAO::getTipoTarjetaDAO(self::$conexionBD);
        $tipoTarjetaDAO->create($tipoTarjeta);
    }

    /**
     * Modify an tarjetaCredito
     * @param Tipo_tarjeta PlanPago to modify
     * @return void
     */
    public static function modifyPlanPago($tarjetaCredito)
    {
        $tipoTarjetaDAO = TipoTarjetaDAO::getTipoTarjetaDAO(self::$conexionBD);
        $tipoTarjetaDAO->modify($tarjetaCredito);
    }
    /**
     * Delete an planPago
     * @param Tipo_tarjeta PlanPago to modify
     * @return void
     */
    public static function deletePlanPago($planPago)
    {
        $tipoTarjetaDAO = TipoTarjetaDAO::getTipoTarjetaDAO(self::$conexionBD);
        $tipoTarjetaDAO->delete($planPago);
    }

    /**
     * List of Article
     * @return Tipo_tarjeta[] List of all the articles in the Data Base
     */
    public  static function getList()
    {
        $tipoTarjetaDAO = TipoTarjetaDAO::getTipoTarjetaDAO(self::$conexionBD);
        $tipoTarjeta = $tipoTarjetaDAO->getList();
        return $tipoTarjeta;
    }

    /**
     * Change the conexion
     */
    public static function setConexionBD($conexionBD)
    {
        self::$conexionBD = $conexionBD;
    }
}
