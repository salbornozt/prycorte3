<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoCliente.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoCliente::setConexionBD($conexion);


if (isset($_POST['activarCliente']) == true) {


	$nroIdentificacion = isset($_POST['cedula']) ? $_POST['cedula'] : null;

    ManejoCliente::cambiarEstadoActivado($nroIdentificacion);


}

echo '<script>
alert("Se activo el cliente con ID: '.$nroIdentificacion.'");
window.location="../Admin.php?menu=cliente";        

</script>';
