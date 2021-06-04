<?php
session_start();
date_default_timezone_set('America/Bogota');
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoCliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Ticket.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoTicket.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Empleado.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoEmpleado.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoCliente::setConexionBD($conexion);
ManejoTicket::setConexionBD($conexion);
ManejoEmpleado::setConexionBD($conexion);


$codigoUsuario = $_GET['cod_cliente'];


$clientexticket = ManejoTicket::consultarTicketxCliente($codigoUsuario);
$clientexticketxempleado = ManejoEmpleado::getListXEmpleadoXCantidadTickets();

$nombreTicket = $_POST['nombreTicket'];
$descripcionTicket = $_POST['descripcion'];


$clientexticket->setNom_ticket($nombreTicket);
$clientexticket->setDescripción_ticket($descripcionTicket);
$clientexticket->setEstado_del_ticket('sin revisar');
$clientexticket->setFecha_creacion(date("Y") . "-" . date("m") . "-" . date("d"));
$clientexticket->setCod_cliente($codigoUsuario);
foreach ($clientexticketxempleado as $cliente) {
    $clientexticket->setCod_empleado($cliente->getCod_empleado());
    $clientexticketxempleado2 = ManejoEmpleado::consultarEmpleado($clientexticket->getCod_empleado());
    $clientexticketxempleado2->setCantidad_tickets($clientexticketxempleado2->getCantidad_tickets() + 1);
}



ManejoEmpleado::modifyEmpleadoXTicket($clientexticketxempleado2);
ManejoTicket::createTicketXCliente($clientexticket);

echo '<script>
alert("Tus ticket se ha creado")
window.location="../User.php?menu=tickets";
</script>';
