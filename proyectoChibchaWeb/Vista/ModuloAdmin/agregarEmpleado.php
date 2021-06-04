<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Empleado.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoEmpleado.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoEmpleado::setConexionBD($conexion);

if (isset($_POST['addAgregarEmpleado']) == true) {

    $nombreCompleto = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : null;
    
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : null;
    $email = isset($_POST['correo']) ? $_POST['correo'] : null;
    $nivel = isset($_POST['nivel']) ? $_POST['nivel'] : null;
    

    $empleado = new Empleado();

    $empleado->setNom_empleado($nombreCompleto);
    $empleado->setCedula_empleado($cedula);
    $empleado->setCargo_empleado('Soporte');
    $empleado->setContraseña_empleado($contrasena);
    $empleado->setCorreo_empleado($email);
    $empleado->setCantidad_tickets(0);
    $empleado->setNivel_empleado($nivel);
    $empleado->setCod_peticion(1);
    $empleado->setCod_usuario(2);
  

    ManejoEmpleado::crearEmpleadoxAdmin($empleado);
}
echo '<script>
    alert("Se creo el empleado '.$nombreCompleto.'");
    window.location="../Admin.php?menu=empleado";        
    
    </script>';
