<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Ticket.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Usuarioxdominio.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/DAO.php';

/**
 *Represents the DAO of the Ticket entity
 */
class TicketDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an PlanPagoDAO object
     * @var ticketDAO
     */
    private static $ticketDAO;

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
     * @param int $cod_ticket
     * @return Ticket
     */
    public function consult($cod_ticket)
    {

        $sql = "SELECT * FROM TICKET WHERE cod_ticket= " . $cod_ticket;

        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);

        $ticket = new Ticket();

        $ticket->setCod_ticket($row[0]);
        $ticket->setNom_ticket($row[1]);
        $ticket->setDescripción_ticket($row[2]);
        $ticket->setEstado_del_ticket($row[3]);
        $ticket->setFecha_creacion($row[4]);
        $ticket->setCod_cliente($row[5]);
        $ticket->setCod_empleado($row[6]);

        return $ticket;
    }

    /**
     * Method to query an user by his code type
     *
     * @param int $cod_cliente
     * @return Ticket
     */
    public function consultXCliente($cod_cliente)
    {

        $sql = "SELECT * FROM TICKET WHERE cod_cliente= " . $cod_cliente;

        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);

        $ticket = new Ticket();

        $ticket->setCod_ticket($row[0]);
        echo $ticket->setCod_cliente($row[0]);
        $ticket->setNom_ticket($row[1]);
        $ticket->setDescripción_ticket($row[2]);
        $ticket->setEstado_del_ticket($row[3]);
        $ticket->setFecha_creacion($row[4]);
        $ticket->setCod_cliente($row[5]);
        $ticket->setCod_empleado($row[6]);

        return $ticket;
    }

    /**
     * Method to query an user by his code type
     *
     * @param int $cod_cliente
     * @return Ticket
     */
    public function consultTotalTicketsxCliente($cod_cliente)
    {

        $sql = "SELECT COUNT(*) FROM  TICKET where cod_cliente= " . $cod_cliente;

        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);

        $ticket = new Ticket();

        $ticket->setCod_cliente($row[0]);
        $ticket->setNom_ticket($row[1]);
        $ticket->setDescripción_ticket($row[2]);
        $ticket->setEstado_del_ticket($row[3]);
        $ticket->setFecha_creacion($row[4]);
        $ticket->setCod_cliente($row[5]);
        $ticket->setCod_empleado($row[6]);

        return $ticket;
    }


    public function ticketsEmpleado($cod_empleado)
    {

        $sql = "SELECT * FROM TICKET WHERE cod_empleado= " . $cod_empleado . " and estado_del_ticket = 'sin revisar'";

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
    }

    public function ticketsCliente($cod_empleado)
    {

        $sql = "select cod_ticket,nom_cliente, nom_ticket, descripción_ticket, fecha_creacion, cod_ticket from 
        cliente,ticket where 
        ticket.cod_empleado =" . $cod_empleado . " and
        cliente.cod_cliente = ticket.cod_cliente and
        estado_del_ticket = 'sin revisar'
        order by nom_cliente";

        $tickets = array();
        if (!$resultado = pg_query($this->conexion, $sql)) die();
        while ($row = pg_fetch_array($resultado)) {
            $ticket = new Ticket();
            $ticket->setCod_ticket($row[0]);
            $ticket->setNom_cliente($row[1]);
            $ticket->setNom_ticket($row[2]);
            $ticket->setDescripción_ticket($row[3]);
            $ticket->setFecha_creacion($row[4]);
            array_push($tickets, $ticket);
        }
        return $tickets;
    }

    public function usuariosDominios()
    {
        $sql = "select cod_dominio,nom_cliente, url, nom_paquete, nom_distribuidor, nom_planpago
        from cliente, sitio_web, dominio, paquete, distribuidor, plan_pago where 
        cliente.cod_cliente = sitio_web.cod_cliente and
        sitio_web.cod_sitio_web = dominio.cod_sitio_web and
        dominio.cod_paquete = paquete.cod_paquete and
        dominio.cod_distribuidor = distribuidor.cod_distribuidor and
        dominio.cod_planpago = plan_pago.cod_planpago
        order by cod_dominio";

        $usuarios = array();
        if (!$resultado = pg_query($this->conexion, $sql)) die();
        while ($row = pg_fetch_array($resultado)) {
            $usuario = new Usuarioxdominio();
            $usuario->setCod_dominio($row[0]);
            $usuario->setNom_cliente($row[1]);
            $usuario->setUrl($row[2]);
            $usuario->setNom_paquete($row[3]);
            $usuario->setNom_distribuidor($row[4]);
            $usuario->setNom_planpago($row[5]);

            array_push($usuarios, $usuario);
        }
        return $usuarios;
    }


    public function modificarEstado($ticket)
    {
        $sql = "UPDATE TICKET SET estado_del_ticket= 'revisado' where cod_ticket = " . $ticket . "";
        pg_query($this->conexion, $sql);
    }

    public function restarTicket($cod_empleado)
    {
        $sql = "UPDATE empleado SET cantidad_de_tickets= cantidad_de_tickets-1 WHERE cod_empleado=" . $cod_empleado;
        pg_query($this->conexion, $sql);
    }

    public function siguienteNivel($ticket, $nivel)
    {

        $sqlCodEmpleado = "SELECT * FROM empleado where nivel_empleado = ".$nivel." ORDER BY cantidad_de_tickets ASC LIMIT 1";
        $codEmpleado = 0;
        if (!$resultado = pg_query($this->conexion, $sqlCodEmpleado)) die();
        while ($row = pg_fetch_array($resultado)) {
            $codEmpleado = $row[0];
        }


        $sql = "UPDATE TICKET SET cod_empleado= " . $codEmpleado . " where cod_ticket = " . $ticket . "";
        pg_query($this->conexion, $sql);

        $sql1 = "UPDATE empleado SET cantidad_de_tickets= cantidad_de_tickets+1 WHERE cod_empleado=" . $codEmpleado;
        pg_query($this->conexion, $sql1);
    }

    /**
     * Method to create a new tiquete
     *
     * @param ticket $comision
     * @return void
     */
    public function create($ticket)
    {

        $sql = "insert into ticket values (" . $ticket->getCod_ticket() . ",
                                            '" . $ticket->getNom_ticket() . "',
                                            '" . $ticket->getDescripción_ticket() . "',
                                            '" . $ticket->getEstado_del_ticket() . "',
                                            '" . $ticket->getFecha_creacion() . "',
                                            " . $ticket->getCod_cliente() . ",
                                            " . $ticket->getCod_empleado() . "
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method to create a new tiquete
     *
     * @param Ticket $ticket
     * @return void
     */
    public function createXCliente($ticket)
    {

        $sql = "insert into ticket (nom_ticket, descripción_ticket, estado_del_ticket, fecha_creacion, cod_cliente, cod_empleado) 
                                            values (
                                            '" . $ticket->getNom_ticket() . "',
                                            '" . $ticket->getDescripción_ticket() . "',
                                            '" . $ticket->getEstado_del_ticket() . "',
                                            '" . $ticket->getFecha_creacion() . "',
                                            " . $ticket->getCod_cliente() . ",
                                            " . $ticket->getCod_empleado() . "
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an ticket entered by parameter
     *
     * @param Ticket $ticket
     * @return void
     */
    public function modify($ticket)
    {

        $sql = "UPDATE TICKET SET cod_ticket= " . $ticket->getCod_ticket() . ",
                                   nom_ticket = " . $ticket->getNom_ticket() . ",
                                   descripción_ticket = '" . $ticket->getDescripción_ticket() . "',
                                   estado_del_ticket= '" . $ticket->getEstado_del_ticket() . "',
                                   fecha_creacion = '" . $ticket->getFecha_creacion() . "',
                                   cod_cliente = " . $ticket->getCod_cliente() . ",
                                   cod_empleado = " . $ticket->getCod_empleado() . "
                                   where cod_ticket = " . $ticket->getCod_ticket() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method to delete a new comision
     *
     * @param Ticket $ticket
     * @return void
     */

    public function delete($cod_ticket)
    {
        $sql = "DELETE FROM ticket WHERE cod_ticket = " . $cod_ticket;

        pg_query($this->conexion, $sql);
    }
    /**
     * Method to get an TicketDAO object
     *
     *
     * @return Ticket
     */
    public function getList()
    {

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
    }

    /**
     * Method to get an TicketDAO object
     *
     *
     * @return Ticket
     */
    public function getListTicketxCliente($cod_cliente)
    {

        $sql = "SELECT * FROM TICKET WHERE cod_cliente= " . $cod_cliente . " order by cod_ticket";
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
    }



    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return TicketDAO
     */
    public static function getTicketDAO($conexion)
    {
        if (self::$ticketDAO == null) {
            self::$ticketDAO = new TicketDAO($conexion);
        }

        return self::$ticketDAO;
    }
}
