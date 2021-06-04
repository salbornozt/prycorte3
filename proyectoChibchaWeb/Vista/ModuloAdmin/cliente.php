<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoCliente.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoCliente::setConexionBD($conexion);

$cliente = ManejoCliente::getList();
$cliente2 = ManejoCliente::getListActivar();
$cliente3 = ManejoCliente::getListDesactivar();

?>

<div class="container-fluid">

    <br>
    <h3 class="mt-4">INFORMACIÓN CLIENTES</h3>
    <br>
    <!-- PANEL BOTONES -->
    <ol class="breadcrumb mb-3">
        <!--MODAL AGREGAR CLIENTE-->
        <div class="modal fade" id="info">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ingresar datos</h5>
                    </div>
                    <div class="modal-body">
                        <center>
                            <form method="post" action="ModuloAdmin/agregarCliente.php">
                                <table>
                                    <tr>
                                        <th>
                                            <p> Nombre:</p>
                                        </th>
                                        <th><input type="text" class="form-control" name="nombre" id="nombre" required> </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <p> Teléfono:</p>
                                        </th>
                                        <th><input type="number" name="telefono" id="telefono" class="form-control" pattern="[0-9]" required></th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <p> Cédula:</p>
                                        </th>
                                        <th><input type="number" name="cedula" id="cedula" class="form-control" pattern="[0-9]" required></th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <p> Correo:</p>
                                        </th>
                                        <th><input type="email" name="correo" id="correo" class="form-control" required></th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <p> Contraseña:</p>
                                        </th>
                                        <th><input type="password" name="contraseña" id="contraseña" class="form-control" required> </th>
                                    </tr>

                                </table>

                        </center><br>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name='addAgregarCliente'>Enviar</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <center>
            </form>

            <span class="btn btn-primary" data-toggle="modal" data-target="#info">Agregar cliente</span>
        </center>
        <!--FIN MODAL AGREGAR CLIENTE-->
        <p>. .</p>

        <!--MODAL HABILITAR CLIENTE-->
        <div class="modal fade" id="info3">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿Que cliente desea activar?</h5>
                    </div>
                    <div class="modal-body">
                        <center>
                            <form method="post" action="ModuloAdmin/activarCliente.php">
                                <table>
                                    <tr>
                                        <th>
                                            <p> Cédula: <select name="cedula" class="form-control">

                                                    <?php
                                                    foreach ($cliente2 as $c) {
                                                        echo '
                                                        <option>' . $c->getCedula_cliente() . '</option>';
                                                    } ?>

                                                </select> </p>
                                        </th>
                                    </tr>
                                </table>
                        </center><br>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name='activarCliente'>Activar</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <center>
            </form>

            <span class="btn btn-success" data-toggle="modal" data-target="#info3">Activar cliente</span>
        </center>
        <!--FIN MODAL HABILITAR CLIENTE-->
        <p>. .</p>
        <!--MODAL DESHABILITAR CLIENTE-->
        <div class="modal fade" id="info2">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿Que cliente desea desactivar?</h5>
                    </div>
                    <div class="modal-body">
                        <center>
                            <form method="post" action="ModuloAdmin/desactivarcliente.php">
                                <table>
                                    <tr>
                                        <th>
                                            <p> Cédula: <select name="cedula" class="form-control">

                                                    <?php
                                                    foreach ($cliente3 as $c) {
                                                        echo '
                                                        <option>' . $c->getCedula_cliente() . '</option>';
                                                    } ?>

                                                </select> </p>
                                        </th>
                                    </tr>
                                </table>
                        </center><br>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" name='desactivarCliente'>Desactivar</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <center>
            </form>

            <span class="btn btn-danger" data-toggle="modal" data-target="#info2">Desactivar cliente</span>
        </center>
        <!--FIN MODAL DESHABILITAR CLIENTE-->
    </ol>
    <!-- FIN PANEL BOTONES -->


    <!-- TABLA CLIENTES -->
    <div class="card mb-4">

        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            TABLA CLIENTES
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Cédula</th>
                            <th>Contraseña</th>
                            <th>Correo</th>
                            <th>Estado</th>


                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Cédula</th>
                            <th>Contraseña</th>
                            <th>Correo</th>
                            <th>Estado</th>

                        </tr>
                    </tfoot>

                    <tbody style="color:#000000">
                        <?php

                        foreach ($cliente as $c) {

                            $peticion = $c->getCod_peticion();
                            if ($peticion == 1) {
                                $estado1 = 'Activo';
                            } elseif ($peticion == 2) {
                                $estado1 = 'Desactivo';
                            };

                            echo '
                                            <tr>
                                            <td>' . $c->getNom_cliente() . '</td>
                                            <td>' . $c->getTelefono_cliente() . '</td>
                                            <td>' . $c->getCedula_cliente() . '</td>
                                            <td>' . $c->getContraseña_cliente() . '</td>
                                            <td>' . $c->getCorreo_cliente() . '</td>
                                            <td>' . $estado1 . '</td>                                                                                 
                                            </tr>';
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- TERMINA TABLA CLIENTES -->
    </div>
</div>