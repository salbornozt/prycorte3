<?php

/**
 * Import classes
 */


require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/EmpleadoDAO.php';


class ManejoEmpleado
{

    /**
     * Atribute for the connection to  the database
     */
    private static $conexionBD;

    function __construct()
    {
    }

    public static function consultarEmpleado($cod_empleado)
    {

        $empleadoDAO = EmpleadoDAO::getEmpleadoDAO(self::$conexionBD);
        $empleado = $empleadoDAO->consult($cod_empleado);
        return $empleado;
    }

    public static function modificarEmpleado($cod, $nom, $correo, $contraseña)
    {
        $empleadoDAO = EmpleadoDAO::getEmpleadoDAO(self::$conexionBD);
        $empleadoDAO->modificarEmpleado($cod, $nom, $correo, $contraseña);
    }



    public static function verificarCuentaEmpleado($correo, $pass)
    {

        $empleadoDAO = EmpleadoDAO::getEmpleadoDAO(self::$conexionBD);
        $empleado = $empleadoDAO->verificarCuenta($correo, $pass);
        return $empleado;
    }

    /**
     * Create an administrador
     * @param Empleado administrador to create
     * @return void
     */
    public static function createEmpleado($empleado)
    {
        $EmpleadoDAO = EmpleadoDAO::getEmpleadoDAO(self::$conexionBD);
        $EmpleadoDAO->create($empleado);
    }

    /**
     * Create an administrador
     * @param Empleado administrador to create
     * @return void
     */
    public static function createEmpleadoPorLogin($empleado)
    {
        $EmpleadoDAO = EmpleadoDAO::getEmpleadoDAO(self::$conexionBD);
        $EmpleadoDAO->createEmpleadoXLogin($empleado);
    }

    /**
     * Create an administrador
     * @param Empleado administrador to create
     * @return void
     */
    public static function crearEmpleado($empleado)
    {
        $EmpleadoDAO = EmpleadoDAO::getEmpleadoDAO(self::$conexionBD);
        $EmpleadoDAO->createEmpleado($empleado);
    }

    /**
     * Create an administrador
     * @param Empleado administrador to create
     * @return void
     */
    public static function crearEmpleadoxAdmin($empleado)
    {
        $EmpleadoDAO = EmpleadoDAO::getEmpleadoDAO(self::$conexionBD);
        $EmpleadoDAO->createEmpleadoxAdmin($empleado);
    }

    /**
     * Modify an categoria distribuidor
     * @param Empleado categoria distribuidor to modify
     * @return void
     */
    public static function modifyEmpleado($empleado)
    {
        $empleadoDAO = EmpleadoDAO::getEmpleadoDAO(self::$conexionBD);
        $empleadoDAO->modify($empleado);
    }

    /**
     * Modify an categoria distribuidor
     * @param Empleado categoria distribuidor to modify
     * @return void
     */
    public static function modifyEmpleadoXTicket($empleado)
    {
        $empleadoDAO = EmpleadoDAO::getEmpleadoDAO(self::$conexionBD);
        $empleadoDAO->modifyXEmpleadoXTicket($empleado);
    }
    /**
     * Delete an categoria distribuidor
     * @param Empleado categoria distribuidor to modify
     * @return void
     */
    public static function deleteEmpleado($empleado)
    {
        $empleadoDAO = EmpleadoDAO::getEmpleadoDAO(self::$conexionBD);
        $empleadoDAO->delete($empleado);
    }

    /**
     * Delete an categoria distribuidor
     * @param Cliente categoria distribuidor to modify
     * @return void
     */
    public static function deleteCedulaE($empleado)
    {
        $empleadoDAO = EmpleadoDAO::getEmpleadoDAO(self::$conexionBD);
        $empleadoDAO->deleteCedulaE($empleado);
    }

    /**
     * List of categoria distribuidor
     * @return Empleado[] List of all the categoria distribuidor in the Data Base
     */
    public static function getList()
    {
        $empleadoDAO = EmpleadoDAO::getEmpleadoDAO(self::$conexionBD);
        $empleado = $empleadoDAO->getList();
        return $empleado;
    }

    /**
     * List of categoria distribuidor
     * @return Empleado[] List of all the categoria distribuidor in the Data Base
     */
    public static function getListXEmpleadoXCantidadTickets()
    {
        $empleadoDAO = EmpleadoDAO::getEmpleadoDAO(self::$conexionBD);
        $empleado = $empleadoDAO->getListXEmpleadoXCantidadTickets();
        return $empleado;
    }

    /**
     * Delete an distribuidor
     * @param Cliente cliente to modify
     * @return void
     */
    public static function cambiarEstadoActivado($empleado)
    {
        $empleadoDAO = EmpleadoDAO::getEmpleadoDAO(self::$conexionBD);
        $empleadoDAO->cambiarEstadoActivado($empleado);
    }

    public static function cambiarEstadoDesactivado($empleado)
    {
        $empleadoDAO = EmpleadoDAO::getEmpleadoDAO(self::$conexionBD);
        $empleadoDAO->cambiarEstadoDesactivado($empleado);
    }


    public static function getListActivar()
    {
        $empleadoDAO = EmpleadoDAO::getEmpleadoDAO(self::$conexionBD);
        $empleado = $empleadoDAO->getListActivar();
        return $empleado;
    }


    public static function getListDesactivar()
    {
        $empleadoDAO = EmpleadoDAO::getEmpleadoDAO(self::$conexionBD);
        $empleado = $empleadoDAO->getListDesactivar();
        return $empleado;
    }

    /**
     * Change the conexion
     */
    public static function setConexionBD($conexionBD)
    {
        self::$conexionBD = $conexionBD;
    }
}
