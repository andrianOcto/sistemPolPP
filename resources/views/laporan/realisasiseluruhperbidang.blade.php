<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan Belanja</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    
    <link href="{{ asset("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
    <link href="{{ asset("/bower_components/admin-lte/awesome-font/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="{{ asset("/bower_components/admin-lte/dist/css/ionic.css")}}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- DataTables -->
    <link href="{{ asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css") }}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset("/bower_components/admin-lte/dist/css/skins/_all-skins.min.css") }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Header -->
      @include('header')

      <!-- Sidebar -->
      @include('sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content-header">
          <h1>
            Laporan Realisasi Keseluruhan
          </h1>
        </section>
        
        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                    <form class="form" method="" action="" style="margin-bottom:10px">
                        <div class="form-inline">
                            <label for="tahun">Tahun:</label>
                            <select class="form-control select2" id="pertahun">
                                <option value="1">2015</option>
                            </select>
                            <label for="bidang" style="margin-left:20px">Bidang:</label>
                            <select class="form-control select2" id="perbidang">
                                <option value="1">1 &nbsp; Bidang1</option>
                            </select>
                            <button type="button" onclick="#" class="btn btn-primary" style="margin-left:20px">preview</button>
                            <a href="#" class="btn btn-success" style="float:right">Export to excel</a>
                        </div>
                    </form>
                    
                </div><!-- /.box-header -->
                <div class="box-body" style="overflow-x: scroll">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr align="center">
                        <td rowspan="2">Kode Kegiatan</td>
                        <td rowspan="2">Kegiatan</td>
                        <td rowspan="2">Program</td>
                        <td rowspan="2">Kode Rincian</td>
                        <td rowspan="2">Keperluan</td>
                        <td rowspan="2">Jumlah</td>
                        <td colspan="12">Bulan</td>
                      </tr>
                    <tr>
                        <td>Jumlah</td>
                        <td>Januari</td>
                        <td>Jumlah</td>
                        <td>Februari</td>
                        <td>Jumlah</td>
                        <td>Maret</td>
                        <td>Jumlah</td>
                        <td>April</td>
                        <td>Jumlah</td>
                        <td>Mei</td>
                        <td>Jumlah</td>
                        <td>Juni</td>
                        <td>Jumlah</td>
                        <td>Juli</td>
                        <td>Jumlah</td>
                        <td>Agustus</td>
                        <td>Jumlah</td>
                        <td>September</td>
                        <td>Jumlah</td>
                        <td>Oktober</td>
                        <td>Jumlah</td>
                        <td>November</td>
                        <td>Jumlah</td>
                        <td>Desember</td>
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                    <tfoot>

                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!-- Control Sidebar -->

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->

    <script src="{{ asset ("/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset ("/bower_components/admin-lte/bootstrap/js/bootstrap.min.js") }}"></script>
    <!-- DataTables -->
    <script src="{{ asset ("/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset ("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js") }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset ("/bower_components/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js") }}"></script>
    <!-- FastClick -->
    <script src="{{ asset ("/bower_components/admin-lte/plugins/fastclick/fastclick.min.js") }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ("/bower_components/admin-lte/dist/js/app.min.js") }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset ("/bower_components/admin-lte/dist/js/demo.js") }}"></script>
    <!-- page script -->
    <script>

    var arrBidangKode = [];
    var arrBidangNama = [];

      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": false,
          "info": true,
          "autoWidth": true
        });
      });

    </script>
  </body>
</html>
