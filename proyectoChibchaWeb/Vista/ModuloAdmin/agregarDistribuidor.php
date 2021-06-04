<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Distribuidor.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoDistribuidor.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoDistribuidor::setConexionBD($conexion);

if (isset($_POST['addAgregarDistribuidor']) == true) {

    
    $nombreCompleto = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $email = isset($_POST['correo']) ? $_POST['correo'] : null;
    $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;
    $var2='Básico';
    $var3='Premium';

    $distribuidor = new Distribuidor();

    /*$distribuidor->setCod_distribuidor(10);*/

    $distribuidor->setNom_distribuidor($nombreCompleto);
    $distribuidor->setCorreo_distribuidor($email);
    if(strcmp($categoria, $var3) === 0){      
    $distribuidor->setCod_categoria_distribuidor(2);
    }elseif(strcmp($categoria, $var2) === 0){    
    $distribuidor->setCod_categoria_distribuidor(1);
    }
    $distribuidor->setEstado_distribuidor(2);
       
    ManejoDistribuidor::creaDistribuidorxAdmin($distribuidor);
}
echo '<script>
    alert("Se creo el distribuidor '.$nombreCompleto.'");
    window.location="../Admin.php?menu=distribuidor";        
    
    </script>';