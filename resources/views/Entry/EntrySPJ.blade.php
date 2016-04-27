<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Entry SPJ</title>
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
            Entry SPJ
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          @if (session('errMessage') != null)
        <!-- Error message kalau kode sudah pernah di masukkan -->
        <div class="alert alert-danger alert-dismissable ">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-ban"></i> Data gagal disimpan!</h4>
          {!! session('errMessage') !!}
        </div>
        @endif

       @if (session('successMessage') != null)
        <!-- Success message kalau data berhasil dimasukkan -->
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i>{{session('successMessage')}} </h4>
        </div>
        @endif

          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">

                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Kode</th>
                        <th>Bidang</th>
                        <th>Nama Kegiatan</th>
                        <th>Anggaran</th>
                        <th align="center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; ?>
                      @foreach($kegiatan as $data)
                      @if($role == $data->nama || $role == "all")
                      <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->description}}</td>
                        <td>Rp {{number_format($data->anggaran,2,',','.')}}</td>
                        <td align="center">
                          <a class="btn btn-warning" href="SPJ/realisasi/{{$data->id}}">
                              <i class="fa fa-edit fa-lg"></i> Entry SPJ
                          </a>
                        </td>
                      </tr>
                      <?php $i++; ?>
                      @endif
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


      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
        });
      });


      function validateNumber(evt) {

    var e = evt || window.event;
    var key = e.keyCode || e.which;

    if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
    // numbers
    key >= 48 && key <= 57 ||
    // Numeric keypad
    key >= 96 && key <= 105 ||
    // Backspace and Tab and Enter
    key == 8 || key == 9 || key == 13 ||
    // Home and End
    key == 35 || key == 36 ||
    // left and right arrows
    key == 37 || key == 39 ||
    // Del and Ins
    key == 46 || key == 45) {
        // input is VALID
    }
    else {
        // input is INVALID
        e.returnValue = false;
        if (e.preventDefault) e.preventDefault();
    }
}
    </script>
  </body>
</html>
