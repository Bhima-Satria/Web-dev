<!DOCTYPE html>
<html>

<?php
session_start();
if ($_SESSION['level'] != "admin") {
  header("location:../../pages/login/masuk.php?pesan=belum_login");
}
?>

<?php
include('../../koneksi.php');
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart Farming| Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="../../index.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>S</b>Fm</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>SMART</b>Farming</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="../../dist/img/avatar5.png" class="user-image" alt="User Image">
                <span class="hidden-xs">Bhima Satria</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="../../dist/img/avatar5.png" class="img-circle" alt="User Image">

                  <p>
                    Bhima Satria-Web Developer
                    <small>Member since Nov. 2019</small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="../../pages/profile/profile.html" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="../../pages/login/logout.php" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>

            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="../../dist/img/avatar5.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>Bhima Satria</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

          <li class="treeview">
          <li>
            <a href="../../index.php">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              <span class="pull-right-container"> </span>
            </a>
          </li>


          <li class="treeview">
            <a href="#">
              <i class="glyphicon glyphicon-tree-conifer"></i>
              <span>Jenis Tanaman</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="../../pages/forms/Sayur.php?ID=1"><i class="fa fa-circle-o"></i> Sayur</a></li>
              <li><a href="../../pages/forms/Buah.php?ID=2"><i class="fa fa-circle-o"></i> Buah</a></li>
              <li><a href="../../pages/forms/palawija.php?ID=3"><i class="fa fa-circle-o"></i> Palawija</a></li>
            </ul>
          </li>

          <li class="treeview active">
            <a href="#">
              <i class="fa fa-pie-chart"></i> <span>Data</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="tables.php"><i class="fa fa-circle-o"></i> Tabel</a></li>
              <li><a href="../../pages/charts/chartjs.php"><i class="fa fa-circle-o"></i> Grafik</a></li>
            </ul>
          </li>

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Menu Ubah Data User
          <small>Smart-Farming</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="../../index.html"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Data</a></li>
          <li class="active">User</li>
        </ol>
      </section>

      <!-- Main content -->
      <?php
      if (isset($_GET["User"])) {
        $User       = $_GET["User"];
        $data     = query("SELECT * FROM login WHERE username = '$User'")[0];
      ?>
        <section class="content">
          <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Data User</h3>
              </div>
              <!-- form start -->
              <form action="Edit.php" method="post" class="form-horizontal">
                <div class="box-body">
                  <div class="form-group">
                    <label for="text" class="col-sm-2 control-label">Nama</label>

                    <div class="col-sm-10">
                      <input type="text" name="User" class="form-control" placeholder="Masukan Nama User" value="<?= $data["username"]; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="text" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="text" name="Email" class="form-control" placeholder="Masukan Email User" value="<?= $data["email"]; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="text" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-10">
                      <input type="text" name="Password" class="form-control" placeholder="Masukkan password" value="<?= $data["password"]; ?>">
                    </div>
                  </div>

                  <div class=" form-group">
                    <label for="text" class="col-sm-2 control-label">Level User</label>

                    <div class="col-sm-10">
                      <input type="text" name="Level" class="form-control" placeholder="Ubah Level User (Admin/User)" value="<?= $data["level"]; ?>">
                    </div>
                  </div>

                  <div class=" form-group">
                    <div class="col-sm-10">
                      <input type="hidden" name="No" class="form-control" placeholder="Ubah ID User" value="<?= $data["No"]; ?> " hidden><br>
                      <input type="hidden" name="Lastuser" class="form-control" value="<?= $data["username"]; ?>" hidden><br>
                    </div>
                  </div>

                </div>

                <!-- /.box-body -->
                <div class=" box-footer">
                  <a href="../../pages/tables/tables.php" name="batal" class="btn btn-danger"><i class="fa fa-undo"></i> Batal</a>
                  <button type="submit" name="Simpan" class="btn btn-success pull-right"><i class="fa fa-save"></i> Simpan</button>
                </div>
                <!-- /.box-footer -->
              </form>
            </div>
          </div>
        </section>
      <?php   } ?>
      <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.13
      </div>
      <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">SMARTfarming</a>.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark" style="display: none;">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
          <h3 class="control-sidebar-heading">Recent Activity</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Penyiraman Otomatis</h4>

                  <p>3 hari lagi</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-user bg-yellow"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Pemberian Pupuk</h4>

                  <p>7 hari lagi</p>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

          <h3 class="control-sidebar-heading">Tasks Progress</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Pemberian Pupuk
                  <span class="label label-danger pull-right">70%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Penyiraman
                  <span class="label label-success pull-right">95%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
          <form method="post">
            <h3 class="control-sidebar-heading">General Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Report panel usage
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Some information about this general settings option
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Allow mail redirect
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Other sets of options are available
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Expose author name in posts
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Allow the user to show his name in blog posts
              </p>
            </div>
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
  <!-- page script -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

  <?php
  if (isset($_POST["Simpan"])) {
    if (formuser($_POST) > 0) {
      echo "
			 <script>
				  Swal.fire({ 
                  title: 'SELAMAT',
                  text: 'Perubahan data user telah disimpan',
                  icon: 'success', buttons: [false, 'OK'], 
                  }).then(function() { 
                  window.location.href='../../pages/tables/tables.php'; 
                  }); 
			 </script>
		";
    } else {
      echo "
         <script> 
         Swal.fire({ 
            title: 'ERROR', 
            text: 'Data user gagal disimpan', 
            icon: 'warning', 
            dangerMode: true, 
            buttons: [false, 'OK'], 
            }).then(function() { 
                window.location.href='../../pages/tables/tables.php'; 
            }); 
         </script>
        ";
    }
  }
  ?>


</body>

</html>