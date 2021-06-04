<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Registrar cliente</title>
    <link href="Anyar/assets/img/logochibchaweb.png" rel="icon">
    <link href="Anyar/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="admin/dist/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Crear cuenta</h3>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12">

                                        <div class="col-sm-12">
                                            <button class="btn btn-primary btn-block" onclick="mostrarCuentaCliente()">Crear cuenta como cliente</button>
                                            <button class="btn btn-primary btn-block" onclick="mostrarCuentaEmpleado()">Crear cuenta como empleado</button>
                                        </div>

                                        <div id="mostrarCliente" style="display: none">
                                            <h4 class="text-center font-weight-light my-4">Registro Cliente</h4>

                                            <form action="registroCliente.php" id="formRegistroCliente" enctype="multipart/form-data" method="POST" name="formRegistroCliente" onsubmit="verificarPasswords(); return false">
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="nombreCompleto">Nombre Completo</label>
                                                            <input class="form-control py-4" id="nombreCompleto" name="nombreCompleto" type="text" placeholder="Introducir el nombre completo" / required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="telefono">Telefono</label>
                                                            <input class="form-control py-4" id="telefono" name="telefono" type="tel" placeholder="Telefono" / pattern="[3-9]\d{9}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="numeroDeIdentificacion">Numero de identificacion</label>
                                                            <input class="form-control py-4" id="numeroDeIdentificacion" name="numeroDeIdentificacion" type="text" placeholder="Numero de identificacion" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="small mb-1" for="email">Email</label>
                                                    <input class="form-control py-4" id="email" name="email" type="email" aria-describedby="emailHelp" placeholder="Introducir direccion email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required />
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="contrasena">Contraseña</label>
                                                            <input class="form-control py-4" id="contrasena" name="contrasena" type="password" placeholder="Introducir contraseña" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="confirmaContrasena">Confirma contraseña</label>
                                                            <input class="form-control py-4" id="confirmaContrasena" name="confirmaContrasena" type="password" placeholder="Confirmar contraseña" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-4 mb-0">
                                                    <!--<a class="btn btn-primary btn-block" href="registroCliente.php">Crear cuenta</a>-->
                                                    <div class="btn btn-primary btn-block">
                                                        <button class="btn btn-primary btn-block" id="login" type="submit" name='addRegistroCliente'>Crear cuenta</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div id="mostrarEmpleado" style="display: none">
                                            <h4 class="text-center font-weight-light my-4">Registro Empleado</h4>
                                            <form action="registroEmpleado.php" id="formRegistroEmpleado" enctype="multipart/form-data" method="POST" name="formRegistroEmpleado">
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="FirstName">Nombres</label>
                                                            <input class="form-control py-4" id="FirstName" name="FirstName" type="text" placeholder="Introducir el primer nombre" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="LastName">Apellidos</label>
                                                            <input class="form-control py-4" id="LastName" name="LastName" type="text" placeholder="Introducir el segundo nombre" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="numeroDeIdentificacion">Numero de identificacion</label>
                                                            <input class="form-control py-4" id="numeroDeIdentificacion" name="numeroDeIdentificacion" type="text" placeholder="Numero de identificacion" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <label class="small mb-1" for="email">Email</label>
                                                        <input class="form-control py-4" id="email" name="email" type="email" aria-describedby="emailHelp" placeholder="Introducir direccion email" required />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="small mb-1" for="cargo">Cargo</label>
                                                        <input class="form-control py-4" id="cargo" name="cargo" type="cargo" aria-describedby="cargo" placeholder="Introducir cargo" required />
                                                    </div>

                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="contrasena">Contraseña</label>
                                                            <input class="form-control py-4" id="contrasena" name="contrasena" type="password" placeholder="Introducir contraseña" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="confirmaContrasena">Confirma contraseña</label>
                                                            <input class="form-control py-4" id="confirmaContrasena" name="confirmaContrasena" type="password" placeholder="Confirmar contraseña" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="btn btn-primary btn-block">
                                                    <button class="btn btn-primary btn-block" type="submit" name='addRegistroEmpleado'>Crear cuenta</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="login.php">Tienes cuenta? Ir a login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script>
        function mostrarCuentaCliente() {
            var x = document.getElementById("mostrarCliente");
            var y = document.getElementById("mostrarEmpleado");
            if (x.style.display === "none") {
                x.style.display = "block";
                y.style.display = "none";
            } else {
                x.style.display = "none";
                y.style.display = "none";
            }
        }

        function mostrarCuentaEmpleado() {
            var x = document.getElementById("mostrarEmpleado");
            var y = document.getElementById("mostrarCliente");
            if (x.style.display === "none") {
                x.style.display = "block";
                y.style.display = "none";
            } else {
                x.style.display = "none";
                y.style.display = "none";
            }
        }

        function comprobarClave() {
            clave1 = document.getElementById("mostrarEmpleado");
            clave2 = document.f1.confirmaContrasena.value

            if (clave1 == clave2)
                alert("Las dos claves son iguales...\nRealizaríamos las acciones del caso positivo")
            else
                alert("Las dos claves son distintas...\nRealizaríamos las acciones del caso negativo")
        }

        function validarCliente() {
            var nombreCompleto, telefono, nroIdentificación, email, contrasena, confirmarContrasena



        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="admin/dist/js/scripts.js"></script>
</body>

</html>