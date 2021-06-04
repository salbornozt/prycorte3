<?php

/**
 * Import classes
 */


require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/TicketDAO.php';


class ManejoTicket
{

    /**
     * Atribute for the connection to  the database
     */
    private static $conexionBD;

    function __construct()
    {
    }

    public static function consultarTicket($cod_ticket)
    {

        $TicketDAO = TicketDAO::getTicketDAO(self::$conexionBD);
        $ticket = $TicketDAO->consult($cod_ticket);
        return $ticket;
    }

    public static function consultTotalTicketsxClientes($cod_ticket)
    {

        $TicketDAO = TicketDAO::getTicketDAO(self::$conexionBD);
        $ticket = $TicketDAO->consultTotalTicketsxCliente($cod_ticket);
        return $ticket;
    }

    public static function consultarTicketxCliente($cod_ticket)
    {

        $TicketDAO = TicketDAO::getTicketDAO(self::$conexionBD);
        $ticket = $TicketDAO->consultXCliente($cod_ticket);
        return $ticket;
    }

    public static function consultarTicketCodigoEmpleado($cod_empleado)
    {

        $TicketDAO = TicketDAO::getTicketDAO(self::$conexionBD);
        $ticket = $TicketDAO->ticketsEmpleado($cod_empleado);
        return $ticket;
    }

    public static function consultarTicketCodigoEmpleadoxCliente($cod_empleado)
    {

        $TicketDAO = TicketDAO::getTicketDAO(self::$conexionBD);
        $ticket = $TicketDAO->ticketsCliente($cod_empleado);
        return $ticket;
    }

    /**
     * 
     * @param Ticket 
     * @return void
     */
    public static function createTicket($ticket)
    {
        $TicketDAO = TicketDAO::getTicketDAO(self::$conexionBD);
        $TicketDAO->create($ticket);
    }

    /**
     * 
     * @param Ticket 
     * @return void
     */
    public static function createTicketXCliente($ticket)
    {
        $TicketDAO = TicketDAO::getTicketDAO(self::$conexionBD);
        $TicketDAO->createXCliente($ticket);
    }

    /**
     * 
     * @param Ticket 
     * @return void
     */
    public static function modifyTicket($ticket)
    {
        $TicketDAO = TicketDAO::getTicketDAO(self::$conexionBD);
        $TicketDAO->modify($ticket);
    }


    public static function modificarEstadoTicket($ticket, $cod_empleado, $cantidad)
    {
        $TicketDAO = TicketDAO::getTicketDAO(self::$conexionBD);
        $TicketDAO->modificarEstado($ticket);
        if ($cantidad > 0) {
            $TicketDAO->restarTicket($cod_empleado);
        }
    }

    public static function pasarSiguienteNivel($ticket, $nivel, $cod_empleado, $cantidad)
    {
        $TicketDAO = TicketDAO::getTicketDAO(self::$conexionBD);
        $TicketDAO->siguienteNivel($ticket, $nivel);
        if ($cantidad > 0) {
            $TicketDAO->restarTicket($cod_empleado);
        }
    }

    public static function usuariosxdominio()
    {
        $TicketDAO = TicketDAO::getTicketDAO(self::$conexionBD);
        $ticket = $TicketDAO->usuariosDominios();
        return $ticket;
    }

    /**
     * Delete an categoria ticket
     * @param Ticket categoria ticket to modify
     * @return void
     */
    public static function deleteTicket($ticket)
    {
        $TicketDAO = TicketDAO::getTicketDAO(self::$conexionBD);
        $TicketDAO->delete($ticket);
    }

    /**
     * List of categoria distribuidor
     * @return Ticket[] List of all the categoria distribuidor in the Data Base
     */
    public static function getList()
    {
        $TicketDAO = TicketDAO::getTicketDAO(self::$conexionBD);
        $ticket = $TicketDAO->getList();
        return $ticket;
    }

    /**
     * List of categoria distribuidor
     * @return Ticket[] List of all the categoria distribuidor in the Data Base
     */

    public static function getListTickxCliente($cod_cliente)
    {
        $TicketDAO = TicketDAO::getTicketDAO(self::$conexionBD);
        $ticket = $TicketDAO->getListTicketxCliente($cod_cliente);
        return $ticket;
    }

    /**
     * Change the conexion
     */
    public static function setConexionBD($conexionBD)
    {
        self::$conexionBD = $conexionBD;
    }
}
