<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/intranet/configuracion/database.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/intranet/modelo/landing_model.php");
    session_start();
    $usuario = new landing_model();
    $username = strtolower($_POST['username']);
    $userpass = $_POST['userpass'];
    if($username!='' or $userpass!='') {
        $idperfil = $usuario->valida_acceso($username, $userpass);
        if ($idperfil != '') {
            $_SESSION['usuario'] = $username;
            $_SESSION['id'] = $idperfil[0]['id'];
            ?>
            <script type="text/javascript">
                location.assign("../vista/admin/admin.php");
            </script>
            <?php   
        } else {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
                Usuario y/o contraseña incorrectos
            </div>
            <script type="text/javascript">
                $(":text").each(function () {
                    $($(this)).val('');
                });
                $(":password").each(function () {
                    $($(this)).val('');
                });
            </script>
            <?php
            $_SESSION = array();
        }
    } else {
        ?>
        <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
            Por favor, ingrese la información solicitada
        </div>
        <?php
    }
?>