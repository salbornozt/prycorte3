<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoEmpleado.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();

$nom= $_POST['nombre'];
$correo=$_POST['correo'];
$contraseña=$_POST['contraseña'];
ManejoEmpleado::setConexionBD($conexion);
ManejoEmpleado::modificarEmpleado($_SESSION['cod_empleado'],$nom,$correo,$contraseña);
echo '<script>
            alert("Modificado");
            window.location="../Empleado.php?menu=perfil";          
</script>';  


