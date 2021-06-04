<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Distribuidor.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoDistribuidor.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoDistribuidor::setConexionBD($conexion);

$distribuidor = ManejoDistribuidor::getList();
$distribuidor2 = ManejoDistribuidor::getListActivar();
$distribuidor3 = ManejoDistribuidor::getListDesactivar();

?>
<div class="container-fluid">

    <br>
    <h3 class="mt-4">INFORMACIÓN DISTRIBUIDOR</h3>
    <br>
    <!-- PANEL BOTONES -->
    <ol class="breadcrumb mb-3">
        <!--MODAL AGREGAR DISTRIBUIDOR-->
        <div class="modal fade" id="info">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ingresar datos</h5>
                    </div>
                    <div class="modal-body">
                        <center>
                            <form method="post" action="ModuloAdmin/agregarDistribuidor.php">
                                <table>
                                    <tr>
                                        <th>
                                            <p> Nombre: </p>
                                        </th>
                                        <th><input type="text" name="nombre" class="form-control" required></th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <p> Correo: </p>
                                        </th>
                                        <th><input type="email" name="correo" class="form-control" required> </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <p> Categoria:</p>
                                        </th>
                                        <th> <select name="categoria" class="form-control">
                                                <option>Premium</option>
                                                <option>Básico</option>

                                            </select> </th>
                                    </tr>
                                </table>

                        </center><br>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name='addAgregarDistribuidor'>Enviar</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <center>
            </form>

            <span class="btn btn-primary" data-toggle="modal" data-target="#info">Agregar distribuidor</span>
        </center>
        <!--FIN MODAL AGREGAR DISTRIBUIDOR-->
        <p>. .</p>

        <!--MODAL DESHABILITAR DISTRIBUIDOR-->
        <div class="modal fade" id="info2">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿Que distribuidor desea desactivar?</h5>
                    </div>
                    <div class="modal-body">
                        <center>
                            <form method="post" action="ModuloAdmin/DesactivarDistribuidor.php">
                                <table>
                                    <tr>
                                        <th>
                                            <p> ID: <select name="id_di" class="form-control">

                                                    <?php
                                                    foreach ($distribuidor3 as $c) {
                                                        echo '
                                                        <option>' . $c->getCod_distribuidor() . '</option>';
                                                    } ?>

                                                </select> </p>
                                        </th>
                                    </tr>
                                </table>
                        </center><br>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" name='desactivarDistribuidor'>Desactivar</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <center>
            </form>

            <span class="btn btn-danger" data-toggle="modal" data-target="#info2">Desactivar distribuidor</span>
        </center>
        <!--FIN MODAL DESHABILITAR DISTRIBUIDOR-->
        <p>. .</p>
        <!--MODAL HABILITAR DISTRIBUIDOR-->
        <div class="modal fade" id="info3">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿Que distribuidor desea activar?</h5>
                    </div>
                    <div class="modal-body">
                        <center>
                            <form method="post" action="ModuloAdmin/activarDistribuidor.php">
                                <table>
                                    <tr>
                                        <th>
                                            <p> ID: <select name="id_di" class="form-control">

                                                    <?php
                                                    foreach ($distribuidor2 as $c) {
                                                        echo '
                                                        <option>' . $c->getCod_distribuidor() . '</option>';
                                                    } ?>

                                                </select> </p>
                                        </th>
                                    </tr>
                                </table>
                        </center><br>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name='activarDistribuidor'>Activar</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <center>
            </form>

            <span class="btn btn-success" data-toggle="modal" data-target="#info3">Activar distribuidor</span>
        </center>
        <!--FIN MODAL DESHABILITAR DISTRIBUIDOR-->

    </ol>
    <!-- FIN PANEL BOTONES -->


    <!-- TABLA DISTRIBUIDOR -->
    <div class="card mb-4">

        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            TABLA DISTRIBUIDOR
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Categoria</th>
                            <th>Estado</th>


                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Estado</th>

                        </tr>
                    </tfoot>

                    <tbody style="color:#000000">
                        <?php
                        foreach ($distribuidor as $d) {


                            $peticion = $d->getEstado_distribuidor();
                            if ($peticion == 1) {
                                $estado1 = 'Activo';
                            } elseif ($peticion == 2) {
                                $estado1 = 'Desactivo';
                            };

                            echo '
                                            <tr>
                                            <td>' . $d->getCod_distribuidor() . '</td>
                                            <td>' . $d->getNom_distribuidor() . '</td>
                                            <td>' . $d->getCorreo_distribuidor() . '</td>
                                            <td>' . $d->getNom_categoria_distribuidor() . '</td>
                                            <td>' . $estado1 . '</td>
                                           
                                            </tr>';
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- TERMINA TABLA DISTRIBUIDOR -->
    </div>
</div>