<?php



require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Administrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoAdministrador.php';

session_start();

$obj = new Conexion();
$conexion = $obj->conectarDB();

$cod=1;
ManejoAdministrador::setConexionBD($conexion);

$administrador = ManejoAdministrador::consultarAdministrador($cod);

?>
<div class="container" data-aos="fade-up">
<div class="row">
<div class="col-lg-12 entries">
<BR>
<BR>

<article class="entry">
            <h2 class="entry-title">
            <img src="Anyar/assets/img/logo_cliente.png" alt="" class="img-fluid">
            <a>Mis Datos Personales </a>
            </h2>
<BR>

<div class="entry-content">
<div class="col-lg-12">
        <div class="row">
                <div class="col-lg-3">
                  <p class="entry-meta">Nombre y Apellidos:</p>
                </div>
                <div class="col-lg-3">
                  <input type="text" name="nombreApellido" class="form-control" id="nombreApellido" placeholder="Nombres y apellidos" value="<?php echo $administrador->getNom_administrador()?>" readonly>
                  <p><br></p>
                </div>
                <div class="col-lg-3">
                  <p p class="entry-meta">Correo eléctronico:</p>
                </div>
                <div class="col-lg-3">
                  <input type="text" name="correo" class="form-control" id="correo" placeholder="Correo electrónico" value="<?php echo $administrador->getUsuario_administrador()?>" readonly>
                </div>
                <div class="col-lg-3">
                  <p class="entry-meta">Contraseña:</p>
                </div>
                <div class="col-lg-3">
                  <input type="text" name="contraseña" class="form-control" id="name" placeholder="Contraseña" value="<?php echo $administrador->getContraseña_administrador()?>" readonly>
                </div>
                
        </div>
</div>
</div>
<br>
<center>
<button type="submit" class="btn btn-success" data-toggle="modal" data-target="#info"  name='addAgregarCliente'>EDITAR PERFIL</button>
</center>
</article>
<br>


</div>
</div>

</div>


<!--MODAL UPDATE-->

 <div class="modal fade" id="info">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ingresar nuevos datos</h5>
                            </div>
                            <div class="modal-body"> 
                            <center>
                            <form method="post" action="ModuloAdmin/actualizarAdmin.php">
                            <table>
                                    <tr>
                                    <th>  <p> Nombre:</p> </th>
                                    <th><input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $administrador->getNom_administrador()?>"required> </th>
                                    </tr>                                   
                                    <tr>
                                    <th><p> Correo:</p></th>
                                    <th><input type="email" name="correo" id="correo" class="form-control" value="<?php echo $administrador->getUsuario_administrador()?>" required></th>
                                    </tr>
                                    <tr>
                                    <th>  <p> Contraseña:</p></th>
                                    <th><input type="password" name="contraseña" class="form-control"  id="contraseña" value="<?php echo $administrador->getContraseña_administrador()?>" required> </th>
                                    </tr>
                                                                   
                            </table>
                                                                             
                            </center><br>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-success"  name='actualizarAdmin'>Actualizar</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                            </div>
                            </div></div></div></div>
                           
                            </form>

                           
                       
                            <!--FIN UPDATE-->

