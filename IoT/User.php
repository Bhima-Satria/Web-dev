<!DOCTYPE html>
<html>

<?php include 'koneksi.php' ?>

<?php
ini_set('display_errors', 0);

session_start();
if ($_SESSION['level'] != "user") {
  header("location:../../pages/login/masuk.php?pesan=user");
}

$Data = mysqli_query($conn, "SELECT * FROM datasensor WHERE user='$_SESSION[username]' ORDER BY no DESC LIMIT 30");
while ($row = mysqli_fetch_array($Data)) {
  $Jam[] = $row['Jam'];
  $Suhu[] = $row['Suhu'];
  $KelembabanU[] = $row['Kelembaban'];
  $KelembabanT[] = $row['KelembabanT'];
  $Prediksi[] = $row['Prediksi'];
}

?>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart Farming | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="user.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>S</b>Fm</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>SMART</b>Farming</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="user.php" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="dist/img/avatar5.png" class="user-image" alt="User Image">
                <span class="hidden-xs"> <?php
                                          $mysql = mysqli_query($conn, "SELECT * FROM datasensor WHERE user='$_SESSION[username]' ORDER BY No DESC LIMIT 1");
                                          while ($r = mysqli_fetch_array($mysql)) { //mengambil data dari MySQL
                                          ?>
                    <?php echo $r['User'] ?> <?php } ?> </span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">

                  <p>
                    <?php
                    $mysql = mysqli_query($conn, "SELECT * FROM datasensor WHERE user='$_SESSION[username]' ORDER BY No DESC LIMIT 1");
                    while ($r = mysqli_fetch_array($mysql)) { //mengambil data dari MySQL
                    ?>
                      <?php echo $r['User'] ?> <?php } ?> - Web Developer
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
            <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <?php
            $mysql = mysqli_query($conn, "SELECT * FROM datasensor WHERE user='$_SESSION[username]' ORDER BY No DESC LIMIT 1");
            while ($r = mysqli_fetch_array($mysql)) { //mengambil data dari MySQL
            ?>
              <p><?php echo $r['User'] ?></p> <?php } ?>
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
          <!-- <li class="header">MAIN NAVIGATION</li> -->
          <li class="active treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              <span class="pull-right-container">
                <!-- <i class="fa fa-angle-left pull-right"></i> -->
              </span>
            </a>
          </li>
          <li>

          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>Data</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="pages/tables/tables_user.php"><i class="fa fa-circle-o"></i> Tabel</a></li>
              <li><a href="pages/charts/chartjs_user.php"><i class="fa fa-circle-o"></i> Grafik</a></li>
            </ul>
          </li>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <?php
                $mysql = mysqli_query($conn, "SELECT * FROM datasensor ORDER BY No DESC LIMIT 1");
                while ($r = mysqli_fetch_array($mysql)) { //mengambil data dari MySQL
                ?>
                  <h3><?php echo $r['Suhu'] ?>&deg;</h3> <?php } ?>
                <p>Suhu</p>
              </div>

              <div class="icon">
                <i class="ion glyphicon glyphicon-cloud"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <?php
                $mysql = mysqli_query($conn, "SELECT * FROM datasensor ORDER BY No DESC LIMIT 1");
                while ($r = mysqli_fetch_array($mysql)) { //mengambil data dari MySQL
                ?>
                  <h3><?php echo $r['Kelembaban'] ?><sup style="font-size: 20px">%</sup></h3> <?php } ?>
                <p>Kelembapan Udara</p>
              </div>
              <div class="icon">
                <i class="fa fa-tint"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <?php
                $mysql = mysqli_query($conn, "SELECT * FROM datasensor ORDER BY No DESC LIMIT 1");
                while ($r = mysqli_fetch_array($mysql)) { //mengambil data dari MySQL
                ?>
                  <h3><?php echo $r['KelembabanT'] ?><sup style="font-size: 20px">%</sup></h3> <?php } ?>

                <p>Kelembapan Tanah</p>
              </div>
              <div class="icon">
                <i class="fa fa-leaf"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <?php
                $mysql = mysqli_query($conn, "SELECT * FROM datasensor ORDER BY No DESC LIMIT 1");
                while ($r = mysqli_fetch_array($mysql)) { //mengambil data dari MySQL
                ?>
                  <h3><?php echo $r['Prediksi'] ?><sup style="font-size: 18px">K</sup></h3> <?php } ?>

                <p>Hasil Monetisasi/Kg</p>
              </div>
              <div class="icon">
                <i class="fa fa-money"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-3 connectedSortable">
            <h3>Jenis Tanaman</h3>
            <?php
            $data     = mysqli_query($conn, "SELECT * FROM tabel_tanaman WHERE ID IN (1) ");
            while ($r = mysqli_fetch_array($data)) {
            ?>
              <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-green">
                  <div class="widget-user-image">
                    <img class="img-circle" src="dist/img/leaf.png" alt="User Avatar">
                  </div>
                  <!-- /.widget-user-image -->
                  <h3 class="widget-user-username"><?php echo $r['TANAMAN'] ?></h3>
                  <h5 class="widget-user-desc">Sayur-sayuran</h5>
                </div>
                <div class="box-footer no-padding">
                  <ul class="nav nav-stacked">
                    <li><a href="#">Suhu Optimal <span class="pull-right badge bg-blue"><?php echo $r['SUHU'] ?> &deg;C</span></a></li>
                    <li><a href="#">Kelembapan Udara Optimal <span class="pull-right badge bg-aqua"><?php echo $r['UDARA'] ?> %</span></a></li>
                    <li><a href="#">Klembapan Tanah Optimal<span class="pull-right badge bg-green"><?php echo $r['TANAH'] ?> %</span></a></li>
                    <li><a href="#">Harga Komoditi Sekarang/Kg<span class="pull-right badge bg-red"><?php echo $r['HARGA'] ?> K</span></a></li>
                    <li>
                      <a href="#">Setatus
                        <span class="pull-right">
                          <?php
                          if ($r["SETATUS"] == 0) { //unchecked = OFF
                            echo '<input type="checkbox" id =' . $r["ID"] . ' onchange="sendData(this)" data-toggle="toggle" data-onstyle="primary" data-offstyle="danger">';
                          } else { //checked = ON
                            echo '<input type="checkbox" checked id =' . $r["ID"] . ' onchange="sendData(this)" data-toggle="toggle" data-onstyle="primary" data-offstyle="danger">';
                          }
                          ?>
                        </span>
                      </a>
                    </li>
                    <br>
                  </ul>
                </div>
              </div>
            <?php } ?>

            <?php
            $data     = mysqli_query($conn, "SELECT * FROM tabel_tanaman WHERE ID IN (2) ");
            while ($r = mysqli_fetch_array($data)) {
            ?>
              <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-blue">
                  <div class="widget-user-image">
                    <img class="img-circle" src="dist/img/leaf.png" alt="User Avatar">
                  </div>
                  <!-- /.widget-user-image -->
                  <h3 class="widget-user-username"><?php echo $r['TANAMAN'] ?></h3>
                  <h5 class="widget-user-desc">Buah-Buahan</h5>
                </div>
                <div class="box-footer no-padding">
                  <ul class="nav nav-stacked">
                    <li><a href="#">Suhu Optimal <span class="pull-right badge bg-blue"><?php echo $r['SUHU'] ?> &deg;C</span></a></li>
                    <li><a href="#">Kelembapan Udara Optimal <span class="pull-right badge bg-aqua"><?php echo $r['UDARA'] ?> % </span></a></li>
                    <li><a href="#">Klembapan Tanah Optimal<span class="pull-right badge bg-green"><?php echo $r['TANAH'] ?> %</span></a></li>
                    <li><a href="#">Harga Komoditi Sekarang/Kg<span class="pull-right badge bg-red"><?php echo $r['HARGA'] ?> K</span></a></li>
                    <li>
                      <a href="#">Setatus
                        <span class="pull-right">
                          <?php
                          if ($r["SETATUS"] == 0) { //unchecked = OFF
                            echo '<input type="checkbox" id =' . $r["ID"] . ' onchange="sendData(this)" data-toggle="toggle" data-onstyle="primary" data-offstyle="danger">';
                          } else { //checked = ON
                            echo '<input type="checkbox" checked id =' . $r["ID"] . ' onchange="sendData(this)" data-toggle="toggle" data-onstyle="primary" data-offstyle="danger">';
                          }
                          ?>
                        </span>
                      </a>
                    </li>
                    <br>
                  </ul>
                </div>
              </div>
            <?php } ?>

            <?php
            $data     = mysqli_query($conn, "SELECT * FROM tabel_tanaman WHERE ID IN (3) ");
            while ($r = mysqli_fetch_array($data)) {
            ?>
              <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-yellow">
                  <div class="widget-user-image">
                    <img class="img-circle" src="dist/img/leaf.png" alt="User Avatar">
                  </div>
                  <!-- /.widget-user-image -->
                  <h3 class="widget-user-username"><?php echo $r['TANAMAN'] ?></h3>
                  <h5 class="widget-user-desc">Palawija</h5>
                </div>
                <div class="box-footer no-padding">
                  <ul class="nav nav-stacked">
                    <li><a href="#">Suhu Optimal <span class="pull-right badge bg-blue"><?php echo $r['SUHU'] ?> &deg;C</span></a></li>
                    <li><a href="#">Kelembapan Udara Optimal <span class="pull-right badge bg-aqua"><?php echo $r['UDARA'] ?> %</span></a></li>
                    <li><a href="#">Klembapan Tanah Optimal<span class="pull-right badge bg-green"><?php echo $r['TANAH'] ?> %</span></a></li>
                    <li><a href="#">Harga Komoditi Sekarang/Kg<span class="pull-right badge bg-red"><?php echo $r['HARGA'] ?> K</span></a></li>
                    <li>
                      <a href="#">Setatus
                        <span class="pull-right">
                          <?php
                          if ($r["SETATUS"] == 0) { //unchecked = OFF
                            echo '<input type="checkbox" id =' . $r["ID"] . ' onchange="sendData(this)" data-toggle="toggle" data-onstyle="primary" data-offstyle="danger">';
                          } else { //checked = ON
                            echo '<input type="checkbox" checked id =' . $r["ID"] . ' onchange="sendData(this)" data-toggle="toggle" data-onstyle="primary" data-offstyle="danger">';
                          }
                          ?>
                        </span>
                      </a>
                    </li>
                    <br>
                  </ul>
                </div>
              </div>
            <?php } ?>

          </section>

          <section class="col-lg-9 connectedSortable">
            <h3>Info Terbaru</h3>
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Grafik Hasil Monetisasi/Kg (K)</h3>

                <div class="box-tools ">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="chart">
                  <canvas id="areaChart_3"></canvas>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col (RIGHT) -->
      </section>

    </div>
  </div>
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
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- ChartJS -->
  <script src="bower_components/chart.js/Chart.js"></script>
  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Morris.js charts -->
  <script src="bower_components/raphael/raphael.min.js"></script>
  <script src="bower_components/morris.js/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="bower_components/moment/min/moment.min.js"></script>
  <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>

  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

  <script>
    $(function() {

      var areaChartCanvas_3 = $('#areaChart_3').get(0).getContext('2d')
      var areaChart_3 = new Chart(areaChartCanvas_3)

      var areaChartData_3 = {
        labels: <?php echo json_encode($Jam); ?>.reverse(),
        datasets: [{
          label: 'Prediksi Pendapatan',
          fillColor: 'rgba( 182, 4, 25, 0.3)',
          strokeColor: 'rgba(210, 214, 222, 1)',
          pointColor: 'rgba(210, 214, 222, 1)',
          pointStrokeColor: '#c1c7d1',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data: <?php echo json_encode($Prediksi); ?>.reverse()
        }]
      }

      var areaChartOptions = {
        //Boolean - If we should show the scale at all
        showScale: true,
        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines: true,
        //String - Colour of the grid lines
        scaleGridLineColor: 'rgba(0,0,0,.05)',
        //Number - Width of the grid lines
        scaleGridLineWidth: 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines: true,
        //Boolean - Whether the line is curved between points
        bezierCurve: true,
        //Number - Tension of the bezier curve between points
        bezierCurveTension: 0.3,
        //Boolean - Whether to show a dot for each point
        pointDot: false,
        //Number - Radius of each point dot in pixels
        pointDotRadius: 4,
        //Number - Pixel width of point dot stroke
        pointDotStrokeWidth: 1,
        //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
        pointHitDetectionRadius: 20,
        //Boolean - Whether to show a stroke for datasets
        datasetStroke: true,
        //Number - Pixel width of dataset stroke
        datasetStrokeWidth: 2,
        //Boolean - Whether to fill the dataset with a color
        datasetFill: true,
        //String - A legend template
        legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
        //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio: true,
        //Boolean - whether to make the chart responsive to window resizing
        responsive: true
      }

      areaChart_3.Line(areaChartData_3, areaChartOptions)

    })
  </script>

  <script>
    //send data
    function sendData(e) {
      var xhr = new XMLHttpRequest();
      if (e.checked) {
        xhr.open("GET", "proses.php?ID=" + e.id + "&SETATUS= 0", true);
      } else {
        xhr.open("GET", "proses.php?ID=" + e.id + "&SETATUS= 1", true);
      }
      xhr.send();
    }
  </script>

</body>

</html>