<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Empleado.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoEmpleado.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoEmpleado::setConexionBD($conexion);

$empleado = ManejoEmpleado::getList();
$empleado2 = ManejoEmpleado::getListActivar();
$empleado3 = ManejoEmpleado::getListDesactivar();

?>

<div class="container-fluid">

    <br>
    <h3 class="mt-4">INFORMACIÓN EMPLEADO</h3>
    <br>
    <!-- PANEL BOTONES -->
    <ol class="breadcrumb mb-3">
        <!--MODAL AGREGAR EMPLEADO-->
        <div class="modal fade" id="info">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ingresar datos</h5>
                    </div>
                    <div class="modal-body">
                        <center>
                            <form method="post" action="ModuloAdmin/agregarEmpleado.php">
                                <table>
                                    <tr>
                                        <th>
                                            <p> Nombre: </p>
                                        </th>
                                        <th> <input type="text" name="nombre" class="form-control" required> </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <p> Cédula: </p>
                                        </th>
                                        <th> <input type="number" name="cedula" class="form-control" required> </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            <p> Contraseña: </p>
                                        </th>
                                        <th> <input type="password" name="contrasena" class="form-control" required> </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <p> Correo: </p>
                                        </th>
                                        <th> <input type="email" name="correo" class="form-control" required></th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <p> Nivel:</p>
                                        </th>
                                        <th><select name="nivel" class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select> </th>
                                    </tr>

                                </table>
                        </center><br>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="addAgregarEmpleado">Enviar</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <center>
            </form>

            <span class="btn btn-primary" data-toggle="modal" data-target="#info">Agregar empleado</span>
        </center>
        <!--FIN MODAL AGREGAR EMPLEADO-->
        <p>. .</p>
        <!--MODAL HABILITAR CLIENTE-->
        <div class="modal fade" id="info3">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿Que empleado desea activar?</h5>
                    </div>
                    <div class="modal-body">
                        <center>
                            <form method="post" action="ModuloAdmin/activarEmpleado.php">
                                <table>
                                    <tr>
                                        <th>
                                            <p> Cédula: <select name="cedula">

                                                    <?php
                                                    foreach ($empleado2 as $c) {
                                                        echo '
                                                        <option>' . $c->getCedula_empleado() . '</option>';
                                                    } ?>

                                                </select> </p>
                                        </th>
                                    </tr>
                                </table>
                        </center><br>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name='activarEmpleado'>Activar</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <center>
            </form>

            <span class="btn btn-success" data-toggle="modal" data-target="#info3">Activar empleado</span>
        </center>
        <!--FIN MODAL HABILITAR CLIENTE-->
        <p>. .</p>
        <!--MODAL DESHABILITAR CLIENTE-->
        <div class="modal fade" id="info2">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿Que empleado desea desactivar?</h5>
                    </div>
                    <div class="modal-body">
                        <center>
                            <form method="post" action="ModuloAdmin/desactivarEmpleado.php">
                                <table>
                                    <tr>
                                        <th>
                                            <p> Cédula: <select name="cedula" class="form-control">

                                                    <?php
                                                    foreach ($empleado3 as $c) {
                                                        echo '
                                                        <option>' . $c->getCedula_empleado() . '</option>';
                                                    } ?>

                                                </select> </p>
                                        </th>
                                    </tr>
                                </table>
                        </center><br>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" name='desactivarEmpleado'>Desactivar</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <center>
            </form>

            <span class="btn btn-danger" data-toggle="modal" data-target="#info2">Desactivar empleado</span>
        </center>
        <!--FIN MODAL DESHABILITAR CLIENTE-->


    </ol>
    <!-- FIN PANEL BOTONES -->


    <!-- TABLA EMPLEADO -->
    <div class="card mb-4">

        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            TABLA EMPLEADO
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Nombre</th>
                            <th>Cedula</th>
                            <th>Cargo</th>
                            <th>Contraseña</th>
                            <th>Correo</th>
                            <th>Tickets</th>
                            <th>Nivel</th>
                            <th>Estado</th>



                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Cedula</th>
                            <th>Cargo</th>
                            <th>Contraseña</th>
                            <th>Correo</th>
                            <th>Tickets</th>
                            <th>Nivel</th>
                            <th>Estado</th>

                        </tr>
                    </tfoot>

                    <tbody style="color:#000000">
                        <?php
                        foreach ($empleado as $e) {

                            $estado = $e->getCod_peticion();
                            if ($estado == 1) {
                                $niv = 'Activo';
                            } elseif ($estado == 2) {
                                $niv = 'Desactivo';
                            };

                            echo '
                                            <tr>
                                            <td>' . $e->getNom_empleado() . '</td>
                                            <td>' . $e->getCedula_empleado() . '</td>
                                            <td>' . $e->getCargo_empleado() . '</td>
                                            <td>' . $e->getContraseña_empleado() . '</td>
                                            <td>' . $e->getCorreo_empleado() . '</td>
                                            <td>' . $e->getCantidad_tickets() . '</td>
                                            <td>' . $e->getNivel_empleado() . '</td>
                                            <td>' . $niv . '</td>
                                                                               
                                        
                                            </tr>';
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- TERMINA TABLA EMPLEADO -->
    </div>
</div>