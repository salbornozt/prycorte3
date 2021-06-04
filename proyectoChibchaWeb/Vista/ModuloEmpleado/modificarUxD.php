<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoPLanPago.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoDominio.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoDistribuidor.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoPaquete.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoPLanPago::setConexionBD($conexion);
ManejoDominio::setConexionBD($conexion);
ManejoDistribuidor::setConexionBD($conexion);
ManejoPaquete::setConexionBD($conexion);


if($_POST['paquete']==null){
    if($_POST['distribuidor']==null){
        if($_POST['planpago']==null){
            
        }else{
            $cod_planPago = ManejoPLanPago::consultarNomPlanPago($_POST['planpago']); 
            ManejoDominio::modificarCodPlanDominio($_POST['dominio'],$cod_planPago->getCod_planPago());
            echo '<script>
            alert("Modificado");
            window.location="../Empleado.php?menu=verUsuarios";          
            </script>';     
        }
        
    }else{
        $cod_planPago = ManejoPLanPago::consultarNomPlanPago($_POST['planpago']); 
        ManejoDominio::modificarCodPlanDominio($_POST['dominio'],$cod_planPago->getCod_planPago());
        $cod_distribuidor = ManejoDistribuidor::consultarCodDistribuidor($_POST['distribuidor']); 
        ManejoDominio::modificarCodDistDominio($_POST['dominio'],$cod_distribuidor->getCod_distribuidor());
             echo '<script>
            alert("Modificado");
            window.location="../Empleado.php?menu=verUsuarios";          
            </script>';     
    }
}else{
    $cod_planPago = ManejoPLanPago::consultarNomPlanPago($_POST['planpago']); 
    ManejoDominio::modificarCodPlanDominio($_POST['dominio'],$cod_planPago->getCod_planPago());
    $cod_distribuidor = ManejoDistribuidor::consultarCodDistribuidor($_POST['distribuidor']); 
    ManejoDominio::modificarCodDistDominio($_POST['dominio'],$cod_distribuidor->getCod_distribuidor());
    $cod_paquete = ManejoPaquete::consultarCodPaquete($_POST['paquete']);
    ManejoDominio::modificarCodPackDominio($_POST['dominio'],$cod_paquete->getCod_paquete() );
            echo '<script>
            alert("Modificado");
            window.location="../Empleado.php?menu=verUsuarios";          
            </script>';     
}
    
    
    

/*

echo '<script>
alert("Se modificado el plan de pago con exito");

       

</script>';*/