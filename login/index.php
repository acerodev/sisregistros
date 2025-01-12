<?php
include ('../app/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=APP_NAME;?></title>
    <link rel="icon" href=<?=APP_FAVICON;?> type="image/png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=APP_URL;?>/public/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?=APP_URL;?>/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=APP_URL;?>/public/dist/css/adminlte.min.css">
    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <center>
        <br>
        <!-- IMAGEN DE INICIO DE SESION
        <img src="https://img.freepik.com/vector-gratis/concepto-abstracto-sistema-control-acceso_335657-3180.jpg?w=740&t=st=1703808543~exp=1703809143~hmac=6740d576ffcb74ef090f90d076b9e9e2b4f5641df33d2164c8577b0e5829c127"
             width="150px" alt=""><br><br>
-->
        <img src="<?=APP_FAVICON;?>"
             width="150px" alt=""><br><br>
    </center>
    <div class="login-logo">
        <h3 href=""><b><?=APP_NAME;?></b></h3>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Inicio de sesión</p>
            <hr>

            <form action="controller_login.php" method="post">
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" id="password-field" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-eye" id="toggle-password" style="cursor: pointer;"></span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="input-group mb-3">
                    <button class="btn btn-primary btn-block" type="submit">Ingresar</button>
                </div>
            </form>

            <!-- CUENTS ACCESS
                <p style="text-align: justify"><b>Nota: </b> Puedes probar este sistema con las siguiente cuentas.
                <hr>
                <small>Cuenta de administrador</small>
                <br>
                <b>Cuenta: </b>admin@admin.com
                <br>
                <b>Contraseña: </b>12345678
                <hr>
                <small>Cuenta de docente</small>
                <br>
                <b>Cuenta: </b>docente1@admin.com
                <br>
                <b>Contraseña: </b>12345678
                <hr>
                <small>Cuenta de estudiante</small>
                <br>
                <b>Cuenta: </b>willms.drew@example.org
                <br>
                <b>Contraseña: </b>75670921
                </p>
-->

            <?php
            session_start();
            if(isset($_SESSION['mensaje'])){
                $mensaje = $_SESSION['mensaje'];
                ?>
                <script>
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: "<?=$mensaje;?>",
                        showConfirmButton: false,
                        timer: 4000
                    });
                </script>
            <?php
                session_destroy();
            }
            ?>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=APP_URL;?>/public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=APP_URL;?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=APP_URL;?>/public/dist/js/adminlte.min.js"></script>

<script>
    document.getElementById('toggle-password').addEventListener('click', function () {
        var passwordField = document.getElementById('password-field');
        var type = passwordField.getAttribute('type');
        if (type === 'password') {
            passwordField.setAttribute('type', 'text');
            this.classList.remove('fa-eye');
            this.classList.add('fa-eye-slash');
        } else {
            passwordField.setAttribute('type', 'password');
            this.classList.remove('fa-eye-slash');
            this.classList.add('fa-eye');
        }
    });
</script>

</body>
</html>
