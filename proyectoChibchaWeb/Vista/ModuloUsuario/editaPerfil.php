<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoCliente.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoCliente::setConexionBD($conexion);


$codigoUsuario = $_GET['cod_cliente'];
$cliente = ManejoCliente::consultarCliente($codigoUsuario);
$nombreCompleto = $_POST['nombreApellido'];
$cedula = $_POST['nroIdentificacion'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$constrasena = $_POST['contraseña'];

$cliente->setCod_cliente($cliente->getCod_cliente());
$cliente->setNom_cliente($nombreCompleto);
$cliente->setCedula_cliente($cedula);
$cliente->setTelefono_cliente($telefono);
$cliente->setCorreo_cliente($correo);
$cliente->setContraseña_cliente($constrasena);

ManejoCliente::modifyClientePerfil($cliente);

echo '<script>
alert("Tus datos personales se han modificado")
window.location="../User.php?menu=perfil";
</script>';
