<?php 
  session_start();
  if ($_SESSION['usuario'] == ''){
    header ('Location: ../admin/index.php');
  }
  require_once("../../configuracion/database.php");
  require_once("../../modelo/landing_model.php");
  $usuario = new landing_model();
  $usr_nombre = $usuario->get_user_name($_SESSION['id']);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Intranet | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../vista/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../vista/admin/fileinput/css/fileinput.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../vista/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../vista/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Pace style -->
  <link rel="stylesheet" href="../../vista/admin/plugins/pace/pace.min.css">
  <!-- jQuery 3 -->
    <script src="../../vista/admin/bower_components/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="../../vista/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../../vista/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../../vista/admin/plugins/iCheck/all.css">
    <link rel="stylesheet" href="../../vista/admin/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="../../vista/admin/plugins/timepicker/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="../../vista/admin/bower_components/select2/dist/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../vista/admin/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../vista/admin/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../../vista/admin/dist/css/skins/skin-purple-light.css">
    <link rel="stylesheet" href="../../vista/admin/dist/css/skins/skin-red.css">
    <link rel="stylesheet" href="../../vista/admin/datatables/datatables.min.css">

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style type="text/css">
        .skin-purple .main-header .navbar .dropdown-menu li a {
            color: #333 !important;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('body').layout('fix');
        });
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<!-- Site wrapper -->
<div class="wrapper" id="main_elem">
  <header class="main-header">
    <!-- Logo -->
    <a href="../../vista/admin/admin.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">Báy</span>
      <!-- logo for regular state and mobile devices -->
      <!--<span class="logo-lg"><b>Báyental</b></span>-->
      <span class="logo-lg"><img src="../../vista/admin/img/bayental_logo_2.png" id="id_img_header" class="center-block img-responsive" style="height:50px;"/></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="javascript:void()" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header" v-text="mensajes"></li>
              <li class="footer"><a href="#">Ver todos los mensajes</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header" v-text="notificaciones"></li>
              <li class="footer"><a href="#">Ver todas las notificaciones</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header" v-text="tareas"></li>
              <li class="footer"><a href="#">Ver todas las tareas</a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../vista/admin/img/avatar.png" class="user-image" alt="User Image">
              <span class="hidden-xs" v-text="user_login"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../vista/admin/img/avatar.png" class="img-circle" alt="User Image">
                <p v-text="user_login">
                  <small>Báyental 2019</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="javascript:void(0)" @click="load_wrapper('../vista/admin/cambia_password.php');" class="btn btn-default btn-flat">Cambiar Contraseña</a>
                </div>
                <div class="pull-right">
                  <a href="../../controlador/logout.php" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../vista/admin/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p v-text="user_login"></p>
          <a href="javascript:void()"><i class="fa fa-circle text-success"></i> Activo</a>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <div id="menu_principal">
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MENÚ PRINCIPAL</li>
          <li><a href="javascript:void(0)"><i class="fa fa-users"></i> <span>Gestión de Usuarios</span></a></li>
        </ul>
      </div>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content --> 
  <div class="content-wrapper" id="main_content">
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.0.0
    </div>
    <strong>Copyright &copy; 2019 <a href="http://www.bayental.com/" target='_blank'>Báyental BPO</a>.</strong> Todos los derechos reservados.
  </footer>
</div>
<!-- ./wrapper -->
<!-- Bootstrap 3.3.7 -->
<script src="../../vista/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../vista/admin/fileinput/js/fileinput.js"></script>
<script src="../../vista/admin/fileinput/js/locales/es.js"></script>
<!-- PACE -->
<script src="../../vista/admin/bower_components/PACE/pace.min.js"></script>
<!-- SlimScroll -->
<script src="../../vista/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../../vista/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="../../vista/admin/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="../../vista/admin/plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../vista/admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../vista/admin/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="../../vista/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="../../vista/admin/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="../../vista/admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="../../vista/admin/plugins/iCheck/icheck.min.js"></script>
<script src="../../vista/admin/datatables/datatables.min.js"></script>
<script src="../../vista/admin/js/vue.js"></script>
<script src="../../vista/admin/js/axios.min.js"></script>
<script type="text/javascript" src="../../vista/admin/sweetalert/dist/sweetalert.min.js"></script>
<!-- FastClick -->
<script src="../../vista/admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../vista/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../vista/admin/dist/js/demo.js"></script>
<!-- page script -->
<script type="text/javascript">
  // To make Pace works on Ajax calls
  $(document).ajaxStart(function () {
    Pace.restart()
  });
  $('.ajax').click(function () {
    $.ajax({
      url: '#', success: function (result) {
        $('.ajax-content').html('<hr>Ajax Request Completed !')
      }
    })
  });

  var elem = new Vue({
      el: '#main_elem',
      data: {
          user_login: "<?php echo $usr_nombre;?>",
          mensajes: "Tienes 0 mensajes",
          notificaciones: "Tienes 0 notificaciones",
          tareas: "Tienes 0 tareas"
      },
      created: function () {
      },
      methods: {
        load_wrapper(url){
          if(url!=''){
              $('#main_content').load(url);
          }
        }
      },
      mounted() {
      }
  });

  elem.mensajes="Tienes XXX nuevos mensajes";
</script>
</body>
</html>
