<?php

session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/PlanPago.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Paquete.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Distribuidor.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Usuarioxdominio.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoTicket.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoPlanPago.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoDistribuidor.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoEmpleado.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoPaquete.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoPaquete::setConexionBD($conexion);
ManejoTicket::setConexionBD($conexion);
ManejoPlanPago::setConexionBD($conexion);
ManejoDistribuidor::setConexionBD($conexion);
$lista = ManejoTicket::usuariosxdominio();
$planesPago = ManejoPlanPago::getList();
$dist = ManejoDistribuidor::getActiveList();
$paquete = ManejoPaquete::getList();

?>
<div class="container-fluid">
    <br>

    <div class="container-fluid">
        <h1 class="mt-4">Usuarios Con Dominios</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Usuario x Dominio </li>
            <!--MODAL ELIMINAR CLIENTE-->
            <div class="modal fade" id="info2">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Seleccione el plan a modificar</h5>
                        </div>
                        <div class="modal-body">
                            <center>
                                <form method="post" action="ModuloEmpleado/modificarUxD.php?">
                                    <table>
                                        <tr>

                                            <th>
                                                <p>Cod Dominio:</p>
                                            </th>
                                            <th> <select name="dominio" class="form-control">

                                                    <?php

                                                    foreach ($lista as $p) {

                                                        echo
                                                        '<option>' . $p->getCod_dominio() . '</option>';
                                                    }

                                                    ?>
                                                </select> </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <?php if ((int)$_SESSION['nivel_empleado'] > 2) {
                                                    echo '<p>Paquete:</p></th><th> <select name="paquete" class="form-control">';
                                                    foreach ($paquete as $p) {

                                                        echo
                                                        '<option>' . $p->getNom_paquete() . '</option>';
                                                    }

                                                ?>
                                                    </select> </th> <?php
                                                                }
                                                                    ?>
                                        <th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <?php if ((int)$_SESSION['nivel_empleado'] > 1) {
                                                    echo '<p>Distribuidor:</p></th><th> <select name="distribuidor" class="form-control">';
                                                    foreach ($dist as $p) {

                                                        echo
                                                        '<option>' . $p->getNom_distribuidor() . '</option>';
                                                    }

                                                ?>
                                                    </select> </th> <?php
                                                                }
                                                                    ?>
                                        <th>
                                        </tr>

                                        <tr>
                                            <th>

                                                <p>Plan Pago: </p>
                                            </th>
                                            <th><select name="planpago" class="form-control">

                                                    <?php

                                                    foreach ($planesPago as $p) {

                                                        echo
                                                        '<option>' . $p->getNom_planPago() . '</option>';
                                                    }

                                                    ?>
                                                </select> </th>
                                        </tr>
                                    </table>
                            </center><br>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" name='modificar'>Modificar</button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form>
            </form>
            </center>
            <!--FIN MODAL ELIMINAR CLIENTE-->
        </ol>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <section id="tablas" class="tablas">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Cod Dominio</th>
                                <th>Nombre Cliente</th>
                                <th>URL / Dominio</th>
                                <th>Nombre Paquete</th>
                                <th>Nombre Distribuidor</th>
                                <th>Nombre Plan de Pago</th>
                                <th>CHECK</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Cod Dominio</th>
                                <th>Nombre Cliente</th>
                                <th>URL / Dominio</th>
                                <th>Nombre Paquete</th>
                                <th>Nombre Distribuidor</th>
                                <th>Nombre Plan de Pago</th>
                                <th>CHECK</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php


                            foreach ($lista as $t) {

                                echo '  <tr>
                    <td align="center">' . $t->getCod_dominio() . '</td>
                    <td align="center">' . $t->getNom_cliente() . '</td>
                    <td align="center">' . $t->getUrl() . '</td>
                    <td align="center">' . $t->getNom_paquete() . '</td>
                    <td align="center">' . $t->getNom_distribuidor() . '</td>                    
                    <td align="center">' . $t->getNom_planpago() . '</td>  
                    <td align="center"><span class="btn btn-danger" data-toggle="modal" data-target="#info2">Modificar</span></td>                                      
                               
                </tr>';
                            }
                            ?>


                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>
</div>