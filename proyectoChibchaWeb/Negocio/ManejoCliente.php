<?php

/**
 * Import classes
 */


require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/ClienteDAO.php';


class ManejoCliente
{

    /**
     * Atribute for the connection to  the database
     */
    private static $conexionBD;

    function __construct()
    {
    }

    public static function consultarCliente($cod_cliente)
    {

        $clienteDAO = ClienteDAO::getClienteDAO(self::$conexionBD);
        $cliente = $clienteDAO->consult($cod_cliente);
        return $cliente;
    }

    public static function verificarCuentaCliente($correo, $pass)
    {

        $clienteDAO = ClienteDAO::getClienteDAO(self::$conexionBD);
        $cliente = $clienteDAO->verificarCuenta($correo, $pass);
        return $cliente;
    }

    /**
     * Create an administrador
     * @param Cliente administrador to create
     * @return void
     */
    public static function createCliente($cliente)
    {
        $ClienteDAO = ClienteDAO::getClienteDAO(self::$conexionBD);
        $ClienteDAO->create($cliente);
    }

    /**
     * Modify an categoria distribuidor
     * @param Cliente categoria distribuidor to modify
     * @return void
     */
    public static function modifyCliente($cliente)
    {
        $clienteDAO = ClienteDAO::getClienteDAO(self::$conexionBD);
        $clienteDAO->modify($cliente);
    }

    public static function modifyClientePerfil($cliente)
    {
        $clienteDAO = ClienteDAO::getClienteDAO(self::$conexionBD);
        $clienteDAO->modifyPerfil($cliente);
    }
    /**
     * Delete an categoria distribuidor
     * @param Cliente categoria distribuidor to modify
     * @return void
     */
    public static function deleteCliente($cliente)
    {
        $clienteDAO = ClienteDAO::getClienteDAO(self::$conexionBD);
        $clienteDAO->delete($cliente);
    }
     /**
     * Delete an categoria distribuidor
     * @param Cliente categoria distribuidor to modify
     * @return void
     */
    public static function deleteCedula($cliente)
    {
        $clienteDAO = ClienteDAO::getClienteDAO(self::$conexionBD);
        $clienteDAO->deleteCedula($cliente);
    }
    /**
     * List of categoria distribuidor
     * @return Cliente[] List of all the categoria distribuidor in the Data Base
     */
    public static function getList()
    {
        $clienteDAO = ClienteDAO::getClienteDAO(self::$conexionBD);
        $cliente = $clienteDAO->getList();
        return $cliente;
    }

     /**
         * Delete an distribuidor
         * @param Cliente cliente to modify
         * @return void
         */
        public static function cambiarEstadoActivado($cliente){
            $clienteDAO=ClienteDAO::getClienteDAO(self::$conexionBD);
            $clienteDAO->cambiarEstadoActivado($cliente);
        }

        public static function cambiarEstadoDesactivado($cliente){
            $clienteDAO=ClienteDAO::getClienteDAO(self::$conexionBD);
            $clienteDAO->cambiarEstadoDesactivado($cliente);
        }

    
        public static function getListActivar()
        {
            $clienteDAO = ClienteDAO::getClienteDAO(self::$conexionBD);
            $cliente = $clienteDAO->getListActivar();
            return $cliente;
           
        }

        
        public static function getListDesactivar()
        {
            $clienteDAO = ClienteDAO::getClienteDAO(self::$conexionBD);
            $cliente = $clienteDAO->getListDesactivar();
            return $cliente;
           
        }

    /**
     * Change the conexion
     */
    public static function setConexionBD($conexionBD)
    {
        self::$conexionBD = $conexionBD;
    }
}
