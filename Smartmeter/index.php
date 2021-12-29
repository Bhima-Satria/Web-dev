<!DOCTYPE html>
<html lang="en">

<?php include 'koneksi.php' ?>

<?php
ini_set('display_errors', 0);

$Data = mysqli_query($conn, "SELECT * FROM tabelsensor ORDER BY ID DESC LIMIT 15");
while ($row = mysqli_fetch_array($Data)) {
  $Jam1[] = $row['Jam'];
  $Suhu1[] = $row['Suhu'];
  $Kekeruhan1[] = $row['Kekeruhan'];
  $Ph1[] = $row['Ph'];
}

$i = 1;
$Tanggal    = date('Y-m-d');;
$Jam        = date('H:i:s');
$Suhu       = $_GET['Suhu'];
$Kekeruhan = $_GET['Kekeruhan'];
$Ph        = $_GET['Ph'];

?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Smart Meter | Dashboard </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="dist/img/logo.png" alt="Smart Meter" height="256" width="256">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-power-off"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="dist/img/Logo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Smart Meter</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">User 1</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <!-- <li class="nav-item">
              <a href="pages/widgets.html" class="nav-link">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>
                  Profil Pengguna
                </p>
              </a>
            </li> -->
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-1">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-10">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Grafik Data Suhu</h3>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="areaChart" style="min-height: 280px; height: 280px; max-height: 300px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
            </div>

            <!-- ambil data user -->
            <?php
            $data     = mysqli_query($conn, "SELECT * FROM tabelsensor ORDER BY ID DESC LIMIT 1");
            while ($r = mysqli_fetch_array($data)) {
            ?>
              <div class="col-md-2">
                <!-- Info Boxes Style 2 -->
                <div class="info-box mb-3 bg-warning">
                  <span class="info-box-icon"><i class="fas fa-fire"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Suhu</span>
                    <span class="info-box-number"><?php echo $r['Suhu'] ?> &deg;C</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              <?php } ?>

              <!-- /.info-box -->
              <?php
              $data     = mysqli_query($conn, "SELECT * FROM tabelsensor ORDER BY ID DESC LIMIT 1");
              while ($r = mysqli_fetch_array($data)) {
              ?>
                <div class="info-box mb-3 bg-success">
                  <span class="info-box-icon"><i class="fas fa-flask"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Kekeruhan</span>
                    <span class="info-box-number"><?php echo $r['Kekeruhan'] ?> NTU</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              <?php } ?>

              <!-- /.info-box -->
              <?php
              $data     = mysqli_query($conn, "SELECT * FROM tabelsensor ORDER BY ID DESC LIMIT 1");
              while ($r = mysqli_fetch_array($data)) {
              ?>
                <div class="info-box mb-3 bg-danger">
                  <span class="info-box-icon"><i class="fas fa-thermometer"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">PH Air</span>
                    <span class="info-box-number"><?php echo $r['Ph'] ?> pH</span>
                  </div>
                <?php } ?>
                <!-- /.info-box-content -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
              <!-- /.card -->
          </div>
          <!-- /.row -->
        </div>

        <div class="container-fluid">
          <div class="row">
            <!-- Left col -->
            <div class="col-md-10">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Grafik Data Kekeruhan</h3>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="areaChart1" style="min-height: 280px; height: 280px; max-height: 300px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
          </div>
        </div>

        <div class="container-fluid">
          <div class="row">
            <!-- Left col -->
            <div class="col-md-10">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Grafik Data pH Air</h3>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="areaChart2" style="min-height: 280px; height: 280px; max-height: 300px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
          </div>
        </div>

        <!--/. container-fluid -->
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">DataTable Sensor</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Suhu</th>
                        <th>Kekeruhan</th>
                        <th>Ph Air</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $mysql = mysqli_query($conn, "SELECT * FROM tabelsensor ORDER BY ID DESC");
                      while ($r = mysqli_fetch_array($mysql)) { //mengambil data dari MySQL
                      ?>
                        <tr>
                          <td><?php echo $r['ID'] ?></td>
                          <td><?php echo $r['Tanggal'] ?></td>
                          <td><?php echo $r['Jam'] ?></td>
                          <td><?php echo $r['Suhu'] ?></td>
                          <td><?php echo $r['Kekeruhan'] ?></td>
                          <td><?php echo $r['Ph'] ?></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Suhu</th>
                        <th>Kekeruhan</th>
                        <th>Ph Air</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2021 <a>Smart Meter</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b>1.0.0
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <script src="../../plugins/chart.js/Chart.min.js"></script>

  <!-- PAGE PLUGINS -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <!-- jQuery Mapael -->
  <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="plugins/raphael/raphael.min.js"></script>
  <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard2.js"></script>

  <script>
    $(function() {
      // Get context with jQuery - using jQuery's .get() method.
      var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
      var areaChartCanvas1 = $('#areaChart1').get(0).getContext('2d')
      var areaChartCanvas2 = $('#areaChart2').get(0).getContext('2d')

      var Datasuhu = <?php echo json_encode($Suhu1); ?>.reverse();
      var Datajam = <?php echo json_encode($Jam1); ?>.reverse();
      var Datakekeruhan = <?php echo json_encode($Kekeruhan1); ?>.reverse();
      var Dataph = <?php echo json_encode($Ph1); ?>.reverse();

      var areaChartData = {
        labels: Datajam,
        datasets: [{
            label: 'Suhu Air',
            //backgroundColor     : 'rgba(60,141,188,0.9)',
            borderColor: 'rgba(243, 156, 18, 1)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: Datasuhu
          },
        ]
      }

      var areaChartData1 = {
        labels: Datajam,
        datasets: [{
            label: 'Kekeruhan Air',
            //backgroundColor     : 'rgba(210, 214, 222, 1)',
            borderColor: 'rgba(0, 188, 140, 1)',
            pointRadius: false,
            pointColor: 'rgba(210, 214, 222, 1)',
            pointStrokeColor: '3b8bba',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: Datakekeruhan
          },
        ]
      }

      var areaChartData2 = {
        labels: Datajam,
        datasets: [{
            label: 'PH Air',
            //backgroundColor     : 'rgba(70,241,188,0.9)',
            borderColor: 'rgba(231, 76, 60, 1)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(70,241,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(70,241,188,1)',
            data: Dataph
          },
        ]
      }

      var areaChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
          display: false
        },
        scales: {
          xAxes: [{
            gridLines: {
              display: false,
            }
          }],
          yAxes: [{
            gridLines: {
              display: false,
            }
          }]
        }
      }

      // This will get the first returned node in the jQuery collection.
      new Chart(areaChartCanvas, {
        type: 'line',
        data: areaChartData,
        options: areaChartOptions
      })
      new Chart(areaChartCanvas1, {
        type: 'line',
        data: areaChartData1,
        options: areaChartOptions
      })
      new Chart(areaChartCanvas2, {
        type: 'line',
        data: areaChartData2,
        options: areaChartOptions
      })
    })
  </script>

  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

</body>

</html>