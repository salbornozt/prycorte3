<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Administrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoAdministrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Empleado.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoEmpleado.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoCliente.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoAdministrador::setConexionBD($conexion);
ManejoCliente::setConexionBD($conexion);
ManejoEmpleado::setConexionBD($conexion);
$correo = $_POST["inputEmailAddress"];
$pass = $_POST["inputPassword"];
$admin = ManejoAdministrador::verificarCuentaAdministrador($correo, $pass);
$cliente = ManejoCliente::verificarCuentaCliente($correo, $pass);
$empleado = ManejoEmpleado::verificarCuentaEmpleado($correo, $pass);
//$cod_peticion = 


if (is_null($admin)) {
    if (is_null($cliente)) {
        if (is_null($empleado)) {
            echo '<script>
            alert("NO HA SIDO VERIFICADO POR EL ADMINISTRADOR");
            window.location="login.php";          
        </script>';
            //header("Location: login.php");
        } else {

            $_SESSION['cod_empleado'] = $empleado->getCod_empleado();
            $_SESSION['nom_empleado'] = $empleado->getNom_empleado();
            $_SESSION['cedula_empleado'] = $empleado->getCedula_empleado();
            $_SESSION['cargo_empleado'] = $empleado->getCargo_empleado();
            $_SESSION['contraseña_empleado'] = $empleado->getContraseña_empleado();
            $_SESSION['correo_empleado'] = $empleado->getCorreo_empleado();
            $_SESSION['cantidad_de_tickets'] = $empleado->getCantidad_tickets();
            $_SESSION['nivel_empleado'] = $empleado->getNivel_empleado();
            $_SESSION['cod_peticion'] = $empleado->getCod_peticion();
            $_SESSION['cod_usuario'] = $empleado->getCod_usuario();
            header("Location: ../Vista/Empleado.php?menu=bienvenidos");
        }
    } else {
        $_SESSION['cod_cliente'] = $cliente->getCod_cliente();
        $_SESSION['nom_cliente'] = $cliente->getNom_cliente();
        $_SESSION['telefono_cliente'] = $cliente->getTelefono_cliente();
        $_SESSION['cedula_cliente'] = $cliente->getCedula_cliente();
        $_SESSION['contraseña_cliente'] = $cliente->getContraseña_cliente();
        $_SESSION['correo_cliente'] = $cliente->getCorreo_cliente();
        $_SESSION['cod_peticion'] = $cliente->getCod_peticion();
        $_SESSION['cod_usuario'] = $cliente->getCod_usuario();
        header("Location: User.php");
    }
} else {
    $_SESSION['cod_administrador'] = $admin->getCod_administrador();
    $_SESSION['nom_administrador'] = $admin->getNom_administrador();
    $_SESSION['usuario_administrador'] = $admin->getUsuario_administrador();
    $_SESSION['contraseña_administrador'] = $admin->getContraseña_administrador();
    $_SESSION['cod_usuario'] = $admin->getCod_usuario();
    header("Location:../Vista/Admin.php?menu=bienvenido");
}
?>