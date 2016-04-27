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
                            <button type="button" onclick="#" class="btn btn-primary" style="margin-left:20px">preview</button>
                            <a href="#" class="btn btn-success" style="float:right">Export to excel</a>
                        </div>
                    </form>

                </div><!-- /.box-header -->
                <div class="box-body" style="overflow-x: scroll">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr align="center">
                        <th rowspan="3">Kode Kegiatan</th>
                        <th rowspan="3">Kegiatan</th>
                        <th colspan="24">Rencana</th>
                        <th colspan="24">Realisasi</th>
                        <th rowspan="2" colspan="2">Sisa anggaran</th>
                      </tr>
                      <tr align="center">
                        <!-- Bulan Rencana -->
                        <th colspan="2">Januari</th>
                        <th colspan="2">Februari</th>  
                        <th colspan="2">Maret</th>
                        <th colspan="2">April</th>
                        <th colspan="2">Mei</th>
                        <th colspan="2">Juni</th>
                        <th colspan="2">Juli</th>
                        <th colspan="2">Agustus</th>
                        <th colspan="2">September</th>
                        <th colspan="2">Oktober</th>
                        <th colspan="2">November</th>
                        <th colspan="2">Desember</th>
                        <!-- Bulan Realisasi -->
                        <th colspan="2">Januari</th>
                        <th colspan="2">Februari</th>  
                        <th colspan="2">Maret</th>
                        <th colspan="2">April</th>
                        <th colspan="2">Mei</th>
                        <th colspan="2">Juni</th>
                        <th colspan="2">Juli</th>
                        <th colspan="2">Agustus</th>
                        <th colspan="2">September</th>
                        <th colspan="2">Oktober</th>
                        <th colspan="2">November</th>
                        <th colspan="2">Desember</th>
                      </tr>
                        <tr align="center">
                            <td>%</td>
                            <td>Rp</td>
                            <td>%</td>
                            <td>Rp</td>
                            <td>%</td>
                            <td>Rp</td>
                            <td>%</td>
                            <td>Rp</td>
                            <td>%</td>
                            <td>Rp</td>
                            <td>%</td>
                            <td>Rp</td>
                            <td>%</td>
                            <td>Rp</td>
                            <td>%</td>
                            <td>Rp</td>
                            <td>%</td>
                            <td>Rp</td>
                            <td>%</td>
                            <td>Rp</td>
                            <td>%</td>
                            <td>Rp</td>
                            <td>%</td>
                            <td>Rp</td>
                            <td>%</td>
                            <td>Rp</td>
                            <td>%</td>
                            <td>Rp</td>
                            <td>%</td>
                            <td>Rp</td>
                            <td>%</td>
                            <td>Rp</td>
                            <td>%</td>
                            <td>Rp</td>
                            <td>%</td>
                            <td>Rp</td>
                            <td>%</td>
                            <td>Rp</td>
                            <td>%</td>
                            <td>Rp</td>
                            <td>%</td>
                            <td>Rp</td>
                            <td>%</td>
                            <td>Rp</td>
                            <td>%</td>
                            <td>Rp</td>
                            <td>%</td>
                            <td>Rp</td>
                            <td>%</td>
                            <td>Rp</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rko as $data)
                        <tr>
                            <td>{{$data->id_kegiatan}}</td>
                            <td>{{$data->description}}</td>
                            <!-- rencana -->
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <!-- realisasi -->
                            <td>{{$data->jan}}</td>
                            <td></td>
                            <td>{{$data->feb}}</td>
                            <td></td>
                            <td>{{$data->mar}}</td>
                            <td></td>
                            <td>{{$data->apr}}</td>
                            <td></td>
                            <td>{{$data->mei}}</td>
                            <td></td>
                            <td>{{$data->jun}}</td>
                            <td></td>
                            <td>{{$data->jul}}</td>
                            <td></td>
                            <td>{{$data->agu}}</td>
                            <td></td>
                            <td>{{$data->sep}}</td>
                            <td></td>
                            <td>{{$data->okt}}</td>
                            <td></td>
                            <td>{{$data->nov}}</td>
                            <td></td>
                            <td>{{$data->des}}</td>
                            <!-- sisa anggaran -->
                            <td></td>
                            <td></td>
                        </tr>
                        @endforeach
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
