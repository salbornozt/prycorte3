<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Empleado.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoEmpleado.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoEmpleado::setConexionBD($conexion);


if (isset($_POST['activarEmpleado']) == true) {


	$nroIdentificacion = isset($_POST['cedula']) ? $_POST['cedula'] : null;

    ManejoEmpleado::cambiarEstadoActivado($nroIdentificacion);


}

echo '<script>
alert("Se activo el empleado con ID: '.$nroIdentificacion.'");
window.location="../Admin.php?menu=empleado";        

</script>';