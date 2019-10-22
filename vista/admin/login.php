<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../vista/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vista/admin/css/login_style.css">
    <script type="text/javascript" src="../vista/admin/js/getlogininfo.js"></script>
    <script src="../vista/admin/js/jquery.min.js"></script>
    <script src="../vista/admin/js/bootstrap.min.js"></script>
    <title>Ana Sayán - Portal Administrador</title>
</head>
<body>
<?php
    require_once("../configuracion/database.php");
    require_once("../modelo/landing_model.php");

    $login = new landing_model();
?>
<div class="container">
    <div class="card card-container">
        <!--<img src="./vista/img/logo_bio.png" class="center-block img-responsive">--->
        <p id="profile-name" class="profile-name-card"></p>
        <div class="titulo">
            <p><h4>Administrador</h4></p>
        </div>
        <form class="form-signin">
            <div id="resultado"></div>
            <input type="text" id="username" class="form-control" placeholder="Usuario" required autofocus>
            <input type="password" id="userpass" class="form-control" placeholder="Contraseña" required>
            <div><p></p></div>

            <button type="button" onclick="captura_datos();" class="btn btn-primary">Ingresar</button>
        </form>
    </div>
</div>

</body>
</html>